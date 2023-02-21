<?php

$success_msg = get_flash_msg('success');
$error_msg = get_flash_msg('error');

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    $user = $db->insert('users',[
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'password' => ['=',"PASSWORD('$_POST[password]')"]
    ]);

    $db->insert('mahasiswa',[
        'user_id' => $user->id,
        'nama' => $_POST['name'],
        'email' => $_POST['email'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'alamat' => ' ',
        'no_hp' => ' ',
        'kelas' => ' ',
        'is_active' => 'Y',
        'status' => 0,
    ]);

    $db->insert('user_roles',[
        'user_id' => $user->id,
        'role_id' => 2
    ]);

    if($user)
    {
        Session::set(['user_id'=>$user->id]);
        header('location:'.routeTo(config('after_login_page')));
        die();
    }

    set_flash_msg(['error'=>'Pendaftaran Gagal!']);
    header('location:'.routeTo('auth/register'));
    die();
}

return [
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
];