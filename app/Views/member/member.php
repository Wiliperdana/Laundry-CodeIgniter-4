<?=
    $this->extend('layout/template');
    $this->section('content')
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Member</h1>

    <!-- Tabel -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('member/create') ?>" class="btn btn-md btn-primary">
                <i class="fa fa-plus"></i> Registrasi Member
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-3">Alamat</th>
                            <th class="col-md-1`">L/P</th>
                            <th class="col-md-2">No. Telp</th>
                            <th class="col-md-2">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mapping = [
                                'L' => 'Laki - Laki',
                                'P' => 'Perempuan'
                            ];

                            $no = 1;
                            foreach($members as $member) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $member['nama'] ?></td>
                            <td><?= $member['alamat'] ?></td>
                            <td><?= $mapping[$member['jenis_kelamin']] ?></td>
                            <td><?= $member['tlp'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('member/edit/' . $member['id']) ?>" class="btn btn-md btn-warning">
                                    <i class="fa fa-pen"></i> EDIT
                                </a>
                                <a href="<?= base_url('member/delete/' . $member['id']) ?>" class="btn btn-md btn-danger"
                                    onclick="return confirm('Data Akan Dihapus. Lanjutkan ?')">
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