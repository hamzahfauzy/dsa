<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    Validation::run([
        'email'=> [
            'required'
        ]
    ],$_POST);

    $user = $db->exists('mahasiswa',[
        'email' => $_POST['email'],
    ]);

    if($user)
    {
        set_flash_msg(['success'=>'Reset Password Berhasil! Password terbaru sudah di kirimkan ke email anda']);
        header('location:'.routeTo('auth/login'));
        die();
    }
    set_flash_msg(['error'=>'Reset Password Gagal! Pengguna Tidak ditemukan']);
    header('location:'.routeTo('auth/forget-password'));
    die();
}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
];