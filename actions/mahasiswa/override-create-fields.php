<?php
unset($fields['user_id']);
return array_merge($fields, [
    'username' => [
        'label' => 'Username',
        'type' => 'text'
    ],
    'password' => [
        'label' => 'Password',
        'type' => 'password'
    ],
]);