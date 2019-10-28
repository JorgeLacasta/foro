<?php
require("../config/config.php");

$dsn = "mysql:host=localhost;dbname=" . $config['dbname'] . ";charset=utf8";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // La preparación de las consultas no es simulada
                                         // más lento pero más seguro
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Cuando se produce un error
                                                          // salta una excepción
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Cuando traemos datos lo hacemos como array asociativo
];

try {
  $pdo = new PDO($dsn, $config['user'], $config['pass'], $options);
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('Something weird happened'); //something a user can understand
}

?>
