<?php
  require("../src/pdo.php");
  require("../src/delete_row.php");

  if (isset($_GET['deleteRow'])) {
    deleteRow($_GET['deleteRow'], "Tema" );
  }

  $sentencia = $pdo->prepare("SELECT id, titulo, nombre, etiqueta, creado FROM Tema");
  $sentencia2 = $pdo->prepare("SELECT count(*) num_respuestas FROM Respuesta where id_tema = 1");
  $sentencia3 = $pdo->prepare("SELECT count(*) num_respuestas FROM Respuesta where id_tema = 2");
  $sentencia4 = $pdo->prepare("SELECT id FROM Tema");

  $sentencia->execute();
  $sentencia2->execute();
  $sentencia3->execute();


  $resultado = $sentencia->fetchAll();
  $numRespuestas = [$sentencia2->fetchAll() , $sentencia3->fetchAll()];

  $id = [ array_shift($resultado[0]) , array_shift($resultado[1]) ];


  echo "<pre>";
  print_r($resultado);
  print_r($numRespuestas);
  echo "id";
  print_r($id);
  echo "</pre>";


  $i = 0;

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
          <th>Titulo</th>
          <th>Nombre</th>
          <th>Etiqueta</th>
          <th>Fecha de creación</th>
          <th>Número de Respuestas</th>
          <th>Enlaces</th>
          <th>Borar fila</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultado as $fila) { ?>
          <tr>
          <?php foreach ($fila as $valor) { ?>
            <td><?=$valor?></td>
          <?php } ?>
          <td><?=$numRespuestas[$i][0]['num_respuestas']?></td>
          <td><a href="respuesta.php?id=<?=$id[$i]?>">Link</a></td>
          <td><a href="index.php?deleteRow=<?=$id[$i]?>"><img src="../resources/icon_bin.png"></img></a></td>
          </tr>
          <?php $i++; ?>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
