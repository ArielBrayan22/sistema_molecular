<?php
 session_start();
 header("Content-Type: text/html;charset=utf-8");
 

 if(isset($_SESSION['Alias']))
 {
    $Alias_User=$_SESSION['Alias'];
    $Password_User=$_SESSION['Password'];
    $ID_User=$_SESSION['ID'];
     require("vistas/header.php");}

   else {
   header("location: molecular/index.php");
   } 
  ?> 

<article id="cuerpo">
 <center><h3>Videos Tutoriales</h3></center>

 <center>
 <form method="post" action="">
   
   <input type="submit" value="Lista de Videos" name="btn_lista_Video">

 </form>
 </center>

<?php

  /*if(isset($_POST['btn_Agregar_Video'])){

    echo '<form method="post" enctype="multipart/form-data">

          <table id="tabla_grande">
          <tr><td id="td_conpact"><h5>Escriba el titulo :</h5></td><td><input class="titulo" type="text" name="txt_titulo" size="87"  ></td></tr>
          <tr><td id="td_conpact"><h5>Seleccion </br>del video :</h5></td><td><input type="file" name="archivo"></td></tr>        
          <tr><td id="td_conpact"><h5>Caracteristicas :</h5></td><td><textarea name="text" rows="4" cols="90">
          </textarea></td></tr>
          <tr><td colspan="2"><center><input type="submit" name="boton" value="Subir Video"></center></td></tr>
          
          </table>
          </form>';

  }

     $formatos=array('.mpg', '.MPG', '.mpeg', '.MPEG', '.jpg','.gif', '.png','.mp4'.'AVI'); 
 
  if (isset($_POST['boton'])) {
    
     $text_caract=$_POST['text'];  
     $text_titulo=$_POST['txt_titulo'];
     $nombreArchivo=$_FILES['archivo']['name'];

     $nombreTmpArchivo=$_FILES['archivo']['tmp_name'];

     $ext=substr($nombreArchivo,strrpos($nombreArchivo, '.'));
     
     if(in_array($ext,$formatos))
     {
       if(move_uploaded_file($nombreTmpArchivo,"videos/$nombreArchivo"))
       {
         require("coneccion.php");
         $sql="INSERT INTO `video` (`ID_Video`, `Titulo`, `Nombre`, `Caracteristica`) 
         VALUES (NULL, '$text_titulo', '$nombreArchivo', '$text_caract');";
         $coneccion=mysql_query($sql);
         echo "se realizo";

       }
        else {
          echo "Video Subido Correctamente";
        }
      
    }
  }*/

  if(isset($_POST['btn_lista_Video']))
  {
    //echo "listar";
     $directorio="videos";
    
          require("coneccion.php");
          $sql="SELECT * FROM video";
          $coneccion=mysql_query($sql);

          while ($row=mysql_fetch_array($coneccion)) {
              $ID_video=$row['ID_Video'];
              $titulo=$row['Titulo'];
              $archivo=$row['Nombre'];
              $caract=$row['Caracteristica'];
              $video="<center><video src='$archivo' width='500' height='300' controls></video></center>";

           echo "<form method='post'><center><table id='tabla_pequena'>";

           echo "<tr><td id='td_conpact'>titulo</td><td><h3>$titulo</h3></td></tr>";
           echo "<tr><td colspan='2'>$video</td></tr>";
           echo "<tr><td id='td_conpact'>caracteristicas</td><td>$caract</td></tr>";  

           echo "</table></center></form>";     
        }

      }

      if(isset($_POST['btn_eliminar_video']))
      {
         echo $id=$_POST['ID_Video'];
         echo $video=$_POST['Nombre_Video'];

         require("coneccion.php");
         $sql="DELETE FROM `video` WHERE `video`.`Nombre` = '$video'";
         mysql_query($sql);
         unlink("videos/$video");

      }
 
 ?>
</article>

<?php
    require("vistas/footer.php");
 ?>
