<?php
/**
 * @var float $total_pendapatan
 * @var array $pendapatan_bulanan
 * @var array $real_transactions
 */
?>
<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-extrabold text-gray-900">Data Penjualan</h1>
        <p class="text-sm text-gray-500 mt-1">Riwayat transaksi dan ringkasan pendapatan sistem.</p>
    </div>
</div>

<div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm border-l-4 border-l-emerald-500 mb-8 max-w-sm">
    <div class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">Total Pendapatan Keseluruhan</div>
    <div class="text-2xl font-black text-emerald-600 tracking-tight">
        Rp <?= number_format($total_pendapatan ?? 0, 0, ',', '.') ?>
    </div>
</div>


<!-- Riwayat transaksi -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-700 text-lg">Riwayat Transaksi</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase font-bold tracking-wider">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama User</th>
                    <th class="px-6 py-4">Paket</th>
                    <th class="px-6 py-4">Durasi</th>
                    <th class="px-6 py-4">Harga</th>
                    <th class="px-6 py-4">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (empty($real_transactions)): ?>
                    <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada transaksi.</td></tr>
                <?php else: ?>
                    <?php foreach ($real_transactions as $i => $trx): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500"><?= $i + 1 ?></td>
                            <td class="px-6 py-4 font-bold text-gray-900"><?= esc($trx['nama']) ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase
                                    <?= $trx['paket'] === 'pro' ? 'bg-gray-900 text-white' : 'bg-blue-100 text-blue-700' ?>">
                                    <?= esc($trx['paket']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 font-medium <?= $trx['harga'] >= 250000 ? 'text-blue-600' : 'text-gray-500' ?>">
                                <?= $trx['harga'] >= 250000 ? 'Tahunan' : 'Bulanan' ?>
                            </td>
                            <td class="px-6 py-4 font-bold text-emerald-600">Rp <?= number_format($trx['harga'], 0, ',', '.') ?></td>
                            <td class="px-6 py-4 text-gray-500"><?= date('d M Y, H:i', strtotime($trx['tanggal'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
<script>
    const dataBulan = <?= json_encode(array_map(fn($r) => date('M Y', strtotime($r->bulan . '-01')), $pendapatan_bulanan)) ?>;
    const dataTotal = <?= json_encode(array_map(fn($r) => (float) $r->total, $pendapatan_bulanan)) ?>;

    new Chart(document.getElementById('chartPendapatan'), {
        type: 'bar',
        data: {
            labels: dataBulan,
            datasets: [{ label: 'Pendapatan (Rp)', data: dataTotal, backgroundColor: '#004e89', borderRadius: 6 }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { ticks: { callback: (v) => 'Rp ' + v.toLocaleString('id-ID') } } }
        }
    });
</script>

<?= $this->endSection() ?>