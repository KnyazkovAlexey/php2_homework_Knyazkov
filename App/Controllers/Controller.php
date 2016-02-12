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
		return $this->$methodName();
	}
}

?>