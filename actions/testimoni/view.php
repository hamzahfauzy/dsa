<?php

$table = 'testimoni';
Page::set_title('Detail '._ucwords(__($table)));
$conn = conn();
$db   = new Database($conn);
$user = auth()->user;

$data = $db->single($table,[
    'user_id' => $user->id
]);

return [
    'data' => $data
];
