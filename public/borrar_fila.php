<?php
  require("../src/delete_row.php");

  $id;

  if (isset($_GET['deleteRowTema'])) {
    $id = intval( $_GET['deleteRowTema'] );
    deleteRow('Respuesta', 'where id_tema = ', $id);
    deleteRow('Tema', 'where id = ', $id);
  }

  if (isset($_GET['deleteRowRespuesta'])) {
    $id = intval( $_GET['deleteRowTema'] );
    deleteRow('Respuesta', 'where id_tema = ', $id);

  }

  header("Location: ../public/listado_temas.php");
  die();

?>
