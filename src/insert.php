<?php
  require("../src/pdo.php");

  $id;
  $nameTable;

  if (isset($_GET['nameTable'])) {
    $nameTable = $_GET['nameTable'];
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }




  $sql = "INSERT INTO Respuesta (id, id_tema, titulo, nombre, contenido)
          VALUES
          (1, 1, 'Cierto', 'pepe', 'Tienes razón');

  $sentencia = $pdo->prepare($sql);

  $sentencia->execute();

?>
