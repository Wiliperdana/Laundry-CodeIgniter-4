<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('user/' . $id_outlet . '/update/' . $user['id']) ?>" method="post">
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
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama" class="form-control mb-3" value="<?= $user['nama'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control mb-3" value="<?= $user['username'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="role">Role</label>
                    </div>
                    <div class="col-md-9">
                        <select name="role" id="role" class="form-control mb-3">
                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
                            <option value="kasir" <?= $user['role'] == 'kasir' ? 'selected' : '' ?>>Kasir</option>
                            <option value="owner" <?= $user['role'] == 'owner' ? 'selected' : '' ?>>Owner</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-success">
                    <i class="fa fa-check"></i> SIMPAN
                </button>
                <a href="<?= base_url('user/' . $id_outlet) ?>" class="btn btn-md btn-info">
                    <i class="fa fa-reply"></i> KEMBALI
                </a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>