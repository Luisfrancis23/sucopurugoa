<?php

namespace App\Controllers;

use App\Models\AdminModel;
use Config\Services;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->session->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/auth/login');
    }

    public function processLogin()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/login');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->to('/login')->with('error', 'Username no Password tenki prense.');
        }

        $adminModel = new AdminModel();
        $admin = $adminModel->where('username', $username)->first();

        if (!$admin || !password_verify($password, $admin['password'])) {
            $this->log_activity('Login Gagal', "Tenta login ho username: $username");
            return redirect()->to('/login')->with('error', 'Username ou Password la loos.');
        }

        $sessionData = [
            'admin_id'  => $admin['id'],
            'username'  => $admin['username'],
            'photo'     => $admin['photo'],
            'logged_in' => true,
        ];
        $this->session->set($sessionData);

        $this->log_activity('Login', "Admin $username login sistému.");
        return redirect()->to('/admin/dashboard')->with('success', 'Benvingudu! Ita boot login ho susesu.');
    }

    public function logout()
    {
        $username = $this->session->get('username');
        $this->log_activity('Logout', "Admin $username logout sistému.");
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'Ita boot logout ho susesu.');
    }
}
