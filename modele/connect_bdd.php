<?php

include('env.php');

$bdd_username = $bdd_username ?? 'student';
$bdd_password = $bdd_password ?? 'abc';
$bdd_host = $bdd_host ?? 'localhost';
$bdd_dbname = $bdd_dbname ?? 'student';
$bdd_port = $bdd_port ?? 3306;



$option = [
  PDO::ATTR_ERRMODE =>
  PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE =>
  PDO::FETCH_ASSOC
];

try {
  $pdo = new PDO($dsn, $bdd_username, $bdd_password, $option);
} catch (PDOException $e) {
  echo "erreur a la base de donnée<br>";
  echo $e->getcode() . '' . $e->getMessage() . '<br>';
  http_response_code(500);
  $pdo = null;
}
function getPdo()
{
  global $pdo;
  return $pdo;
}
function resetDb()
{
  global $pdo;
  $sql = file_get_contents('modele/bdd.sql');
  $pdo->exec($sql);
}
