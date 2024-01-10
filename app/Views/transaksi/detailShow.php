<?=
    $this->extend('layout/template');
    $this->section('content');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('transaksi/' . $id_outlet . '/print/' . $id_transaksi) ?>" method="post">

                    <?php
                        $mapping = [
                            'baru' => 'Baru',
                            'proses' => 'Proses',
                            'selesai' => 'Selesai',
                            'diambil' => 'Diambil',
                            'dibayar' => 'Lunas',
                            'belum_dibayar' => 'Belum Bayar'
                        ];
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="id_outlet">Outlet</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $outlet['nama'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="id_member">Member</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['nama'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="tgl">Tanggal</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['tgl'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="batas_waktu">Batas Waktu</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['batas_waktu'] ?>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="tgl_bayar">Tanggal Bayar</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['tgl_bayar'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="id_paket">Paket</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['nama_paket'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="qty">Jumlah</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['qty'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="biaya_tambahan">Biaya Tambahan</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['biaya_tambahan'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="diskon">Diskon</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['diskon'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="diskon">Total Harga</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['total'] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="status">Status Barang</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $mapping[$detailTransaksi['status']] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="dibayar">Status Pembayaran</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $mapping[$detailTransaksi['dibayar']] ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="keterangan">Keterangan</label>
                        </div>
                        <div class="col-md-9">
                            : <?= $detailTransaksi['keterangan'] ?>
                        </div>
                    </div>

                <button type="submit" class="btn btn-md btn-danger">
                    <i class="fa fa-print"></i> PRINT
                </button>
                <a href="<?= base_url('transaksi/' . $id_outlet . '/detail') ?>" class="btn btn-md btn-info">
                    <i class="fa fa-reply"></i> KEMBALI
                </a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>