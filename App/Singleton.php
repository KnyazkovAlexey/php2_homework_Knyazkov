<?php

namespace App;

/** 
* Заготовка для классов, которые могут иметь только один объект
*/
trait Singleton
{
    protected static $instance = null;
	
    protected function __construct()
    {
		
    }
	
    /** 
    * Возвращает новый объект, либо уже существующий, если он есть
    */	
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }	
}

