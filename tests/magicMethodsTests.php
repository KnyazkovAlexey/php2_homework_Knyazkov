<?php

require __DIR__.'/../autoload.php';

$test = new \App\Views\View();
$test->unreal_property = 10;
assert(isset($test->unreal_property));	
assert($test->unreal_property === 10);