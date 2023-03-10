<?php
Page::set_title('Tambah Pengguna');
$conn = conn();
$db   = new Database($conn);

if(request() == 'POST')
{

    $password = ['=','PASSWORD("'.$_POST['users']['password'].'")'];
    unset($_POST['users']['password']);

    $user = $db->insert('users',$_POST['users']);
    $db->update('users',[
        'password' => $password
    ],[
        'id' => $user->id
    ]);
    
    $db->insert('user_roles',[
        'user_id' => $user->id,
        'role_id' => $_POST['role']
    ]);

    set_flash_msg(['success'=>'Pengguna berhasil ditambahkan']);
    header('location:'.routeTo('users/index'));
}

$roles = $db->all('roles');

return compact('roles');