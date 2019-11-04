<?php
  require("pdo.php");

  function deleteRow($nameTable, $where, $id){

    $sql = "DELETE FROM " . $nameTable . " " . $where . $id;

    $sentencia = $pdo->prepare($sql);

    $sentencia->execute();

  }

?>
