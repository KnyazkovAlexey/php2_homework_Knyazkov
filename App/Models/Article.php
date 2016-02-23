<?php

namespace App\Models;

class Article extends Model{

    const TABLE = 'news';
	
	public $title;
    public $content;
	public $author_id;	

	public function __get($k)
	{
		switch($k){
			case 'author':
                return Author::findById($this->author_id);
			    break;
            default:
                return null;			
		}
	}

	public function __isset($k)
	{
		switch($k){
			case 'author':
                return !empty($this->author_id);
			    break;
            default:
                return false;				
		}
	}
	
	public function __set($k, $v)
	{
		switch($k){
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
		if(trim($this->title) == ''){
			$ex[] = new \Exception('Название не должно быть пустым!');
		}		
		if(trim($this->content) == ''){
			$ex[] = new \Exception('Текст не должен быть пустым!');
		}
		if(count($ex)){
			throw $ex;		
		}
	}	
}

?>