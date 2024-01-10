<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class MemberController extends BaseController
{
    public function index()
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin', 'kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $memberModel = new MemberModel();
                $data['members'] = $memberModel->findAll();

                return view('member/member', $data);
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
            $allowedRoles = ['admin', 'kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                return view('member/create');
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
        $jk = $this->request->getPost('jenis_kelamin');
        $tlp = $this->request->getPost('tlp');

        $memberModel = new MemberModel(); 
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jk,
            'tlp' => $tlp,
        ];
        $memberModel->insert($data);

        return redirect()->to(base_url('member'))->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $session = session();

        // Periksa apakah pengguna telah masuk dan memiliki sesi
        if ($session->has('logged_in')) {
            // Dapatkan peran pengguna dari sesi
            $userRole = $session->get('role');

            // Definisikan peran yang diizinkan untuk mengakses controller ini
            $allowedRoles = ['admin', 'kasir'];

            // Periksa apakah peran pengguna diizinkan untuk mengakses controller ini
            if (in_array($userRole, $allowedRoles)) {
                $memberModel = new MemberModel();
                $data['member'] = $memberModel->find($id);

                return view('member/edit', $data);
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
        $jk = $this->request->getPost('jenis_kelamin');
        $tlp = $this->request->getPost('tlp');

        $memberModel = new MemberModel(); 
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jk,
            'tlp' => $tlp,
        ];
        $memberModel->update($id,$data);

        return redirect()->to(base_url('member'))->with('success','Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $memberModel = new MemberModel();
        $memberModel->delete($id);

        return redirect()->to(base_url('member'))->with('success','Data Berhasil Dihapus');
    }
}
