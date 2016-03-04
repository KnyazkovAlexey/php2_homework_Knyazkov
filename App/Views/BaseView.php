<?php

namespace App\Views;

/**
* Класс для работы с представлениями
*/
abstract class BaseView
{
    use \App\MagicMethods;	

	/**
	* Метод подготавливает шаблон, заполняя его серверными данными
	*/
    abstract public function render($template);
	
	/**
	* Метод подготавливает и отображает шаблон
	*/	
    public function display($template)
    {
        echo $this->render($template);
    }	
}

