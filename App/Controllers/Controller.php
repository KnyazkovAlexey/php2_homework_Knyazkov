<?php

namespace App\Controllers;

abstract class Controller{

    protected $view;

    public function __construct(){
		$this->view = new \App\Views\View();
	}

	/**
	* Прокси-метод, позволяющий реализовывать дополнительную логику для всех экшенов
	*/
    public function action($action){
        $methodName = 'action'.$action;
        if(!method_exists($this, $methodName)) {
			throw new \App\Exceptions\PageNotFound('Запрашиваемая страница не существует');
        }
		return $this->$methodName();
	}

	/**
	* Обновление страницы
	*/
    public function refresh()
    {
        header('location: '.$_SERVER['REQUEST_URI']);
    }

	/**
	* Перенаправление пользователя на указанный url
	*/	
    public function redirect($url)
    {
        header('location: '.$url);
    }		
}

?>