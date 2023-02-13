<?php

return [
    'mahasiswa' => [
        'user_id' => [
            'label' => 'User Id',
            'type'  => 'options-obj:users,id,name'
        ],
        'nama' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'jenis_kelamin' => [
            'label' => 'Jenis Kelamin',
            'type'  => 'options:Laki-laki|Perempuan'
        ],
        'alamat' => [
            'label' => 'Alamat',
            'type'  => 'textarea'
        ],
        'email' => [
            'label' => 'Email',
            'type'  => 'email'
        ],
        'no_hp' => [
            'label' => 'No. Handphone',
            'type'  => 'tel'
        ],
        'kelas' => [
            'label' => 'Kelas',
            'type'  => 'text'
        ],
        'is_active' => [
            'label' => 'Aktif',
            'type'  => 'options:YA|TIDAK'
        ],
    ],
    
    'penyakit' => [
        'kode' => [
            'label' => 'Kode Penyakit',
            'type'  => 'text'
        ],
        'nama' => [
            'label' => 'Nama Penyakit',
            'type'  => 'text'
        ],
    ],
    
    'gejala' => [
        'penyakit_id' => [
            'label' => 'Penyakit',
            'type'  => 'options-obj:penyakit,id,nama'
        ],
        'kode' => [
            'label' => 'Kode Gejala',
            'type' => 'text',
        ],
        'nama' => [
            'label' => 'Nama Gejala',
            'type' => 'text',
        ],
        'bobot' =>  [
            'label' => 'Bobot',
            'type' => 'number',
        ],
    ],
    
    'pilihan' => [
        'nama',
        'skor',
    ],
    
    'penilaian' => [
        'user_id' => [
            'label' => 'Pengguna',
            'type'  => 'options-obj:users,id,name'
        ],
        'hasil_cf_id' => [
            'label' => 'Hasil Certainty Factor',
            'type'  => 'options-obj:penyakit,id,nama'
        ],
        'hasil_ds_id' => [
            'label' => 'Hasil Dempster Shafer',
            'type'  => 'options-obj:penyakit,id,nama'
        ],
        'created_at' => [
            'label' => 'Tanggal',
            'type'  => 'datetime'
        ],
    ],
    
    'penilaian_gejala' => [
        'penilaian_id',
        'hasil_id',
        'pilihan_id',
    ]
];