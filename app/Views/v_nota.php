<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Pembayaran - PWNED</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Library untuk Ubah HTML ke PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-md w-full space-y-4">
        <!-- AREA STRUK (Bagian ini yang akan dijadikan PDF) -->
        <div id="area-struk" class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
            <div class="text-center mb-6 border-b border-gray-200 pb-6">
                <h1 class="text-2xl font-black text-rose-500 tracking-wider mb-1">❖ PWNED</h1>
                <p class="text-xs text-gray-500">Bukti Pembayaran Berlangganan</p>
            </div>
            
            <div class="space-y-4 text-sm text-gray-600 mb-6 border-b border-gray-200 pb-6">
                <div class="flex justify-between">
                    <span class="font-medium">No. Referensi:</span>
                    <span class="font-bold text-gray-900">#TRX-<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Tanggal:</span>
                    <span class="font-bold text-gray-900"><?= date('d M Y, H:i', strtotime($transaksi['tanggal'])) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium">Nama Pelanggan:</span>
                    <span class="font-bold text-gray-900"><?= esc($transaksi['nama']) ?></span>
                </div>
            </div>

            <div class="space-y-3 mb-6">
                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <span class="font-bold text-blue-600 uppercase">PAKET <?= esc($transaksi['paket']) ?></span>
                    <span class="font-black text-emerald-600 text-lg">Rp <?= number_format($transaksi['harga'], 0, ',', '.') ?></span>
                </div>
            </div>

            <div class="text-center text-xs text-gray-400 mt-8">
                <p>Terima kasih telah menggunakan layanan PWNED.</p>
                <p>Status: <span class="text-emerald-500 font-bold">LUNAS</span></p>
            </div>
        </div>

        <!-- TOMBOL AKSI (Tidak ikut tercetak di PDF) -->
        <div class="flex gap-3">
            <a href="<?= base_url('/') ?>" class="w-1/3 bg-gray-800 hover:bg-black text-white text-center font-bold py-3 rounded-xl transition text-sm">
                Ke Dashboard
            </a>
            <button onclick="downloadPDF()" class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white text-center font-bold py-3 rounded-xl transition text-sm shadow-md flex items-center justify-center gap-2">
                <span>Unduh Nota (PDF)</span>
                <span>📥</span>
            </button>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const elemen = document.getElementById('area-struk');
            const opsi = {
                margin:       1,
                filename:     'Nota_PWNED_TRX<?= $transaksi['id'] ?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opsi).from(elemen).save();
        }
    </script>
</body>
</html>