<?php

namespace App;

class Db {

    use Singleton;

    protected $dbh;
	
    public function __construct(){
		$config = \App\Config::instance();

		$host = $config->data['host'];
		$dbname = $config->data['dbname'];
		$username = $config->data['username'];
		$password = $config->data['password'];
		
	    $this->dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
	}
	
	public function execute($sql, array $data=[]){
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($data);
		return $res;
	}
	
	public function query($sql, $className, array $data=[]){
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($data);
		if (false !== $res){
			return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
		}
		return [];
	}
	
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
}
