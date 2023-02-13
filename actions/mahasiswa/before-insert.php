<?php

$name = $_POST[$table]['nama'];
$username = $_POST[$table]['username'];
$password = $_POST[$table]['password'];
// $password = password($password);

unset($_POST[$table]['username']);
unset($_POST[$table]['password']);

$user = $db->insert('users',[
    'name' => $name,
    'username' => $username,
    'password' => ['=','PASSWORD('.$password.')']
]);

$db->insert('user_roles',[
    'user_id' => $user->id,
    'role_id' => 2 // role guest
]);

$_POST[$table]['user_id'] = $user->id;