<?php

namespace App\Controllers\Admin;

class Error extends \App\Controllers\Controller{
	
    public function actionDb($error_message){
        $this->view->display(__DIR__.'/../../templates/admin/header.html');		
		$this->view->message = $error_message;			
        $this->view->display(__DIR__.'/../../templates/errors/tmp_db.php');
	}

    public function action404($error_message){
        $this->view->display(__DIR__.'/../../templates/admin/header.html');				
		$this->view->message = $error_message;					
        $this->view->display(__DIR__.'/../../templates/errors/tmp_404.php');
	}	
}

?>