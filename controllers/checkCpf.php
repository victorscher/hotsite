<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($data['cpf'] != ''){
  $app['database']->select('users', 'cpf', $data['cpf']);
}
