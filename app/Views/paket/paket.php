<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 text-gray-800">Daftar Paket</h1>
    <p class="mb-2 text-gray-800">Daftar Paket Clean Laundry Pada Outlet <?= $outlet['nama'] ?></p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Paket</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('paket/' . $id_outlet . '/store') ?>" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="id_outlet">Outlet</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="id_outlet" class="form-control mb-3" value="<?= $outlet['nama'] ?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="jenis">Jenis</label>
                    </div>
                    <div class="col-md-9">
                        <select name="jenis" id="jenis" class="form-control mb-3">
                            <option value="kiloan" >Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bed_cover">Bed Cover</option>
                            <option value="kaos">Kaos</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="nama_paket">Nama Paket</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama_paket" class="form-control mb-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="harga">Harga</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="harga" class="form-control mb-3">
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-success">
                    <i class="fa fa-check"></i> SIMPAN
                </button>
                <a href="<?= base_url('outlet') ?>" class="btn btn-md btn-info">
                    <i class="fa fa-reply"></i> KEMBALI
                </a>
            </form>
        </div>
    </div>

    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Paket</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Jenis</th>
                            <th class="col-md-4">Nama Paket</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-2">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mapping = [
                                'kiloan' => 'Kiloan',
                                'selimut' => 'Selimut',
                                'bed_cover' => 'Bed Cover',
                                'kaos' => 'Kaos',
                                'lainnya' => 'Lainnya',
                            ];

                            $no = 1;
                            foreach($pakets as $paket) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $mapping[$paket['jenis']] ?></td>
                            <td><?= $paket['nama_paket'] ?></td>
                            <td>Rp <?= number_format($paket['harga'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('paket/' . $id_outlet . '/edit/' . $paket['id']) ?>" class="btn btn-md btn-warning">
                                    <i class="fa fa-pen"></i> EDIT
                                </a>
                                <a href="<?= base_url('paket/' . $id_outlet . '/delete/' . $paket['id']) ?>" class="btn btn-md btn-danger" onclick="return confirm('Data Akan Dihapus. Lanjutkan ?')">
                                    <i class="fa fa-trash"></i> HAPUS
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