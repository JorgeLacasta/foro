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

  $id = 1;

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
          <th>Borar fila</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultado as $fila) { ?>
          <tr>
          <?php foreach ($fila as $valor) { ?>
            <td><?=$valor?></td>
          <?php } ?>
          <td><a href="borrar_fila.php?deleteRowRespuesta=<?=$resultado[$i++]['id']?>"><img src="../resources/icon_bin.png"></img></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
    <a href="index.php">Volver atrás</a>
  </body>
</html>
