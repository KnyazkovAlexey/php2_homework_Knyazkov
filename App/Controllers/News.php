<?php

namespace App\Controllers;

/**
* Контроллер для новостей
*/
class News extends \App\Controllers\Controller
{
    /**
	* Экшен по умолчанию
    */		
    protected function actionIndex()
    {
        $this->actionList();
    }
	
    /**
    * Экшен для одной новости
    */
    protected function actionOne()
    {
        $article = \App\Models\Article::findById($_GET['id']);
        if (false === $article) {
            throw new \App\Exceptions\ObjectNotFound('Запрашиваемый объект не найден');
        }
        $this->view->article = $article;			
	    $this->view->display('/news/tmp_article.php');	
    }
	
    /**
	* Экшен для списка новостей
    * Выдает 4 последние новости в обратном порядке
    */
    protected function actionList()
    {
        $this->view->articles = \App\Models\Article::findLast(4);			
        $this->view->display('/news/tmp_news.php');		
    }	
}

