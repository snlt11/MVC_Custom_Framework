<?php

use App\Classes\Database;
use App\classes\ErrorHandler;

if(isset($SESSION)) session_start();

define('APP_ROOT',realpath(__DIR__.'/../'));
const URL_ROOT = 'http://127.0.0.1/E-Commerce/public/';
require_once APP_ROOT.'/vendor/autoload.php';
new ErrorHandler();
require_once APP_ROOT.'/app/config/_env.php';

new Database();

require_once APP_ROOT.'/app/routing/router.php';

