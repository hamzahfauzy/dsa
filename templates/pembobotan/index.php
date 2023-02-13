<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Pembobotan</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data pembobotan</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if(is_allowed('pembobotan/process',auth()->user->id) && !empty($pembobotan)): ?>
                            <a href="<?=routeTo('pembobotan/process')?>" class="btn btn-primary btn-round">Simpan Pembobotan sebagai Bobot Gejala</a>
                        <?php endif ?>
                        <?php if(get_role(auth()->user->id)->role_id == 3): ?>
                            <?php if(empty($pembobotan)): ?>
                            <a href="<?=routeTo('pembobotan/create')?>" class="btn btn-secondary btn-round">Buat Pembobotan</a>
                            <?php else: ?>
                            <a href="<?=routeTo('pembobotan/delete')?>" class="btn btn-secondary btn-round">Hapus Pembobotan</a>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>

                            <?php if($error_msg): ?>
                            <div class="alert alert-danger"><?=$error_msg?></div>
                            <?php endif ?>
                            <?php if(get_role(auth()->user->id)->role_id == 1): ?>
                            <select name="" id="" class="form-control" onchange="location='<?=routeTo('pembobotan/index')?>?user_id='+this.value">
                                <option value="">Pilih Pakar</option>
                                <?php foreach($pakar as $pkr): ?>
                                <option value="<?=$pkr->id?>" <?=isset($_GET['user_id']) && $_GET['user_id']==$pkr->id ? 'selected=""' : ''?>><?=$pkr->name?></option>
                                <?php endforeach ?>
                            </select>
                            <?php endif ?>
                            <?php if(!empty($pembobotan)): ?>
                            <?php 
                            $total = [];
                            $nilai_eligen = [];
                            foreach($penyakit as $p): 
                            ?>
                            <h2>Pembobotan <?=$p->nama?></h2>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Gejala</td>
                                    <?php foreach($gejala[$p->id] as $g): ?>
                                    <td><?=$g->nama?></td>
                                    <?php endforeach ?>
                                </tr>
                                <?php 
                                $total[$p->id] = [];
                                foreach($gejala[$p->id] as $g): 
                                ?>
                                <tr>
                                    <td><?=$g->nama?></td>
                                    <?php 
                                    foreach($gejala[$p->id] as $g1): 
                                        $total[$p->id][$g1->id][] = $g->id == $g1->id ? 1 : $pembobotan[$g->id][$g1->id];
                                    ?>
                                    <?php if($g->id == $g1->id): ?>
                                    <td>1</td>
                                    <?php else: ?>
                                    <td><?=$pembobotan[$g->id][$g1->id] < 1 ? $pembobotan[$g->id][$g1->id] : number_format($pembobotan[$g->id][$g1->id])?></td>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td></td>
                                    <?php foreach($gejala[$p->id] as $g): ?>
                                    <td><?=array_sum($total[$p->id][$g->id])?></td>
                                    <?php endforeach ?>
                                </tr>
                            </table>

                            <h2>Nilai Eligen <?=$p->nama?></h2>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Gejala</td>
                                    <?php foreach($gejala[$p->id] as $g): ?>
                                    <td><?=$g->nama?></td>
                                    <?php endforeach ?>
                                    <td>Jumlah</td>
                                    <td>Rata-rata</td>
                                </tr>
                                <?php 
                                $nilai_eligen[$p->id] = [];
                                foreach($gejala[$p->id] as $g): 
                                    $nilai_eligen[$p->id][$g->id] = 0;
                                ?>
                                <tr>
                                    <td><?=$g->nama?></td>
                                    <?php 
                                    $total_ne = 0;
                                    foreach($gejala[$p->id] as $g1):
                                        $sum_bobot = array_sum($total[$p->id][$g1->id]);
                                        $ne = number_format( ($g->id == $g1->id ? 1 : $pembobotan[$g->id][$g1->id]) / $sum_bobot , 3);
                                        $total_ne += $ne;
                                        $nilai_eligen[$p->id][$g->id] += $ne;
                                    ?>
                                    <td><?=$ne?></td>
                                    <?php endforeach ?>
                                    <td><?=number_format($total_ne, 3) ?></td>
                                    <td><?=number_format($total_ne/count($gejala[$p->id]), 3) ?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>

                            <?php
                            $lambda_maks = 0;
                            $jumlah_gejala = count($gejala[$p->id]);
                            foreach($gejala[$p->id] as $g)
                            {
                                $total_h_gejala = array_sum($total[$p->id][$g->id]);
                                $total_v_gejala = $nilai_eligen[$p->id][$g->id];
                                $lambda_maks += ($total_h_gejala*($total_v_gejala/$jumlah_gejala));
                            }

                            $ci = ($lambda_maks-$jumlah_gejala)/($jumlah_gejala-1);
                            $ir = 1.32;
                            $cr = $ci/$ir;
                            ?>
                            <h2>CI / CR <?=$p->nama?></h2>
                            <table class="table table-bordered">
                                <tr>
                                    <td>λ maks(lamda maks)</td>
                                    <td><?=number_format($lambda_maks,1)?></td>
                                </tr>
                                <tr>
                                    <td>CI</td>
                                    <td><?=number_format($ci,1)?></td>
                                </tr>
                                <tr>
                                    <td>IR</td>
                                    <td><?=$ir?></td>
                                </tr>
                                <tr>
                                    <td>CR</td>
                                    <td><?=number_format($cr,3)?></td>
                                </tr>
                            </table>
                            <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>