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
  <form method="post" action="Crear_Docente.php">
  <table class='tabla_menu'><tr><td class='btn_menu_sup'><input type='submit' value='Listado de Docente' class='btn_menu_sup'  name='btn_Ver_Listado_Docente'></td>
  </form>

  <form method="post" action="Crear_Docente2.php"><td class='btn_menu_sup'>
   <input  type="submit" name='btn_Crear_Docente' value='Crear Docente' class='btn_menu_sup'></td></tr>
  </form>

  </table>
  </center>
 
  <?php

  require('coneccion.php');
  //mostrar_buscador();

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

      function mostrar_crear_docente()
      {
        echo "<form method='post' action=''>
        <table class='tabla_100'>
        <tr><td class='td_tabla' colspan='2'><h4 class='etiqueta_h3'>Crear usuario Docente </h4> <h5>(*) Se recomienda que escriba en todos los campos para tener un mejor registro</h5></td></tr>
        <tr><td class='td_tabla'>Nombre Completo</td><td><input type='text' size='60' name='txt_Nombre' placeholder='Escriba su nombre completo'></td></tr>

        <tr><td class='td_tabla'>Apellidos</td><td><input type='text' size='60' name='txt_Apellido_P' placeholder='Escriba su apellido Paterno y Materno'></td></tr>

        <tr><td class='td_tabla'>Profesion(s)</td><td><textarea type='text' placeholder='Escriba la carrera(s) y otros cargos que poseea' rows='2' cols='60' name='txt_Profesion'></textarea></tr>

        <tr><td class='td_tabla'>Telefono</td><td><input type='text' name='txt_Telefono' placeholder='Escriba su numero'></td></tr>

        <tr><td class='td_tabla'>Celular</td><td><input type='text' name='txt_Celular' placeholder='Escriba su numero'></td></tr>

        <tr><td class='td_tabla'>Correo</td><td><input type='text' size='60' name='txt_Correo' placeholder='Escriba su correo electronico'></td></tr>

        <tr><td class='td_tabla'>Direccion</td><td><textarea type='text'  placeholder='Escriba su direccion de su recidencia'rows='2' cols='60' name='txt_Direcion'></textarea></td>

        <tr><td class='td_tabla'>CodSIS</td><td><input type='text' name='txt_User' placeholder='Codigo SIS'></td></tr>

        <tr><td class='td_tabla'>Password</td><td><input type='password' name='txt_Password' placeholder='Contrasena'></td></tr>

        <tr><td colspan='2'><center><input type='submit'  name='btn_Registrar_Docente' value='Crear Docente' class='btn_crear'><center></td></tr>";


      echo "</table></form>";

      }

    //BOTON CREAR DOCENTES    
    if(isset($_POST['btn_Crear_Docente'])){
     
        echo "<form method='post' action=''>
        <table class='tabla_100'>
        <tr><td class='td_tabla' colspan='2'><h4 class='etiqueta_h3'>Crear usuario Docente </h4> <h5>(*) Se recomienda que escriba en todos los campos para tener un mejor registro</h5></td></tr>
        <tr><td class='td_tabla'>Nombre Completo</td><td><input type='text' size='60' name='txt_Nombre' placeholder='Escriba su nombre completo'></td></tr>

        <tr><td class='td_tabla'>Apellidos</td><td><input type='text' size='60' name='txt_Apellido_P' placeholder='Escriba su apellido Paterno y Materno'></td></tr>

        <tr><td class='td_tabla'>Profesion(s)</td><td><textarea type='text' placeholder='Escriba la carrera(s) y otros cargos que poseea' rows='2' cols='60' name='txt_Profesion'></textarea></tr>

        <tr><td class='td_tabla'>Telefono</td><td><input type='text' name='txt_Telefono' placeholder='Escriba su numero'></td></tr>

        <tr><td class='td_tabla'>Celular</td><td><input type='text' name='txt_Celular' placeholder='Escriba su numero'></td></tr>

        <tr><td class='td_tabla'>Correo</td><td><input type='text' size='60' name='txt_Correo' placeholder='Escriba su correo electronico'></td></tr>

        <tr><td class='td_tabla'>Direccion</td><td><textarea type='text'  placeholder='Escriba su direccion de su recidencia'rows='2' cols='60' name='txt_Direcion'></textarea></td>

        <tr><td class='td_tabla'>CodSIS</td><td><input type='text' name='txt_User' placeholder='Codigo SIS'></td></tr>

        <tr><td class='td_tabla'>Password</td><td><input type='password' name='txt_Password' placeholder='Contrasena'></td></tr>

        <tr><td colspan='2'><center><input type='submit'  name='btn_Registrar_Docente' value='Crear Docente' class='btn_crear'><center></td></tr>";


      echo "</table></form>";

     }
     
     if (isset($_POST['btn_Registrar_Docente']))
     {
        $Nombre=$_POST['txt_Nombre'];
        $Apellido_P=$_POST['txt_Apellido_P'];
       
        $Profesiones=$_POST['txt_Profesion'];
        $Telefono=$_POST['txt_Telefono'];
        $Celular=$_POST['txt_Celular'];
        $Correo=$_POST['txt_Correo'];
        $Direccion=$_POST['txt_Direcion'];
        $User_Login=$_POST['txt_User'];
        $User_Password=$_POST['txt_Password'];
       
        if($Nombre=="" || $Apellido_P=="" ||  $Profesiones=="" || $Telefono=="" ||  $Celular=="" || $Correo==""
         || $Direccion=="" || $User_Login==""  || $User_Password=="" )
        {
            echo "<p class='mensaje_correcto'>Complete los Campos Correctamente</p>";
            mostrar_crear_docente();
            //mostrar_crear_materia($ID_Carrera);
          }

        if($Nombre!="" && $Apellido_P!="" &&  $Profesiones!="" && $Telefono!="" &&  $Celular!="" && $Correo!=""
         && $Direccion!="" && $User_Login!="" && $User_Password!="" )
          {
           
            $query="INSERT INTO `docente` VALUES (NULL, '$Nombre',
                   '$Apellido_P', 
                   '$Profesiones', 
                   '$Telefono', 
                   '$Celular', 
                   '$Correo', 
                   '$Direccion',
                   '$User_Login',
                   '$User_Password');";

             $resultado=mysql_query($query,$link);
              mostrar_buscador();
            echo "<p class='mensaje_crear'>Docente creado Correctamente</p>";
            mostrar_lista_docente();
          }

     }

     function mostrar_lista_docente(){
        require("coneccion.php");
       

          echo "<h4 class='etiqueta_h3'>Lista de Todos los Docentes Creados</h4>";
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
     
     }


    //BOTON LISTADO DOCENTES
      if(isset($_POST['btn_Ver_Listado_Docente'])){
        echo 
        '<table id="tabla_Buscador">
         <tr><td> 
         <button onclick="procesar()" id="procesar" class="btn_rec" ';     
        echo 
         '</button></td><td>
          <form method="post">
          <input type="text" class="Txt_Buscar" size="85" id="texto" name="txt_buscar_pg" placeholder="Escriba el nombre del docente ">
          <input type="submit" class="btn_Buscar" name="btn_Buscar_Docentes" value="Buscar"></form>
          </td></tr></table>';

        echo "<h3>Lista de Todos los Docentes Creados</h3>";
        echo "<h5>(*) Con el link Examinar usted podra ver detalladamente los datos del docente</h5></p>";

       $query="SELECT * 
                 FROM docente ORDER BY `Nombre_Completo` ASC";
       $resultado=mysql_query($query,$link);
      
      while($row=mysql_fetch_array($resultado))
      {
        echo "<form method='post' action=''><table class='tabla_lista_docentes'>";
        
         echo "<tr><td>".$row['Nombre_Completo']." ";
         echo "".$row['Apellido_Paterno']." ".$row['Apellido_Materno']." ";
         echo "<td>Pofesion</td><td>".$row['Profesion']."</td>
   
  

         <td><input type='submit' class='btn_examinar' name='btn_Examinar_Docente' value='Examinar'>
         <input type='text' name='ID_Docente' style='visibility:hidden' value='".$row['ID_Docente'].
         "'</td></tr></table></form>";
      }
      
      
      
     }


     if(isset($_POST['btn_Examinar_Docente']))
     { 
       $ID_Docente=$_POST['ID_Docente'];
        mostrar_buscador();
       


        $query="SELECT * 
                 FROM docente WHERE ID_Docente='$ID_Docente'";
       $resultado=mysql_query($query,$link);
      
      while($row=mysql_fetch_array($resultado))
      {
        echo "<form method='post' action=''><table class='tabla_100'>";
         echo "<tr><td class='td_tabla' colspan='4'><h4 class='etiqueta_h3'>Lista de Todos los Docentes Creados</h4>
         <h5>(*) Se recomienda precaucion al utilizar los botones de Editado y Emilinar</h5></td></tr>";
         echo "<tr><td class='td_tabla'>Nombre Completo</td><td colspan='3'>".$row['Nombre_Completo']."</td></tr>";
         echo "<tr><td class='td_tabla'> Apellidos </td><td colspan='3'>".$row['Apellidos']."</td></tr>";
         echo "<tr><td class='td_tabla'>Profesion</td><td colspan='3'>".$row['Profesion']."</td></tr>";
         echo "<tr><td class='td_tabla'>Telefono</td><td>".$row['Telefono']."</td>";
         echo "<td>Celular</td><td>".$row['Celular']."</td></tr>";
         echo "<tr><td class='td_tabla'>Correo</td><td colspan='3'>".$row['Correo']."</td></tr>";
         echo "<tr><td class='td_tabla'>Direccion</td><td colspan='3'>".$row['Direccion']."</td></tr>";
         echo "<tr><td class='td_tabla'>CodSIS</td><td>".$row['User_Login']."</td>";
         echo "<td>Contrasena</td><td>".$row['Password']."</td></tr>
        
         <tr><td id='td_caract'>
         <input type='submit' name='btn_Editar_Docente' class='btn_editar' value='Editar'></td>
         <td colspan='3'><input type='submit' name='btn_Eliminar_Docente' class='btn_eliminar' value='Eliminar'>
         <input type='text' name='ID_Docente' style='visibility:hidden' value='".$row['ID_Docente'].
         "'</td></tr></table><p></p></form>";
      }
         
         echo "<p id='espacio'>a</p><form method='post' action='Crear_Docente.php'>
            <center><input type='submit' value='volver' class='btn_examinar_pg'name='btn_Ver_Listado_Docente' ></center>
            </form>";

     }

     function editar_docente($ID_Docente)
     {
        require("coneccion.php");
        $query="SELECT * 
                 FROM docente WHERE ID_Docente=$ID_Docente";
        $resultado=mysql_query($query,$link);

        echo "<table class='tabla_100'>";

       while($row=mysql_fetch_array($resultado))
       {
   
         echo "<form method='post'>
               <tr>
               <td class='td_tabla' colspan='2'><h4 class='etiqueta_h3'>Lista de Todos los Docentes Creados</h4>
               <h5>(*) Se recomienda llenar todos los campos y no dejar vacios o en blanco para una mejor edicion</h5></td></tr>
               <td class='td_tabla'>Nombre Completo</td>
               <td><input type='text' name='Nombre_Completo' size='40' value='".$row['Nombre_Completo']."'>
               <input type='text' name='ID_Docente' style='visibility:hidden; width:1px;' value='".$ID_Docente."'></td></tr>";

         echo "<tr><td class='td_tabla'>Apellidos</td>
               <td><input type='text' name='Apellido_Paterno' size='40' value='".$row['Apellidos']."'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Profesion</td>
         <td><input type='text' name='Profesion' value='".$row['Profesion']."' size='60'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Telefono</td>
         <td><input type='text' name='Telefono' value='".$row['Telefono']."'></td></tr>";

         echo "<tr><td class='td_tabla'>Celular</td>
         <td><input type='text' name='Celular' value='".$row['Celular']."'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Correo</td>
         <td><input type='text' name='Correo' value='".$row['Correo']."' size='60'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Direccion</td>
         <td><textarea name='Direccion' cols='62' rows='2' >".$row['Direccion']."</textarea></td></tr>"; 

         echo "<tr><td class='td_tabla'>CodSIS</td><td><input name='User' value='".$row['User_Login']."'></td></tr>";

         echo "<tr><td class='td_tabla'>Contrasena</td>
         <td><input type='text' name='Contrasena' value='".$row['Password']."'></td></tr>";

         echo "<tr><td colspan='2'><center><input type='submit' value='Realizar Editado' name='btn_Realizar_Editado'></center></td></tr>";
       }
       echo "</table></form>";
     }
   
     if(isset($_POST['btn_Editar_Docente']))
     {
        $ID_Docente=$_POST['ID_Docente'];

        $query="SELECT * 
                 FROM docente WHERE ID_Docente=$ID_Docente";
        $resultado=mysql_query($query,$link);

        echo "<table class='tabla_100'>";

       while($row=mysql_fetch_array($resultado))
       {
   
         echo "<form method='post'>
               <tr>
               <td class='td_tabla' colspan='2'><h4 class='etiqueta_h3'>Lista de Todos los Docentes Creados</h4>
               <h5>(*) Se recomienda llenar todos los campos y no dejar vacios o en blanco para una mejor edicion</h5></td></tr>
               <td class='td_tabla'>Nombre Completo</td>
               <td><input type='text' name='Nombre_Completo' size='40' value='".$row['Nombre_Completo']."'>
               <input type='text' name='ID_Docente' style='visibility:hidden; width:1px;' value='".$ID_Docente."'></td></tr>";

         echo "<tr><td class='td_tabla'>Apellidos</td>
               <td><input type='text' name='Apellido_Paterno' size='40' value='".$row['Apellidos']."'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Profesion</td>
         <td><input type='text' name='Profesion' value='".$row['Profesion']."' size='60'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Telefono</td>
         <td><input type='text' name='Telefono' value='".$row['Telefono']."'></td></tr>";

         echo "<tr><td class='td_tabla'>Celular</td>
         <td><input type='text' name='Celular' value='".$row['Celular']."'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Correo</td>
         <td><input type='text' name='Correo' value='".$row['Correo']."' size='60'></td></tr>";
         
         echo "<tr><td class='td_tabla'>Direccion</td>
         <td><textarea name='Direccion' cols='62' rows='2' >".$row['Direccion']."</textarea></td></tr>"; 

         echo "<tr><td class='td_tabla'>CodSIS</td><td><input name='User' value='".$row['User_Login']."'></td></tr>";

         echo "<tr><td class='td_tabla'>Contrasena</td>
         <td><input type='text' name='Contrasena' value='".$row['Password']."'></td></tr>";

         echo "<tr><td colspan='2'><center><input type='submit' value='Realizar Editado' name='btn_Realizar_Editado'></center></td></tr>";
       }
       echo "</table></form>";

      }

      //BOTON EDITADO A LA BASE DE DATOS
      if(isset($_POST['btn_Realizar_Editado'])){
         
          $ID_Docente=$_POST['ID_Docente'];
          $Nombre=$_POST['Nombre_Completo'];
          $Apellido_Paterno=$_POST['Apellido_Paterno'];
         
          $Profesion=$_POST['Profesion']." ";
          $Telefono=$_POST['Telefono']." ";
          $Celular=$_POST['Celular']." ";
          $Correo=$_POST['Correo']." ";
          $Direccion=$_POST['Direccion'];
          $User=$_POST['User'];
          $Password=$_POST['Contrasena'];

         // editar_docente($ID_Docente)

     

        if($Nombre!="" && $Apellido_Paterno!="" &&  $Profesion!="" && $Telefono!="" &&  $Celular!="" && $Correo!=""
         && $Direccion!="" && $User!="" && $Password!="" )
          {

            $query="UPDATE `docente` SET `Nombre_Completo` = '$Nombre',
             `Apellidos` = '$Apellido_Paterno', `Profesion` = '$Profesion',
             `Telefono` = '$Telefono', `Celular` = '$Celular', `Correo` = '$Correo',
             `Direccion` = '$Direccion', `User_Login` = '$User', `Password` = '$Password' WHERE `docente`.`ID_Docente` = $ID_Docente";
           
           /*$query="UPDATE docente
                   SET Nombre_Completo = '$Nombre',
                   Apellidos = '$Apellido_Paterno',    
                   Profesion = '$Profesion', 
                   Telefono = '$Telefono', 
                   Celular = '$Celular', 
                   Correo = '$Correo',
                   Direccion = '$Direccion',
                   User_Login='$User',
                   Password='$Password'
                   WHERE ID_Docente ='$ID_Docente'";*/

             $resultado=mysql_query($query,$link);
             mostrar_buscador();
             echo "<p class='mensaje_crear'>Docente Editado Correctamente</p>";
            mostrar_lista_docente();
          }

        else
        {
            echo "<p class='mensaje_correcto'>Complete los Campos Correctamente</p>";
            editar_docente($ID_Docente);
            //mostrar_crear_materia($ID_Carrera);
          }

      }
    
     
     if(isset($_POST['btn_Eliminar_Docente']))
     {
        $ID_Docente=$_POST['ID_Docente'];

        $query="DELETE FROM `docente` WHERE ID_Docente=$ID_Docente";
        $resultado=mysql_query($query,$link);
        mostrar_buscador();
        echo "<p class='mensaje_error'>Docente Eliminado Correctamente</p>";
        mostrar_lista_docente();    
      }


      if(isset($_POST['btn_Buscar_Docentes']))
      {
          $Text_a_Buscar=$_POST['txt_buscar_pg'];
         echo 
        '<table id="tabla_Buscador">
         <tr><td> 
         <button onclick="procesar()" id="procesar" class="btn_rec" ';     
        echo 
         '</button></td><td>
          <form method="post">
          <input type="text" class="Txt_Buscar" size="85" id="texto" name="txt_buscar_pg" placeholder="Escriba el nombre del docente ">
          <input type="submit" class="btn_Buscar" name="btn_Buscar_Docentes" value="Buscar"></form>
          </td></tr></table>';
       
         echo "<h4 class='etiqueta_h3'> Resultado de Todos los Docentes Creados</h4>";
         echo "<h5>(*) Se recomienda precaucion al utilizar los botones de Editado y Emilinar</h5></p>";

        $query="SELECT * 
                 FROM docente WHERE Nombre_Completo LIKE '%$Text_a_Buscar%' ORDER BY `Nombre_Completo` ASC";
       $resultado=mysql_query($query,$link);
      
       while($row=mysql_fetch_array($resultado))
       {
        echo "<form method='post' action=''><table class='tabla_listar_Docent'>";
        
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
