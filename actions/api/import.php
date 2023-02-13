<?php

$conn  = conn();
$db    = new Database($conn);

$connection = new mysqli('127.0.0.1','root','','dsa');
$query = $connection->query("SELECT username, `password`, fullname as nama, gender as jenis_kelamin, address as alamat, email, nomorhp as no_hp, is_active, kelas FROM tb_mhsw");
$mhs   = $query->fetch_all(MYSQLI_ASSOC);

foreach($mhs as $mahasiswa)
{
    $user = $db->insert('users',[
        'name' => $mahasiswa['nama'],
        'username' => $mahasiswa['username'],
        'password' => $mahasiswa['password']
    ]);

    $db->insert('user_roles',[
        'user_id' => $user->id,
        'role_id' => 2 // role guest
    ]);

    unset($mahasiswa['username']);
    unset($mahasiswa['password']);
    $mahasiswa['user_id'] = $user->id;

    $db->insert('mahasiswa',$mahasiswa);
}

echo "Sukses";
die;

// echo json_encode($mhs);
// die;