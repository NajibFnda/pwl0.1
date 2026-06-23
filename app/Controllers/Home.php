<?php

namespace App\Controllers;

use App\Models\SearchHistoryModel; // <-- Wajib dipanggil untuk akses tabel history

class Home extends BaseController
{
    // ==========================================
    // 1. TAMPILAN HALAMAN UTAMA (Saat pertama kali dibuka)
    // ==========================================
    public function index()
    {
        $session = session();
        $usage_count = 0;
        $usage_limit = 5;

        // Jika user sudah login, cek dia sudah melakukan berapa pencarian hari ini
        if ($session->get('logged_in')) {
            $user_id = $session->get('id');
            $historyModel = new SearchHistoryModel();
            $usage_count = $historyModel->countUserSearchesToday($user_id);
        }

        // Siapkan data default pembungkus awal
        $data = [
            'status'      => null,
            'email'       => '',
            'details'     => [],
            'usage_count' => $usage_count, // <-- Kirim data kuota awal
            'usage_limit' => $usage_limit, // <-- Kirim data batas kuota
            'statistik'   => [
                'sumber_aktif'      => '48',
                'tingkat_kebocoran' => 'Kritis',
                'total_akun'        => '352K+'
            ]
        ];

        return view('pwned_search', $data);
    }

    // ==========================================
    // 2. FUNGSI CEK EMAIL (Saat tombol ditekan)
    // ==========================================
    public function cekEmail()
    {
        $session = session();
        $emailInput = $this->request->getPost('email');
        
        $usage_count = 0;
        $usage_limit = 5; // Jatah untuk free user
        $is_premium = false;

        // -- LOGIKA PEMBATASAN KUOTA --
        if ($session->get('logged_in')) {
            $user_id = $session->get('id');
            $paket = $session->get('subscription_plan');
            $is_premium = ($paket === 'pro' || $paket === 'plus');

            $historyModel = new \App\Models\SearchHistoryModel();
            
            // Hitung sudah berapa kali user ini mencari email HARI INI
            $usage_count = $historyModel->countUserSearchesToday($user_id);

            // Jika limit habis dan BUKAN premium, tolak pencarian dan ARAHKAN KE UPGRADE!
            if ($usage_count >= $usage_limit && !$is_premium) {
                
                // Melempar user ke halaman upgrade dengan membawa pesan khusus
                return redirect()->to('/upgrade')->with('limit_reached', 'Waduh! Batas pengecekan gratis Anda hari ini sudah habis. Upgrade sekarang untuk akses tanpa batas.');
                
            }
        } else {
            // Jika tamu (belum login) mencoba mencari email, arahkan ke login
            return redirect()->to('/login')->with('error', 'Silakan masuk ke sistem terlebih dahulu untuk mengecek email.');
        }
        // -- SIMULASI LOGIK PENGECEKAN DATABASE / API (Kode Asli Milikmu) --
        if (strpos($emailInput, 'bocor') !== false || $emailInput == 'admin@gmail.com') {
            $status = 'pwned';
            $details = [
                [
                    'sumber' => 'Tokopedia Breach',
                    'tanggal' => '2020-05-12',
                    'jenis' => 'Email, Password, Nama Lengkap'
                ],
                [
                    'sumber' => 'Zynga Leak',
                    'tanggal' => '2019-09-03',
                    'jenis' => 'Email, Password, Username'
                ]
            ];
        } else {
            $status = 'safe';
            $details = [];
        }

        // -- CATAT HISTORY SETELAH PENCARIAN BERHASIL --
        if ($session->get('logged_in')) {
            $historyModel->insert([
                'user_id'       => $user_id,
                'email_checked' => $emailInput
            ]);
            // Tambah 1 ke angka hitungan agar tampilan di layar langsung ter-update (contoh: dari 0 jadi 1)
            $usage_count++; 
        }

        // Siapkan kembali data untuk dikirim ke view beserta hasilnya
        $data = [
            'status'      => $status,
            'email'       => $emailInput,
            'details'     => $details,
            'usage_count' => $usage_count,
            'usage_limit' => $usage_limit,
            'statistik'   => [
                'sumber_aktif'      => '48',
                'tingkat_kebocoran' => 'Kritis',
                'total_akun'        => '352K+'
            ]
        ];

        return view('pwned_search', $data);
    }

    // ==========================================
    // 3. FUNGSI HALAMAN UPGRADE
    // ==========================================
    public function upgrade()
    {
        return view('v_upgrade');
    }
}