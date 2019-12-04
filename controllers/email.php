<?php 

require 'vendor/autoload.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$email = new Email($app["config"]["email"]);

$email->add(
  'Confirmação de cadastro FFWD', 
  'Click no link para confirmar o seu cadastro <a href="http://localhost:8000/confirm?confirmKey='.$data['unique_id'].'">http://localhost:8000/confirm?confirmKey='.$data['unique_id'].'</a>',
  $data['name'],
  $data['email']
)->send();

if(!$email->error()){
  var_dump(true);
}else{
  echo $email->error()->getMessage();
}