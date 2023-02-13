<?php

$table = 'penilaian';
Page::set_title('Buat '._ucwords(__($table)));
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = config('fields')[$table];
$conn = conn();
$db   = new Database($conn);

if(file_exists('../actions/'.$table.'/override-create-fields.php'))
    $fields = require '../actions/'.$table.'/override-create-fields.php';

if(request() == 'POST')
{

    $obj_penilaian = $db->insert('penilaian',[
        'user_id' => auth()->user->id
    ]);
    $penilaian = $_POST['penilaian'];
    foreach($penilaian as $gejala_id => $pilihan)
    {
        $gejala = $db->single('gejala',['id'=>$gejala_id]);
        $pilihan_id = array_keys($pilihan)[0];
        $skor = $pilihan[$pilihan_id];
        $db->insert('penilaian_gejala',[
            'penilaian_id' => $obj_penilaian->id,
            'gejala_id' => $gejala_id,
            'pilihan_id' => $pilihan_id,
            'skor' => $skor
        ]);
    }

    set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
    header('location:'.routeTo('penilaian/view',['id'=>$obj_penilaian->id]));
}

$gejala = $db->all('gejala',[],[
    'CAST(SUBSTR(kode FROM 2) AS UNSIGNED)' => 'ASC'
]);

$pilihan = $db->all('pilihan',[],['skor' => 'ASC']);

return compact('table','error_msg','old','fields','gejala','pilihan');
