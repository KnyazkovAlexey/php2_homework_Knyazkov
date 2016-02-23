<?php

namespace App\Models;

abstract class Model {

    const TABLE = '';
	
	public $id;
	protected $isDeleted = false;	

	/**
	* @return array Все записи таблицы TABLE в виде списка объектов соответствующего класса
	*/	
	public static function findAll(){
		$db = \App\Db::instance();
        return $db->query(
            'SELECT * FROM '.static::TABLE,
	        static::class
        );
	}

	/**
	* Метод возвращает запись по указанному id в виде объекта соответствующего класса, либо false, если запись не найдена 
	*/		
	public static function findById($id){
		$db = \App\Db::instance();
        $res = $db->query(
            'SELECT * FROM '.static::TABLE.' WHERE id=:id',
	        static::class,
			[':id' => (int)$id]
        );
		if ($res){
			return $res[0];
		}
		else {
			throw new \App\Exceptions\ObjectNotFound('Запрашиваемый объект не найден');
		}
	}

	/**
	* @return array Требуемое количество последних записей таблицы TABLE в виде списка объектов соответствующего класса
	*/		
	public static function findLast($count){
		$db = \App\Db::instance();
        return $db->query(
            'SELECT * FROM '.static::TABLE.' ORDER BY id DESC LIMIT 0, '.(int)$count,
	        static::class
        );
	}

	public function isNew(){
		return empty($this->id);
	}

	public function isDeleted(){
		return $this->isDeleted;
	}	
	
	protected function insert(){
		if(!$this->isNew()){
			return;
		}	
        $columns = [];
		$values = [];
		foreach($this as $k => $v){
			if('isDeleted' == $k){
				continue;
			}			
			if('id' == $k){
				continue;
			}
			$columns[] = $k;
			$values[':'.$k] = $v;
		}
		$sql = 'INSERT INTO '.static::TABLE.' ('.implode(',', $columns).') VALUES ('.implode(',', array_keys($values)).')';
		$db = \App\Db::instance();
		$res = $db->execute($sql, $values);
		if($res){
			$this->id = $db->lastInsertId();
		}
		return $res;
	}
	
	protected function update(){
        $columns = [];
		$values = [];		
		foreach($this as $k => $v){
			if('isDeleted' == $k){
				continue;
			}			
			$values[':'.$k] = $v;
			if('id' == $k){
				continue;
			}
			$columns[] = $k.'=:'.$k;			
		}		
		$sql = 'UPDATE '.static::TABLE.' SET '.implode(',', $columns).' WHERE id=:id';       
		$db = \App\Db::instance();
		$res = $db->execute($sql, $values);	
		return $res;
	}

	/**
	* Метод обновляет запись в БД, либо создаёт её, если она новая 
	*/
    public function save(){
		if ($this->isDeleted()){
			return false;
		}
		if(method_exists($this, 'validate')) {
            $this->validate();
        }
        if ($this->isNew()) {
            $res = $this->insert();
        } else {
            $res = $this->update();
        }
        return $res;
    }
	
    public function delete(){
		if ($this->isNew() || $this->isDeleted()){
			return false;
		}
        $sql = 'DELETE FROM '.static::TABLE.' WHERE id=:id;';
        $data = [':id' => $this->id];
        $db = \App\Db::instance();
        $res = $db->execute($sql, $data);
		if ($res){
			$this->isDeleted = true;
		}
        return $res;
    }

	public function giveOne($id){
        if (!empty($id)){
            return static::findById($id);	
        }
        else {	
	        return new static();
        }
	}
	
    public function fill(array $properties){
		foreach($this as $k => $v){
			if(in_array($k, ['id', 'isDeleted'])){
				continue;
			}
            if(in_array($k, array_keys($properties))){
				$this->{$k} = $properties[$k];
			}			
		}
	}	
}

