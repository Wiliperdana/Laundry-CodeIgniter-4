<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OutletModel;
use App\Models\UserModel;

class UserController extends BaseController
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
                $userModel = new UserModel();
                $outletModel = new OutletModel();

                $data['users'] = $userModel->where('id_outlet', $id)->findAll();
                $data['outlet'] = $outletModel->find($id);
                $data['id_outlet'] = $id;

                return view('user/user', $data);
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
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'rules'  => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required'   => 'Username harus diisi.',
                    'is_unique'  => 'Username sudah digunakan.'
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[8]|max_length[16]',
                'errors' => [
                    'required'   => 'Password harus diisi.',
                    'min_length' => 'Password minimal 8 karakter.',
                    'max_length' => 'Password maksimal 16 karakter.'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }
        
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $role = $this->request->getPost('role');

        $userModel = new UserModel();
        $data = [
            'nama'=> $nama,
            'username'=> $username,
            'password'=> $password,
            'id_outlet'=> $id,
            'role'=> $role,
        ];
        $userModel->insert($data);

        return redirect()->to(base_url('user/' . $id))->with('success','Data Berhasil Ditambahkan');
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
                $userModel = new UserModel();
                $outletModel = new OutletModel();

                $data['user'] = $userModel->where('id_outlet', $id)->find($id2);
                $data['outlet'] = $outletModel->find($id);
                $data['id_outlet'] = $id;

                return view('user/edit', $data);
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
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');

        $userModel = new UserModel();
        $data = [
            'nama'=> $nama,
            'username'=> $username,
            'role'=> $role,
        ];
        $userModel->update($id2,$data);

        return redirect()->to(base_url('user/' . $id))->with('success','Data Berhasil Diubah');
    }

    public function delete($id,$id2)
    {
        $userModel = new UserModel();
        $userModel->delete($id2);

        return redirect()->to(base_url('user/' . $id))->with('success','Data Berhasil Dihapus');
    }
}
