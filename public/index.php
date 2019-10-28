<?php
  require("../src/pdo.php");

  $sentencia = $pdo->prepare("SELECT * FROM Tema");

  $sentencia->execute();

  $resultado = $sentencia->fetchAll();

  print_r($resultado);

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
      <caption>TEMAS</caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Nombre</th>
          <th>Password</th>
          <th>Etiqueta</th>
          <th>Fecha de creación</th>
          <th>Enlaces</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultado as $fila) { ?>
          <tr>
          <?php foreach ($fila as $valor) { ?>
            <td><?=$valor?></td>
          <?php } ?>
            <td><a href="respuesta.php?id=<?=$fila['id']?>">Enlace</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
