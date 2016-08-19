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
  

  <?php
    } 
   else {
   include("link_salida.php");
   } ?>

 
  <?php

  require("coneccion.php");
   //MOSTRAR LISTADO DE PLANES GLOBALES
   mostrar_pg_cortos();


   
    function mostrar_pg_cortos()
    {     
       require('coneccion.php');
      //MENU DE OBSIONES USUARIO ROOT

                echo '<table class="tabla_menu">
                      <form method="post" actio="Crear_Plan_Global.php"><tr><td>
                      <input type="submit" class="btn_menu_sup" value="Lista Planes Globales" name="btn_Ver_Planes_Globales"></form></td>';

                echo "<form method='post' action='Crear_Plan_Global_2.php'>
                      <td><input  type='submit' class='btn_menu_sup' name='btn_Crear_Plan_Global' value='Crear Plan Global'></td>";

                 echo "<td><input type='submit' class='btn_menu_sup' value='Kardex' name='btn_kardex_PG'></td>
                  <td><input type='submit' class='btn_menu_sup' value='Bitacora' name='btn_Registro_PG'></td>
                  <td><input type='submit' class='btn_menu_sup' value='Configuraciones' name='btn_Configuracion'></form></td></tr></table>";

      //BUSCADOR DE PLANES GLOBALES

                echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="Buscar_PG" value=" Buscar ">
                </td></tr></form></table>';

          echo "<p id='espacio'>a</p>
          <h5>LISTADO DE PLANES GLOBLAES</h5>";
          echo "<h5> * Recuerde que el boton de Examinar podra ver a mas detalle el Plan Global</h5></p>";

          $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                  WHERE pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente
                  AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion
                  ORDER BY m.Nombre_Materia ASC";
          
          $resultado=mysql_query($query);
         
          while($row=mysql_fetch_array($resultado))
          {  
              echo "<form method='post' action='Crear_Plan_Global_2.php'>
              <table class='tabla_lista'>
                    
                     <tr>
                     <td class='td_materia'>".$row['Nombre_Materia']."</td>
                     <td class='td_sub_materia'>".$row['Codigo']."</td>
                     <td class='td_sub_materia'>".$row['Grupo']."</td>
                     <td class='td_sub_materia'>".$row['Tipo']."</td>
                     <td class='td_sub_materia'>".$row['gestion']."</td>

                     <td class='td_sub_materia'> 
                    
                     <input type='submit' class='btn_examinar_pg' value='Examinar' name='btn_Mostrar_Materia_Unitaria2'>
                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG'  style='visibility:hidden; width:1px;'>
                  
                     </td></tr>

                    </table> </form>";
          }


      }

     
 
  ?>




 <script type="text/javascript">

  var recognition;
  var recognizing = false;
  if (!('webkitSpeechRecognition' in window)) {
    //alert("¡API no soportada!");
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


<?php 

   
   ?>

</article>

<?php
  require("vistas/footer.php");
 ?>

