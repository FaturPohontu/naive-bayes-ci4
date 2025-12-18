<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar langsung ke prediksi (Dashboard)
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/prediction');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Cek User di Database
        $data = $model->where('username', $username)->first();
        
        if ($data) {
            // Verifikasi Password
            // Note: Karena di seeder kemarin kita pakai password_hash, disini kita verify
            if (password_verify($password, $data['password'])) {
                $ses_data = [
                    'id_user'    => $data['id'],
                    'username'   => $data['username'],
                    'nama'       => $data['nama'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/prediction'); // Masuk ke menu utama
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}