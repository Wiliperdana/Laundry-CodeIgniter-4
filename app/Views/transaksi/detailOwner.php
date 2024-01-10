<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Transaksi</h1>

    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('transaksi/' . $id_outlet . '/printAll') ?>" class="btn btn-md btn-danger">
                <i class="fa fa-print"></i> PRINT
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-md-1">No</th>
                            <th class="col-md-5">Kode Invoice</th>
                            <th class="col-md-2">Tanggal</th>
                            <th class="col-md-2`">Status Barang</th>
                            <th class="col-md-2">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            <td><?= $mapping[$dt['status']] ?></td>
                            <td><?= $mapping[$dt['dibayar']] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>