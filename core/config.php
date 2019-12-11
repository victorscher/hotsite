<?php

return [
  'database' => [
    'name' => '',       // Nome da base dados
    'username' => '',   // Usuário
    'password' => '',   // Senha
    'connection' => '', // Endereço do host  
    'port' => '5432',   // Porta
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'email' => [
    'host' => '',       // Endereco do host do servidor SMTP  
    'port' => '',       // Porta  
    'user' => '',       // Usuário 
    'passwd' => '',     // Senha 
    'from_name' => '',  // Nome do remerente
    'from-email' => ''  // E-mail do remetente
    ]
  ];