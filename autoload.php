<?php

function __autoload ($className){ 
    $path = __DIR__.'/'.str_replace('\\', '/', $className).'.php';
	if(file_exists($path)){
		require $path;
		return true;
	}
	return false;
}