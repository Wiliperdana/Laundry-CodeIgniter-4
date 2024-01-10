<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Paket</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Outlet</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('paket/' . $id_outlet . '/update/' . $paket['id']) ?>" method="post">
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
                            <option value="kiloan" <?= $paket['jenis'] == 'kiloan' ? 'selected' : '' ?>>Kiloan</option>
                            <option value="selimut" <?= $paket['jenis'] == 'selimut' ? 'selected' : '' ?>>Selimut</option>
                            <option value="bed_cover" <?= $paket['jenis'] == 'bed_cover' ? 'selected' : '' ?>>Bed Cover</option>
                            <option value="kaos" <?= $paket['jenis'] == 'kaos' ? 'selected' : '' ?>>Kaos</option>
                            <option value="lainnya" <?= $paket['jenis'] == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="nama_paket">Nama Paket</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama_paket" class="form-control mb-3" value="<?= $paket['nama_paket'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="harga">Harga</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="harga" class="form-control mb-3" value="<?= $paket['harga'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-success">
                    <i class="fa fa-check"></i> SIMPAN
                </button>
                <a href="<?= base_url('paket/' . $id_outlet) ?>" class="btn btn-md btn-info">
                    <i class="fa fa-reply"></i> KEMBALI
                </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>