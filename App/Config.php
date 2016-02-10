<?php

namespace App;

class Config{

	use Singleton;

    public $data = [
	    'db' => [
	        'host' => 'localhost',
		    'dbname' => 'test',
		    'username' => 'root',
		    'password' => ''
        ]	
	];
}

?>