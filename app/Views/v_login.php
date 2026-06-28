<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PWNED</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F4F6FA] text-gray-800 font-sans min-h-screen flex flex-col justify-center items-center px-4">

    <div class="mb-8 text-center">
        <a href="<?= base_url('/') ?>" class="text-2xl font-bold tracking-wider text-[#0B132B]">
            <span class="text-blue-600">❖</span> PWNED
        </a>
        <p class="text-sm text-gray-500 mt-2">Masuk</p>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 w-full max-w-md">
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl shadow-sm mb-6 text-sm text-center font-medium animate-pulse">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <form action="<?= base_url('auth/process') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Alamat Email</label>
                <input type="email" id="email" name="email" required placeholder="contoh@gmail.com"
                    class="w-full px-4 py-3 bg-gray-50 text-gray-900 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Kata Sandi</label>
                <input type="password" id="password" name="password" required placeholder="••••••••"
                    class="w-full px-4 py-3 bg-gray-50 text-gray-900 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3.5 rounded-xl shadow-md transition flex justify-center items-center gap-2">
                MASUK
            </button>
        </form>
        <div class="mt-6 text-center text-xs text-gray-500 border-t border-gray-100 pt-4 space-y-2">
            <div>
                Belum punya akun? <a href="<?= base_url('register') ?>" class="text-blue-600 font-bold hover:underline transition">Daftar sekarang</a>
            </div>
            <div>
                <a href="<?= base_url('/') ?>" class="hover:text-blue-600 transition text-gray-400">← Kembali ke Halaman Utama</a>
            </div>
        </div>

    </div>

</body>
</html>