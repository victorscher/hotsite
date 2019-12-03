<?php
class QueryBuilder {
  
  protected $pdo;

  public function __construct($pdo){
    $this->pdo = $pdo;
  }

  public function insert($table, $values){
    foreach($values as $key => $value){
      
    }
  }
}