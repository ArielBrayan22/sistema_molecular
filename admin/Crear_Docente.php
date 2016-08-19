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


         
  <center>
  <form method="post" action="">
  <table class='tabla_menu'><tr><td class='btn_menu_sup'><input type='submit' value='Listado de Docente' class='btn_menu_sup'  name='btn_Ver_Listado_Docente'></td>
  </form>

  <form method="post" action="Crear_Docente2.php"><td class='btn_menu_sup'>
   <input  type="submit" name='btn_Crear_Docente' value='Crear Docente' class='btn_menu_sup' ></td></tr>
  </form>

  </table>
  </center>
 
  <?php

  require('coneccion.php');
  
  mostrar_buscador();
    //mostrar_lista_docente();
  function mostrar_buscador()
  {
      echo 
        '<table  class="tabla_Buscador">
         <tr><td class="btn_mic"> 
         <button onclick="procesar()" id="procesar" class="btn_rec"';     
        echo 
         '</button></td><td>
          <form method="post" action="Crear_Docente2.php">
          <input type="text" class="Txt_Buscar" size="70" id="texto" name="txt_buscar_pg" placeholder="Escriba el nombre del docente ">
          </td><td class="td_btn_buscar"><input type="submit" class="btn_Buscar" name="btn_Buscar_Docentes" value="Buscar"></form>
          </td></tr></table>';
  }


     function mostrar_lista_docente(){
      require("coneccion.php");

        echo "<p id='espacio'>a<p><h4 class='etiqueta_h3'>Lista de Todos los Docentes Creados</h4>";
        echo "<h5>(*) Se recomienda para mas informacion examinar</h5><p id='espacio'>a<p>";

        $query="SELECT * 
                 FROM docente ORDER BY `Nombre_Completo` ASC";
       $resultado=mysql_query($query,$link);
      
      while($row=mysql_fetch_array($resultado))
      {
        echo "<form method='post' action='Crear_Docente2.php'><table class='tabla_lista'>";
        
         echo "<tr><td id='td_caract'>Nombre Completo</td><td colspan='3'>".$row['Nombre_Completo']."</td></tr>";
         echo "<tr><td> Apellidos </td><td colspan='3'>".$row['Apellidos']."</td></tr>";
         echo "<tr><td id='td_caract'>Profesion</td><td colspan='3'>".$row['Profesion']."</td></tr>";
         echo "<tr><td id='td_caract'>Telefono</td><td>".$row['Telefono']."</td>";
         echo "<td>Celular</td><td>".$row['Celular']."</td></tr>";
         echo "<tr><td id='td_caract'>Correo</td><td colspan='3'>".$row['Correo']."</td></tr>";
         echo "<tr><td id='td_caract'>Direccion</td><td colspan='3'>".$row['Direccion']."</td></tr>";
         echo "<tr><td id='td_caract'>CodSIS</td><td>".$row['User_Login']."</td>";
         echo "<td>Contrasena</td><td>".$row['Password']."</td></tr>
        
         <tr><td id='td_caract'>
         <input type='submit' name='btn_Editar_Docente' value='Editar'></td>
         <td colspan='3'><input type='submit' name='btn_Eliminar_Docente' value='Eliminar'>
         <input type='text' name='ID_Docente' style='visibility:hidden' value='".$row['ID_Docente'].
         "'</td></tr></table><p></p></form>";
      }
      echo "<p></p>";
        

     }

     if(isset($_POST['btn_Ver_Listado_Docente']))
     {

     }
     mostrar_docentes_cortos();

     //FUNCION MOSTRAR DOCENTES CORTOS

     function mostrar_docentes_cortos()
     {
        require("coneccion.php");
  

        echo "<p id='espacio'>a<p><h4 class='etiqueta_h3'>Lista de Todos los Docentes Creados</h4>";
        echo "<h5>(*) Se recomienda para mas informacion examinar</h5><p id='espacio'>a<p>";

        $query="SELECT * 
                 FROM docente ORDER BY `Nombre_Completo` ASC";
       $resultado=mysql_query($query,$link);
      
      while($row=mysql_fetch_array($resultado))
      {
        echo "<table class='tabla_lista'><form method='post' action='Crear_Docente2.php'>";
        
         echo "<tr><td class='td_materia'>".$row['Nombre_Completo']."</td>";
         echo "<td class='td_materia'>".$row['Apellidos']."</td>
               <td class='td_materia'>
               <input type='submit' class='btn_examinar_pg' name='btn_Examinar_Docente' value='Examinar'>
               <input type='text' name='ID_Docente' style='visibility:hidden; width:1px;' value='".$row['ID_Docente'].
               "'></td></tr></form></table></p>";
      }
      echo "";
     }

    

  ?>

  <script type="text/javascript">

  var recognition;
  var recognizing = false;
  if (!('webkitSpeechRecognition' in window)) {
    alert("¡API no soportada!");
  } else {

    recognition = new webkitSpeechRecognition();
    recognition.lang = "es-VE";
    recognition.continuous = true;
    recognition.interimResults = true;

    recognition.onstart = function() {
      recognizing = true;
      console.log("empezando a eschucar");
    }
    recognition.onresult = function(event) {

     for (var i = event.resultIndex; i < event.results.length; i++) {
      if(event.results[i].isFinal)
        document.getElementById("texto").value += event.results[i][0].transcript;
        }
      
      //texto
    }
    recognition.onerror = function(event) {
    }
    recognition.onend = function() {
      recognizing = false;
      document.getElementById("procesar").innerHTML = "";
      console.log("terminó de eschucar, llegó a su fin");

    }

  }

  function procesar() {

    if (recognizing == false) {
      recognition.start();
      recognizing = true;
      document.getElementById("procesar").innerHTML = "";
    } else {
      recognition.stop();
      recognizing = false;
      document.getElementById("procesar").innerHTML = "";
    }
  }
 </script>


</article>

<?php
  require("vistas/footer.php");
 ?>
