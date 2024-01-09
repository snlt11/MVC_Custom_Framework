<?php

namespace App\classes;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler
{
    public function __construct(){
        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }

}