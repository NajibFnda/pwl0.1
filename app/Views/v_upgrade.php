<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade Premium - PWNED</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F4F6FA] text-gray-800 font-sans min-h-screen flex flex-col justify-between">

    <!-- NAVBAR KHUSUS HALAMAN UPGRADE (Tombol Home Aktif) -->
    <nav class="bg-[#0B132B] px-6 py-4 grid grid-cols-3 items-center text-white sticky top-0 z-50 shadow-md">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold tracking-wider text-blue-400">❖ PWNED</span>
        </div>
        
    <div id="nav-container" class="hidden md:flex justify-center space-x-8 text-xs font-bold tracking-widest text-gray-400">
        <a href="<?= base_url('/') ?>" 
        class="group relative flex items-center gap-2 hover:text-white transition-colors duration-300">
            <span class="border-b-2 border-transparent group-hover:border-blue-400 pb-0.5">KEMBALI KE HOME</span>
        </a>
    </div>
        
        <div class="flex justify-end">
            <span class="bg-blue-500/20 text-blue-400 px-4 py-1.5 rounded-full text-xs font-bold border border-blue-500/30">
                Premium Page
            </span>
        </div>
    </nav>

        <?php if(session()->getFlashdata('limit_reached')): ?>
            <div class="max-w-3xl mx-auto mt-8 bg-rose-50 border border-rose-200 text-rose-700 px-6 py-4 rounded-xl shadow-sm flex items-center gap-3 animate-bounce">
                <span class="text-2xl">⚠️</span>
                <p class="font-bold text-sm"><?= session()->getFlashdata('limit_reached') ?></p>
            </div>
        <?php endif; ?>

    <!-- MAIN SEKSI PRICING -->
    <main class="flex-grow flex items-center justify-center py-12 px-6">
        <div class="max-w-4xl w-full space-y-10">
            
            <!-- Header Text -->
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-black text-gray-900 tracking-tight md:text-4xl">
                    Upgrade untuk Mendapatkan Akses Lebih Banyak
                </h1>
                <p class="text-sm text-gray-500 max-w-lg mx-auto">
                    Batalkan kapan saja. Pilih paket premium yang sesuai dengan tingkat kebutuhan perlindungan data Anda.
                </p>
                
                <!-- Toggle Bulanan / Tahunan -->
                <div class="inline-flex items-center bg-gray-200 p-1 rounded-full mt-4 border border-gray-300 shadow-inner">
                    <button id="btn-bulanan" class="px-5 py-1.5 rounded-full text-xs font-bold bg-[#004e89] text-white shadow transition-all">Bulanan</button>
                    <button id="btn-tahunan" class="px-5 py-1.5 rounded-full text-xs font-bold text-gray-500 hover:text-gray-800 transition-all">Tahunan</button>
                </div>
                <div class="text-[11px] text-emerald-600 font-bold tracking-wide mt-1 animate-pulse">
                    ⚡ Hemat 16% jika Anda memilih pembayaran tahunan!
                </div>
            </div>

            <!-- Tampilan Card Paket (Plus & Pro) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto items-stretch">
                
                <!-- PAKET PLUS CARD -->
                <div class="relative bg-white border border-blue-500 rounded-2xl p-8 shadow-lg">
                    <div class="absolute top-0 right-0 bg-blue-500 text-white text-[9px] font-black uppercase px-4 py-1 rounded-bl-xl rounded-tr-2xl tracking-wider">
                            DISARANKAN
                        </div>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-1.5">
                                <span class="text-blue-500">✦</span> PWNED Plus
                            </h3>
                            <p class="text-xs text-gray-500 mt-1">Sangat cocok untuk pemantauan data pribadi berkala agar tetap aman.</p>
                        </div>
                        
                        <div class="py-3 border-t border-b border-gray-100">
                            <span id="price-plus" class="text-3xl font-black text-gray-900">Rp 25.000</span>
                            <span class="text-gray-400 text-xs font-medium">/bln</span>
                            <div id="note-plus" class="text-[10px] text-gray-400 mt-0.5 hidden">*Ditagih Rp 252.000 /tahun</div>
                        </div>

                        <div class="space-y-3 pt-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Fitur Utama:</span>
                            <ul class="space-y-2.5 text-xs text-gray-600">
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span><strong>Batas Kuota 10x Lebih Tinggi:</strong> Bisa melakukan pengecekan 50 email per hari.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span><strong>Notifikasi Kebocoran Instan:</strong> Pengiriman alert otomatis ke email Anda saat terjadi kebocoran baru di internet.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <?php if(session()->get('subscription_plan') === 'plus'): ?>
                            <button disabled class="block text-center w-full bg-gray-200 text-gray-500 py-2.5 rounded-xl text-xs font-bold mt-6 cursor-not-allowed">
                                Paket Anda Saat Ini
                            </button>
                        <?php else: ?>
                            <button onclick="bukaModalPembayaran('plus')" class="block text-center w-full bg-[#004e89] hover:bg-[#00355d] text-white py-2.5 rounded-xl text-xs font-bold transition shadow-md mt-6">
                                Dapatkan Paket Plus
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- PAKET PRO CARD -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6 flex flex-col justify-between shadow-md transform hover:scale-[1.01] transition-all">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-1.5">
                                <span class="text-gray-800">🛡️</span> PWNED Pro
                            </h3>
                            <p class="text-xs text-gray-500 mt-1">Solusi komprehensif bagi praktisi keamanan siber dalam menganalisis data breach.</p>
                        </div>
                        
                        <div class="py-3 border-t border-b border-gray-100">
                            <span id="price-pro" class="text-3xl font-black text-gray-900">Rp 50.000</span>
                            <span class="text-gray-400 text-xs font-medium">/bln</span>
                            <div id="note-pro" class="text-[10px] text-gray-400 mt-0.5 hidden">*Ditagih Rp 500.000 /tahun</div>
                        </div>

                        <div class="space-y-3 pt-1">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Fitur Unggulan:</span>
                            <ul class="space-y-2.5 text-xs text-gray-600">
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span><strong>Unlimited Search:</strong> Bebas cek tanpa batasan harian.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span><strong>Deep Search Data:</strong> Akses pelacakan jenis teks password lama yang ikut terekspos.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">✓</span>
                                    <span><strong>Export Laporan Resmi:</strong> Unduh berkas audit keamanan dalam format PDF/CSV.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="pt-6 border-t border-gray-100">
                        <?php if(session()->get('subscription_plan') === 'pro'): ?>
                            <button disabled class="block text-center w-full bg-gray-200 text-gray-500 py-2.5 rounded-xl text-xs font-bold mt-6 cursor-not-allowed border border-gray-300">
                                Paket Anda Saat Ini
                            </button>
                        <?php else: ?>
                            <button onclick="bukaModalPembayaran('pro')" class="block text-center w-full bg-gray-900 hover:bg-black text-white py-2.5 rounded-xl text-xs font-bold transition shadow-md mt-6">
                                Dapatkan Paket Pro
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            
        </div>
    </main>

    <footer class="bg-[#0B132B] text-center py-4 text-xs text-gray-500 border-t border-gray-900/40">
        PWNED © 2026 | Pemisahan Halaman Pricing Mandiri
    </footer>

    <!-- LOGIKA TOGGLE INTERAKTIF HARGA -->
    <script>
        const btnBulanan = document.getElementById('btn-bulanan');
        const btnTahunan = document.getElementById('btn-tahunan');
        const pricePlus = document.getElementById('price-plus');
        const pricePro = document.getElementById('price-pro');
        const notePlus = document.getElementById('note-plus');
        const notePro = document.getElementById('note-pro');

        // Tabel harga per paket & mode
        const HARGA = {
            plus: { bulanan: 25000, tahunan: 21000 },
            pro:  { bulanan: 50000, tahunan: 42000 }
        };

        // State mode langganan yang sedang aktif
        let modeAktif = 'bulanan';

        btnBulanan.addEventListener('click', () => {
            modeAktif = 'bulanan';
            btnBulanan.className = "px-5 py-1.5 rounded-full text-xs font-bold bg-[#004e89] text-white shadow transition-all";
            btnTahunan.className = "px-5 py-1.5 rounded-full text-xs font-bold text-gray-500 hover:text-gray-800 transition-all";
            pricePlus.textContent = "Rp 25.000";
            pricePro.textContent = "Rp 50.000";
            notePlus.classList.add('hidden');
            notePro.classList.add('hidden');
        });

        btnTahunan.addEventListener('click', () => {
            modeAktif = 'tahunan';
            btnTahunan.className = "px-5 py-1.5 rounded-full text-xs font-bold bg-[#004e89] text-white shadow transition-all";
            btnBulanan.className = "px-5 py-1.5 rounded-full text-xs font-bold text-gray-500 hover:text-gray-800 transition-all";
            pricePlus.textContent = "Rp 21.000";
            pricePro.textContent = "Rp 42.000";
            notePlus.classList.remove('hidden');
            notePro.classList.remove('hidden');
        });
    </script>

<!-- ========================================== -->
    <!-- MODAL POP-UP PEMBAYARAN MULTI-METODE -->
    <!-- ========================================== -->
    <div id="modal-pembayaran" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-2xl w-11/12 max-w-lg p-6 shadow-2xl relative">
            <!-- Tombol Tutup -->
            <button onclick="tutupModal()" class="absolute top-4 right-4 text-gray-400 hover:text-rose-500 transition text-2xl font-bold">
                &times;
            </button>

            <!-- Header Modal -->
            <div class="text-center mb-5">
                <h3 class="text-xl font-black text-gray-900">Selesaikan Pembayaran</h3>
                <p class="text-sm text-gray-500 mt-1">Pilih metode pembayaran yang paling nyaman untuk Anda.</p>
            </div>

            <!-- Detail Pesanan -->
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-5 flex justify-between items-center">
                <div>
                    <span class="block text-xs text-blue-500 uppercase font-bold">Total Tagihan</span>
                    <span id="modal-paket-nama" class="font-bold text-gray-800 text-sm">Paket</span>
                </div>
                <div id="modal-harga" class="text-2xl font-black text-blue-700">Rp 0</div>
            </div>

            <!-- Pilihan Metode Pembayaran -->
            <div class="grid grid-cols-3 gap-2 mb-5">
                <button onclick="pilihMetode('qris')" id="btn-qris" class="metode-btn py-2 border-2 border-blue-500 bg-blue-50 rounded-lg text-sm font-bold text-blue-700 transition">
                    QRIS
                </button>
                <button onclick="pilihMetode('paypal')" id="btn-paypal" class="metode-btn py-2 border border-gray-200 bg-white hover:bg-gray-50 rounded-lg text-sm font-bold text-gray-500 transition">
                    PayPal
                </button>
                <button onclick="pilihMetode('bank')" id="btn-bank" class="metode-btn py-2 border border-gray-200 bg-white hover:bg-gray-50 rounded-lg text-sm font-bold text-gray-500 transition">
                    Transfer Bank
                </button>
            </div>

            <!-- KONTEN DINAMIS BERDASARKAN METODE -->
            <div class="min-h-[180px]">
                
                <!-- 1. Konten QRIS -->
                <div id="konten-qris" class="konten-pembayaran flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-xl p-6 bg-white">
                    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200 shadow-sm mb-3">
                        <span class="text-5xl">📱</span>
                    </div>
                    <p class="text-xs text-center text-gray-400 font-medium">Buka aplikasi m-banking atau e-wallet Anda<br>lalu scan QR Code di atas.</p>
                </div>

                <!-- 2. Konten PayPal -->
                <div id="konten-paypal" class="konten-pembayaran hidden flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-xl p-6 bg-white text-center">
                    <span class="text-5xl mb-3 text-blue-500">💳</span>
                    <p class="text-sm font-bold text-gray-700">Bayar dengan Saldo PayPal</p>
                    <p class="text-xs text-gray-500 mt-1 mb-4">Anda akan diarahkan ke halaman login PayPal untuk menyelesaikan transaksi.</p>
                    <div class="bg-gray-100 px-4 py-2 rounded-md text-xs font-mono text-gray-600">payment@pwned.com</div>
                </div>

                <!-- 3. Konten Transfer Bank -->
                <div id="konten-bank" class="konten-pembayaran hidden flex flex-col justify-center border-2 border-dashed border-gray-200 rounded-xl p-4 bg-white">
                    <p class="text-sm font-bold text-gray-700 mb-3 text-center">Transfer ke Virtual Account (VA)</p>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <span class="font-bold text-blue-800">BCA</span>
                            <span class="font-mono text-sm text-gray-700 tracking-wider">8077 0812 3456</span>
                        </div>
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <span class="font-bold text-orange-600">BNI</span>
                            <span class="font-mono text-sm text-gray-700 tracking-wider">829 0812 3456 78</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tombol Aksi Bawah -->
            <div class="flex gap-3 mt-6">
                <button onclick="tutupModal()" class="w-1/3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl transition text-sm">
                    Batal
                </button>
                <a href="#" id="btn-konfirmasi" class="w-2/3 bg-gray-900 hover:bg-black text-white text-center font-bold py-3 rounded-xl transition text-sm shadow-md flex items-center justify-center gap-2">
                    <span>Konfirmasi Pembayaran</span>
                    <span class="text-lg">→</span>
                </a>
            </div>
        </div>
    </div>

<!-- ========================================== -->
    <!-- SCRIPT LOGIKA MODAL PEMBAYARAN -->
    <!-- ========================================== -->
    <script>
        // Fungsi memunculkan modal dan set harga
// Fungsi memunculkan modal dan set harga
function bukaModalPembayaran(paket) {
    const harga = HARGA[paket][modeAktif];
    const totalTahunan = harga * 12;

    document.getElementById('modal-paket-nama').innerText =
        'PAKET ' + paket.toUpperCase() + ' (' + (modeAktif === 'tahunan' ? 'Tahunan' : 'Bulanan') + ')';

    const nilaiDitampilkan = modeAktif === 'tahunan' ? totalTahunan : harga;
    let rupiah = nilaiDitampilkan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    document.getElementById('modal-harga').innerText = rupiah.replace(',00', '');

    document.getElementById('btn-konfirmasi').href =
        "<?= base_url('upgrade/proses/') ?>" + paket + "?mode=" + modeAktif;

    // Reset ke QRIS setiap kali dibuka
    pilihMetode('qris');

    document.getElementById('modal-pembayaran').classList.remove('hidden');
}

// Fungsi menyembunyikan modal
function tutupModal() {
    document.getElementById('modal-pembayaran').classList.add('hidden');
}

// Fungsi mengganti tab metode pembayaran
function pilihMetode(metode) {
    let btns = document.querySelectorAll('.metode-btn');
    btns.forEach(btn => {
        btn.className = "metode-btn py-2 border border-gray-200 bg-white hover:bg-gray-50 rounded-lg text-sm font-bold text-gray-500 transition";
    });

    let btnAktif = document.getElementById('btn-' + metode);
    btnAktif.className = "metode-btn py-2 border-2 border-blue-500 bg-blue-50 rounded-lg text-sm font-bold text-blue-700 transition";

    let kontens = document.querySelectorAll('.konten-pembayaran');
    kontens.forEach(konten => {
        konten.classList.add('hidden');
    });

    document.getElementById('konten-' + metode).classList.remove('hidden');
}
    </script>
</body>
</html>