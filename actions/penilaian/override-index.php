<?php

$user = auth()->user;
if(get_role($user->id)->role_id == 2)
{
    $where = (empty($where) ? ' WHERE ' : ' AND ') . " user_id = $user->id";
}

$db->query = "SELECT * FROM $table $where ORDER BY ".$col_order." ".$order[0]['dir']." LIMIT $start,$length";
$data  = $db->exec('all');

$total = $db->exists($table,$where,[
    $col_order => $order[0]['dir']
]);

return compact('data','total');