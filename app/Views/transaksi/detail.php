<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Transaksi</h1>

    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('transaksi/' . $id_outlet) ?>" class="btn btn-md btn-info">
                <i class="fa fa-reply"></i> KEMBALI
            </a>
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
                            <th class="col-md-2">Kode Invoice</th>
                            <th class="col-md-2">Tanggal</th>
                            <th class="col-md-2`">Status Barang</th>
                            <th class="col-md-2">Status Pembayaran</th>
                            <th class="col-md-3">Tindakan</th>
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
                            <td class="text-center">
                                <a href="<?= base_url('transaksi/' . $id_outlet . '/edit/' . $dt['id']) ?>" class="btn btn-md btn-warning">
                                    <i class=" fa fa-pen"></i> EDIT
                                </a>
                                <a href="<?= base_url('transaksi/' . $id_outlet . '/delete/' . $dt['id']) ?>" class="btn btn-md btn-danger" onclick="return confirm('Transaksi Akan Dihapus. Lanjutkan ?')">
                                    <i class="fa fa-trash"></i > HAPUS
                                </a>
                                <a href="<?= base_url('transaksi/' . $id_outlet . '/detail/' . $dt['id']) ?>" class="btn btn-md btn-dark">
                                    <i class="fa fa-info-circle"></i > DETAIL
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>