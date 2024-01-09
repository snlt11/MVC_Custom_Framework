<?php

 require_once "../bootstrap/init.php";

use Illuminate\Database\Capsule\Manager as Capsule;
$user = capsule::table('users')->where('id',1)->get();
print_r($user);