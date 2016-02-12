<?php

namespace App\Controllers\Admin;

class News extends \App\Controllers\Controller{
	
    protected function actionIndex(){
        $this->view->articles = \App\Models\Article::findLast(4);			
        $this->view->display(__DIR__.'/../../templates/admin/news/tmp_news.php');
	}

    protected function actionEdit(){
        if (isset($_GET['id'])){
            $this->view->article = \App\Models\Article::findById((int)$_GET['id']);	
        }
        else {
	        $this->view->article = new \App\Models\Article();
        }
        $this->view->authors = \App\Models\Author::findAll();		
        $this->view->display(__DIR__.'/../../templates/admin/news/tmp_edit.php');
	}

	protected function actionSave(){
        if (!empty($_POST['id'])){
            $article = \App\Models\Article::findById((int)$_POST['id']);	
        }
        else {	
	        $article = new \App\Models\Article();
        }
        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        if (!empty($_POST['author_id'])){
            $article->author = \App\Models\Author::findById((int)$_POST['author_id']);
        }		
        else{
	        $article->author_id = null;
        }	
        $article->save();
		header('Location: /admin/?ctrl=Admin\News');
	}	
	
    protected function actionDelete(){
        if (!empty($_GET['id'])){
            $article = \App\Models\Article::findById((int)$_GET['id']);	
	        $article->delete();
        }		
        header('Location: /admin/?ctrl=Admin\News');	
	}	
}

?>