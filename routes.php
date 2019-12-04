<?php
$router->get('', 'controllers/index.php');
$router->get('confirm', 'controllers/confirm.php');
$router->post('send', 'controllers/email.php');
$router->post('send/indicator', 'controllers/emailToIndicator.php');
$router->post('indicator', 'controllers/indicator.php');
$router->post('store', 'controllers/store.php');