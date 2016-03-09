<?php

namespace App\Controllers\Admin;

/**
* Контроллер для новостей в админке
*/
class News extends \App\Controllers\Admin\Controller
{
    /**
	* Экшен по умолчанию
    */	
    protected function actionIndex()
    {
        $this->actionList();
    }
	
    /**
	* Экшен для списка новостей	
    * Выдает 4 последние новости в обратном порядке
    */	
    protected function actionList()
    {
		$articles = \App\Models\Article::findLast(4);
        $functions = [
		    function($model){ 
                return '<a href="/admin/News/Edit?id='.$model->id.'">'.$model->id.'</a>';
            },
		    function($model){ 
                return $model->title;
            },
		    function($model){ 
                return $model->author->name;
            },
		    function($model){ 
                return '<a href="/admin/News/Delete?id='.$model->id.'">Удалить</a>';
            }			
		];		
		$this->view->table = (new \App\AdminDataTable($articles, $functions))->render();
        $this->view->display(__DIR__.'/../../templates/admin/news/tmp_news.php');		
    }

    /**
    * Экшен для редактирования новости
    */
    protected function actionEdit()
    {
        $article = \App\Models\Article::giveOne($_GET['id']);
        if (false === $article) {
            throw new \App\Exceptions\ObjectNotFound('Запрашиваемый объект не найден');
        }
        $this->view->article = $article;	
        $this->view->authors = \App\Models\Author::findAll();		
        $this->view->display(__DIR__.'/../../templates/admin/news/tmp_edit.php');
    }

	/**
    * Экшен для сохранения новости
    */
    protected function actionSave()
    {
        $article = \App\Models\Article::giveOne($_POST['id']);
        if (false === $article) {
            throw new \App\Exceptions\ObjectNotFound('Запрашиваемый объект не найден');
        }		
        $article->fill($_POST);
        $article->author = \App\Models\Author::giveOne($_POST['author_id']);
        try {	
		    $article->save();
		    $this->redirect('/admin');
        }
        catch (\App\MultiException $ex) {
            $this->view->article = $article;
            $this->view->authors = \App\Models\Author::findAll();			
            $this->view->errors = $ex;
            $this->view->display(__DIR__.'/../../templates/admin/news/tmp_edit.php');			
        }		
    }	

	/**
    * Экшен для удаления новости
    */	
    protected function actionDelete()
    {
        $article = \App\Models\Article::giveOne($_GET['id']);
        if (false === $article) {
            throw new \App\Exceptions\ObjectNotFound('Запрашиваемый объект не найден');
        }		
	    $article->delete();  		
        $this->redirect('/admin');
    }	
}

?>