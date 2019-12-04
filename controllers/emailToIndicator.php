<?php 

require 'vendor/autoload.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$email = new Email($app["config"]["email"]);

$email->add(
  'Indicação FFWD', 
  'Parabéns, você indicou '.$data['indicado'].' para a nossa newsletter!',
  $data['name'],
  $data['email']
)->send();

if(!$email->error()){
  var_dump(true);
}else{
  echo $email->error()->getMessage();
}