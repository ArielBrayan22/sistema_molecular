<?php
 session_start();
 header("Content-Type: text/html;charset=utf-8");
 

 if(isset($_SESSION['Alias']))
 {
    $Alias_User=$_SESSION['Alias'];
    $Password_User=$_SESSION['Password'];
    $ID_User=$_SESSION['ID'];
    require("vistas/header.php");
  ?> 


<article id="cuerpo">
 <center><img src="imagenes/imagen.jpg" width="90%" height="70%"></center>


<?php
     


  } 
else {
    include("link_salida.php");
 } ?>

 <?php

 if(isset($_POST['btn_prueba']))
     {
        echo "<h1>hola estoy aca</h1>";
        agregar();
        mostrar_datos();
     }


    function agregar()
    {
       require("coneccion.php");
       $query="INSERT INTO `materia` (`ID_Materia`, `Nombre_Materia`, `Codigo`, `Grupo`, 
                                         `Nivel_Materia`, `Carga_Horaria`, `Materias_Relacionadas`,`Departamento`,`ID_Carrera`) 
          VALUES (NULL, 'A', 'A', 'A', 'A', 'A', 'A','A','1');";
          $resultado=mysql_query($query,$link);
    }

    function mostrar_datos()
    {
      require("coneccion.php");
      $sql="SELECT * FROM materia";
      $coneccion=mysql_query($sql);
      while($row=mysql_fetch_array($coneccion))
      {
         echo $row['Nombre_Materia'];

      }

    }

   ?>

</article>

<?php
  require("vistas/footer.php");
 ?>



