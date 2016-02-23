<?php

namespace App\Controllers;

class Error extends Controller{
	
    public function actionDb($error_message){
        $this->view->display(__DIR__.'/../templates/header.html');				
		$this->view->message = $error_message;			
        $this->view->display(__DIR__.'/../templates/errors/tmp_db.php');
	}

    public function action404($error_message){
        $this->view->display(__DIR__.'/../templates/header.html');						
		$this->view->message = $error_message;					
        $this->view->display(__DIR__.'/../templates/errors/tmp_404.php');
	}	
}

?>