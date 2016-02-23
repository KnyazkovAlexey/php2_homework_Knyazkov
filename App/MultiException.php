<?php

namespace App;

/** 
* Массив исключений, сам также являющийся исключением. Используется для сбора и обработки сразу нескольких исключений
*/
class MultiException extends \Exception
    implements \ArrayAccess, \Iterator, \Countable
{
	use \App\Collection;
}

?>