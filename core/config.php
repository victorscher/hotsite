<?php

return [
  'database' => [
    'name' => 'hotsite',
    'username' => 'postgres',
    'password' => 'postgres',
    'connection' => 'pgsql:host=127.0.0.1',
    'port' => '5432',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'email' => [
    'host' => 'smtp.sendgrid.net',
    'port' => '587',
    'user' => 'apikey',
    'passwd' => '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',
    'from_name' => 'Victor Scher',
    'from-email' => 'victorscher92@gmail.com' 
    ]
  ];