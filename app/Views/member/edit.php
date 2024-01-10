<?=
    $this->extend('layout/template');
    $this->section('content');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Member</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('member/update/' . $member['id']) ?>" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama" class="form-control mb-3" value="<?= $member['nama'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="alamat" class="form-control mb-3" value="<?= $member['alamat'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="col-md-9">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3">
                            <option value="L" <?= $member['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki - Laki</option>
                            <option value="P" <?= $member['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="tlp">No. Telp</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="tlp" class="form-control mb-3" value="<?= $member['tlp'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                <a href="<?= base_url('member') ?>" class="btn btn-md btn-info">KEMBALI</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>