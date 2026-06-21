<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // 1. Siapkan data default pembungkus awal agar tidak undefined variable saat halaman pertama dimuat
        $data = [
            'status'    => null,
            'email'     => '',
            'details'   => [],
            'statistik' => [
                'sumber_aktif'      => '48',
                'tingkat_kebocoran' => 'Kritis',
                'total_akun'        => '352K+'
            ]
        ];

        return view('pwned_search', $data);
    }

    // 2. Tambahkan fungsi cekEmail untuk menangani request POST dari form
    public function cekEmail()
    {
        // Ambil data email yang diinput oleh user dari form
        $emailInput = $this->request->getPost('email');

        // --- SIMULASI LOGIK PENGECKAN DATABASE / API ---
        // (Nanti bagian ini bisa Anda hubungkan dengan Database MySQL Anda)
        
        // Contoh simulasi: jika email mengandung kata "bocor", kita set sebagai pwned
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

        // Siapkan kembali data untuk dikirim ke view beserta hasilnya
        $data = [
            'status'    => $status,
            'email'     => $emailInput,
            'details'   => $details,
            'statistik' => [
                'sumber_aktif'      => '48',
                'tingkat_kebocoran' => 'Kritis',
                'total_akun'        => '352K+'
            ]
        ];

        // Kembalikan ke view yang sama (pwned_search) dengan membawa data hasil pemeriksaan
        return view('pwned_search', $data);
    }

    // Fungsi upgrade mengarah ke file v_upgrade
    public function upgrade()
    {
        return view('v_upgrade');
    }
}