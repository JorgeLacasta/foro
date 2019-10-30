<?php
  require("../src/pdo.php");

  $nameTable;

  if (isset($_GET['nameTable'])) {
    $nameTable = $_GET['nameTable'];
  }

  $sql = "DROP TABLE " . $nameTable;

  $sentencia = $pdo->prepare($sql);

  $sentencia->execute();


  //print_r($resultado);

?>
