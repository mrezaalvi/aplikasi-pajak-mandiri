<?php

return [

    'title' => 'Halaman Login',

    'heading' => 'Masuk ke akun Anda',

    'buttons' => [

        'submit' => [
            'label' => 'Masuk',
        ],
        
        'logout' => [
            'label' => 'Keluar',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Alamat Email',
            'placeholder' => 'Masukkan alamat email Anda',
        ],

        'username' => [
            'label' => 'Nama Pengguna',
            'placeholder' => 'Masukkan nama pengguna',
        ],

        'password' => [
            'label' => 'Kata sandi',
            'placeholder' => 'Masukkan kata sandi Anda',
        ],

        'remember' => [
            'label' => 'Ingat saya',
        ],

    ],

    'messages' => [
        'failed' => 'Data akun Anda tidak ditemukan. Pastikan kembali nama pengguna dan kata sandi Anda.',
        'throttled' => 'Terlalu banyak percobaan masuk. Silakan ulangi dalam :seconds detik.',
    ],

];
