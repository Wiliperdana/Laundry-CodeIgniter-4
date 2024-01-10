<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Outlet</h1>
    <p class="mb-2 text-gray-800">Daftar Outlet Clean Laundry Seluruh Indonesia</p>

    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('outlet/create') ?>" class="btn btn-md btn-primary">
                <i class="fa fa-plus"></i> Tambah Outlet
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">No. Telp</th>
                            <th class="col-md-2">Tindakan</th>
                            <th class="col-md-2">Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($outlets as $outlet) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $outlet['nama'] ?></td>
                            <td><?= $outlet['alamat'] ?></td>
                            <td class="text-center"><?= $outlet['tlp'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('outlet/edit/' . $outlet['id']) ?>" class="btn btn-md btn-warning mb-3">
                                    <i class="fa fa-pen"></i> EDIT
                                </a>
                                <a href="<?= base_url('outlet/delete/' . $outlet['id']) ?>" class="btn btn-md btn-danger mb-3" onclick="return confirm('Data Akan Dihapus. Lanjutkan ?')">
                                    <i class="fa fa-trash"></i> HAPUS
                                </a>
                                <a href="<?= base_url('paket/' . $outlet['id']) ?>" class="btn btn-md btn-success">
                                    <i class="fa fa-soap"></i> PAKET
                                </a>
                                <a href="<?= base_url('user/' . $outlet['id']) ?>" class="btn btn-md btn-info">
                                    <i class="fa fa-user-check"></i> USER
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="<?= base_url('transaksi/' . $outlet['id']) ?>" class="btn btn-md btn-primary">
                                    <i class="fa fa-money-bill-wave"></i> TRANSAKSI
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