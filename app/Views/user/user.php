<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger" role="alert" id="msg">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>

        <script>
            setTimeout(function() {
            document.getElementById('msg').style.display = 'none'
            }, 3000);
        </script>
    <?php endif; ?>

    <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
    <p class="mb-2 text-gray-800">Daftar User Clean Laundry Pada Outlet <?= $outlet['nama'] ?></p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('user/' . $id_outlet . '/store') ?>" method="post">
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
                        <input type="text" name="nama" class="form-control mb-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="username" class="form-control mb-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control mb-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="role">Role</label>
                    </div>
                    <div class="col-md-9">
                        <select name="role" id="role" class="form-control mb-3">
                            <option value="admin" >Administrator</option>
                            <option value="kasir">Kasir</option>
                            <option value="owner">Owner</option>
                        </select>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-md-1">No</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-3">Username</th>
                            <th class="col-md-2">Role</th>
                            <th class="col-md-2">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($users as $user) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('user/' . $id_outlet . '/edit/' . $user['id']) ?>" class="btn btn-md btn-warning">
                                    <i class="fa fa-pen"></i> EDIT
                                </a>
                                <a href="<?= base_url('user/' . $id_outlet . '/delete/' . $user['id']) ?>" class="btn btn-md btn-danger" onclick="return confirm('Data Akan Dihapus. Lanjutkan ?')">
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