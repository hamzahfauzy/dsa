<?php

$user = auth()->user;
if(get_role($user->id)->role_id == 2)
{
    unset($fields['user_id']);
}

return $fields;