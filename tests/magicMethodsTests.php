<?php

require __DIR__.'/../autoload.php';

class Test {
	use \App\MagicMethods;
}

$test = new Test();
$test->unreal_property = 10;
assert(isset($test->unreal_property));	
assert($test->unreal_property === 10);