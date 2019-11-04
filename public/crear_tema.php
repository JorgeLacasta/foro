<?php
  function clear_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  define("ERROR_NOMBRE_TEMA_NO" , 0);
  define("ERROR_NOMBRE_TEMA_MAX" , 1);
  define("ERROR_NOMBRE_USUARIO_NO" , 0);
  define("ERROR_NOMBRE_USUARIO_MAX" , 1);
  define("ERROR_CLAVE_NO" , 0);
  define("ERROR_CLAVE_MAX" , 1);


  $errores = [];

  $nombreTema;
  $nombreUsuario;
  $clave;
  $etiqueta;

  if(count($_POST)>0){  //Si te han pasado algun dato en el post

    //NOMBRE TEMA
    if(isset($_POST['nombreTema']) && $_POST['nombreTema'] != ''){
      $nombreTema = $_POST['nombreTema'];
    } else {
      $errores['nombreTema'] = ERROR_NOMBRE_TEMA_NO;
    }
    if ( strlen($nombreTema) > 120 ) {
      $errores['nombreTema'] = ERROR_NOMBRE_TEMA_MAX;
    }

    //NOMBRE USUARIO
    if(isset($_POST['nombreUsuario']) && $_POST['nombreUsuario'] != ''){
      $nombreUsuario = $_POST['nombreUsuario'];
    } else {
      $errores['nombreUsuario'] = ERROR_NOMBRE_USUARIO_NO;
    }
    if ( strlen($nombreUsuario) > 20 ) {
      $errores['nombreUsuario'] = ERROR_NOMBRE_USUARIO_MAX;
    }

    //CLAVE
    if(isset($_POST['clave']) && $_POST['clave'] != ''){
      $clave = $_POST['clave'];
    } else {
      $errores['clave'] = ERROR_CLAVE_NO;
    }
    if ( strlen($clave) > 20 ) {
      $errores['clave'] = ERROR_CLAVE_MAX;
    }




    if(count($errores) == 0){
      // Acción
      //  Guardar en base de datos
      header('Location: todobien.php');
      die();
    }
  }


  echo "<pre>";
  print_r($errores);
  echo "</pre>";




?>

<?php
include('header.php');
 ?>

 <form class="" action="crear_tema.php" method="post">
   <span>Nombre del Tema:</span>
   <input type="text" name="nombreTema" value="<?=$nombreTema?>" placeholder="max 120 caracteres" size="30">
   <?php if ( isset($errores['nombreTema']) ) { ?>
     <?php if ( $errores['nombreTema'] == ERROR_NOMBRE_TEMA_NO ) { ?>
       <span class="errores" style="color:red">Tienes que introducir un nombre del tema</span>
     <?php } ?>
     <?php if ( $errores['nombreTema'] == ERROR_NOMBRE_TEMA_MAX ) { ?>
       <span class="errores" style="color:red">El tema no puede ser mayor de 120 caracteres</span>
     <?php } ?>
   <?php } ?>
   <br>
   <span>Nombre de Usuario:</span>
   <input type="text" name="nombreUsuario" value="<?=$nombreUsuario?>" placeholder="max 20 caracteres" size="30">
   <?php if ( isset($errores['nombreUsuario']) ) { ?>
     <?php if ( $errores['nombreUsuario'] == ERROR_NOMBRE_USUARIO_NO ) { ?>
       <span class="errores" style="color:red">Tienes que introducir un nombre de usuario</span>
     <?php } ?>
     <?php if ( $errores['nombreUsuario'] == ERROR_NOMBRE_USUARIO_MAX ) { ?>
       <span class="errores" style="color:red">El nombre de usuario no puede ser mayor de 20 caracteres</span>
     <?php } ?>
   <?php } ?>
   <br>
   <span>Clave:</span>
   <input type="text" name="clave" value="<?=$clave?>" placeholder="max 20 caracteres" size="30">
   <br>
   <span>Etiqueta:</span>
   <input type="text" name="etiqueta" value="<?=$etiqueta?>" placeholder="max 20 caracteres, sin espacios" size="30">
   <br>
   <br>
   <input type="submit" name="enviar" value="Enviar">

 </form>
 <br><br>

 <a href="index.php">Volver atrás</a>

 <?php
 include('footer.php');
  ?>
