<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OutletModel;
use App\Models\PaketModel;

class PaketController extends BaseController
{
    public function index($id)
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $paketModel = new PaketModel();
                $outletModel = new OutletModel();

                $data['pakets'] = $paketModel->where('id_outlet', $id)->findAll();
                $data['outlet'] = $outletModel->find($id);
                $data['id_outlet'] = $id;

                return view('paket/paket', $data);
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
        $jenis = $this->request->getPost('jenis');
        $nama_paket = $this->request->getPost('nama_paket');
        $harga = $this->request->getPost('harga');

        $paketModel = new PaketModel();
        $data = [
            'id_outlet' => $id,
            'jenis' => $jenis,
            'nama_paket' => $nama_paket,
            'harga' => $harga,
        ];
        $paketModel->insert($data);

        return redirect()->to('paket/' . $id)->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id,$id2)
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $paketModel = new PaketModel();
                $outletModel = new OutletModel();

                $data['paket'] = $paketModel->where('id_outlet', $id)->find($id2);
                $data['outlet'] = $outletModel->find($id);
                $data['id_outlet'] = $id;

                return view('paket/edit', $data);
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
        $jenis = $this->request->getPost('jenis');
        $nama_paket = $this->request->getPost('nama_paket');
        $harga = $this->request->getPost('harga');

        $paketModel = new PaketModel();
        $data = [
            'id_outlet' => $id,
            'jenis' => $jenis,
            'nama_paket' => $nama_paket,
            'harga' => $harga,
        ];
        $paketModel->update($id2,$data);

        return redirect()->to('paket/' . $id)->with('success','Data Berhasil Diubah');
    }

    public function delete($id,$id2)
    {
        $paketModel = new PaketModel();
        $paketModel->delete($id2);

        return redirect()->to('paket/' . $id)->with('success','Data Berhasil Dihapus');
    }
}