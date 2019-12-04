<?php 
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$app['database']->select('users', 'unique_id', $data['indicator']);