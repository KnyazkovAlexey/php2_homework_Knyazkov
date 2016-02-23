<?php

namespace App;

/** 
* Заготовка для классов, которые могут иметь только один объект
*/
trait Singleton{

	protected static $instance;
	
	protected function __construct(){
		
	}
	
    public static function instance(){
		if(null === static::$instance){
			static::$instance = new static;
		}
		return static::$instance;
	}	
}

?>