<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Buat Pembobotan</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data pembobotan</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?=routeTo('pembobotan/index')?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                            <?php foreach($penyakit as $p): ?>
                            <h2>Pembobotan <?=$p->nama?></h2>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Gejala</td>
                                    <?php foreach($gejala[$p->id] as $g): ?>
                                    <td><?=$g->nama?></td>
                                    <?php endforeach ?>
                                </tr>
                                <?php foreach($gejala[$p->id] as $g): ?>
                                <tr>
                                    <td><?=$g->nama?></td>
                                    <?php foreach($gejala[$p->id] as $g1): ?>
                                    <?php if($g->id == $g1->id): ?>
                                    <td style="text-align:center">1</td>
                                    <?php else: ?>
                                    <td><input type="text" name="bobot[<?=$g->id?>][<?=$g1->id?>]" id="bobot-<?=$g->id?>-<?=$g1->id?>" class="form-control" onchange="fillBobot(this.value, <?=$g->id?>,<?=$g1->id?>)"></td>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                            </table>
                            <?php endforeach ?>
                            <button class="btn btn-primary">Simpan Pembobotan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function fillBobot(val, g, g1)
    {
        var value = 1/val;
        document.querySelector('#bobot-'+g1+'-'+g).value = value
    }
    </script>
<?php load_templates('layouts/bottom') ?>