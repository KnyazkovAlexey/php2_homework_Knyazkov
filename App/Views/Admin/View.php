<?php

namespace App\Views\Admin;

/**
* Класс для работы с представлениями
*/
class View extends \App\Views\BaseView
{
	/**
	* Подключение шаблонизатора Twig
	*/	
    public function __construct()
    {
	    $config = \App\Config::instance();		
        $templates_dir = $config->data['templates']['dir'];		
        $loader = new \Twig_Loader_Filesystem($templates_dir);
        $this->twig = new \Twig_Environment($loader);
    }
	
	/**
	* Метод подготавливает шаблон, заполняя его серверными данными
	*/
    public function render($template)
    {
        ob_start();
        foreach ($this->data as $property => $value) {
            $$property = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }	
}

