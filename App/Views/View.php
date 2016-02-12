<?php

namespace App\Views;

class View{
	
    use \App\MagicMethods;	

	/**
	* Метод подготавливает шаблон, заполняя его серверными данными
	* @param string $template Путь к шаблону
	* @return string Подготовленный шаблон
	*/
	public function render($template){
		ob_start();
		foreach ($this->data as $property => $value){
			$$property = $value;
		}
		include $template;
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	
    public function display($template){
		echo $this->render($template);
	}	
}

?>