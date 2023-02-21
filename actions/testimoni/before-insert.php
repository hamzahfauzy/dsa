<?php

$user = auth()->user;
$_POST[$table]['user_id'] = $user->id;
