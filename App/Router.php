<?php

namespace App;

class Router{

	/** 
	* Вызывает запрашиваемый экшен или бросает исключение, если экшен не найден
	*/
    public function route(){
		$names = $this->parse();		
        $controllerName = $names['controllerName'];				
        $actionName = $names['actionName']; 
        if(!class_exists($controllerName)){
			throw new \App\Exceptions\PageNotFound('Запрашиваемая страница не существует');
        }
        else{
	        $controller = new $controllerName();
            $controller->action($actionName);			
        }
	}
	
	/** 
	* Разбирает REQUEST_URI на имя контроллера и имя экшена
	*/
	protected function parse(){
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];							
	    $path_parts = array_filter(explode('/', $path));
		$namespace = '\App\Controllers';
		foreach($path_parts as $k => $v){
			if('admin' == $v){
			    $namespace = '\App\Controllers\Admin';
				unset($path_parts[$k]);				
			}
		}
		$actionName = array_pop($path_parts) ?: 'Index'; 
        $controllerName = $namespace.'\\'.(implode('\\', $path_parts) ?: 'News');		
        return ['controllerName' => $controllerName, 'actionName' => $actionName];		
	}
}

?>