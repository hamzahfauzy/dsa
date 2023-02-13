<?php

$conn  = conn();
$db    = new Database($conn);
$error_msg = get_flash_msg('error');
$success_msg = get_flash_msg('success');

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
$user = auth()->user;
if(get_role($user->id)->role_id == 3)
{
    $user_id = $user->id;
}

$pembobotan = $db->all('pembobotan',[
    'user_id' => $user_id
]);

$pembobotan_dump = [];
foreach($pembobotan as $p)
{
    $pembobotan_dump[$p->gejala_id][$p->gejala_pembanding_id] = $p->skor;
}

$gejala = $db->all('gejala');
$gejala_dump = [];
foreach($gejala as $g)
{
    $gejala_dump[$g->penyakit_id][] = $g;
}

$penyakit = $db->all('penyakit');

$db->query = "SELECT * FROM users WHERE id IN (SELECT user_id FROM user_roles WHERE role_id = 3)";
$pakar = $db->exec('all');

return [
    'pembobotan' => $pembobotan_dump,
    'penyakit' => $penyakit,
    'gejala'   => $gejala_dump,
    'success_msg' => $success_msg,
    'error_msg' => $error_msg,
    'pakar' => $pakar,
];