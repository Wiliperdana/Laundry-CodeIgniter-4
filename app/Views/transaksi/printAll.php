<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Total</title>
</head>
<body>
    <h2><pre>                           Laporan Transaksi</pre></h2>
    <h4><pre>                                               Clean Laundry</pre></h4>
    <pre>                            Outlet <?= $outlet['nama'] ?> || Alamat : <?= $outlet['alamat'] ?></pre>

    <pre>-----------------------------------------------------------------------------------------------------------</pre>
    <table width="100%" cellspacing="0" border="1">
        <tr>
            <th>No</th>
            <th>Kode Invoice</th>
            <th>Tanggal</th>
            <th>Paket</th>
            <th>Jumlah</th>
            <th>Member</th>
            <th">Status Barang</th>
            <th>Status Pembayaran</th>
        </tr>

        <?php
            $mapping = [
                'baru' => 'Baru',
                'proses' => 'Proses',
                'selesai' => 'Selesai',
                'diambil' => 'Diambil',
                'dibayar' => 'Lunas',
                'belum_dibayar' => 'Belum Bayar'
            ];

            $no = 1;
            foreach ($detailTransaksi as $dt) :
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $dt['kode_invoice'] ?></td>
            <td><?= $dt['tgl'] ?></td>
            <td><?= $dt['nama_paket'] ?></td>
            <td><?= $dt['qty'] ?></td>
            <td><?= $dt['nama'] ?></td>
            <td><?= $mapping[$dt['status']] ?></td>
            <td><?= $mapping[$dt['dibayar']] ?></td>
        </tr>
        <?php endforeach ?>
    </table>

</body>
</html>