<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PWNED</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F4F6FA] text-gray-800 font-sans min-h-screen flex flex-col">

    <nav class="bg-[#0B132B] px-6 py-4 flex justify-between items-center text-white shadow-md sticky top-0 z-40">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold tracking-wider text-blue-400">❖ PWNED <span class="text-xs text-gray-400 ml-1">ADMIN PANEL</span></span>
        </div>
        <div>
            <a href="<?= base_url('/') ?>" class="text-sm bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg transition font-medium">
                Lihat Website ↗
            </a>
        </div>
    </nav>

    <main class="max-w-6xl w-full mx-auto px-6 py-8 flex-grow">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-extrabold text-gray-900">Manajemen Pengguna</h1>
                <p class="text-sm text-gray-500 mt-1">Atur hak akses dan masa berlaku langganan pengguna.</p>
            </div>
        </div>

        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl shadow-sm mb-6 flex items-center gap-2">
                <span>✅</span> <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase font-bold tracking-wider">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Informasi Akun</th>
                            <th class="px-6 py-4">Paket Langganan</th>
                            <th class="px-6 py-4">Batas Waktu</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php if(!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">#<?= $user['id'] ?></td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-900"><?= esc($user['nama'] ?? 'User') ?></div>
                                        <div class="text-xs text-gray-500"><?= esc($user['email']) ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if ($user['subscription_plan'] == 'pro'): ?>
                                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest border border-emerald-200 shadow-sm">PRO</span>
                                        <?php elseif ($user['subscription_plan'] == 'plus'): ?>
                                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest border border-blue-200 shadow-sm">PLUS</span>
                                        <?php else: ?>
                                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-widest border border-gray-200 shadow-sm">FREE</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        <?= !empty($user['expire_date']) ? date('d M Y', strtotime($user['expire_date'])) : '<span class="text-gray-300">Selamanya</span>' ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button 
                                            onclick="openModal(<?= $user['id'] ?>, '<?= $user['subscription_plan'] ?>', '<?= $user['expire_date'] ?>', '<?= esc($user['email']) ?>')"
                                            class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm border border-blue-100 hover:border-blue-600">
                                            Edit Status
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500 font-medium">
                                    Belum ada data pengguna di dalam database.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="editModal" class="fixed inset-0 bg-black/60 z-50 hidden flex items-center justify-center backdrop-blur-sm transition-all duration-300 opacity-0">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform scale-95 transition-transform duration-300" id="modalContent">
            
            <div class="bg-[#0B132B] px-6 py-5 flex justify-between items-center">
                <div>
                    <h3 class="text-white font-bold text-lg">Update Langganan</h3>
                    <p id="modalUserEmail" class="text-blue-300 text-xs mt-0.5">user@email.com</p>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white transition text-xl">&times;</button>
            </div>
            
            <form id="formEdit" method="POST" action="" class="p-6 space-y-5">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Pilih Paket</label>
                    <div class="relative">
                        <select name="subscription_plan" id="inputPlan" class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none appearance-none font-medium text-gray-700">
                            <option value="free">FREE - Akses Terbatas</option>
                            <option value="plus">PLUS - Akses Standar</option>
                            <option value="pro">PRO - Akses Penuh</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            ▼
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Batas Waktu (Expire Date)</label>
                    <input type="date" name="expire_date" id="inputExpire" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none font-medium text-gray-700 text-sm">
                    <p class="text-[10px] text-gray-500 mt-2 flex items-center gap-1">
                        <span>ℹ️</span> Biarkan kosong jika pengguna memilih paket FREE.
                    </p>
                </div>

                <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
                    <button type="button" onclick="closeModal()" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition">Batal</button>
                    <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-xl shadow-md hover:shadow-lg transition">Simpan Perubahan</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        const modal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');
        const formEdit = document.getElementById('formEdit');
        const inputPlan = document.getElementById('inputPlan');
        const inputExpire = document.getElementById('inputExpire');
        const modalUserEmail = document.getElementById('modalUserEmail');

        function openModal(id, plan, expire, email) {
            // Mengarahkan tujuan form submit ke URL ID user yang spesifik
            formEdit.action = "<?= base_url('admin/update-subscription/') ?>" + id;
            
            // Mengisi form dengan data saat ini
            modalUserEmail.textContent = email;
            inputPlan.value = plan;
            
            // Jika ada tanggal kedaluwarsa, potong bagian jamnya agar pas di input type="date"
            inputExpire.value = expire && expire !== '0000-00-00 00:00:00' ? expire.split(' ')[0] : '';

            // Menampilkan modal dengan animasi fade in
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
        }

        function closeModal() {
            // Menyembunyikan modal dengan animasi fade out
            modal.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Sesuaikan dengan durasi transisi di Tailwind
        }
    </script>
</body>
</html>