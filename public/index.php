<?php

use App\classes\Mail;

require_once "../bootstrap/init.php";

$mailer = new Mail();
if($mailer->send()){
    echo "Mail sent successfully";
}else{
    echo "Mail failed";
}