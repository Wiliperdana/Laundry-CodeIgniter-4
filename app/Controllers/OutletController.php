<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OutletModel;

class OutletController extends BaseController
{
    public function index()
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
                // Izinkan akses ke controller Outlet
                $outletModel = new OutletModel();
                $data['outlets'] = $outletModel->findAll();

                return view('outlet/outlet', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function create()
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
                return view('outlet/create');
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $tlp = $this->request->getPost('tlp');

        $outletModel = new OutletModel(); 
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'tlp' => $tlp,
        ];
        $outletModel->insert($data);

        return redirect()->to(base_url('outlet'))->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
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
                $outletModel = new OutletModel();
                $data['outlet'] = $outletModel->find($id);

                return view('outlet/edit', $data);
            } else {
                // Redirect pengguna ke halaman lain atau tampilkan pesan kesalahan jika peran tidak diizinkan
                return redirect()->to(base_url('unauthorized'));
            }
        } else {
            // Jika pengguna belum masuk, arahkan mereka ke halaman login
            return redirect()->to(base_url('login'));
        }
    }

    public function update($id)
    {
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $tlp = $this->request->getPost('tlp');

        $outletModel = new OutletModel(); 
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'tlp' => $tlp,
        ];
        $outletModel->update($id,$data);

        return redirect()->to(base_url('outlet'))->with('success','Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $outletModel = new OutletModel();
        $outletModel->delete($id);

        return redirect()->to(base_url('outlet'))->with('success', 'Data Berhasil Dihapus');
    }
}
