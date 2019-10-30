<?php
  require("pdo.php");

  function deleteRow($id, $nameTable){

    $sql = "DELETE FROM ". $nameTable . " WHERE id = " . $id;

    $sentencia = $pdo->prepare($sql);

    $sentencia->execute();

  }

?>
