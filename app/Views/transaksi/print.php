<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
</head>
<body>
    <?php
        $mapping = [
            'baru' => 'Baru',
            'proses' => 'Proses',
            'selesai' => 'Selesai',
            'diambil' => 'Diambil',
            'dibayar' => 'Lunas',
            'belum_dibayar' => 'Belum Bayar'
        ];
    ?>
    <h2><pre>                 Struk Transaksi</pre></h2>
    <h4><pre>                              Clean Laundry</pre></h4>
    <pre>          Outlet <?= $outlet['nama'] ?> | Alamat : <?= $outlet['alamat'] ?></pre>

    <br>
    <pre>-------------------------------------------------------------------------</pre>
    <br>

    <pre>Outlet                     : <?= $outlet['nama'] ?></pre>
    <pre>Member                     : <?= $detailTransaksi['nama'] ?></pre>
    <pre>Kode Invoice               : <?= $detailTransaksi['kode_invoice'] ?></pre>
    <pre>Tanggal                    : <?= $detailTransaksi['tgl'] ?></pre>
    <pre>Batas Waktu                : <?= $detailTransaksi['batas_waktu'] ?></pre>
    <pre>Tanggal Pembayaran         : <?= $detailTransaksi['tgl_bayar'] ?></pre>
    <pre>Paket                      : <?= $detailTransaksi['nama_paket'] ?></pre>
    <pre>Jumlah                     : <?= $detailTransaksi['qty'] ?></pre>
    <pre>Biaya Tambahan             : <?= $detailTransaksi['biaya_tambahan'] ?></pre>
    <pre>Diskon                     : <?= $detailTransaksi['diskon'] ?></pre>
    <pre>Total Harga                : <?= $detailTransaksi['total'] ?></pre>
    <pre>Status Barang              : <?= $mapping[$detailTransaksi['status']] ?></pre>
    <pre>Status Pembayaran          : <?= $mapping[$detailTransaksi['dibayar']] ?></pre>
    <pre>Keterangan                 : <?= $detailTransaksi['keterangan'] ?></pre>
    <br>

    <pre>-------------------------------------------------------------------------</pre>
    <pre>                              Terima Kasih</pre>


</body>
</html>