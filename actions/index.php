<?php

$conn = conn();
$db   = new Database($conn);


$db->query = "SELECT testimoni.*, users.name FROM testimoni JOIN users ON users.id = testimoni.user_id";
$testimoni = $db->exec('all');

return compact('testimoni');
