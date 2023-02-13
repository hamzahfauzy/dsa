<?php

$conn  = conn();
$db    = new Database($conn);

$db->query = "SELECT user_id FROM pembobotan GROUP BY user_id";
$total_penilai = $db->exec('exists');
if($total_penilai < 2)
{
    set_flash_msg(['error'=>'Gagal diproses! Total pembobotan kurang dari 2']);
    header('location:'.routeTo('pembobotan/index'));
    die();
}

$db->query = "SELECT user_id FROM pembobotan GROUP BY user_id";
$total_penilai = $db->exec('all');
$penyakit = $db->all('penyakit');
$hasil_ahp = [];
$borda = [];
foreach($total_penilai as $user)
{
    $all_pembobotan = $db->all('pembobotan',[
        'user_id' => $user->user_id
    ]);
    $pembobotan = [];
    foreach($all_pembobotan as $p)
    {
        $pembobotan[$p->gejala_id][$p->gejala_pembanding_id] = $p->skor;
    }
    
    $all_gejala = $db->all('gejala');
    $gejala = [];
    foreach($all_gejala as $g)
    {
        $gejala[$g->penyakit_id][] = $g;
    }

    $total = [];
    $nilai_eligen = [];
    foreach($penyakit as $p)
    {
        $total[$p->id] = [];
        $nilai_eligen[$p->id] = [];
        $jumlah_gejala = count($gejala[$p->id]);
        foreach($gejala[$p->id] as $g)
        {
            foreach($gejala[$p->id] as $g1)
            {
                $nilai = $g->id == $g1->id ? 1 : $pembobotan[$g->id][$g1->id];
                $total[$p->id][$g1->id][] = $nilai;
            }
        }

        foreach($gejala[$p->id] as $g)
        {
            $nilai_eligen[$p->id][$g->id] = 0;
            $total_ne = 0;
            foreach($gejala[$p->id] as $g1)
            {
                $sum_bobot = array_sum($total[$p->id][$g1->id]);
                $ne = number_format( ($g->id == $g1->id ? 1 : $pembobotan[$g->id][$g1->id]) / $sum_bobot , 3);
                $total_ne += $ne;
                $nilai_eligen[$p->id][$g->id] += $ne;
            }

            $rata_rata = $total_ne/$jumlah_gejala;
            $hasil_ahp[$user->user_id][$p->id][$g->id] = $rata_rata;
        }

        $all_rata_rata = $hasil_ahp[$user->user_id][$p->id];
        rsort($all_rata_rata);

        $rangking = [];
        foreach($hasil_ahp[$user->user_id][$p->id] as $gejala_id => $rata)
        {
            if(!isset($borda[$p->id][$gejala_id]))
            {
                $borda[$p->id][$gejala_id] = 0;
            }

            foreach($all_rata_rata as $index => $r)
            {
                if($r == $rata)
                {
                    $rangking[$gejala_id] = [
                        'skor' => $r,
                        'urut' => $index+1,
                        'borda_skor' => $jumlah_gejala-($index+1)
                    ];
                    $borda[$p->id][$gejala_id] += $jumlah_gejala-($index+1);
                }
            }
        }

        $hasil_ahp[$user->user_id][$p->id] = $rangking;
    }

    foreach($penyakit as $p)
    {
        $sum_borda = array_sum($borda[$p->id]);
        foreach($borda[$p->id] as $gejala_id => $skor)
        {
            $bobot = $skor/$sum_borda;
            $db->update('gejala',[
                'bobot' => $bobot,
            ],[
                'id' => $gejala_id
            ]);
        }
    }

}

set_flash_msg(['success'=>'Pembobotan berhasil diproses!']);
header('location:'.routeTo('pembobotan/index'));