<?php

namespace App\Controllers\Admin;

/**
* Контроллер для вывода ошибок в админке
*/	
class Error extends \App\Controllers\Admin\Controller
{
	/**
    * Экшен для ошибок БД
    */	
    public function actionDb($error_message){
        $this->view->display(__DIR__.'/../../templates/admin/header.html');		
        $this->view->message = $error_message;			
        $this->view->display(__DIR__.'/../../templates/errors/tmp_db.php');
    }

	/**
    * Экшен для ошибок "Объект не найден" и "Страница не найдена"
    */
    public function action404($error_message){
        $this->view->display(__DIR__.'/../../templates/admin/header.html');				
        $this->view->message = $error_message;					
        $this->view->display(__DIR__.'/../../templates/errors/tmp_404.php');
    }	
}

