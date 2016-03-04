<?php

spl_autoload_register(function($className){ 
    $filename = __DIR__.'/'.str_replace('\\', '/', $className).'.php';
	if (file_exists($filename)) {
		include $filename;
	}
});

include __DIR__.'/vendor/autoload.php';
