<?php

namespace App\Views;

/**
* Класс для работы с представлениями
*/
class View extends \App\Views\BaseView
{
	protected $twig = null;

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
	    $template = $this->twig->loadTemplate($template);
		return $template->render($this->data);
    }
}

