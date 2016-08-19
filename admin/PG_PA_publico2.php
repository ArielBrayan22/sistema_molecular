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

<h4 class='etiqueta_h3'>Planes Globales y Programas Ananliticos</h4>
<p id='espacio'>a</p>

<table class="tabla_Buscador">
   <tr><td> 
    <button onclick="procesar()" id="procesar" class="btn_rec"></button></td><td>
    <form method="post" action='PG_PA_publico2.php'>
    <input type="text" class="txt_Buscador" size="70" id="texto" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td>
    <input type="submit" class="btn_Buscar" name="Buscar_PG" class='btn_buscar' value="Buscar"></form>
   </td></tr></table>

     <?php
    

    require('coneccion.php');
    //mostrar_selec_planglobal();

  //BOTON SELECCION DE MATERIA
    //BOTON MOSTRAR PG DE MARTERIAS

    if(isset($_POST['btn_Mostrar_PG_Materia']))
    {
     // echo "hoalss";
       $Seleccion_F=$_POST['facultad'];
       $Seleccion_C=$_POST['departamento'];
       $Seleccion_c=$_POST['carrera'];
      $ID_Materia=$_POST['materia'];
       $nivel=$_POST['nivel'];

      for ($i=0;$i<count($Seleccion_F);$i++)
        {  $ID_Facultad=$Seleccion_F[$i];} 

      for ($i=0;$i<count($Seleccion_C);$i++) 
        {  $ID_Carrera=$Seleccion_C[$i];} 

     
       //echo  $ID_Materia;
   
       //echo "mostrar menu de plan global";
   
     if($ID_Materia>0)
     {
        mostrar_pg_materias($ID_Materia);   

       //echo $ID_Facultad." ".$ID_Carrera." ".$ID_Materia." ";
     }
      else{
        echo "<p class='mensaje_correcto'> Debes elegir una opcion</p>";
        mostrar_selec_planglobal();
      }
    
     

    }


    function mostrar_selec_planglobal()
    {   require('coneccion.php');
       echo "<form method='post' action='PG_PA_publico2.php'>
            <p id='espacio'>a</p>";
       
        echo '<form action="" method="post">
        <table class="tabla_100" > 

        <tr><td class="td_tabla">Facultad</td><td>
        <select name="facultad" class="select_fact">
        <option value="0">Seleccione la Facultad</option>';

        $sql = "SELECT * FROM facultad ORDER BY Facultad ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Facultad'].'">'.$ln['Facultad'].'</option>';
        }
       
       echo '</select></td></tr>
         <tr><td class="td_tabla">Departamento</td><td>
         <select name="departamento">
          <option value="0">Seleccione el departamento</option>
            <option value="1" disabled="disabled">departamentos</option>
        </select></p></td></tr>
        
        
        <tr><td class="td_tabla">Carrera</td><td>
        <select name="carrera">
          <option value="0">Seleccione la carrera</option>
            <option value="1" disabled="disabled">carreras</option>
        </select>
        </td></tr>
       
       <tr><td class="td_tabla">Nivel</td><td>
       
         <select name="nivel">
             <option value="0" ">Seleccione el nivel</option>
             <option value="1" disabled="disabled">materias</option>
        </select>
        </td></tr>
        
        <tr><td class="td_tabla">Materia</td><td>
   
         <select name="materia">
             <option value="0" ">Seleccione la materia</option>
             <option value="1" disabled="disabled">materias</option>
        </select>
        </td></tr>

        <tr><td colspan="2"><center><input type="submit" class="btn_crear" 
        name="btn_Mostrar_PG_Materia" value="Buscar"></center>
        </td></tr</tr>
        </table></form>';
    }


    //FUNCION MOSTRAR MATERIAS
    function mostrar_pg_materias($ID_Materia)
    {
      require("coneccion.php");

       
       $query="SELECT * FROM materia WHERE ID_Materia=$ID_Materia";

       $resultado=mysql_query($query,$link);
     
       echo '<form method="post" action="">

       <p id="espacio">a</p>
       <table class="tabla_100">
       <tr><td class="td_tabla"> Codigo </td>
       <td class="td_tabla"> Materia </td>
       <td class="td_tabla"> Grupo </td>
       <td class="td_tabla"> Nivel </td>
       <td class="td_tabla"> Ver </td>
       <td class="td_tabla"> Imprimir </td></tr><tr>';

       while($row=mysql_fetch_array($resultado))
       {  
          //$Cod_Materia=$row['ID_Materia'];

        echo '<td>'.$row['Codigo'].'</td>
              <td>'.$row['Nombre_Materia'].'</td>
              <td><center>'.$row['Grupo'].'</center></td>
              <td><center>'.$row['Nivel_Materia'].'</center></td>';
        echo "<td><center>&nbsp;&nbsp;<input type='submit' value='examinar PG' class='btn_editar' name='Btn_Plan_Global'></br>
        
        <input type='text' value='".$row['ID_Materia']."' name='txt_ID_Materia' style='visibility:hidden; width:0px;'>

                  <input type='submit' value='examinar PA' class='btn_crear' name='Btn_Ver_Programa_Analitio'></center></td>
                </form>
              <td><center>
               <form class='form' method='post' action='Imprimir_Plan_Global.php'>
               <input type='submit' value='imprimir PG' class='btn_editar' name='BtnImprimir_PG'>
               <input type='text' value='".$row['ID_Materia']."' name='txt_ID_Materia' style='visibility:hidden; width:0px;'>
               </form>

               <form class='form' method='post' action='imprimir_Programa_Analitico.php'>
               <input type='submit' value='imprimir PA'  class='btn_crear' name='BtnImprimir_PA'>
               <input type='text' value='".$row['ID_Materia']."' name='txt_ID_Materia' style='visibility:hidden; width:0px;'>
               </form>


               </center></td>";
        }
       
        echo "</table>";
        //txt_ID_Materia

          /*$Cod_PG= $_POST['Cod_PG']; 
          $Cod_M=$_POST['Cod_M']; 
          $code_Mat=$_POST['txt_ID_Materia'];*/

          echo "<p id='espacio'>a</p><form  method='post' action='PG_PA_publico.php'>
       <center><input type='submit' value='volver' class='btn_examinar_pg' name=''></center></form>";

    }

     if(isset($_POST['btn_Menu_Materia']))
     { $Cod_M=$_POST['txt_ID_Materia'];
       mostrar_pg_materias($Cod_M);
     }

if(isset($_POST['Btn_Plan_Global']))
{
         $Cod_M=$_POST['txt_ID_Materia'];
          
          echo "<form method='post'>

          <center> <input type='text' value='".$Cod_M."' name='txt_ID_Materia' style='visibility:hidden; width:0px;'>
          <input type='submit' value='volver' name='btn_Menu_Materia' class='btn_examinar_pg'></center>
          </form>";

          $consulta="SELECT * FROM materia m ,planglobal pg 
                     WHERE pg.ID_Materia=m.ID_Materia AND m.ID_Materia='$Cod_M'";
          $Cod_PG=0;
          $resultado=mysql_query($consulta);
          while($row=mysql_fetch_array($resultado)){
                $Cod_PG=$row['ID_PG'];
            }
      
           $Cod_PG;

         echo '<center><P id="tabla_titulo" >UNIVERSIDAD MAYOR DE SAN SIMON </P>
                <P id="tabla_titulo" >FACULTAD DE CIENCIAS Y TECNOLOGIA</P>
                <hr id="linea_primaria"></hr>
                <h4 id="tabla_titulo">PLAN GLOBAL</h4>';

                  $consulta="SELECT DISTINCT * FROM materia m WHERE m.ID_Materia=$Cod_M";
  
                  $resultado=mysql_query($consulta);

                   while($row=mysql_fetch_array($resultado)){

                   echo '<h4 id="tabla_titulo">'.$row['Nombre_Materia'].'</h4>';}
                   echo '</center>';

                   echo '<hr id="linea_secundaria"></hr>';

 //I. DATOS DE IDENTIFICACION
                   echo '<H4 id="tabla_title">I. DATOS DE IDENTIFICACION</H4>';


    echo '<table id="tabla_Ident">';

          $consulta="SELECT DISTINCT * FROM materia m WHERE m.ID_Materia=$Cod_M";
  
          $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           echo ' <tr><td><li type="square">Nombre de la materia :</li></td><td>'.
                $row['Nombre_Materia'].'</td></tr>
               <tr><td><li type="square">Codigo :</li></td><td>'
               .$row['Codigo'].'</td></tr>
               <tr><td><li type="square">Grupo :</li></td><td>'
               .$row['Grupo'].'</td></tr>
               <tr><td><li type="square">Carga horaria:</li></td><td>'
               .$row['Carga_Horaria'].' hrs/mes</td></tr>
               <tr><td><li type="square">Materias Relacionadas:</li></td><td>'
               .$row['Materias_Relacionadas'].'</td></tr>';

                }
         

    echo '<tr><td><li type="square"> Docente :</li></td><td>
           <table>';
           
              $consulta="SELECT * FROM planglobal pg,materia m,docente d 
                   WHERE m.ID_Materia=$Cod_M AND pg.ID_Materia=m.ID_Materia 
                   AND pg.ID_Docente=d.ID_Docente";
  
        $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           echo '<tr><td>'.$row['Nombre_Completo'].' '
                          .$row['Apellidos']
                         .'</td></tr>';
                   }

    echo '</table
             </td></tr>';
  // MOSTRAR TELEFONOS
    echo '<tr><td><li type="square">Telefono :</li></td><td>
           <table>';

           $consulta="SELECT * FROM planglobal pg,materia m,docente d 
                      WHERE m.ID_Materia=$Cod_M AND pg.ID_Materia=m.ID_Materia 
                      AND pg.ID_Docente=d.ID_Docente";
  
        $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           echo '<tr><td>'.$row['Telefono'].'</td></tr>';
                } 
          
    echo  '</table></td></tr>';

    //MOTRANDO CORREOS

    echo '<tr><td><li type="square">Correo :</li></td><td>
           <table>';

           $consulta="SELECT * FROM planglobal pg,materia m,docente d 
                      WHERE m.ID_Materia=$Cod_M AND pg.ID_Materia=m.ID_Materia 
                      AND pg.ID_Docente=d.ID_Docente";
  
        $resultado=mysql_query($consulta);

        while($row=mysql_fetch_array($resultado)){

           echo '<tr><td>'.$row['Correo'].'</td></tr>';
                      } 
          
    echo  '</table></td></tr></table>';


    //MOSTRAR JUSTIFICACION

         echo '<H4 id="tabla_title">II. JUSTIFICACION</H4>'; 
        
         echo '<table id="tabla_Ident">';

          $query="SELECT * FROM justificacion j,planglobal pg 
                  WHERE j.ID_PG='$Cod_PG' AND j.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>'.$row['Justificacion'].'</td></tr>'; } 
          
          echo  '</table>';


  //MOSTRAR OBJETIVOS

           //MOSTRAR JUSTIFICACION

         echo '<H4 id="tabla_title">III. OBJETIVOS</H4>'; 
        
         echo '<table id="tabla_Ident">';

          $query="SELECT * FROM objetivo o,planglobal pg 
                  WHERE o.ID_PG='$Cod_PG' AND o.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>&bull; '.$row['Texto_Obj'].'</td></tr>'; } 
          
          echo  '</table>';

 //MOSTRAR SELECCION Y ORGANIZACION DE CONTENIDOS

          echo '<H4 id="tabla_title_large">IV. SELECCION Y ORGANIZACION DE CONTENIDOS</H4>'; 
        
        

          $query="SELECT COUNT(*) FROM unidad u,planglobal pg 
                  WHERE u.ID_PG='$Cod_PG' AND u.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query,$link);
          $u=mysql_result($resultado, 0, "COUNT(*)");
          
          $query1=" SELECT * FROM unidad u,planglobal pg 
                    WHERE u.ID_PG='$Cod_PG' AND u.ID_PG=pg.ID_PG";
          $resultado1=mysql_query($query1,$link);
          
         echo '<table id="tabla_Ident"><tr><td>';
        
         for ($i=0; $i <$u; $i++) { 
             
              
             mysql_result($resultado1, $i, "Unidad");
             $id_unidad=mysql_result($resultado1, $i, "ID_Unidad");
        
             echo '<h4> Unidad '.mysql_result($resultado1, $i, "Numero_Unidad").' .-
             '.mysql_result($resultado1, $i, "Unidad").'</h4>';


             //OBJETIVO
             $query2="SELECT COUNT(*) FROM seccion_objetivo WHERE ID_Unidad=$id_unidad";
             $resultado2=mysql_query($query2,$link);

             $n=mysql_result($resultado2, 0, "COUNT(*)");
             
             echo "</p>Objetivo(s) de las unidad:</br>";

              for ($j=0; $j <$n ; $j++) { 
                 
                  $query3="SELECT * FROM seccion_objetivo WHERE ID_Unidad=$id_unidad";
                  $resultado3=mysql_query($query3,$link);
                  
                   echo '&nbsp;&nbsp;&nbsp;&nbsp; &bull; '.mysql_result($resultado3, $j, "Objetivo").'</br>';
    
                         }
                

             // CONTENIDO

                $query4="SELECT COUNT(*) FROM seccion_contenido WHERE ID_Unidad=$id_unidad";
                $resultado4=mysql_query($query4,$link);

                $m=mysql_result($resultado4, 0, "COUNT(*)");
                echo "</p>Contenido : </br>";
                 
                for ($k=0; $k <$m ; $k++) { 
                    $query5="SELECT * FROM seccion_contenido WHERE ID_Unidad=$id_unidad";
                    $resultado5=mysql_query($query5,$link);
                 
                 echo '&nbsp;&nbsp;&nbsp;&nbsp;'.mysql_result($resultado5, $k, "Contenido").'</br>';

                      }
                
                     }

             echo '</td></tr></table>';


        //MOSTRAMOS METODOLOGIAS

         echo '<H4 id="tabla_title">V. METODOLOGIAS</H4>'; 
        
         echo '<table id="tabla_Ident">';

          $query="SELECT * FROM metodologia m,planglobal pg 
                  WHERE m.ID_PG='$Cod_PG' AND m.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>&bull; '.$row['Metodologia'].'</td></tr>'; } 
          
          echo  '</table>';  

          //MOSTRAREMOS CRONOGRAMA O DURACIÓN EN PERIODOS ACADÉMICOS POR UNIDAD
         
          echo '<H4 id="tabla_title_large_2" >VI. CRONOGRAMA O DURACIÓN EN PERIODOS ACADÉMICOS POR UNIDAD</H4>'; 
        
         echo '<table id="tabla_Ident">';

          $query="SELECT * FROM planglobal pg,unidad u WHERE pg.ID_PG='$Cod_PG' AND pg.ID_PG=u.ID_PG";

          $resultado=mysql_query($query);
          echo '<tr><td id="titulo_tabla">Unidad</td>
                    <td id="titulo_tabla">Duracion </br> (Horas Academicas)</td>
                    <td id="titulo_tabla">Duracion en Semana</td></tr>';

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>&bull; '.$row['Unidad'].'</td><td id="td_Medio" >'.
                     $row['Hora_Academica'].'</td><td id="td_Medio">'.$row['Cant_Semana'].'</td></tr>'; } 
          
          echo  '</table>';  

          //MOSTRAREMOS CRITERIOS DE EVALUACION

          echo '<H4 id="tabla_title">VII. CRITERIOS DE EVALUACION</H4>'; 
        
          echo '<table id="tabla_Ident">';

          $query="SELECT * FROM criterio c,planglobal pg 
                  WHERE c.ID_PG='$Cod_PG' AND c.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>&bull; '.$row['Criterio'].'</td></tr>'; } 
          
          echo  '</table>';  
         
          //MOSTRAREMOS BIBLIOGRAFIA

          echo '<H4 id="tabla_title">VIII. BIBLIOGRAFIA</H4>'; 
        
          echo '<table id="tabla_Ident">';

          $query="SELECT * FROM bibliografia b,planglobal pg 
                  WHERE b.ID_PG='$Cod_PG' AND b.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>&bull; '.$row['texto'].'</td></tr>'; } 
          
          echo  '</table>';   
      }


  // Boton Mostrar Programa Analitico

      if(isset($_POST['Btn_Ver_Programa_Analitio']))
      {
         $Cod_M=$_POST['txt_ID_Materia'];
          
          echo "<form method='post'>

          <center> <input type='text' value='".$Cod_M."' name='txt_ID_Materia' style='visibility:hidden; width:0px;'>
          <input type='submit' value='volver' name='btn_Menu_Materia' class='btn_examinar_pg'></center>
          </form>";
       

         $query="SELECT * FROM planglobal pg, gestion g WHERE pg.ID_Materia='$Cod_M' AND pg.ID_Gestion=g.ID_Gestion";
         $resultado=mysql_query($query,$link);
         
         while($row=mysql_fetch_array($resultado))
         {
            $Cod_PG=$row['ID_PG'];
            $Gestion=$row['gestion'];
            $Semestre=$row['semestre'];
         }

        echo '<table>
         <tr><td><img src="imagenes/img_pa.jpg"></td>
         <td><H2 id="titulo_PA">UNIVERSIDAD MAYOR DE SAN SIMON</H1></BR>
             <H2 id="titulo_PA">FACULTAD DE CIENCIAS Y TECNOLOGIA</H1</td></tr>
        </table>';
         
         echo "<hr></hr>";

         echo "<CENTER><h2 id='titulo_Principal_PA'>PROGRAMA ANALÍTICO</h1></CENTER>";

         echo "<h3 id='titulos_PA'> IDENTIFICACION</h3>";

         echo "
         <table id='tabla_PA'>
         <tr><td>
         <table id='tabla_Ident_PA'>";
           $query="SELECT * FROM materia WHERE ID_Materia='$Cod_M'";
         $resultado=mysql_query($query,$link);
         
         while($row=mysql_fetch_array($resultado))
         {
              echo "<tr><td>Asignatura</td><td>".$row['Nombre_Materia']."</td></tr>";
                  
              echo "<td>Codigo</td><td>".$row['Codigo']."</td>";
         }
         
         
         $query="SELECT * FROM materia m,carrera c WHERE ID_Materia=' $Cod_M' AND c.ID_Carrera=m.ID_Carrera";
         $resultado=mysql_query($query,$link);
         
         while($row=mysql_fetch_array($resultado))
         {
              echo "<tr><td>Carrera</td><td>".$row['nombre_carrera']."</td></tr>";
         }
         
         echo "<tr><td>Gestion</td><td>$Gestion</td></tr>";
         echo "<tr><td>Semestre</td><td>$Semestre</td></tr>";
         
         $query="SELECT * FROM materia m, departamento d 
                 WHERE m.ID_Materia='$Cod_M' AND m.ID_Departamento=d.ID_Departamento";
         $resultado=mysql_query($query,$link);
         
         while($row=mysql_fetch_array($resultado))
         {
              echo "<tr><td>Carga Horaria</td><td>".$row['Carga_Horaria']." hrs/mes</td></tr>";
                $Departamento=$row['Departamento'];
         }

         echo "</table></td>";
      
         echo "<td><table id='tabla_Ident_PA'>";
         echo "<tr><td>Departamento:</td><td>".$Departamento."</td></tr>";
                 $query="SELECT * FROM planglobal pg,docente d 
                         WHERE pg.ID_Materia='$Cod_M' AND pg.ID_Docente=d.ID_Docente";
                 $resultado=mysql_query($query,$link);
                 
                 while($row=mysql_fetch_array($resultado))
                 {
                      echo "<tr><td>Docentes</td><td>".$row['Nombre_Completo']
                            ."".$row['Apellidos']."</td></tr>";
                 }  

         echo "</table></td></tr></table>";


       echo "<h3 id='titulos_PA'> CONTENIDO ANALITICO</h3>";


           $Cod_PG;
          $query="SELECT COUNT(*) FROM unidad u,planglobal pg 
                  WHERE u.ID_PG='$Cod_M' AND u.ID_PG=pg.ID_PG AND pg.ID_Materia='$Cod_M'";

          $resultado=mysql_query($query,$link);
           $u=mysql_result($resultado, 0, "COUNT(*)");
          
          $query1=" SELECT * FROM unidad u,planglobal pg 
                    WHERE u.ID_PG='$Cod_M' AND u.ID_PG=pg.ID_PG";
          $resultado1=mysql_query($query1,$link);
          
         echo '<table id="tabla_Ident"><tr><td>';
        
       
         for ($i=0; $i <$u; $i++) { 
             
              
             mysql_result($resultado1, $i, "Unidad");
             $id_unidad=mysql_result($resultado1, $i, "ID_Unidad");
        
             echo '<h4> Unidad '.mysql_result($resultado1, $i, "Numero_Unidad").' .-
             '.mysql_result($resultado1, $i, "Unidad").'</h4>';



             // CONTENIDO

                $query4="SELECT COUNT(*) FROM seccion_contenido WHERE ID_Unidad=$id_unidad";
                $resultado4=mysql_query($query4,$link);

                $m=mysql_result($resultado4, 0, "COUNT(*)");
              
                for ($k=0; $k <$m ; $k++) { 
                    $query5="SELECT * FROM seccion_contenido WHERE ID_Unidad=$id_unidad";
                    $resultado5=mysql_query($query5,$link);
                 
                 echo '&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;'.mysql_result($resultado5, $k, "Contenido").'</br>';

                }
                
             }

         echo '</table>';

      echo "<h3 id='titulos_PA'> BIBLIOGRAFIA</h3>";

        echo '<table id="tabla_Ident">';

          $query="SELECT * FROM bibliografia b,planglobal pg 
                  WHERE b.ID_PG='$Cod_M' AND b.ID_PG=pg.ID_PG";

          $resultado=mysql_query($query);

          while($row=mysql_fetch_array($resultado)){

               echo '<tr><td>&bull; '.$row['texto'].'</td></tr>'; } 
          
          echo  '</table>';             

      }     
     
     
 // Buscador de planes globales

        if(isset($_POST['Buscar_PG']))
        {
            echo "<p id='espacio'>a</p><form  method='post' action='PG_PA_publico.php'>
                 <center><input type='submit' value='volver' class='btn_examinar_pg' name=''></center></form>";
           $Text_a_Buscar=$_POST['txt_buscar_pg'];


           echo "<h5>Resultado de su busqueda de Planes Globales :</h5><p id='espacio'>a</p>";

           if($Text_a_Buscar!=null){
           $sql="SELECT * FROM materia m, carrera c,planglobal pg, docente d,tipo t,departamento dp WHERE pg.ID_Materia=m.ID_Materia AND m.ID_Carrera=c.ID_Carrera AND pg.ID_Docente=d.ID_Docente AND pg.ID_Tipo=t.ID_Tipo AND m.ID_Departamento=dp.ID_Departamento AND 
                 m.Nombre_Materia LIKE '%$Text_a_Buscar%'";

             $resultado=mysql_query($sql);

            while($row=mysql_fetch_array($resultado))
            {
             echo "<form method='post'>
                   <table class='tabla_100'>";
           
             echo "<tr><td class='td_tabla'>Materia </td><td>".$row['Nombre_Materia']."</td></tr>";
             echo "<tr><td class='td_tabla'>Grupo </td><td>".$row['Grupo']."</td></tr>";
             echo "<tr><td class='td_tabla'>Nivel </td><td>".$row['Nivel_Materia']."</td></tr>";
             echo "<tr><td class='td_tabla''>Carrera </td><td>".$row['nombre_carrera']."</td></tr>";
             echo "<tr><td class='td_tabla'>Tipo </td><td>".$row['Tipo']."</td></tr>";
             echo "<tr><td class='td_tabla'>Docente </td><td>".$row['Nombre_Completo']." ".$row['Apellidos']."</td></tr>";  

             echo "<tr><td colspan='2'><center>
             <input type='text'  value='".$row['ID_Materia']."' name='ID_Materia' style='visibility:hidden; width:0px;'>
             <input type='submit' class='btn_examinar_pg' value='Examinar' name='Btn_examinar_Materia'></center>
             </td></tr></table></form><p id='espacio'>a</p>";
              }

           }

         else{ 
               //echo "<script>alert('Escriba Correctamente para Buscar su Plan Global');</script>";
                }
          }

      // BOTON EXAMINAR

          if(isset($_POST['Btn_examinar_Materia']))
          {
            $ID_Materia=$_POST['ID_Materia'];
            mostrar_pg_materias($ID_Materia);
          }
          



  ?>

  <script src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            $("select[name=facultad]").change(function(){

              $("select[name=departamento]").html('<option value="0">Cargando...</option>');
              
                $.post("opciones.php",
                    {ID_Facultad:$(this).val()},
                    function(valor){
                        $("select[name=departamento]").html(valor);
                    }
                )

            })

          
            $("select[name=departamento").change(function(){

                $("select[name=carrera]").html('<option value="0">Cargando...</option>');
                 
              
                $.post("opciones.php",
                    {ID_Departamento:$(this).val()},
                    function(valor){
                        $("select[name=carrera]").html(valor);
                    }
                )

            })


            $("select[name=carrera").change(function(){

                $("select[name=nivel]").html('<option value="0">Cargando...</option>');
                
              
                $.post("opciones.php",
                    {ID_Carrera:$(this).val()},
                    function(valor){
                        $("select[name=nivel]").html(valor);
                    }
                )

            })
    
               $("select[name=nivel").change(function(){

                $("select[name=materia]").html('<option value="0">Cargando...</option>');
                 
                $.post("opciones.php",
                    {ID_Materia:$(this).val()},
                    function(valor){
                        $("select[name=materia]").html(valor);
                    }
                )



               })
             




        })




    </script>

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
