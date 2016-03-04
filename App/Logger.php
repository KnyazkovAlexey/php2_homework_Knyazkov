<?php

namespace App;

/** 
* Записывает в файл информацию об ошибках приложения
*/
class Logger
{
    protected $file = null;

    /** 
    * Получение пути к файлу с логами
    */	
    public function __construct()
    {
	    $config = \App\Config::instance();		
        $this->file = $config->data['log']['file'];
    }

    /** 
    * Запись в файл информации о переданном исключении
    */	
    public function log(\Exception $ex)
    {
        $log_info = [
		    'date' => date("Y-m-d H:i:s"),
			'class' => get_class($ex),
			'message' => $ex->getMessage(),
			'file' => $ex->getFile(),
			'line' => 'строка '.$ex->getLine()
        ];
        $record = implode(' ', array_values($log_info))."\n";
        $f = fopen($this->file, 'a');
        fwrite($f, $record);
        fclose($f);		
    }
}

