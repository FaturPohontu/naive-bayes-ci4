<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
{
    // Jika sudah login, jangan ke home lagi, langsung ke prediksi
    if (session()->get('isLoggedIn')) {
        return redirect()->to('/prediction');
    }
    return view('landing_page');
}
}