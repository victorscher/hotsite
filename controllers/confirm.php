<?php
$app['database']->update('users', 'confirmed', 'true', 'unique_id', $_GET['confirmKey']);

require 'views/confirm.view.php';