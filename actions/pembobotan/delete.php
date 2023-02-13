<?php

$table = 'pembobotan';
$conn = conn();
$db   = new Database($conn);

$db->delete($table,[
    'user_id' => auth()->user->id
]);

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil dihapus']);
header('location:'.routeTo('pembobotan/index'));
die();
