<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                $id_outlet = $data['id_outlet'];
                $ses_data = [
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'username' => $data['username'],
                    'id_outlet' => $data['id_outlet'],
                    'role' => $data['role'],
                    'logged_in' => true
                ];
                $session->set($ses_data);
                switch ($data['role']) {
                    case 'admin':
                        return redirect()->to(base_url('outlet'));
                        break;
                    case 'kasir' :
                        return redirect()->to(base_url('transaksi/' . $id_outlet));
                        break;
                    case 'owner' :
                        return redirect()->to(base_url('transaksi/' . $id_outlet . '/detail/owner'));
                        break;
                    default :
                        return redirect()->to(base_url());
                }
            } else {
                $session->setFlashData('msg', 'Password Tidak Sesuai');
                return redirect()->to(base_url());
            }
        } else {
            $session->setFlashData('msg','User Tidak Ditemukan');
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url());
    }
}
