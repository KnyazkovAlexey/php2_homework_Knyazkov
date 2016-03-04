<?php

namespace App\Controllers;

/**
* Контроллер для вывода ошибок
*/	
class Error extends \App\Controllers\Controller
{
	/**
    * Экшен для ошибок БД
    */	
    public function actionDb($error_message)
    {
        $this->view->display('header.html');				
        $this->view->message = $error_message;			
        $this->view->display('/errors/tmp_db.php');
    }
	
	/**
    * Экшен для ошибок "Объект не найден" и "Страница не найдена"
    */
    public function action404($error_message)
    {
        $this->view->display('header.html');						
        $this->view->message = $error_message;					
        $this->view->display('/errors/tmp_404.php');
    }	
}

