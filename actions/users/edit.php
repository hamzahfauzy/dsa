<?php

$conn = conn();
$db   = new Database($conn);
Page::set_title('Edit Pengguna');
$data = $db->single('users',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    if(empty($_POST['users']['password']))
        $_POST['users']['password'] = $data->password;
    else
        $_POST['users']['password'] = ['=','PASSWORD("'.$_POST['users']['password'].'")'];

    $db->update('users',$_POST['users'],[
        'id' => $_GET['id']
    ]);

    $db->update('user_roles',[
        'role_id' => $_POST['role']
    ],[
        'user_id' => $_GET['id'],
    ]);

    set_flash_msg(['success'=>'Pengguna berhasil diupdate']);
    header('location:'.routeTo('users/index'));
}

$roles = $db->all('roles');

return [
    'data' => $data,
    'roles' => $roles,
];