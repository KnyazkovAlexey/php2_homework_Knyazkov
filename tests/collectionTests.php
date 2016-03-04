<?php

require __DIR__.'/../autoload.php';

$coll = new \App\MultiException();
$coll[1] = 'one';
$coll[2] = 'two';
$coll[3] = 'three';
$coll[] = 'four';
assert(count($coll) == 4);
$res = '';
foreach($coll as $value){
	$res = $res.$value.';';
}
assert($res == 'one;two;three;four;');
