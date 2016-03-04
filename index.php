<?php

require __DIR__.'/autoload.php';

try {
    (new \App\Router)->route();
}
catch (\App\Exceptions\Db $ex) {
    (new \App\Controllers\Error)->actionDb($ex->getMessage());
    (new \App\Logger)->log($ex);				
}
catch (\App\Exceptions\ObjectNotFound $ex) {
    (new \App\Controllers\Error)->action404($ex->getMessage());
    (new \App\Logger)->log($ex);				
}
catch (\App\Exceptions\PageNotFound $ex) {
    (new \App\Controllers\Error)->action404($ex->getMessage());				
}

	