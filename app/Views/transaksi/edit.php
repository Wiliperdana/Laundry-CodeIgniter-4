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
            <form action="<?= base_url('transaksi/' . $id_outlet . '/update/' . $id_transaksi) ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
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
                                <label for="id_member">Member</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_member" id="id_member" class="form-control mb-3" disabled>
                                    <option value="<?= $detailTransaksi['id_member'] ?>"><?= $detailTransaksi['nama'] ?></option>
                                    <?php foreach ($member as $m) : ?>
                                        <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="tgl">Tanggal</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="tgl" class="form-control mb-3" value="<?= $detailTransaksi['tgl'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="batas_waktu">Batas Waktu</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="batas_waktu" class="form-control mb-3" value="<?= $detailTransaksi['batas_waktu'] ?>">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="tgl_bayar">Tanggal Bayar</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="tgl_bayar" class="form-control mb-3" value="<?= $detailTransaksi['tgl_bayar'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="id_paket">Paket</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_paket" id="id_paket" class="form-control mb-3">
                                    <option value="<?= $detailTransaksi['id_paket'] ?>"><?= $detailTransaksi['nama_paket'] ?></option>
                                    <?php foreach ($paket as $p) : ?>
                                        <option value="<?= $p['id'] ?>" <?= $detailTransaksi['id_paket'] ?>><?= $p['nama_paket'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="qty">Jumlah</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="qty" class="form-control mb-3"  value="<?= $detailTransaksi['qty'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="biaya_tambahan">Biaya Tambahan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="biaya_tambahan" class="form-control mb-3"  value="<?= $detailTransaksi['biaya_tambahan'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="diskon">Diskon</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="diskon" class="form-control mb-3"  value="<?= $detailTransaksi['diskon'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="status">Status Barang</label>
                            </div>
                            <div class="col-md-9">
                                <select name="status" id="status" class="form-control mb-3">
                                    <option value="baru" <?= $detailTransaksi['status'] == 'baru' ? 'selected' : '' ?>>Baru</option>
                                    <option value="proses" <?= $detailTransaksi['status'] == 'proses' ? 'selected' : '' ?>>Proses</option>
                                    <option value="selesai" <?= $detailTransaksi['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                    <option value="diambil" <?= $detailTransaksi['status'] == 'diambil' ? 'selected' : '' ?>>Diambil</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="dibayar">Status Pengerjaan</label>
                            </div>
                            <div class="col-md-9">
                                <select name="dibayar" id="dibayar" class="form-control mb-3">
                                    <option value="dibayar"  <?= $detailTransaksi['dibayar'] == 'dibayar' ? 'selected' : '' ?>>Lunas</option>
                                    <option value="belum_dibayar"  <?= $detailTransaksi['dibayar'] == 'belum_dibayar' ? 'selected' : '' ?>>Belum Bayar</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="keterangan">Keterangan</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="keterangan" id="keterangan"class="form-control mb-3"><?= $detailTransaksi['keterangan'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-success">
                    <i class="fa fa-check"></i> SIMPAN
                </button>
                <a href="<?= base_url('transaksi/' . $id_outlet . '/detail') ?>" class="btn btn-md btn-info">
                    <i class="fa fa-reply"></i> KEMBALI
                </a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>