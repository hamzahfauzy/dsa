<?php

$table = 'penilaian';
Page::set_title(_ucwords(__($table)));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$fields = config('fields')[$table];

if(file_exists('../actions/'.$table.'/override-index-fields.php'))
    $fields = require '../actions/'.$table.'/override-index-fields.php';

$user = auth()->user;
$where = "";
if(get_role($user->id)->role_id == 2)
{
    $where = (empty($where) ? ' WHERE ' : ' AND ') . " user_id = $user->id";
}

$db->query = "SELECT * FROM $table $where";
$data  = $db->exec('all');

return [
    'table' => $table,
    'data' => $data,
    'success_msg' => $success_msg,
    'fields' => $fields
];
