<?php
class QueryBuilder {
  
  protected $pdo;

  public function __construct($pdo){
    $this->pdo = $pdo;
  }

  public function select($table, $where, $condition){
    $sql = sprintf(
      "SELECT * FROM %s WHERE %s = '%s'",
      $table, 
      $where,
      $condition
    );

    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result[0]);
    echo $json;
  }

  public function update($table, $field, $value, $where, $condition){
      $sql = sprintf(
        "UPDATE %s SET %s = %s WHERE %s = '%s'",
        $table, 
        $field, 
        $value, 
        $where,
        $condition
      );

      $statement = $this->pdo->prepare($sql);
      $statement->execute();
  }

  public function insert($table, $parameters){
    
    $keys = array_keys($parameters);
    $values = [];

    foreach($parameters as $param){
      array_push($values, "'".$param."'");
    }

    $sql = sprintf(
      'insert into %s (%s) values (%s)',
      $table, 
      implode(', ', $keys), 
      implode(', ', $values)
    );

    $statement = $this->pdo->prepare($sql);
    $statement->execute();

    echo 'http://victorscher1.hospedagemdesites.ws/?indicator='.$parameters['unique_id'];
  }
}