<?php

if(is_allowed('penilaian/view',auth()->user->id)):
    return '<a href="'.routeTo('penilaian/view',['id'=>$d->id]).'" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Lihat</a>';
endif;
return '';