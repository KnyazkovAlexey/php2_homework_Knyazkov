<?php

namespace App\Controllers\Admin;

class News extends \App\Controllers\Controller{

    protected function actionIndex(){
        $this->actionList();
	}
	
    protected function actionList(){
        $this->view->articles = \App\Models\Article::findLast(4);			
        $this->view->display(__DIR__.'/../../templates/admin/news/tmp_news.php');
	}

    protected function actionEdit(){
		$this->view->article = \App\Models\Article::giveOne($_GET['id']);
        $this->view->authors = \App\Models\Author::findAll();		
        $this->view->display(__DIR__.'/../../templates/admin/news/tmp_edit.php');
	}

	protected function actionSave(){
        $article = \App\Models\Article::giveOne($_POST['id']);		
		$article->fill($_POST);
		$article->author = \App\Models\Author::giveOne($_POST['author_id']);
		try{	
		    $article->save();
		    $this->redirect('/admin');
		}
        catch(\App\MultiException $ex){
			$this->view->article = $article;
            $this->view->authors = \App\Models\Author::findAll();			
			$this->view->errors = $ex;
            $this->view->display(__DIR__.'/../../templates/admin/news/tmp_edit.php');			
		}		
	}	
	
    protected function actionDelete(){
        $article = \App\Models\Article::giveOne($_GET['id']);
	    $article->delete();  		
		$this->redirect('/admin');
	}	
}

?>