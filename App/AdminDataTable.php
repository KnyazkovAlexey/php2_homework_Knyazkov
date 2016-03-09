<?php

namespace App;

/** 
* Класс принимает массив моделей и массив функций
* Класс создает таблицу, последовательно применяя функции к моделям
*/
class AdminDataTable
{
    protected $models = null;
    protected $functions = null;
	
    /** 
    *  Принимает массив моделей для строк таблицы и массив функций для столбцов
    */
    public function __construct($models, $functions)
    {
        $this->models = $models;
        $this->functions = $functions;		
    }
	
    /** 
    * Возвращает таблицу
    */
    public function render()
    {
	    $view = new \App\Views\Admin\View();
		$view->models = $this->models;
		$view->functions = $this->functions;
        return $view->render(__DIR__.'/templates/admin/tmp_admin_data_table.php');		
    }
}

