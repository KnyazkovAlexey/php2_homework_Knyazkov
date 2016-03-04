<?php

namespace App;

/** 
* Класс для работы с БД
*/
class Db
{
    use Singleton;

    protected $dbh = null;

    /** 
    * Установка соединения с БД
    */	
    public function __construct()
    {
        $config = \App\Config::instance();
        foreach ($config->data['db'] as $property => $value) {
            $$property = $value;
        }		
        $dsn = 'mysql:host='.$host.';dbname='.$dbname;
        try {
            $this->dbh = new \PDO($dsn, $username, $password);
        }
        catch (\PDOException $e){
            throw new \App\Exceptions\Db('Нет соединения с БД');
        }
    }
	
    /** 
    * Выполняет запрос к БД
    */	
    public function execute($sql, array $data=[])
	{
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (!$res) {
            throw new \App\Exceptions\Db('Ошибка запроса в БД');			
        }
        return $res;
    }
	
    /** 
    * Выполняет запрос к БД, возвращает результат в виде массива объектов нужного класса
    */		
    public function query($sql, $className, array $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (!$res) {
            throw new \App\Exceptions\Db('Ошибка запроса в БД');						
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    /** 
    * Возвращает id последней вставленной записи
    */	
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

