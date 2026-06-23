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
                            <div id="note-plus" class="text-[10px] text-gray-400 mt-0.5 hidden">*Ditagih Rp 250.000 /tahun</div>
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
                        <button class="w-full bg-[#004e89] hover:bg-[#00355d] text-white py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                            Dapatkan Paket Plus
                        </button>
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
                        <button class="w-full bg-gray-900 hover:bg-black text-white py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                            Dapatkan Paket Pro
                        </button>
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

        btnBulanan.addEventListener('click', () => {
            btnBulanan.className = "px-5 py-1.5 rounded-full text-xs font-bold bg-[#004e89] text-white shadow transition-all";
            btnTahunan.className = "px-5 py-1.5 rounded-full text-xs font-bold text-gray-500 hover:text-gray-800 transition-all";
            pricePlus.textContent = "Rp 25.000";
            pricePro.textContent = "Rp 50.000";
            notePlus.classList.add('hidden');
            notePro.classList.add('hidden');
        });

        btnTahunan.addEventListener('click', () => {
            btnTahunan.className = "px-5 py-1.5 rounded-full text-xs font-bold bg-[#004e89] text-white shadow transition-all";
            btnBulanan.className = "px-5 py-1.5 rounded-full text-xs font-bold text-gray-500 hover:text-gray-800 transition-all";
            pricePlus.textContent = "Rp 21.000";
            pricePro.textContent = "Rp 42.000";
            notePlus.classList.remove('hidden');
            notePro.classList.remove('hidden');
        });
    </script>
</body>
</html>