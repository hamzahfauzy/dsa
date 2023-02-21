<?php

if(get_role(auth()->user->id)->role_id == '2')
{
    $testimoni = $db->exists('testimoni',['user_id' => auth()->user->id]);
    if($testimoni)
    {
        header('location:'.routeTo('testimoni/view'));
    }
    else
    {
        header('location:'.routeTo('crud/create',['table'=>'testimoni']));
    }
    die;
}

return $fields;