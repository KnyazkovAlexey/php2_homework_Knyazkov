<?php

namespace App;

/** 
* Записывает в файл информацию об ошибках приложения
*/
class Logger{
	
	protected $file;

    /** 
    * Получение пути к файлу с логами
    */	
	public function __construct(){
		$config = \App\Config::instance();		
		$this->file = $config->data['log']['file'];
	}

    /** 
    * Запись в файл информации о переданном исключении
    */	
    public function log(\Exception $ex){
		$record = date("Y-m-d H:i:s").' '.get_class($ex).' '.$ex->getMessage().' '.$ex->getFile().' строка '.$ex->getLine()."\n";
        $f = fopen($this->file, 'a');
        fwrite($f, $record);
        fclose($f);		
	}
}

?>