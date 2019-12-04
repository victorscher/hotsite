<?php

use Exeption;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
  private $mail;

  private $data;

  private $error;

  public function __construct($mail){
    $this->mail = new PHPMailer(true);
    $this->data = new stdClass();
    
    $this->mail->isSMTP();
    $this->mail->isHTML();
    $this->mail->setLanguage('br');

    $this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = 'tls';
    $this->mail->CharSet = "UTF-8";

    $this->mail->Host = $mail["host"];
    $this->mail->Port = $mail["port"];
    $this->mail->Username = $mail["user"];
    $this->mail->Password = $mail["passwd"];
  }

  public function add(string $subject, string $body, string $recipient_name, string $recipient_email): Email
  {
    $this->data->subject = $subject;
    $this->data->body = $body;
    $this->data->recipient_name = $recipient_name;
    $this->data->recipient_email = $recipient_email;

    return $this;
  }

  public function send(string $from_name = 'Victor Scher', $from_email = 'victorscher92@gmail.com'){
    try{
      $this->mail->Subject = $this->data->subject;
      $this->mail->msgHTML($this->data->body);
      $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_name);
      $this->mail->setFrom($from_email, $from_name);

      $this->mail->send();
    }catch(Exception $e){
      $this->error = $e;
      return false;
    }
  }

  public function error(){
    return $this->error;
  }

}