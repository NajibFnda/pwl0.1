<?php
/**
 * @var string $title
 * @var string $active
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?> - PWNED</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F4F6FA] text-gray-800 font-sans">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#0B132B] text-white flex flex-col fixed h-full z-40">
        <div class="px-6 py-5 border-b border-white/10">
            <span class="text-xl font-bold tracking-wider text-blue-400">❖ PWNED</span>
            <p class="text-[10px] text-gray-400 mt-0.5 tracking-widest uppercase">Admin Panel</p>
        </div>

        <nav class="flex-1 px-3 py-6 space-y-1">
            <a href="<?= base_url('admin') ?>"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-bold transition
                      <?= ($active ?? '') === 'users' ? 'bg-blue-500/20 text-blue-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
                <span>👥</span> Manajemen Pengguna
            </a>

            <!-- Data Penjualan: belum dibuat, sengaja dinonaktifkan dulu biar nggak 404 -->
        <a href="<?= base_url('admin/sales') ?>"
        class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-bold transition
                <?= ($active ?? '') === 'sales' ? 'bg-blue-500/20 text-blue-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' ?>">
            <span>💰</span> Data Penjualan
        </a>
        </nav>

        <div class="px-3 py-4 border-t border-white/10 space-y-1">
            <a href="<?= base_url('/') ?>"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-bold text-gray-400 hover:bg-white/5 hover:text-white transition">
                <span>↗</span> Lihat Website
            </a>
            <a href="<?= base_url('logout') ?>"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-bold text-rose-400 hover:bg-rose-500/10 transition">
                <span>🚪</span> Keluar
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 ml-64 p-8">
        <?= $this->renderSection('content') ?>
    </main>

</div>

</body>
</html>