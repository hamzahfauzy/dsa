<?php

$conn  = conn();
$db    = new Database($conn);

if(request() == 'POST')
{
    $user = auth()->user;
    $bobot = $_POST['bobot'];
    foreach($bobot as $gejala_id => $gejala_pembanding)
    {
        foreach($gejala_pembanding as $gejala_pembanding_id => $skor)
        {
            $db->insert('pembobotan',[
                'user_id' => $user->id,
                'gejala_id' => $gejala_id,
                'gejala_pembanding_id' => $gejala_pembanding_id,
                'skor' => $skor
            ]);
        }
    }

    set_flash_msg(['success'=>'Pembobotan berhasil disimpan']);
    header('location:'.routeTo('pembobotan/index'));
}

$gejala = $db->all('gejala');
$gejala_dump = [];
foreach($gejala as $g)
{
    $gejala_dump[$g->penyakit_id][] = $g;
}

$penyakit = $db->all('penyakit');

return [
    'penyakit' => $penyakit,
    'gejala'   => $gejala_dump
];