<?php

return [

    'title' => 'Masuk',

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
        'failed' => 'Kredensial yang diberikan tidak dapat ditemukan.',
        'throttled' => 'Terlalu banyak percobaan masuk. Silakan ulangi dalam :seconds detik.',
    ],

];
