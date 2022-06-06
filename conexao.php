<?php

define('DB_HOST', 'BRUNO\SQLEXPRESS');
define('DB_USER', 'bruno');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'bruno');
define('DB_DRIVER', 'sqlsrv');


require_once "Conexao.php";

try {
  $Conexao = Conexao::getConnection();
  $query = $Conexao->query("SELECT nome, estado,cidade,referencia,descricao FROM cadastro");
} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

class Conexao
{
  private static $connection;

  private function __construct()
  {
  }

  public static function getConnection()
  {

    $pdoConfig  = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
    $pdoConfig .= "Database=" . DB_NAME . ";";

    try {
      if (!isset($connection)) {
        $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      return $connection;
    } catch (PDOException $e) {
      $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
      $mensagem .= "\nErro: " . $e->getMessage();
      throw new Exception($mensagem);
    }
  }
}
