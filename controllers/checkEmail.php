<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($data['email'] != ''){
  $app['database']->select('users', 'email', $data['email']);
}
