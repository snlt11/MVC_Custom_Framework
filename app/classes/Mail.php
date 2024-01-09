<?php

namespace App\classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private $mail;
    public function __construct(){
        $this->mail = new PHPMailer();
        $this->setUp();
    }
    public function setUp(){
        if(getenv('APP_ENV') == 'local'){
            $this->mail->SMTPDebug = 2;
        }
        $this->mail->isSMTP();
        $this->mail->Host       = getenv('SMTP_HOST');
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = getenv('EMAIL_USERNAME');
        $this->mail->Password   = getenv('EMAIL_PASS');
        $this->mail->Port       = getenv('SMTP_PORT');

        $this->mail->isHTML(true);
        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName ='TestMail';
    }


    public function send(){
        $this->mail->addAddress('asusvivobook@gmail.com', 'ASUS');
        $this->mail->Subject = 'Here is the subject';
        $this->mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        return $this->mail->send();
    }







}