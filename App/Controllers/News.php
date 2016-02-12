<?php

namespace App\Controllers;

class News extends Controller{
	
    protected function actionIndex(){
        $this->view->articles = \App\Models\Article::findLast(4);			
        $this->view->display(__DIR__.'/../templates/news/tmp_news.php');
	}

    protected function actionOne(){
        $this->view->article = \App\Models\Article::findById((int)$_GET['id']);			
        $this->view->display(__DIR__.'/../templates/news/tmp_article.php');
	}	
}

?>