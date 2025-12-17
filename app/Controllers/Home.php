<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Opsi 1: Langsung lempar user ke halaman prediksi
        // return redirect()->to('/prediction'); 

        // Opsi 2 (Lebih Baik): Tampilkan halaman Landing Page sederhana
        return view('landing_page'); 
    }
}