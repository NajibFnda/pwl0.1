<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWNED - Cek Kebocoran Data Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-[#F4F6FA] text-gray-800 font-sans min-h-screen flex flex-col justify-between">

    <nav class="bg-[#0B132B] px-6 py-4 grid grid-cols-3 items-center text-white sticky top-0 z-50 shadow-md">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold tracking-wider text-blue-400">❖ PWNED</span>
        </div>
        
        <div id="nav-container" class="hidden md:flex justify-center space-x-6 text-sm text-gray-300">
            <a href="#" id="nav-home" class="nav-link text-blue-400 font-semibold border-b-2 border-blue-400 pb-1 transition-all duration-200">HOME</a>
            <a href="#cek-section" id="nav-cek" class="nav-link hover:text-white pb-1 transition-all duration-200">CEK EMAIL</a>
            <a href="#statistik-section" id="nav-statistik" class="nav-link hover:text-white pb-1 transition-all duration-200">STATISTIK</a>
            <a href="#tentang-section" id="nav-tentang" class="nav-link hover:text-white pb-1 transition-all duration-200">TENTANG</a>
        </div>
        
        <div class="flex justify-end items-center gap-4">
            <?php if(session()->has('logged_in') && session()->get('logged_in') === true): ?>
                <div class="flex items-center gap-3 border-r border-gray-600 pr-4">
                    <span class="text-xs text-gray-300">
                        Halo, 
                        <span class="text-white font-bold tracking-wide">
                            <?= esc(session()->get('nama') ?? 'User') ?>
                        </span>
                    </span>
                    <a href="<?= base_url('logout') ?>" class="text-xs text-rose-400 hover:text-rose-500 font-bold transition" title="Keluar Sistem">
                        Keluar
                    </a>
                </div>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="text-xs font-semibold text-gray-300 hover:text-white transition">
                    Masuk
                </a>
            <?php endif; ?>

            <a href="<?= base_url('upgrade') ?>" class="flex items-center gap-1.5 bg-[#004e89] hover:bg-[#00355d] text-white px-4 py-1.5 rounded-full text-xs font-semibold transition shadow-md">
                <span></span> Upgrade
            </a>
        </div>
    </nav>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="max-w-xl mx-auto mt-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl shadow-sm flex items-center justify-between animate-pulse">
            <div class="flex items-center gap-3">
                <span class="text-2xl">🎉</span>
                <p class="font-bold text-sm"><?= session()->getFlashdata('success') ?></p>
            </div>
            <button onclick="this.parentElement.style.display='none'" class="text-emerald-500 hover:text-emerald-700 font-bold">&times;</button>
        </div>
    <?php endif; ?>

    <main class="flex-grow max-w-5xl w-full mx-auto px-6 py-12 space-y-16">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center bg-white p-8 rounded-2xl shadow-sm">
            <div class="space-y-6">
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">
                    Is Your Email <br><span class="text-rose-500 font-black">PWNED?</span>
                </h1>
                <p class="text-gray-600 text-base">
                    Cek apakah email Anda pernah terlibat dalam kebocoran data.
                </p>
                <a href="#cek-section" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-xl shadow-md transition">
                    CEK EMAIL SEKARANG
                </a>
            </div>
            <div class="flex justify-center bg-blue-50/50 p-6 rounded-2xl">
                <div class="text-center space-y-2">
                    <span class="text-7xl">🥷</span>
                    <div class="bg-rose-500 text-white text-xs px-3 py-1 rounded-full font-bold uppercase tracking-widest animate-pulse">Data Breach</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <span class="text-rose-500">■</span> Apa itu Kebocoran Data?
                </h2>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Kebocoran data terjadi ketika informasi pribadi seperti email, password, dan data penting lainnya dicuri dan disebarkan di internet tanpa izin.
                </p>
            </div>
            <div class="flex justify-center bg-white p-6 rounded-xl border border-gray-100 shadow-sm max-w-sm mx-auto">
                <div class="text-center">
                    <span class="text-5xl">💻</span>
                    <span class="text-3xl block mt-2">🔒</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center space-y-3">
                <div class="text-blue-600 text-3xl">🛡️</div>
                <h3 class="font-bold text-gray-900">Lindungi Akun Anda</h3>
                <p class="text-gray-500 text-xs leading-relaxed">Mengetahui kebocoran lebih awal dapat membantu Anda mengamankan akun penting.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center space-y-3">
                <div class="text-blue-600 text-3xl">🔍</div>
                <h3 class="font-bold text-gray-900">Cek dengan Mudah</h3>
                <p class="text-gray-500 text-xs leading-relaxed">Masukkan email Anda dan kami akan memeriksa ribuan data kebocoran.</p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center space-y-3">
                <div class="text-blue-600 text-3xl">📈</div>
                <h3 class="font-bold text-gray-900">Data Terpercaya</h3>
                <p class="text-gray-500 text-xs leading-relaxed">Kami menggunakan sumber data kebocoran yang diperbarui secara berkala.</p>
            </div>
        </div>

        <div class="bg-[#0B132B] text-white rounded-xl p-8 grid grid-cols-3 text-center gap-4">
            <div>
                <div class="text-2xl md:text-3xl font-bold text-blue-400">352K+</div>
                <div class="text-xs text-gray-400 mt-1">Akun Bocor Tahun Ini</div>
            </div>
            <div>
                <div class="text-2xl md:text-3xl font-bold text-blue-400">48</div>
                <div class="text-xs text-gray-400 mt-1">Sumber Kebocoran</div>
            </div>
            <div>
                <div class="text-2xl md:text-3xl font-bold text-blue-400">100%</div>
                <div class="text-xs text-gray-400 mt-1">Gratis Digunakan</div>
            </div>
        </div>

        <hr id="cek-section" class="border-dashed border-gray-300 my-12 scroll-mt-24">

        <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm space-y-6">
            <div class="text-center space-y-2">
                <h2 class="text-2xl font-bold text-gray-900">Cek Email Anda</h2>
                <p class="text-xs text-gray-500">Masukkan email yang ingin Anda periksa.</p>
            </div>

            <form action="<?= base_url('cek-email') ?>#cek-section" method="POST" class="max-w-xl mx-auto flex flex-col sm:flex-row gap-2">
                <?= csrf_field() ?>
                <input type="email" name="email" placeholder="contoh@email.com" required
                       value="<?= esc($email ?? old('email', '')) ?>"
                       class="w-full px-4 py-3 bg-gray-50 text-gray-900 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg flex items-center justify-center gap-2 whitespace-nowrap">
                    CEK SEKARANG 
                </button>
            </form>

            <div class="flex flex-col items-center text-center px-4 space-y-2">
                <?php 
                    $kuota_terpakai = $usage_count ?? 0;
                    $batas_kuota = $usage_limit ?? 5; 
                    
                    // Ambil nama paket, default 'free'
                    $paket = session()->get('subscription_plan') ?? 'free';
                ?>

                <?php if ($paket === 'pro'): ?>
                    <p class="text-xs text-gray-400 tracking-wide">
                        Sisa pengecekan hari ini: <span class="font-bold text-emerald-600">Unlimited ✦</span>
                    </p>
                <?php else: ?>
                    <p class="text-xs text-gray-400 tracking-wide">
                        Batas pengecekan hari ini: <span class="font-bold text-blue-600"><?= esc($kuota_terpakai) ?>/<?= esc($batas_kuota) ?></span> kali.
                    </p>

                    <?php if ($kuota_terpakai >= $batas_kuota): ?>
                        <div class="flex flex-col items-center">
                            <p class="text-sm font-bold text-red-500 animate-pulse flex items-center justify-center gap-1.5">
                                ⚠️ Batas penggunaan pengecekan email Anda sudah habis!
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Silakan kembali <span class="font-bold text-gray-700">besok</span>, atau 
                                <a href="<?= base_url('upgrade') ?>" class="text-blue-600 font-bold hover:underline">Upgrade ke Paket Lebih Tinggi</a>
                            </p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if (isset($status) && $status !== null): ?>
                <div class="border-t border-dashed border-gray-200 pt-6 space-y-6">
                    <h3 class="text-center text-xs font-semibold uppercase tracking-wider text-gray-400">Hasil Pemeriksaan</h3>
                    
                    <?php if ($status === 'safe'): ?>
                        <div class="max-w-2xl mx-auto space-y-4">
                            <div class="border-2 border-emerald-500 bg-emerald-50 rounded-xl p-5 flex items-center gap-4">
                                <div class="bg-emerald-500 text-white p-2 rounded-full text-xl">✓</div>
                                <div>
                                    <h4 class="text-emerald-700 font-bold text-lg">SAFE</h4>
                                    <p class="text-gray-600 text-sm">Tidak ada kebocoran data ditemukan untuk email ini.</p>
                                </div>
                            </div>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-xs text-gray-500 flex items-center gap-2">
                                💡 <span>Tetap jaga keamanan akun Anda dengan menggunakan password yang kuat dan autentikasi dua faktor.</span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($status === 'pwned'): ?>
                        <div class="max-w-2xl mx-auto space-y-6">
                            <div class="border-2 border-rose-500 bg-rose-50 rounded-xl p-5 flex items-center gap-4">
                                <div class="bg-rose-500 text-white p-2 rounded-full text-xl">⚠️</div>
                                <div>
                                    <h4 class="text-rose-600 font-bold text-lg">PWNED!</h4>
                                    <p class="text-gray-600 text-sm">Email ini ditemukan dalam kebocoran data.</p>
                                </div>
                            </div>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-xs text-gray-500 flex items-center gap-2">
                                🔒 <span>Disarankan untuk segera mengubah password Anda pada akun yang terkait.</span>
                            </div>

                            <div class="space-y-2">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400">Detail Kebocoran</h4>
                                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white shadow-sm">
                                    <table class="w-full text-left text-xs text-gray-600">
                                        <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 uppercase font-semibold">
                                            <tr>
                                                <th class="px-4 py-3">Sumber Kebocoran</th>
                                                <th class="px-4 py-3">Tanggal</th>
                                                <th class="px-4 py-3">Jenis Data</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            <?php if (isset($details) && !empty($details)): ?>
                                                <?php foreach ($details as $detail): ?>
                                                    <tr>
                                                        <td class="px-4 py-3 font-medium text-gray-900">🌐 <?= esc($detail['sumber'] ?? '-') ?></td>
                                                        <td class="px-4 py-3 text-gray-500"><?= esc($detail['tanggal'] ?? '-') ?></td>
                                                        <td class="px-4 py-3 text-rose-600 font-medium"><?= esc($detail['jenis'] ?? '-') ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" class="px-4 py-4 text-center text-gray-400">Detail kebocoran tidak tersedia.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="text-center pt-4">
                        <a href="<?= base_url('/') ?>" class="text-blue-600 hover:underline text-sm font-medium">🔄 Cek Email Lainnya</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div id="statistik-section" class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm space-y-8 scroll-mt-24">
            <div class="text-center space-y-1">
                <h2 class="text-2xl font-bold text-gray-900">Statistik Kebocoran Data</h2>
                <p class="text-xs text-gray-500">Lihat bagaimana tren kebocoran data berkembang secara global.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-200 rounded-xl p-4 flex justify-between items-center bg-gray-50">
                    <div>
                        <span class="text-xs uppercase text-gray-400 block font-semibold">Sumber Aktif</span>
                        <span class="text-2xl font-bold text-gray-900"><?= esc($statistik['sumber_aktif'] ?? '48') ?></span>
                        <span class="text-emerald-600 font-medium text-xs block mt-1">+5 bulan ini ↗</span>
                    </div>
                    <span class="text-2xl">💻</span>
                </div>
                <div class="border border-gray-200 rounded-xl p-4 flex justify-between items-center bg-gray-50">
                    <div>
                        <span class="text-xs uppercase text-gray-400 block font-semibold">Tingkat Kebocoran</span>
                        <span class="text-2xl font-bold text-rose-600"><?= esc($statistik['tingkat_kebocoran'] ?? 'Kritis') ?></span>
                        <span class="text-rose-600 font-medium text-xs block mt-1">Tinggi 🔴</span>
                    </div>
                    <span class="text-2xl">📊</span>
                </div>
                <div class="border border-gray-200 rounded-xl p-4 flex justify-between items-center bg-gray-50">
                    <div>
                        <span class="text-xs uppercase text-gray-400 block font-semibold">Total Akun Bocor</span>
                        <span class="text-2xl font-bold text-gray-900"><?= esc($statistik['total_akun'] ?? '352K+') ?></span>
                        <span class="text-emerald-600 font-medium text-xs block mt-1">+10.2% dari bulan lalu</span>
                    </div>
                    <span class="text-2xl">👥</span>
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400">Tren Kebocoran Data Global (10 Tahun Terakhir)</h4>
                <div class="border border-gray-200 rounded-xl p-4 max-w-2xl mx-auto bg-gray-50">
                    <canvas id="trenChart" height="120"></canvas>
                </div>
            </div>

            <?php if (isset($statistik['top_sumber']) && is_array($statistik['top_sumber'])): ?>
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-gray-400">Sumber Kebocoran Terbesar</h4>
                    <div class="space-y-3 max-w-2xl mx-auto">
                        <?php foreach ($statistik['top_sumber'] as $index => $sumber): ?>
                            <div class="space-y-1">
                                <div class="flex justify-between text-xs font-medium">
                                    <span class="text-gray-800"><?= $index+1 ?>. <?= esc($sumber['nama'] ?? '') ?></span>
                                    <span class="text-gray-900 font-bold"><?= esc($sumber['jumlah'] ?? '') ?></span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-rose-500 h-2 rounded-full" style="width: <?= esc($sumber['persen'] ?? '0%') ?>;"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </main>

    <section id="tentang-section" class="bg-[#040814] text-white py-16 px-6 border-t border-gray-900 scroll-mt-20">
        <div class="max-w-5xl w-full mx-auto space-y-12">
            
            <div class="text-center space-y-2">
                <h2 class="text-3xl font-bold uppercase tracking-wider text-gray-100">TENTANG PERIKSA DATA</h2>
                <div class="w-24 h-1 bg-blue-500 mx-auto rounded"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                <div class="bg-[#0B132B]/60 p-6 rounded-xl border border-gray-800/80 shadow-inner space-y-3">
                    <h3 class="text-lg font-bold text-blue-400">Situs ini tentang apa?</h3>
                    <p class="text-gray-400 text-xs leading-relaxed text-justify">
                        Periksa Data hadir untuk memberikan solusi kepada publik agar dapat secara berkala memeriksa apakah data kredensialnya turut menjadi korban kebocoran data atau tidak. Sebagian besar data yang terekspos berasal dari insiden pelanggaran keamanan massal, di mana informasi sensitif bocor kepada pihak-pihak yang tidak bertanggung jawab.
                    </p>
                </div>
                <div class="bg-[#0B132B]/60 p-6 rounded-xl border border-gray-800/80 shadow-inner space-y-3">
                    <h3 class="text-lg font-bold text-blue-400">Mengapa membangun situs web ini?</h3>
                    <p class="text-gray-400 text-xs leading-relaxed text-justify">
                        Situs ini dibangun dengan dua tujuan utama. Pertama, mengedukasi masyarakat mengenai skala bahaya serangan cyber yang sering kali tidak disadari. Kedua, proyek pengembangan perangkat lunak berbasis CodeIgniter 4 ini menjadi sarana studi kasus praktis yang sangat baik guna menguji, memantapkan, serta menjaga keterampilan manajemen basis data dan keamanan web tetap terasah.
                    </p>
                </div>
            </div>

            <div class="space-y-6 pt-6">
                <h3 class="text-center text-sm font-semibold uppercase tracking-widest text-gray-500">MEMBER KELOMPOK PENGEMBANG</h3>
                <div class="space-y-6 max-w-4xl mx-auto">
                    
                    <div class="bg-[#0B132B] border border-gray-800 rounded-xl p-5 flex flex-col md:flex-row items-center gap-6 shadow-lg">
                        <div class="w-32 h-32 bg-gray-700 rounded-xl flex-shrink-0 flex items-center justify-center text-4xl overflow-hidden border border-gray-700">
                            <div class="w-32 h-32 rounded-xl flex-shrink-0 overflow-hidden border border-gray-700 bg-gray-800 shadow-inner">
                                <img src="<?= base_url('image/Yona.JPG') ?>" alt="Foto Yoga" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="space-y-3 text-center md:text-left flex-grow">
                            <div>
                                <h4 class="text-lg font-bold text-white tracking-wide">Yonazahran Yoga Meinendra Rizky </h4>
                                <p class="text-xs text-blue-400 font-medium">Lead Developer , backend developer , & System Analyst Data</p>
                            </div>
                            <p class="text-gray-400 text-xs leading-relaxed">
                                Bertanggung jawab penuh atas arsitektur sistem inti dan model MVC, serta desain database yang aman dan efisien untuk mengoptimalkan keandalan platform.
                            </p>
                            <div class="flex justify-center md:justify-start gap-2 text-[10px] text-gray-300 font-semibold">
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">🌐 Website</span>
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">💼 LinkedIn</span>
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">❌ Twitter</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#0B132B] border border-gray-800 rounded-xl p-5 flex flex-col md:flex-row-reverse items-center gap-6 shadow-lg">
                        <div class="w-32 h-32 bg-gray-700 rounded-xl flex-shrink-0 flex items-center justify-center text-4xl overflow-hidden border border-gray-700">
                            <div class="w-32 h-32 rounded-xl flex-shrink-0 overflow-hidden border border-gray-700 bg-gray-800 shadow-inner">
                                <img src="<?= base_url('image/Baraza.jpeg') ?>" alt="Foto Baraza" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="space-y-3 text-center md:text-right flex-grow">
                            <div>
                                <h4 class="text-lg font-bold text-white tracking-wide">Baraza Nandian Syah</h4>
                                <p class="text-xs text-blue-400 font-medium">UI/UX Designer & Frontend Slicer</p>
                            </div>
                            <p class="text-gray-400 text-xs leading-relaxed">
                                Berperan mendesain antarmuka visual (UI/UX) bersama Nanda, serta berfokus pada pembuatan komponen frontend responsif menggunakan Tailwind CSS.
                            </p>
                            <div class="flex justify-center md:justify-end gap-2 text-[10px] text-gray-300 font-semibold">
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">💼 LinkedIn</span>
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">❌ Twitter</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#0B132B] border border-gray-800 rounded-xl p-5 flex flex-col md:flex-row items-center gap-6 shadow-lg">
                        <div class="w-32 h-32 bg-gray-700 rounded-xl flex-shrink-0 flex items-center justify-center text-4xl overflow-hidden border border-gray-700">
                            <div class="w-32 h-32 rounded-xl flex-shrink-0 overflow-hidden border border-gray-700 bg-gray-800 shadow-inner">
                                <img src="<?= base_url('image/Nanduy.jpeg') ?>" alt="Foto Najib" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="space-y-3 text-center md:text-left flex-grow">
                            <div>
                                <h4 class="text-lg font-bold text-white tracking-wide">Muhammad Najib Finanda</h4>
                                <p class="text-xs text-blue-400 font-medium">UI/UX Designer & full stack developer</p>
                            </div>
                            <p class="text-gray-400 text-xs leading-relaxed">
                                Berperan merancang antarmuka visual (UI/UX) halaman web, serta mengurus manajemen pengamanan form (CSRF Protection) dan validasi input email agar performa pencarian tetap stabil dan aman.
                            </p>
                            <div class="flex justify-center md:justify-start gap-2 text-[10px] text-gray-300 font-semibold">
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">🌐 Website</span>
                                <span class="bg-[#1C2541] px-2 py-1 rounded border border-gray-700 hover:bg-gray-800 cursor-pointer">💼 LinkedIn</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <div class="bg-[#0B132B] text-white py-10 border-t border-gray-800 text-center px-4 space-y-4">
        <span class="text-3xl block">🛡️</span>
        <h3 class="text-xl font-bold">Jaga Keamanan Data Anda</h3>
        <p class="text-xs text-gray-400 max-w-md mx-auto">Periksa email Anda secara berkala dan pastikan akun Anda selalu aman.</p>
    </div>

    <footer class="bg-[#070D1F] text-center py-4 text-xs text-gray-500 border-t border-gray-900">
        PWNED © 2026 | Cek Kebocoran Data dengan Aman
    </footer>

    <script>
        const ctx = document.getElementById('trenChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026'],
                datasets: [{
                    label: 'Jumlah Akun Bocor',
                    data: [25000, 48000, 38000, 52000, 40000, 58000, 72000, 62000, 68000, 79000],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>

    <script>
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = {
            'nav-cek': document.getElementById('cek-section'),
            'nav-statistik': document.getElementById('statistik-section'),
            'nav-tentang': document.getElementById('tentang-section')
        };

        function setActiveLink(activeId) {
            navLinks.forEach(link => {
                if (link.id === activeId) {
                    link.classList.add('text-blue-400', 'font-semibold', 'border-b-2', 'border-blue-400');
                    link.classList.remove('text-gray-300', 'hover:text-white');
                } else {
                    link.classList.remove('text-blue-400', 'font-semibold', 'border-b-2', 'border-blue-400');
                    link.classList.add('text-gray-300', 'hover:text-white');
                }
            });
        }

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.id !== 'nav-home') {
                    setActiveLink(this.id);
                }
            });
        });

        window.addEventListener('scroll', () => {
            let currentActive = 'nav-home';
            const scrollPosition = window.scrollY + 120;

            for (const [navId, section] of Object.entries(sections)) {
                if (section && scrollPosition >= section.offsetTop) {
                    currentActive = navId;
                }
            }

            if ((window.innerHeight + window.scrollY) >= document.documentElement.scrollHeight - 50) {
                currentActive = 'nav-tentang';
            }

            setActiveLink(currentActive);
        });
    </script>

</body>
</html>