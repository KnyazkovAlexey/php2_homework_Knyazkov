<?php

require __DIR__.'/../autoload.php';

class Collection
    implements \ArrayAccess, \Iterator, \Countable
{
	use \App\Collection;
}

$coll = new Collection();
$coll[1] = 'one';
$coll[2] = 'two';
$coll[3] = 'three';
$coll[] = 'four';
assert(count($coll) == 4);
$s = '';
foreach($coll as $value){
	$s = $s.$value.';';
}
assert($s == 'one;two;three;four;');
