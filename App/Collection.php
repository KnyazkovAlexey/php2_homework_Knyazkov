<?php

namespace App;

/** 
* Реализует методы интерфейсов ArrayAccess, Iterator и Countable
*/
trait Collection {

    protected $data = [];
	
    public function offsetExists($offset){
        return array_key_exists($this->data[$offset]);
	}

    public function offsetGet($offset){
        return $this->data[$offset];
	}

    public function offsetSet($offset, $value){
		if('' == $offset){
			$this->data[] = $value;
		}
		else{
			$this->data[$offset] = $value;
		}
	}

    public function offsetUnset($offset){
        unset($this->data[$offset]);
	}	

    public function current(){
        return current($this->data);
	}	

    public function next(){
        return next($this->data);
	}		

    public function key(){
        return key($this->data);
	}

    public function valid(){
        return false !== current($this->data);
	}	

    public function rewind(){
        reset($this->data);
	}	

    public function count(){
        return count($this->data);
	}		
}

?>