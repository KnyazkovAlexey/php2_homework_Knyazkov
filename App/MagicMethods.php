<?php

namespace App;

/** 
* Используется для работы с недоступными свойствами объектов
*/
trait MagicMethods{

    protected $data = [];
	
	/**
	* Метод, автоматически вызываемый при присвоить значение недоступному свойству объекта
	* Метод записывает значение свойства в массив $data с ключом, соответствующим названию свойства
	*/	
	public function __set($k, $v)
	{
		$this->data[$k] = $v;
	}
	
	/**
	* Метод, автоматически вызываемый при попытке получить значение недоступного свойства объекта
	* Метод возвращает значение из массива $data по ключу, соответствующему названию свойства
	*/
	public function __get($k)
	{
		return $this->data[$k];
	}

	/**
	* Метод, автоматически вызываемый при проверке на существование недоступного свойства объекта
	* @return boolean Наличие элемента с соответствующим индексом в массиве $data и непустота этого элемента
	*/
    public function __isset($property) {
        return $this->$property == true;
    }
}

?>