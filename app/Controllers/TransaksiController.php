<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\MemberModel;
use App\Models\OutletModel;
use App\Models\PaketModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class TransaksiController extends BaseController
{
    public function index($id)
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin','kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $transaksiModel = new TransaksiModel();
                $outletModel = new OutletModel();
                $memberModel = new MemberModel();
                $paketModel = new PaketModel();

                $data['transaksis'] = $transaksiModel->where('id_outlet', $id)->findAll();
                $data['outlet'] = $outletModel->find($id);
                $data['member'] = $memberModel->findAll();
                $data['paket'] = $paketModel->where('id_outlet', $id)->findAll();
                $data['id_outlet'] = $id;

                return view('transaksi/transaksi', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function store($id)
    {
        $session = session();

        $paketModel = new PaketModel();

        $paket = $this->request->getPost('id_paket');
        $data['pakets'] = $paketModel->find($paket);

        // random invoice
        date_default_timezone_set('Asia/Jakarta');
        $now = time();
        $format = date('s-i-H-d-m-Y');
        $formattedTime = date($format, $now);

        $invoice = $formattedTime;
        $invoice = str_replace('-', '', $invoice);
        $id_member = $this->request->getPost('id_member');
        $tgl = $this->request->getPost('tgl');
        $batas = $this->request->getPost('batas_waktu');
        $tgl_bayar = $this->request->getPost('tgl_bayar');
        $id_paket = $data['pakets']['id'];
        $harga = $data['pakets']['harga'];
        $qty = $this->request->getPost('qty');
        $tambahan = $this->request->getPost('biaya_tambahan');
        $diskon = $this->request->getPost('diskon');
        $pajak = ($harga * $qty) * (5/100);
        $total = ($harga * $qty) + $pajak + $tambahan - $diskon;
        $status = $this->request->getPost('status');
        $bayar = $this->request->getPost('dibayar');
        $id_user = session()->get('id');
        $ket = $this->request->getPost('keterangan');

        // insert ke tabel transaksi
        $transaksiModel = new TransaksiModel();
        $data = [
            'id_outlet' => $id,
            'kode_invoice' => $invoice,
            'id_member' => $id_member,
            'tgl' => $tgl,
            'batas_waktu'=> $batas,
            'tgl_bayar'=> $tgl_bayar,
            'biaya_tambahan'=> $tambahan,
            'diskon' => $diskon,
            'pajak'=> $pajak,
            'total' => $total,
            'status'=> $status,
            'dibayar'=> $bayar,
            'id_user' => $id_user
        ];
        $transaksiModel->insert($data);

        $id_transaksi =  $transaksiModel->orderBy('id', 'desc')->first();

        // insert ke tabel detail transaksi
        $detailModel = new DetailTransaksiModel();
        $data2 = [
            'id_transaksi'=> $id_transaksi['id'],
            'id_paket' => $id_paket,
            'qty' => $qty,
            'total' => $total,
            'keterangan' => $ket
        ];
        $detailModel->insert($data2);

        return redirect()->to(base_url('transaksi/' . $id . '/detail'))->with('success','Transaksi Berhasil');
    }

    public function detail($id,$id2)
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin','kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $detailModel = new DetailTransaksiModel();
                $transaksiModel = new TransaksiModel();
                $outletModel = new OutletModel();
                
                $data['outlet'] = $outletModel->find($id);
                $data['transaksi'] = $transaksiModel->where('id_outlet', $id)->findAll();
                $data['detailTransaksi'] = $detailModel->select('*')
                                            ->join('tb_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left')
                                            ->where('id_outlet', $id)
                                            ->findAll();
                $data['id_outlet'] = $id;
                $data['id_transaksi'] = $id2;

                return view('transaksi/detail', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function edit($id,$id2) // changed
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin','kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $detailModel = new DetailTransaksiModel();
                $outletModel = new OutletModel();
                $memberModel = new MemberModel();
                $paketModel = new PaketModel();

                $data['paket'] = $paketModel->where('id_outlet', $id)->findAll();
                $data['outlet'] = $outletModel->find($id);
                $data['detail'] = $detailModel->find($id2);
                $data['detailTransaksi'] = $detailModel->select('*')
                                            ->join('tb_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left')
                                            ->join('tb_member', 'tb_member.id = tb_transaksi.id_member', 'left')
                                            ->join('tb_paket', 'tb_paket.id = tb_detail_transaksi.id_paket', 'left')
                                            ->where('tb_detail_transaksi.id_transaksi', $id2)
                                            ->first();
                $data['member'] = $memberModel->findAll();
                $data['id_outlet'] = $id;
                $data['id_transaksi'] = $id2;

                return view('transaksi/edit', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function update($id,$id2)
    {
        $paketModel = new PaketModel();

        $paket = $this->request->getPost('id_paket');
        $data['pakets'] = $paketModel->find($paket);

        // random invoice
        date_default_timezone_set('Asia/Jakarta');
        $now = time();
        $format = date('s-i-H-d-m-Y');
        $formattedTime = date($format, $now);

        $invoice = $formattedTime;
        $invoice = str_replace('-', '', $invoice);
        $tgl = $this->request->getPost('tgl');
        $batas = $this->request->getPost('batas_waktu');
        $tgl_bayar = $this->request->getPost('tgl_bayar');
        $id_paket = $data['pakets']['id'];  
        $harga = $data['pakets']['harga'];
        $qty = $this->request->getPost('qty');
        $tambahan = $this->request->getPost('biaya_tambahan');
        $diskon = $this->request->getPost('diskon');
        $pajak = ($harga * $qty) * (5/100);
        $total = ($harga * $qty) + $pajak + $tambahan - $diskon;
        $status = $this->request->getPost('status');
        $bayar = $this->request->getPost('dibayar');
        $id_user = session()->get('id');; // sementara
        $ket = $this->request->getPost('keterangan');

        // insert ke tabel transaksi
        $transaksiModel = new TransaksiModel();
        $data = [
            'id_outlet' => $id,
            'kode_invoice' => $invoice,
            'tgl' => $tgl,
            'batas_waktu'=> $batas,
            'tgl_bayar'=> $tgl_bayar,
            'biaya_tambahan'=> $tambahan,
            'diskon' => $diskon,
            'pajak'=> $pajak,
            'total' => $total,
            'status'=> $status,
            'dibayar'=> $bayar,
            'id_user' => $id_user
        ];
        $transaksiModel->update($id2,$data);

        $id_transaksi =  $transaksiModel->orderBy('id', 'desc')->first();

        // update ke tabel detail transaksi
        $detailModel = new DetailTransaksiModel();
        $id_detail_transaksi =  $detailModel->where('id_transaksi', $id2)->first();
        $data2 = [
            'id' => $id_detail_transaksi['id'],
            'id_transaksi'=> $id2,
            'id_paket' => $id_paket,
            'qty' => $qty,
            'total' => $total,
            'keterangan' => $ket
        ];
        
        $detailModel->update($id_detail_transaksi['id'], $data2);
        return redirect()->to(base_url('transaksi/' . $id . '/detail'))->with('success','Transaksi Berhasil Terupdate');
    }

    public function delete($id,$id2)
    {
        $transaksiModel = new TransaksiModel();
        $detailModel = new DetailTransaksiModel();

        $transaksiModel->delete($id2);
        $detailModel->delete($id2);

        return redirect()->to(base_url('transaksi/' . $id . '/detail'))->with('success', 'Transaksi Berhasil Dihapus');
    }

    public function detailShow($id,$id2) // changed
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin','kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $detailModel = new DetailTransaksiModel();
                $outletModel = new OutletModel();
                $memberModel = new MemberModel();
                
                $data['outlet'] = $outletModel->find($id);
                $data['detail'] = $detailModel->find($id2);
                $data['detailTransaksi'] = $detailModel->select('*')
                                            ->join('tb_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left')
                                            ->join('tb_member', 'tb_member.id = tb_transaksi.id_member', 'left')
                                            ->join('tb_paket', 'tb_paket.id = tb_detail_transaksi.id_paket', 'left')
                                            ->where('tb_detail_transaksi.id_transaksi', $id2)
                                            ->first();
                $data['member'] = $memberModel->findAll();
                $data['id_outlet'] = $id;
                $data['id_transaksi'] = $id2;

                return view('transaksi/detailShow', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function print($id,$id2) // changed
    {
        $dompdf = new \Dompdf\Dompdf();

        $detailModel = new DetailTransaksiModel();
        $outletModel = new OutletModel();
        $memberModel = new MemberModel();
        $userModel = new UserModel();
        
        $data['outlet'] = $outletModel->find($id);
        $data['detail'] = $detailModel->find($id2);
        $data['detailTransaksi'] = $detailModel->select('*')
                                    ->join('tb_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left')
                                    ->join('tb_member', 'tb_member.id = tb_transaksi.id_member', 'left')
                                    ->join('tb_paket', 'tb_paket.id = tb_detail_transaksi.id_paket', 'left')
                                    ->where('tb_detail_transaksi.id_transaksi', $id2)
                                    ->first();
        $data['member'] = $memberModel->findAll();
        $data['id_outlet'] = $id;
        $data['id_transaksi'] = $id2;

        $html = view('transaksi/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Detail-Transaksi.pdf', array('Attachment' => false));
    }

    public function printAll($id,$id2) // changed
    {
        $dompdf = new \Dompdf\Dompdf();

        $detailModel = new DetailTransaksiModel();
        $transaksiModel = new TransaksiModel();
        $outletModel = new OutletModel();
        
        $data['outlet'] = $outletModel->find($id);
        $data['transaksi'] = $transaksiModel->where('id_outlet', $id)->findAll();
        $data['detailTransaksi'] = $detailModel->select('*')
                                    ->join('tb_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left')
                                    ->join('tb_member', 'tb_member.id = tb_transaksi.id_member', 'left')
                                    ->join('tb_paket', 'tb_paket.id = tb_detail_transaksi.id_paket', 'left')
                                    ->where('tb_transaksi.id_outlet', $id)
                                    ->findAll();
        $data['id_outlet'] = $id;
        $data['id_transaksi'] = $id2;

        $html = view('transaksi/printAll', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Total-Transaksi.pdf', array('Attachment' => false));
    }

    public function detailOwner($id,$id2)
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['owner'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $detailModel = new DetailTransaksiModel();
                $transaksiModel = new TransaksiModel();
                $outletModel = new OutletModel();
                
                $data['outlet'] = $outletModel->find($id);
                $data['transaksi'] = $transaksiModel->where('id_outlet', $id)->findAll();
                $data['detailTransaksi'] = $detailModel->select('*')
                                            ->join('tb_transaksi', 'tb_transaksi.id = tb_detail_transaksi.id_transaksi', 'left')
                                            ->where('id_outlet', $id)
                                            ->findAll();
                $data['id_outlet'] = $id;
                $data['id_transaksi'] = $id2;

                return view('transaksi/detailOwner', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

}