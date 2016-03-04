<?php

namespace App;

/** 
* Конфигурация приложения
*/
class Config
{
	use Singleton;

    public $data = [
	    'db' => [
	        'host' => 'localhost',
		    'dbname' => 'test',
		    'username' => 'root',
		    'password' => ''
        ],
	    'log' => [
	        'file' => __DIR__.'/../log.txt'		
        ],
	    'templates' => [
	        'dir' => __DIR__.'/templates/'		
        ]		
	];
}

