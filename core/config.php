<?php

return [
  'database' => [
    'name' => 'hotsiteffwd',
    'username' => 'hotsiteffwd',
    'password' => 'Q0pfsgdzo*',
    'connection' => 'pgsql:host=hotsiteffwd.postgresql.dbaas.com.br',
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