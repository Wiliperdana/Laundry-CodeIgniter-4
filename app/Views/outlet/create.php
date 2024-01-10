<?=
    $this->extend('layout/template');
    $this->section('content');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Outlet</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('outlet/store') ?>" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nama">Nama Outlet</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama" class="form-control mb-3" value=<?php echo("Clean") ?>>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="alamat">Alamat Outlet</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="alamat" class="form-control mb-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="tlp">No. Telp</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="tlp" class="form-control mb-3">
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                <a href="<?= base_url('outlet') ?>" class="btn btn-md btn-info">KEMBALI</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>