<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Buat Penilaian DSA Baru</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data penilaian</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?=routeTo('crud/index',['table'=>'penilaian'])?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <?php if($error_msg): ?>
            <div class="alert alert-danger"><?=$error_msg?></div>
            <?php endif ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row row-card-no-pd">
                <?php foreach($gejala as $index => $g): ?>
                <div class="col-md-12 <?=$index>0?'d-none':''?>" id="gejala-<?=$g->id;?>">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h1><?=$g->nama?></h1>
                                <div class="form-group">
                                    <?php foreach($pilihan as $p): ?>
                                    <label for="radio-<?=$g->id?>-<?=$p->id?>" class="mr-3 btn btn-primary text-white">
                                        <input type="radio" value="<?=$p->skor?>" name="penilaian[<?=$g->id?>][<?=$p->id?>]" id="radio-<?=$g->id?>-<?=$p->id?>" onchange="nextGejala(<?=$g->id?>, <?=isset($gejala[$index+1])?$gejala[$index+1]->id:-1?>)" style="opacity:0;margin-right:-20px;">
                                        <?=$p->nama?>
                                    </label>
                                    <?php endforeach ?>
                                </div>
                            </center>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-block" type="button" onclick="nextGejala(<?=$g->id?>, <?=isset($gejala[$index+1])?$gejala[$index+1]->id:-1?>)">Lewati</button>
                </div>
                <?php endforeach ?>
            </div>
            <button class="btn btn-primary btn-block btn-submit" style="opacity:0;">Submit</button>
            </form>
        </div>
    </div>
    <script>
    function nextGejala(curr_id, next_id)
    {
        if(next_id == -1)
        {
            document.querySelector('.btn-submit').click();
            return;
        }
        var CurrGejalaEl = document.querySelector('#gejala-'+curr_id)
        CurrGejalaEl.classList.add('d-none')
        var NextGejalaEl = document.querySelector('#gejala-'+next_id)
        NextGejalaEl.classList.remove('d-none')
    }

    function doNext()
    {
        
    }
    </script>
<?php load_templates('layouts/bottom') ?>