<?php

require __DIR__.'/../autoload.php';

$db = new \App\Db();

$good_res1 = $db->query('SELECT * FROM users WHERE id >= :id', '\App\Models\User', [':id' => 1]);
$good_res2 = $db->query('SELECT * FROM users', '\App\Models\User');
$bad_res = $db->execute('Happy New Year!');

assert($good_res1 && $good_res2 && !$bad_res);

