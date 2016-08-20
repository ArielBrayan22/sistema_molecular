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
  
 
 
  <?php
      
      // Mostar_Materias_cortas();
    mostrar_materias_acordeon();

  function mostrar_materias_acordeon(){

    require ('coneccion.php');

       echo "<form method='post' action=''>
                  <center>
                  <table class='tabla_menu'>
                  <tr><td class='btn_menu_sup'><input  type='submit' class='btn_menu_sup' value='Materias' name='btn_Ver_Listado_Materias'></td>
                  </form>
                  <form method='post' action='Crear_Materia2.php'>
                  <td class='btn_menu_sup'><input  class='btn_menu_sup' type='submit' name='btn_Crear_Materia' value='Crear Materia' ></td>
                  <td class='btn_menu_sup'><input  class='btn_menu_sup' type='submit' name='btn_Crear_Departamentos' value='Sectores' ></td></tr>
                  </table>
                  </center>
                  </form>";

            echo 
            '<table class="tabla_Buscador">
             <tr><td class="btn_mic"> 
             <button onclick="procesar()" id="procesar" class="btn_rec" ';     
            echo 
             '</button></td><td>
              <form method="post" action="Crear_Materia2.php">
              <input type="text" class="txt_Buscador" size="70" id="texto" name="txt_buscar_pg" placeholder="Escriba el nombre del materia que desee buscar"></td><td class="td_btn_buscar">
              <input type="submit" class="btn_buscar" name="btn_Buscar_Materias" value="Buscar"></form>
              </td></tr></table>';

            echo "<h4 class='etiqueta_h3'>Panel de las Materias Creadas</h>";
            echo "<form method='post' action='Crear_Materia2.php'><h5> (*) Presione el link de listar para ver todas en general
                  <input type='submit' class='btn_examinar_pg' value='Listar Materias' name='btn_Ver_Listado_Materias'></h5></form>";
            echo "<p id='espacio'>a</p>";

     $sql="SELECT * FROM facultad";
     $consulta=mysql_query($sql);
  
    while($row=mysql_fetch_array($consulta))
    {
     
        $ID_Facultad=$row['ID_Facultad'];
        $Facultad=$row['Facultad'];
     
        echo "<form method='post' action='Crear_Materia2.php'>
           <input type='text' name='ID_Facultad' value='$ID_Facultad' class='txt_invi'>
          <input type='submit' name='btn_depa' class='txt_direc' value='$Facultad'>
         </form>";
   }
 }
  

        function Mostar_Materias_cortas()
        {   require('coneccion.php');   

            echo "<form method='post' action=''>
                  <center>
                  <table class='tabla_menu'>
                  <tr><td class='btn_menu_sup'><input  type='submit' class='btn_menu_sup' value='Listado de Materias' name='btn_Ver_Listado_Materias'></td>
                  </form>
                  <form method='post' action='Crear_Materia2.php'>
                  <td class='btn_menu_sup'><input  class='btn_menu_sup' type='submit' name='btn_Crear_Materia' value='Crear Materia' ></td>
                  <td class='btn_menu_sup'><input  class='btn_menu_sup' type='submit' name='btn_Crear_Departamentos' value='Crear Departamentos' ></td></tr>
                  </table>
                  </center>
                  </form>";

            echo 
            '<table class="tabla_Buscador">
             <tr><td class="btn_mic"> 
             <button onclick="procesar()" id="procesar" class="btn_rec" ';     
            echo 
             '</button></td><td>
              <form method="post" action="Crear_Materia2.php">
              <input type="text" class="txt_Buscador" size="70" id="texto" name="txt_buscar_pg" placeholder="Escriba el nombre del materia que desee buscar"></td><td class="td_btn_buscar">
              <input type="submit" class="btn_buscar" name="btn_Buscar_Materias" value="Buscar"></form>
              </td></tr></table>';

            echo "<h4 class='etiqueta_h3'>Lista de las Materias Creadas</h>";
            echo "<h5> (*) Presione el link de examninar para obtener mas informacion de la materia</h5>";

              $query="SELECT * FROM materia m,carrera c WHERE m.ID_Carrera=c.ID_Carrera
                      ORDER BY m.Nivel_Materia ASC";
              
              $resultado=mysql_query($query,$link);
              echo "<table class='tabla_lista'>";

              while($row=mysql_fetch_array($resultado))
              {
                  echo "<form method='post' action='Crear_Materia2.php'> 

                          <tr><td class='td_materia'>".$row['Nombre_Materia']."</td>
                          <td class='td_sub_materia'>".$row['Codigo']."</td>
                          <td class='td_sub_materia'>".$row['Grupo']."</td>
                          <td class='td_sub_materia'>".$row['nombre_carrera']."</td>
            
                          <td class='td_sub_materia'><input type='text' value='".$row['ID_Materia']."' name='txt_ID_M' style='visibility:hidden; width:1px;'> <input type='submit' class='btn_examinar_pg' value='Examinar' name='btn_Examinar'></td>
                          
                          </td></tr>
                         </form> ";
               }   
              echo "</table>";  
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
