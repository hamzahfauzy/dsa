<?php

$conn = conn();
$db   = new Database($conn);

$data = $db->single('penilaian',[
    'id' => $_GET['id']
]);

$data->gejala = $db->all('penilaian_gejala',[
    'penilaian_id' => $data->id
]);

$penyakit = $db->all('penyakit');
$penyakit_dump = [];
foreach($penyakit as $p)
{
    $penyakit_dump[$p->id] = $p;
}

$pilihan = $db->all('pilihan');
$pilihan_dump = [];
foreach($pilihan as $p)
{
    $pilihan_dump[$p->id] = $p;
}

$gejala = $db->all('gejala');
$gejala_dump = [];
$cf_combine  = [];
foreach($gejala as $g)
{
    $gejala_dump[$g->id] = $g;
}

// grouping gejala for certainty factor
$gejala_groups = [];
foreach($data->gejala as $index => $g)
{
    $g_dump = $gejala_dump[$g->gejala_id];
    $gejala_groups[$g_dump->penyakit_id][] = $g_dump;
}

$evidence = [];
foreach($data->gejala as $index => $g)
{
    $g->gejala = $gejala_dump[$g->gejala_id];
    $g->pilihan = $pilihan_dump[$g->pilihan_id];

    // skip data yang tidak di pilih atau memiliki skor 0
    if($g->skor == 0)
    {
        $g->cf_he = 0;
        continue;
    }

    // hitung certainty factor
    $cf_he = number_format($g->gejala->bobot * $g->skor, 5);
    $g->cf_he = $cf_he;
    if(!isset($cf_combine[$g->gejala->penyakit_id]))
    {
        if(count($gejala_groups[$g->gejala->penyakit_id]) > 1)
        {
            $cf_combine[$g->gejala->penyakit_id] = $cf_he;
        }
        else
        {
            $cf_combine[$g->gejala->penyakit_id] = ($cf_he + 0) * (1 - $cf_he);
        }
    }
    else
    {
        $old_cf_he = $cf_combine[$g->gejala->penyakit_id];
        $cf_combine[$g->gejala->penyakit_id] = number_format(( ($old_cf_he + $cf_he) * (1 - $old_cf_he) ), 5);
    }

    // dump evidence
    $evidence[] = $g->gejala;

}

$densitas_baru = [];
$db->query = "SELECT GROUP_CONCAT(id) as fod FROM penyakit";
$fod = $db->exec('single');
while(!empty($evidence))
{
    $as = array_shift($evidence);
    $densitas1[0]= [$as->penyakit_id, $as->bobot];
    $densitas1[1]=array($fod->fod, 1-$densitas1[0][1]);
    $densitas2=array();

    if(empty($densitas_baru)){
        $as = array_shift($evidence);
        $densitas2[0]= [$as->penyakit_id, $as->bobot];
    }else{
        foreach($densitas_baru as $k=>$r){
            if($k!="&theta;"){
                $densitas2[]=array($k,$r);
            }
        }
    }

    $theta=1;
    foreach($densitas2 as $d) $theta-=$d[1];
    $densitas2[]=array($fod->fod,$theta);
    $m=count($densitas2);
    $densitas_baru=array();

    for($y=0;$y<$m;$y++){
        for($x=0;$x<2;$x++){
            if(!($y==$m-1 && $x==1)){
                $v=explode(',',$densitas1[$x][0]);
                $w=explode(',',$densitas2[$y][0]);
                sort($v);
                sort($w);
                $vw=array_intersect($v,$w);
                if(empty($vw)){
                    $k="&theta;";
                }else{
                    $k=implode(',',$vw);
                }
                if(!isset($densitas_baru[$k])){
                    $densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
                }else{
                    $densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
                }
            }
        }
    }
    foreach($densitas_baru as $k=>$d){
        if($k!="&theta;"){
            $densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
        }
    }
    // print_r($densitas_baru);
}

unset($densitas_baru["&theta;"]);
arsort($densitas_baru);

uasort($cf_combine, function($a, $b) {
    return $b > $a;
});


$p_id = array_key_first($cf_combine);
$ds_id = array_key_first($densitas_baru);

$new_data = $db->update('penilaian',[
    'hasil_cf_id' => $p_id,
    'hasil_ds_id' => $ds_id
],[
    'id' => $data->id
]);

$data = array_merge((array) $data, (array) $new_data);

$data = json_decode(json_encode($data));

$data->user = $db->single('users',[
    'id' => $data->user_id
]);

$data->hasil_cf = $db->single('penyakit',[
    'id' => $data->hasil_cf_id
]);

$data->hasil_ds = $db->single('penyakit',[
    'id' => $data->hasil_ds_id
]);

return compact('data','cf_combine','penyakit_dump','densitas_baru');