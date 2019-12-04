<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$app['database']->insert('users', $data);
