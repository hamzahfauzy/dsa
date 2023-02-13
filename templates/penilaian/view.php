<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Penilaian : <?=$data->user->name?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data penilaian</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/index',['table'=>'penilaian'])?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php /*
                            <h3>HASIL CERTAINTY FACTOR : <?=$data->hasil_cf->nama?></h3>
                            <h3>HASIL DEMPSTER SHAFER : <?=$data->hasil_ds->nama?></h3>
                            */ ?>
                            <h3>Penilaian</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gejala</th>
                                    <th>Pilihan</th>
                                    <th>Skor</th>
                                    <th>Bobot</th>
                                    <th>CF[H,E]</th>
                                </tr>
                                <?php foreach($data->gejala as $index => $gejala): ?>
                                <tr>
                                    <td><?=$index+1?></td>
                                    <td><?=$gejala->gejala->nama?></td>
                                    <td><?=$gejala->pilihan->nama?></td>
                                    <td><?=$gejala->skor?></td>
                                    <td><?=$gejala->gejala->bobot?></td>
                                    <td><?=$gejala->cf_he?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>

                            <h3>Hasil Certainty Factor</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Penyakit</td>
                                    <td>Skor</td>
                                </tr>
                                <?php foreach($cf_combine as $p_id => $cf): ?>
                                <tr>
                                    <td><?=$penyakit_dump[$p_id]->nama?></td>
                                    <td><?=$cf?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>

                            <h3>Hasil Dempster Shafer</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Penyakit</td>
                                    <td>Skor</td>
                                </tr>
                                <?php foreach($densitas_baru as $p_id => $cf): ?>
                                <tr>
                                    <td><?=$penyakit_dump[$p_id]->nama?></td>
                                    <td><?=$cf?></td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>