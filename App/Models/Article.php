<?php

namespace App\Models;

/**
* Модель для новостей
*/
class Article extends Model
{
    const TABLE = 'news';
	
    public $title = null;
    public $content = null;
    public $author_id = null;	

    /**
    * Метод, автоматически вызываемый при попытке получить значение недоступного свойства объекта
    * Используется для красивого обращения к автору новости
    */
    public function __get($k)
    {
        switch ($k) {
            case 'author':
                return Author::findById($this->author_id);
			    break;
            default:
                return null;			
        }
    }
	
    /**
    * Метод, автоматически вызываемый при проверке на существование недоступного свойства объекта
    * Используется для красивой проверки наличия автора у новости
    */
    public function __isset($k)
    {
        switch ($k) {
            case 'author':
                return !empty($this->author_id);
			    break;
            default:
                return false;				
        }
    }
	
    /**
    * Метод, автоматически вызываемый при присвоить значение недоступному свойству объекта
    * Используется для красивого назначения автора новости
    */		
    public function __set($k, $v)
    {
        switch ($k) {
            case 'author':
			    $this->setAuthor($v);
            break;	
        }
    }	

    /**
    * Метод назначает автора данной новости
    */		
    public function setAuthor(\App\Models\Author $author)
    {
        $this->author_id = $author->id;
    }

    /**
    * Валидация свойств, используется перед сохранением модели
    */
    public function validate()
    {
        $ex = new \App\MultiException();
        if (trim($this->title) == '') {
            $ex[] = new \Exception('Название не должно быть пустым!');
        }		
        if (trim($this->content) == '') {
            $ex[] = new \Exception('Текст не должен быть пустым!');
        }
        if (count($ex)) {
            throw $ex;		
        }
    }	
}

