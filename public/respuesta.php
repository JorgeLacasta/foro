<?php
  require("../src/pdo.php");

  $id;

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  $sql = "SELECT * FROM Respuesta
          where id_tema = :id
          order by creado";

  $sentencia = $pdo->prepare($sql);

  if($id != ""){
      $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
  }

  $sentencia->execute();

  $resultado = $sentencia->fetchAll();

  //print_r($resultado);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Foro</title>
    <link rel="stylesheet" href="css/pure.css">
  </head>
  <body>
    <div class="">

    </div>
    <table class="pure-table">
      <caption>RESPUESTAS</caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Contenido</th>
          <th>Nombre</th>
          <th>Fecha de creación</th>
          <th>ID Tema</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultado as $fila) { ?>
          <tr>
          <?php foreach ($fila as $valor) { ?>
            <td><?=$valor?></td>
          <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
    <a href="index.php">Volver atrás</a>
  </body>
</html>
