<?php

require __DIR__.'/../autoload.php';

$config = \App\Config::instance();
$config2 = \App\Config::instance();
assert($config === $config2);
	