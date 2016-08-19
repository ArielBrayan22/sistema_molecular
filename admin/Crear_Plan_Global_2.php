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
   header("location: molecular/index.php");
   } ?>

 
  <?php

  require('coneccion.php');

   echo '<table class="tabla_menu">
                      <form method="post" action="Crear_Plan_Global.php"><tr><td>
                      <input type="submit" class="btn_menu_sup" value="Lista Planes Globales" name="btn_Ver_Planes_Globales"></form></td>';

                echo "<form method='post' action='Crear_Plan_Global_2.php'>
                      <td><input  type='submit' class='btn_menu_sup' name='btn_Crear_Plan_Global' value='Crear Plan Global'></td>";

                 echo "<td><input type='submit' class='btn_menu_sup' value='Kardex' name='btn_kardex_PG'></td>
                  <td><input type='submit' class='btn_menu_sup' value='Bitacora' name='btn_Registro_PG'></td>
                  <td><input type='submit' class='btn_menu_sup' value='Configuraciones' name='btn_Configuracion'></form></td></tr></table>";



    if(isset($_POST['btn_Mostrar_Materia_Unitaria2']))
     {
            $ID_PG=$_POST['txt_ID_PG'];

               echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="Buscar_PG" value=" Buscar ">
                </td></tr></form></table>';

          echo "<p id='espacio'>a</p>";
         
          $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                  WHERE pg.ID_PG=$ID_PG AND pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente
                  AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion";
          
          $resultado=mysql_query($query);
         
          while($row=mysql_fetch_array($resultado))
          {  
              echo "<table class='tabla_100'><form method='post' action=''>
                    <tr><td colspan='4' class='td_tabla'> <H5>PLAN GLOBLAl</H5> <h5> * Con los botones de Editar usted puede cambiar los datos y con boton de Eliminar borrarlos</h5></td></tr>
                    
                     <tr><td class='td_tabla_corto' >Materia</td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                     <tr><td class='td_tabla_corto'>Codigo</td><td>".$row['Codigo']."</td><td>Grupo</td><td>".
                     $row['Grupo']."</td></tr>

                     <tr><td class='td_tabla_corto'>Tipo de Docente </td><td>".$row['Tipo']."</td>
                     <td>Gestion</td><td>".$row['gestion']."</td></tr>

                     <tr><td  class='td_tabla_corto' >Docente asignado </td><td colspan='3'>".$row['Nombre_Completo']." ".$row['Apellidos']."</td></tr>

                     <tr><td> <input type='submit' class='btn_editar' value='Editar' name='btn_Editar_PG'></td>

                     <td colspan='3'><input type='submit' class='btn_eliminar' value='Eliminar' name='btn_Eliminar_PG'>

                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden'>

                     </td></tr>

                    </table> </form><p></p>";
             }

             echo  "<form method='post' >
                    <center><input type='submit'class='btn_examinar_pg'  value='volver' name='btn_Volver_a_listar_pg'></center>

                    </form>";  
           }


    function mostrar_pg_cortos()
     {     
      require('coneccion.php');
  
      //BUSCADOR DE PLANES GLOBALES

                echo '<table id="tabla_Buscador">
                <tr><td id="td_reco"> 
                <button onclick="procesar()" id="procesar" class="btn_rec" ';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="Txt_Buscar" size="70" id="texto" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar">
                <input type="submit" class="btn_Buscar" name="Buscar_PG" value="Buscar"></form>
                </td></tr></table>';

                echo "<h5>LISTADO DE PLANES GLOBLAES</h5>";
                echo "<h5> * Recuerde que el boton de Examinar podra ver a mas detalle el Plan Global</h5></p>";

                $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                WHERE pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente
                AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion
                ORDER BY m.Nombre_Materia ASC";
          
          $resultado=mysql_query($query);
         
          while($row=mysql_fetch_array($resultado))
          {  
              echo "<form method='post' action='Crear_Plan_Global_2.php'><table class='tabla_lista_pg'>
                    
                     <tr>
                     <td>".$row['Nombre_Materia']."</td>
                     <td>".$row['Codigo']."</td>
                     <td>".$row['Grupo']."</td>
                     <td>".$row['Tipo']."</td>
                     <td>".$row['gestion']."</td>

                     <td> 
                    
                     <input type='submit' class='btn_examinar_pg' value='Examinar' name='btn_Mostrar_Materia_Unitaria2'>
                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG'  style='visibility:hidden; width:5px;'>
                  
                     </td></tr>

                    </table> </form>";
          }
        }


        
    if(isset($_POST['btn_Crear_Plan_Global'])){
      
        echo '<form action="" method="post">
        <table class="tabla_100" > 

        <tr><td colspan="2" class="td_tabla"><h4>Creacion de Planes Globales</h4>
        <h5>Se recomienda seleccionar cada opcion segun el organigrama de la UMSS</h5></td></tr>

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
             <option name="A"> A </option>
             <option name="B"> B </option>
             <option name="C"> C </option>
             <option name="D"> D </option>
             <option name="E"> E </option>
             <option name="F"> F </option>
             <option name="G"> G </option>
             <option name="H"> H </option>
             <option name="I"> I </option>
             <option name="J"> J </option>
             
        </select>
        </td></tr>
        
        <tr><td class="td_tabla">Materia</td><td>
   
         <select name="materia">
             <option value="0" ">Seleccione la materia</option>
             <option value="1" disabled="disabled">materias</option>
        </select>
        </td></tr>';
        
        echo '<tr><td class="td_tabla">Docente</td><td>
        
         <select name="docente">
        <option value="0">Seleccione el docente</option>';

        $sql = "SELECT * FROM docente ORDER BY Nombre_Completo ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Docente'].'">'.$ln['Nombre_Completo'].' '.$ln['Apellidos'].'</option>';
        }
        echo "</select></td></tr>";


         echo '<tr><td class="td_tabla">Tipo</td><td>

         <select name="tipo">
         <option value="0">Tipo de docente</option>';

        $sql = "SELECT * FROM tipo ORDER BY Tipo ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Tipo'].'">'.$ln['Tipo'].'</option>';
        }
        echo "</select></td></tr>";

        echo '<tr><td class="td_tabla">Gestion</td><td>

        <select name="gestion">
        <option value="0">Gestion</option>';

        $sql = "SELECT * FROM gestion ORDER BY gestion ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Gestion'].'">'.$ln['gestion'].'</option>';
        }
        echo "</select></td></tr>

        <tr><td colspan='2'><center><input type='submit' class='btn_crear_pg' value='Crear Nuevo Plan Global' name='btn_Crear_Plan_Global2'></center></td></tr>";

        echo "</table></form>";  

     }
     
     function mostrar_crear_PG()
     {
      require("coneccion.php");
          echo '<form action="" method="post">
        <table class="tabla_100" > 

        <tr><td colspan="2" class="td_tabla"><h4>Creacion de Planes Globales</h4>
        <h5>Se recomienda seleccionar cada opcion segun el organigrama de la UMSS</h5></td></tr>

        <tr><td class="td_tabla">Facultad</td><td>
        <select name="facultad">
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
        </td></tr>';
        
        echo '<tr><td class="td_tabla">Docente</td><td>
        
         <select name="docente">
        <option value="0">Seleccione el docente</option>';

        $sql = "SELECT * FROM docente ORDER BY Nombre_Completo ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Docente'].'">'.$ln['Nombre_Completo'].' '.$ln['Apellidos'].'</option>';
        }
        echo "</select></td></tr>";


         echo '<tr><td class="td_tabla">Tipo</td><td>

         <select name="tipo">
         <option value="0">Tipo de docente</option>';

        $sql = "SELECT * FROM tipo ORDER BY Tipo ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Tipo'].'">'.$ln['Tipo'].'</option>';
        }
        echo "</select></td></tr>";

        echo '<tr><td class="td_tabla">Gestion</td><td>

        <select name="gestion">
        <option value="0">Gestion</option>';

        $sql = "SELECT * FROM gestion ORDER BY gestion ASC";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<option value="'.$ln['ID_Gestion'].'">'.$ln['gestion'].'</option>';
        }
        echo "</select></td></tr>

        <tr><td colspan='2'><center><input type='submit' class='btn_crear' value='Crear Nuevo Plan Global' name='btn_Crear_Plan_Global2'></center></td></tr>";

        echo "</table></form>";  
     }
     // BOTON CREAR NUEVO PLAN GLOBAL

     if(isset($_POST['btn_Crear_Plan_Global2']))
     {
       

        $Seleccion_F=$_POST['facultad'];
        $Seleccion_Dep=$_POST['departamento'];
        $Seleccion_C=$_POST['carrera'];
        echo $Seleccion_N=$_POST['nivel'];
        $Seleccion_M=$_POST['materia'];
        $Seleccion_D=$_POST['docente'];
        $Seleccion_T=$_POST['tipo'];
        $Seleccion_G=$_POST['gestion'];

        

        if($Seleccion_F>0 && $Seleccion_Dep>0 && $Seleccion_C>0 && $Seleccion_M>0 &&  $Seleccion_D>0 &&  $Seleccion_T>0 &&  $Seleccion_G>0)
        {
              $Seleccion_N;
         
         for ($i=0;$i<count($Seleccion_N);$i++) 
            {  $Nivel=$Seleccion_N[$i];} 

          for ($i=0;$i<count($Seleccion_F);$i++) 
            {  $ID_Facultad=$Seleccion_F[$i];} 

          for ($i=0;$i<count($Seleccion_F);$i++) 
            {  $ID_Facultad=$Seleccion_F[$i];} 
       
          for ($i=0;$i<count( $Seleccion_Dep);$i++) 
            {  $ID_Departamento=$Seleccion_Dep[$i];} 

          for ($i=0;$i<count($Seleccion_C);$i++) 
            {  $ID_Carrera=$Seleccion_C[$i];}   

          for ($i=0;$i<count($Seleccion_D);$i++) 
            {  $ID_Docente=$Seleccion_D[$i];}

          for ($i=0;$i<count($Seleccion_T);$i++) 
            {  $ID_Tipo=$Seleccion_T[$i];}
          
          for ($i=0;$i<count($Seleccion_G);$i++) 
            {  $ID_Gestion=$Seleccion_G[$i];}
            
            echo $Nivel;
            $ID_Materia=$Seleccion_M;
            $ID_Nivel=$Seleccion_N;

          //echo $ID_Facultad." - ".$ID_Departamento." - ".$ID_Carrera." - ".$ID_Nivel." - ".$ID_Materia." - ".$ID_Tipo." - ".$ID_Docente." - ".$ID_Gestion;
        
      if($ID_Facultad>0 && $ID_Departamento>0 && $ID_Carrera>0 && $ID_Materia>0
          && $ID_Tipo>0 && $ID_Docente>0 && $ID_Gestion>0 && $Nivel!='')
        {
               
                $query1="SELECT * FROM planglobal WHERE ID_Materia='$ID_Materia'";
                $resultado1=mysql_query($query1);
                $cont=0;
             
                 while($row=mysql_fetch_array($resultado1))
                 {
                   $cont++;
                 }

                 if($cont>0)
                 {
                     echo "<p class='mensaje_error'>(*)Ya existe este Plan Global</p>";
                     mostrar_crear_PG();
                 }

                 if($cont==0)
                 {
                     $query="INSERT INTO planglobal 
                     (`ID_PG`, `ID_Tipo`, `ID_Materia`, `ID_Docente`, `ID_Gestion`)
                     VALUES (NULL, '".$ID_Tipo."', '".$ID_Materia."', '".$ID_Docente."','".$ID_Gestion."');";
                     $resultado=mysql_query($query);

                     echo "<p class='mensaje_crear'>Se creo un nuevo plan global Correctamente</p>";
                     mostrar_crear_PG();
                  }

       
        }

      }


     else{
        echo "<p class='mensaje_correcto'>Se debe seleccionar todos los campos obligatoriamente</p>";
            mostrar_crear_PG();
     }

        



        //$ID_Tipo." - ".$ID_Gestion;
         
         /*INSERT INTO `planglobal` (`ID_PG`, `ID_Tipo`, `ID_Materia`, `ID_Docente`, `ID_Gestion`) VALUES (NULL, '1', '1', '1', '1');*/
         

        /* $query="SELECT * FROM planglobal WHERE 
                 ID_Tipo='$ID_Tipo' AND ID_Docente='$ID_Docente' AND ID_Gestion='$ID_Gestion' AND ID_Materia='$ID_Materia' ";
                 $resultado=mysql_query($query,$link);
                 $cont=0;
                 $cont_realcion=0;
                 
                 while($row=mysql_fetch_array($resultado))
                 {
                  $cont++;
                 }

          $query1="SELECT * FROM carrera c, materia m WHERE 
                  c.ID_Facultad='$ID_Facultad' AND c.ID_CARRERA='$ID_Carrera' AND m.ID_Carrera='$ID_Carrera'";
                 $resultado1=mysql_query($query1,$link);
                 
                 while($row=mysql_fetch_array($resultado1))
                 {
                   $cont_realcion++;
                 }

                if($cont==0 && $cont_realcion>0)
                 {
                  
                  
                    $query="INSERT INTO planglobal 
                    (`ID_PG`, `ID_Tipo`, `ID_Materia`, `ID_Docente`, `ID_Gestion`)
                     VALUES (NULL, '".$ID_Tipo."', '".$ID_Materia."', '".$ID_Docente."','".$ID_Gestion."');";
                     $resultado=mysql_query($query,$link);
                     

                    echo "Creacion Correcta del Plan Global";
                    mostrar_pg_cortos();

                 }

                 if($cont_realcion==0 && $cont>0)
                 {
                   echo "(*) La facultad y la carrera no pertenecen a la materia para crear el Plan Global";
                   mostrar_crear_PG();
                 }

                
          
                 if($cont>0 && $cont_realcion>0){
                  echo "Plan Global ya Existente verifique su lista de Planes Globales";
                 mostrar_crear_PG();
                 
                 }
                 */
      }


         function mostrar_pg()
         {
          require("coneccion.php");
            

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


         if(isset($_POST['btn_Mostrar_Materia_Unitaria']))
         {

            $ID_PG=$_POST['txt_ID_PG'];
             echo '<table id="tabla_Buscador">
                <tr><td> 
                <button onclick="procesar()" id="procesar" class="btn_rec" ';
               
                echo '</button></td><td>
                <form method="post">
                <input type="text" class="Txt_Buscar" size="85" id="texto" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar">
                <input type="submit" class="btn_Buscar" name="Buscar_PG" value="Buscar"></form>
                </td></tr></table>';

          echo "<H3>LISTADO DE PLANES GLOBLAES</H3>";
          echo "<h5> * Con los botones de Editar usted puede cambiar los datos y con boton de Eliminar borrarlos</h5></p>";

          $query="SELECT * FROM planglobal pg, materia m, docente d
                   WHERE pg.ID_PG=$ID_PG AND pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente ORDER BY m.Nombre_Materia ASC";
          
          $resultado=mysql_query($query);
         
          while($row=mysql_fetch_array($resultado))
          {  
              echo "<center><table class='tabla_lista_docentes'><form method='post' action=''>
                    
                     <tr><td id='td_caract'>Materia</td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                     <tr><td  id='td_caract'>Codigo</td><td>".$row['Codigo']."</td><td>Grupo</td><td>".
                     $row['Grupo']."</td></tr>

                     <tr><td  id='td_caract'>Tipo de Docente </td><td>".$row['tipo']."</td>
                     <td>Gestion</td><td>".$row['gestion']."</td></tr>

                     <tr><td  id='td_caract'>Docente asignado </td><td colspan='3'>".$row['Nombre_Completo']." ".$row['Apellido_Paterno']." ".$row['Apellido_Materno']."</td></tr>

                     <tr><td  id='td_caract'> <input type='submit' value='Editar' name='btn_Editar_PG'></td>

                     <td colspan='3'><input type='submit' value='Eliminar' name='btn_Eliminar_PG'>

                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden'>

                     </td></tr>

                    </table> </form></center><p></p>";
             }

             echo  "<form method='post'>
                    <center><input type='submit' value='volver' name='btn_Volver_a_listar_pg'></center>

                    </form>";

               
           }

        // boton volver a listar los planes globales
          if(isset($_POST['btn_Volver_a_listar_pg']))
          {

             //BUSCADOR DE PLANES GLOBALES

                echo '<table id="tabla_Buscador">
                <tr><td id="td_reco"> 
                <button onclick="procesar()" id="procesar" class="btn_rec" ';
               
                echo '</button></td><td>
                <form method="post">
                <input type="text" class="Txt_Buscar" size="70" id="texto" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar">
                <input type="submit" class="btn_Buscar" name="Buscar_PG" value="Buscar"></form>
                </td></tr></table>';

          echo "<h5>LISTADO DE PLANES GLOBLAES</h5>";
          echo "<h5> * Recuerde que el boton de Examinar podra ver a mas detalle el Plan Global</h5></p>";

          $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                  WHERE pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente
                  AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion
                  ORDER BY m.Nombre_Materia ASC";
          
          $resultado=mysql_query($query);
         
          while($row=mysql_fetch_array($resultado))
          {  
              echo "<form method='post' action='Crear_Plan_Global_2.php'><center><table class='tabla_lista_pg'>
                    
                     <tr>
                     <td>".$row['Nombre_Materia']."</td>
                     <td>".$row['Codigo']."</td>
                     <td>".$row['Grupo']."</td>
                     <td>".$row['Tipo']."</td>
                     <td>".$row['gestion']."</td>

                     <td> 
                    
                     <input type='submit' class='btn_examinar_pg' value='Examinar' name='btn_Mostrar_Materia_Unitaria2'>
                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG'  style='visibility:hidden; width:5px;'>
                  
                     </td></tr>

                    </table> </form></center>";
          }
          }

        //Funcion de mostrar plan global editado
   
         function editar_pg($ID_PG_Editado)
         {
          require("coneccion.php");
          echo "</p>";
            echo "</p>";

            $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                    WHERE pg.ID_PG=$ID_PG_Editado AND pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente
                    AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion";
            
           
            echo "<table class='tabla_100'>";
             $resultado=mysql_query($query,$link);

             while($row=mysql_fetch_array($resultado))
             {
              echo "<form method='post' action=''>
                     <tr><td colspan='3' class='td_tabla'> <h5>EDICION DEL PLAN GLOBAL<h5>(*) No olvide Seleccionar y escribir en los campos de selecion y editado</h5></td></tr>

                     <tr><td class='td_tabla_corto'>Materia </td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                     <tr><td class='td_tabla_corto'>Codigo </td><td>".$row['Codigo']."</td>
                     <td colspan='2'>Gestion : ".$row['gestion']." Cambiar a : ";
                        
                        $query2="SELECT * FROM gestion";
                        $resultado2=mysql_query($query2,$link);
                        echo "<select name='select_G[]'>";
                        echo "<option value='-'>Gestion</option>";
                    
                        while($row1=mysql_fetch_array($resultado2))
                        {
                        echo" <option value=".$row1['ID_Gestion'].">".$row1['gestion']."</option>";    
                        }

                     echo "</select></td></tr>

                     <tr><td class='td_tabla_corto'>Tipo </td><td>".$row['Tipo']." </td><td colspan='2'> Cambiar a : ";


                      $query3="SELECT * FROM tipo";
                      $resultado3=mysql_query($query3,$link);
                      echo "<select name='select_T[]'>";
                      echo "<option value='-'>Tipo</option>";
                    
                      while($row2=mysql_fetch_array($resultado3))
                      {
                        echo "<option value=".$row2['ID_Tipo'].">".$row2['Tipo']."</option>"; }

                      echo "</select></td></tr>

                      <tr><td class='td_tabla_corto'>Docente </td><td>".$row['Nombre_Completo']." "
                     .$row['Apellidos']."</td><td colspan='2'>
                      Cambiar a :";
                    
                        $query2="SELECT * FROM docente  ORDER BY Nombre_Completo ASC";
                        $resultado2=mysql_query($query2,$link);
                        echo "<select name='select_D[]'>";
                        echo "<option value='-'>Docente</option>";
                    
                        while($row1=mysql_fetch_array($resultado2))
                        {
                               echo" <option value=".$row1['ID_Docente'].">".
                                            $row1['Nombre_Completo']." ".
                                            $row1['Apellidos']."".
                                            "</option>";    

                        }

                     
                     echo "  </select></td></tr>
                     <tr><td colspan='4'><center><input type='submit' class='btn_editar' value='Editar' name='btn_PG_Cambios'>
                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden; width:5px;'>
                     </center>

                     </td></tr></table></form>";
              }

            
              echo "<center><a href='Crear_Plan_Global.php' class='btn_examinar_pg'>Volver</a></center>";

         }
        
         //BOTON EDITAR PG

        if(isset($_POST['btn_Editar_PG']))
        {
            $ID_PG_Editado=$_POST['txt_ID_PG'];

            echo "</p>";
            echo "</p>";

            $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                    WHERE pg.ID_PG=$ID_PG_Editado AND pg.ID_Materia=m.ID_Materia AND pg.ID_Docente=d.ID_Docente
                    AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion";
            
           
            echo "<table class='tabla_100'>";
             $resultado=mysql_query($query,$link);

             while($row=mysql_fetch_array($resultado))
             {
              echo "<form method='post' action=''>
                     <tr><td colspan='3' class='td_tabla'> <h5>EDICION DEL PLAN GLOBAL<h5>(*) No olvide Seleccionar y escribir en los campos de selecion y editado</h5></td></tr>

                     <tr><td class='td_tabla_corto'>Materia </td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                     <tr><td class='td_tabla_corto'>Codigo </td><td>".$row['Codigo']."</td>
                     <td colspan='2'>Gestion : ".$row['gestion']." Cambiar a : ";
                        
                        $query2="SELECT * FROM gestion";
                        $resultado2=mysql_query($query2,$link);
                        echo "<select name='select_G[]'>";
                        echo "<option value='-'>Gestion</option>";
                    
                        while($row1=mysql_fetch_array($resultado2))
                        {
                        echo" <option value=".$row1['ID_Gestion'].">".$row1['gestion']."</option>";    
                        }

                     echo "</select></td></tr>

                     <tr><td class='td_tabla_corto'>Tipo </td><td>".$row['Tipo']." </td><td colspan='2'> Cambiar a : ";


                      $query3="SELECT * FROM tipo";
                      $resultado3=mysql_query($query3,$link);
                      echo "<select name='select_T[]'>";
                      echo "<option value='-'>Tipo</option>";
                    
                      while($row2=mysql_fetch_array($resultado3))
                      {
                        echo "<option value=".$row2['ID_Tipo'].">".$row2['Tipo']."</option>"; }

                      echo "</select></td></tr>

                      <tr><td class='td_tabla_corto'>Docente </td><td>".$row['Nombre_Completo']." "
                     .$row['Apellidos']."</td><td colspan='2'>
                      Cambiar a :";
                    
                        $query2="SELECT * FROM docente  ORDER BY Nombre_Completo ASC";
                        $resultado2=mysql_query($query2,$link);
                        echo "<select name='select_D[]'>";
                        echo "<option value='-'>Docente</option>";
                    
                        while($row1=mysql_fetch_array($resultado2))
                        {
                               echo" <option value=".$row1['ID_Docente'].">".
                                            $row1['Nombre_Completo']." ".
                                            $row1['Apellidos']."".
                                            "</option>";    

                        }

                     
                     echo "  </select></td></tr>
                     <tr><td colspan='4'><center><input type='submit' class='btn_editar' value='Editar' name='btn_PG_Cambios'>
                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden; width:5px;'>
                     </center>

                     </td></tr></table></form>";
              }

            
              echo "<center><a href='Crear_Plan_Global.php' class='btn_examinar_pg'>Volver</a></center>";
        }

  
        //BOTON REALIZAR CAMBIOS EN El PLAN GLOBAL 
        if(isset($_POST['btn_PG_Cambios']))
        { 
          $ID_PG=$_POST['txt_ID_PG'];
          $Selec_G=$_POST['select_G'];
          $Selec_T=$_POST['select_T'];
          $Selec_D=$_POST['select_D'];
               
          for ($i=0;$i<count($Selec_G);$i++) 
          { $ID_Gestion=$Selec_G[$i]; } 

          for ($j=0;$j<count($Selec_T);$j++) 
          { $ID_Tipo=$Selec_T[$j];
             } 

          for ($j=0;$j<count($Selec_D);$j++) 
          { $ID_Docente=$Selec_D[$j];
             } 

         
        //echo $ID_Gestion." ".$ID_Tipo." ".$ID_Docente." ";

       
          
         if($ID_Gestion!="-" && $ID_Tipo!="-"  && $ID_Docente!="-")
          {      echo "<p class='mensaje_crear'>Plan Global Editado Correctamente</p>";  
                 //$Tipo_Selec." ".$Doc_Selec." ".$gestion;
              $query="UPDATE `planglobal` 
                         SET `ID_Tipo` = '$ID_Tipo', `ID_Docente` ='$ID_Docente', `ID_Gestion` = '$ID_Gestion' 
                         WHERE `planglobal`.`ID_PG` = '$ID_PG';";

                 mysql_query($query,$link);
                 mostrar_pg();
            }

          if($ID_Gestion=="-" || $ID_Tipo=="-" || $ID_Docente=="-"){

                  if($ID_Gestion=="-" && $ID_Tipo=="-"  && $ID_Docente=="-")
                  { echo "<p class='mensaje_correcto'>(*)Debe Elegir todos los campos de seleccion para editar el Plan Global</p>";
                   editar_pg($ID_PG);
                   }
                   else{
                       echo "<p class='mensaje_correcto'>(*)Debe Elegir todos los campos de seleccion para editar el Plan Global</p>";
                       editar_pg($ID_PG);}
          }

      }

    //BOTON ELIMINAR PG 

    if(isset($_POST['btn_Eliminar_PG'])){
      
      $ID_PG=$_POST['txt_ID_PG'];
      $query="DELETE FROM `planglobal` WHERE ID_PG=$ID_PG";
      mysql_query($query,$link);
       //echo "<script>alert('Plan Gobal Eliminado');</script>";
      echo "<p class='mensaje_error'>Plan Global Eliminado Correctamente</p>";
      mostrar_pg2();
    }
  
     function mostrar_pg2()
     {
       require("coneccion.php");

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


//-----------------------------------------------------------------FIN PG ------------------------------------------------------
//-----------------------------------------------------------------FIN PG ------------------------------------------------------


    //BOTON MOSTRAR KARDEX 

    if(isset($_POST['btn_kardex_PG']))
    {
        
        echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="btn_Buscar_Kardex" value=" Buscar ">
                </td></tr></form></table>';


       echo "<p id='espacio'>a<p><h3>Resultados de Planes Globales en KARDEX </h3>";
       echo "<h5>Con el boton Restaurar recupera el Plan Global Eliminado con su respectivo Programa Analitico.</h5><p id='espacio'>a<p>";


           $sql="SELECT * FROM kardex k,materia m, docente d ,tipo t, gestion g
                 WHERE k.ID_Materia_K=m.ID_Materia AND k.ID_Docente_K=d.ID_Docente 
                 AND k.ID_Tipo_K=t.ID_TIPO AND k.ID_Gestion_K=g.ID_Gestion";

           $resultado=mysql_query($sql,$link);
           while($row=mysql_fetch_array($resultado))
           {  
             echo "<form method='post'>
             <table class='tabla_100'>";
             echo "<tr><td class='td_tabla_corto'>Materia</td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                   <tr><td class='td_tabla_corto'>Codigo</td><td>".$row['Codigo']."</td><td>Grupo</td><td>".$row['Grupo']."</td></tr>

                   <tr><td class='td_tabla_corto'>Tipo Docente</td><td>".$row['Tipo']."</td><td>Gestion</td><td>".$row['gestion']."</td></tr>

                   <tr><td class='td_tabla_corto'>Docente Asignado</td><td>".$row['Nombre_Completo']." ".$row['Apellidos']."

                   </td> <td colspan='2'><center><input type='submit' class='btn_crear' value='Restaurar' name='btn_Recuperar_PG'>

                   <input type='submit' value='Eliminar' class='btn_eliminar' name='btn_Eliminar_PG_Kardex'>
                   <input type='text' name='txt_Cod_Kardex' style='visibility:hidden; width:1px;' value='".$row['ID_Kardex']."' size='2'>

                   </center></td></tr>

                   </table></form><p id='espacio'>a<p>";
            
              }
     }
  //condicion

     if(isset($_POST['btn_Recuperar_PG']))
     {
        
      $ID_K=$_POST['txt_Cod_Kardex'];
      
      $sql="SELECT * FROM kardex WHERE ID_Kardex='$ID_K'";

      $resultado=mysql_query($sql,$link);
      while($row=mysql_fetch_array($resultado))
      {  
        // echo "<form method='post'><table id='tabla_grande'>";
         
        $ID_PG=$row['ID_PG_K'];
        $tipo=$row['ID_Tipo_K'];
        $ID_Materia=$row['ID_Materia_K'];
        $ID_Docente=$row['ID_Docente_K'];
        $ID_Gestion=$row['ID_Gestion_K'];
        
        $sql2="INSERT INTO planglobal (ID_PG, ID_Tipo,ID_Materia,ID_Docente,ID_Gestion) VALUES ('$ID_PG','$tipo','$ID_Materia', '$ID_Docente','$ID_Gestion')";

        $resultado2=mysql_query($sql2,$link);

        $sql3="DELETE FROM `kardex` WHERE `kardex`.`ID_Kardex` = $ID_K";
        $resultado3=mysql_query($sql3,$link);
        echo "<p class='mensaje_crear'>Plan Global Restaurado Correctamente</p>";
        mostrar_kardex();
       
       }
     }

      function mostrar_kardex()
      {
        require("coneccion.php");
        echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="btn_Buscar_Kardex" value=" Buscar ">
                </td></tr></form></table>';


       echo "<p id='espacio'>a<p><h3>Resultados de Planes Globales en KARDEX </h3>";
       echo "<h5>Con el boton Restaurar recupera el Plan Global Eliminado con su respectivo Programa Analitico.</h5><p id='espacio'>a<p>";


           $sql="SELECT * FROM kardex k,materia m, docente d ,tipo t, gestion g
                 WHERE k.ID_Materia_K=m.ID_Materia AND k.ID_Docente_K=d.ID_Docente 
                 AND k.ID_Tipo_K=t.ID_TIPO AND k.ID_Gestion_K=g.ID_Gestion";

           $resultado=mysql_query($sql,$link);
           while($row=mysql_fetch_array($resultado))
           {  
             echo "<form method='post'>
             <table class='tabla_100'>";
             echo "<tr><td class='td_tabla_corto'>Materia</td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                   <tr><td class='td_tabla_corto'>Codigo</td><td>".$row['Codigo']."</td><td>Grupo</td><td>".$row['Grupo']."</td></tr>

                   <tr><td class='td_tabla_corto'>Tipo Docente</td><td>".$row['Tipo']."</td><td>Gestion</td><td>".$row['gestion']."</td></tr>

                   <tr><td class='td_tabla_corto'>Docente Asignado</td><td>".$row['Nombre_Completo']." ".$row['Apellidos']."

                   </td> <td colspan='2'><center><input type='submit' class='btn_crear' value='Restaurar' name='btn_Recuperar_PG'>

                   <input type='submit' value='Eliminar' class='btn_eliminar' name='btn_Eliminar_PG_Kardex'>
                   <input type='text' name='txt_Cod_Kardex' style='visibility:hidden; width:1px;' value='".$row['ID_Kardex']."' size='2'>

                   </center></td></tr>

                   </table></form><p id='espacio'>a<p>";
            
              }
      }

      //FUNCION DE KARDEX PARA MOSTRAR SOLO BUSCADOR
      function mostrar_kardex_busqueda()
      {
         
      }
    
    //BOTON ELIMINAR PG DE KARDEX

      if(isset($_POST['btn_Eliminar_PG_Kardex']))
      {
         $ID_K=$_POST['txt_Cod_Kardex'];
      
         $sql="DELETE FROM kardex WHERE ID_Kardex='$ID_K'";

         $resultado=mysql_query($sql,$link);
         echo "<p class='mensaje_error'>(*) Se elmino correctamente el Plan Global de Kardex</p>";
         mostrar_kardex();

      }

//------------------------------------------------------------------FIN KDX ---------------------------------------------------
//------------------------------------------------------------------ FIN KDX --------------------------------------------------

     if(isset($_POST['btn_Registro_PG']))
     { 

         echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="btn_Buscar_Bitacora" value="Buscar ">
                </td></tr></form></table><p id="espacio">a</p>';
  
     
      echo "<h4 class='etiqueta_h3'> Resultado de Registro y Editado de Planes Globales </h3>";
      echo "<h5> * Esta funcion muestra los Planes Globales que se editaron o llenados</h5></p>";
         
      // echo "<table id='tabla_grande'>";
       $time = time();
       $anio =date("Y", $time);
       $mes =date("M", $time);
       $dia =date("d", $time);
       
       $query="SELECT * FROM registro_editado_pg";
       $resultado=mysql_query($query,$link);

        while($row=mysql_fetch_array($resultado))
        {
            $Estado=$row['Estado'];
            $ID_PG=$row['ID_PG'];
            $ID_Docente=$row['ID_Docente'];
            $fecha=$row['fecha'];

         
            //echo "<tr><td>".."</td></tr>";
            $query1="SELECT * FROM planglobal pg, tipo t, gestion g 
                     WHERE pg.ID_PG='$ID_PG' AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion";
            $resultado1=mysql_query($query1,$link);
           
            while($row1=mysql_fetch_array($resultado1))
            {   $ID_Materia=$row1['ID_Materia'];
                $Gestion=$row1['gestion'];
                $tipo=$row1['Tipo'];

                $query2="SELECT * FROM materia WHERE ID_Materia='$ID_Materia'";
                $resultado2=mysql_query($query2,$link);

               while($row2=mysql_fetch_array($resultado2)) 
                {
                  echo "<table class='tabla_lista_pg'>";
                  echo "<tr><td id='td_caract'>Plan Global</td><td>".$row2['Nombre_Materia']."</td></tr>";
                  echo "<tr><td id='td_caract'>Grupo</td><td>".$row2['Grupo']."</td></tr>";
                  echo "<tr><td id='td_caract'>Gestion</td><td>".$Gestion."</td></tr>";
                  echo "<tr><td id='td_caract'>Estado</td><td> Llenado / Editado </td></tr>";
                  echo "<tr><td id='td_caract'>Fecha</td><td> ".$fecha."</td></tr>";

                  $ID_Carrera=$row2['ID_Carrera'];
                  
                  $query4="SELECT * FROM carrera WHERE ID_Carrera=$ID_Carrera";
                  $resultado4=mysql_query($query4,$link);

                  while($row4=mysql_fetch_array($resultado4)) 
                  {
                    $Carrera=$row4['nombre_carrera'];
                    echo "<tr><td id='td_caract'>Carrera</td><td>".$Carrera."</td></tr>";

                    // MOSTRAR DOCENTE 
                    $query3="SELECT * FROM docente WHERE ID_Docente=$ID_Docente";
                    $resultado3=mysql_query($query3,$link);

                    while($row3=mysql_fetch_array($resultado3)) 
                    {
                    
                      $Docente=$row3['Nombre_Completo']." ".$row3['Apellidos'];
                      echo "<tr><td id='td_caract'>Tipo</td><td>".$tipo."</td></tr>";
                      echo "<tr><td id='td_caract'>Docente</td><td>".$Docente."</td></tr></table></p></p>";
                    }

                  }
                }          
              }
            }
         }


   
   // Buscador de planes globales

        if(isset($_POST['Buscar_PG']))
        {
           $Text_a_Buscar=$_POST['txt_buscar_pg'];

        echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="Buscar_PG" value=" Buscar ">
                </td></tr></form></table>';

          echo "<H5>RESULTADO DE PLANES GLOBLAES</H5>";
          echo "<H5>(*) Seleccione los botones de Editar para realizar cambios y de Eliminar para borrar el Plan Global</H5></p>";

          $query="SELECT * FROM planglobal pg, materia m, docente d, gestion g, tipo t
                  WHERE m.Nombre_Materia LIKE '%$Text_a_Buscar%' AND pg.ID_Materia=m.ID_Materia 
                  AND pg.ID_Docente=d.ID_Docente AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion
                  ORDER BY m.Nombre_Materia ASC";
          
          $resultado=mysql_query($query,$link);
          echo "";

          while($row=mysql_fetch_array($resultado))
          {
              echo "<table class='tabla_lista_pg'><form method='post' action=''>
                    
                     <tr><td id='td_caract'>Materia</td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                     <tr><td  id='td_caract'>Codigo</td><td>".$row['Codigo']."</td><td>Grupo</td><td>".
                     $row['Grupo']."</td></tr>

                     <tr><td  id='td_caract'>Tipo de Docente </td><td>".$row['Tipo']."</td>
                     <td>Gestion</td><td>".$row['gestion']."</td></tr>

                     <tr><td  id='td_caract'>Docente asignado </td><td colspan='3'>".$row['Nombre_Completo']." ".$row['Apellidos']."</td></tr>

                     <tr><td  id='td_caract'> <input type='submit' value='Editar' name='btn_Editar_PG'></td>

                     <td colspan='3'><input type='submit' value='Eliminar' name='btn_Eliminar_PG'>

                     <input type='text' value='".$row['ID_PG']."' name='txt_ID_PG' style='visibility:hidden'>

                     </td></tr>

                    </table> </form><p></p>";
          }

         }

         // BUSCADOR KARDEX

         if(isset($_POST['btn_Buscar_Kardex']))
         {
            $Text_a_Buscar=$_POST['txt_buscar_pg'];

             echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="btn_Buscar_Kardex" value=" Buscar ">
                </td></tr></form></table>';


                echo "<p id='espacio'>a<p><h3>Resultados de Planes Globales en KARDEX </h3>";
                 echo "<h5>Con el boton Restaurar recupera el Plan Global Eliminado con su respectivo Programa Analitico.</h5>
                 <p id='espacio'>a<p>";


           $sql="SELECT * FROM kardex k,materia m, docente d ,tipo t, gestion g
                 WHERE k.ID_Materia_K=m.ID_Materia AND k.ID_Docente_K=d.ID_Docente 
                 AND k.ID_Tipo_K=t.ID_TIPO AND k.ID_Gestion_K=g.ID_Gestion AND m.Nombre_Materia LIKE '%$Text_a_Buscar%'";

               $resultado=mysql_query($sql,$link);

            $cont=0;

           while($row=mysql_fetch_array($resultado))
           { $cont++; }

           if($cont>0){
              
              $sql="SELECT * FROM kardex k,materia m, docente d ,tipo t, gestion g
                 WHERE k.ID_Materia_K=m.ID_Materia AND k.ID_Docente_K=d.ID_Docente 
                 AND k.ID_Tipo_K=t.ID_TIPO AND k.ID_Gestion_K=g.ID_Gestion AND m.Nombre_Materia LIKE '%$Text_a_Buscar%'";

               $resultado=mysql_query($sql,$link);
               while($row=mysql_fetch_array($resultado)){

                echo "<form method='post'>
                      <table class='tabla_100'>";
                 echo "<tr><td class='td_tabla_corto'>Materia</td><td colspan='3'>".$row['Nombre_Materia']."</td></tr>

                   <tr><td class='td_tabla_corto'>Codigo</td><td>".$row['Codigo']."</td><td>Grupo</td><td>".$row['Grupo']."</td></tr>

                   <tr><td class='td_tabla_corto'>Tipo Docente</td><td>".$row['Tipo']."</td><td>Gestion</td><td>".$row['gestion']."</td></tr>

                   <tr><td class='td_tabla_corto'>Docente Asignado</td><td>".$row['Nombre_Completo']." ".$row['Apellidos']."

                   </td> <td colspan='2'><center><input type='submit' class='btn_crear' value='Restaurar' name='btn_Recuperar_PG'>

                   <input type='submit' value='Eliminar' class='btn_eliminar' name='btn_Eliminar_PG_Kardex'>
                   <input type='text' name='txt_Cod_Kardex' style='visibility:hidden; width:1px;' value='".$row['ID_Kardex']."' size='2'>

                   </center></td></tr>

                   </table></form><p id='espacio'>a<p>";}

           }
            else{ 
                  mostrar_kardex_busqueda();
                  echo "<p class='mensaje_crear'>Kardex de Plan Global no encontrado</p>";
            }

            }

         //BUSQUEDA BITACORA 
         if(isset($_POST['btn_Buscar_Bitacora']))
         {
             $Text_a_Buscar=$_POST['txt_buscar_pg'];
 
             echo '<table class="tabla_Buscador">
                <tr><td class="btn_mic"> 
                <button onclick="procesar()" id="procesar" class="btn_rec">';
               
                echo '</button></td><td>
                <form method="post" action="Crear_Plan_Global_2.php">
                <input type="text" class="txt_Buscador" id="texto" size="70" name="txt_buscar_pg" placeholder="Escriba el Plan Global a Buscar"></td><td class="td_btn_buscar">
                <input type="submit" class="btn_buscar" name="btn_Buscar_Bitacora" value="Buscar ">
                </td></tr></form></table><p id="espacio">a</p>';
  

      echo "<h4 class='etiqueta_h3'> Resultado de Registro y Editado de Planes Globales </h4>";
      echo "<h5> * Esta funcion muestra los Planes Globales que se editaron o llenados</h5></p>";
         
      // echo "<table id='tabla_grande'>";
       $time = time();
       $anio =date("Y", $time);
       $mes =date("M", $time);
       $dia =date("d", $time);
       
       $query="SELECT * FROM registro_editado_pg";
       $resultado=mysql_query($query,$link);

        while($row=mysql_fetch_array($resultado))
        {
            $Estado=$row['Estado'];
            $ID_PG=$row['ID_PG'];
            $ID_Docente=$row['ID_Docente'];
            $fecha=$row['fecha'];

         
            //echo "<tr><td>".."</td></tr>";
            $query1="SELECT * FROM planglobal pg, tipo t, gestion g 
                     WHERE pg.ID_PG='$ID_PG' AND pg.ID_Tipo=t.ID_Tipo AND pg.ID_Gestion=g.ID_Gestion";
            $resultado1=mysql_query($query1,$link);
           
            while($row1=mysql_fetch_array($resultado1))
            {   $ID_Materia=$row1['ID_Materia'];
                $Gestion=$row1['gestion'];
                $tipo=$row1['Tipo'];

                $query2="SELECT * FROM materia WHERE ID_Materia='$ID_Materia' AND Nombre_Materia LIKE '%$Text_a_Buscar%'";
                $resultado2=mysql_query($query2,$link);

               while($row2=mysql_fetch_array($resultado2)) 
                {
                  echo "<table class='tabla_lista_pg'>";
                  echo "<tr><td id='td_caract'>Plan Global</td><td>".$row2['Nombre_Materia']."</td></tr>";
                  echo "<tr><td id='td_caract'>Grupo</td><td>".$row2['Grupo']."</td></tr>";
                  echo "<tr><td id='td_caract'>Gestion</td><td>".$Gestion."</td></tr>";
                  echo "<tr><td id='td_caract'>Estado</td><td> Llenado / Editado </td></tr>";
                  echo "<tr><td id='td_caract'>Fecha</td><td> ".$fecha."</td></tr>";

                  $ID_Carrera=$row2['ID_Carrera'];
                  
                  $query4="SELECT * FROM carrera WHERE ID_Carrera=$ID_Carrera";
                  $resultado4=mysql_query($query4,$link);

                  while($row4=mysql_fetch_array($resultado4)) 
                  {
                    $Carrera=$row4['nombre_carrera'];
                    echo "<tr><td id='td_caract'>Carrera</td><td>".$Carrera."</td></tr>";

                    // MOSTRAR DOCENTE 
                    $query3="SELECT * FROM docente WHERE ID_Docente=$ID_Docente";
                    $resultado3=mysql_query($query3,$link);

                    while($row3=mysql_fetch_array($resultado3)) 
                    {
                    
                      $Docente=$row3['Nombre_Completo']." ".$row3['Apellidos'];
                      echo "<tr><td id='td_caract'>Tipo</td><td>".$tipo."</td></tr>";
                      echo "<tr><td id='td_caract'>Docente</td><td>".$Docente."</td></tr></table></p></p>";
                    }

                  }
                }          
              }
            }

         }

  //BOTON RESPALDO DEL BACKUP
    if(isset($_POST['btn_Configuracion']))
    {
      echo "</p><h4 class='etiqueta_h3'>Configuraciones del sistema de Planes Globales</h4>
            <h5>Se recomienda leer la pequena referencia en para cada boton</h5></p>
            <p id='espacio'>a</p>";
      echo "<form method='POST' action='Recuperacion_BD.php'>
            <table class='tabla_100'>
            <tr><td class='td_tabla'>Funciones</td><td class='td_tabla'>Especificaciones</td></tr>

            <tr><td><input type='submit' class='btn_crear_config' value='Realizar Copia de Seguridad' name='btn_Copia_DB'></td>
            <td>Con esta funcion se podra realizar una copia de seguridad de la base de datos tal y como esta en el momento de presionar el boton</td>
            </tr></form>
            <form method='POST' action=''>   
            <tr><td><input type='submit' class='btn_crear_config' value='Restaurar Base de Datos' name='btn_Restaurar_bd'></td>
            <td>Esta funcion realizara la restauracion de la base de datos segun la seleccion del administracion y la lista de almacenaje de BD.</td></tr>

            <tr><td><input type='submit' class='btn_crear_config' value='Insertar Gestion' name='btn_mostrar_gestion'></td>
            <td>Con esta funcion se agregar una nueva gestion para crear Planes globales</td></tr>

           <tr><td><input type='submit' class='btn_crear_config' value='Insertar Tipo de Docente' name='btn_agregar_tipo_d'></td>
            <td>Con este boton el administrador podra crear un nuevo tipo de docente</td></tr>
            </form>
            </table>";
    }

  // FUNCION DEL BACKUP

    function mostrar_config(){
    
      echo "</p><h4 class='etiqueta_h3'>Configuraciones del sistema de Planes Globales</h4>
            <h5>Se recomienda leer la pequena referencia en para cada boton</h5></p>
            <p id='espacio'>a</p>";
      echo "<form method='POST' action='Recuperacion_BD.php'>
            <table class='tabla_100'>
            <tr><td class='td_tabla'>Funciones</td><td class='td_tabla'>Especificaciones</td></tr>
            
            <tr><td><input type='submit' class='btn_crear_config' value='Realizar Copia de Seguridad' name='btn_Copia_DB'></td>
            <td>Con esta funcion se podra realizar una copia de seguridad de la base de datos tal y como esta en el momento de presionar el boton</td>
            </tr></form>
            <form method='POST' action=''>   
            <tr><td><input type='submit' class='btn_crear_config' value='Restaurar Base de Datos' name='btn_Restaurar_bd'></td>
            <td>Esta funcion realizara la restauracion de la base de datos segun la seleccion del administracion y la lista de almacenaje de BD.</td></tr>

            <tr><td><input type='submit' class='btn_crear_config' value='Insertar Gestion' name='btn_mostrar_gestion'></td>
            <td>Con esta funcion se agregar una nueva gestion para crear Planes globales</td></tr>

           <tr><td><input type='submit' class='btn_crear_config' value='Insertar Tipo de Docente' name='btn_agregar_tipo_d'></td>
            <td>Con este boton el administrador podra crear un nuevo tipo de docente</td></tr>
            </form>
            </table>";
    }

    //BOTON MOSTRAR AGREGADA DE GESTION

    if(isset($_POST['btn_mostrar_gestion']))
    {
      echo "</p><h4 class='etiqueta_h3'> Para una insercion correcta seleccion numero de gestion - anio</h4></p>";
      echo "<form method='post' action=''>
           <table class='tabla_100'>
            <tr><td class='td_tabla'>Gestion</td>
            <td><input type='text' name='txt_nueva_gestion' size='10'></td>
            <td class='td_tabla' >Semestre</td>
            <td><input type='text' name='txt_nuevo_semestre' size='10'></td>
            
            <td><input type='submit' class='btn_crear' name='btn_agregar_gestion' value='Crear Gestion'></br>
           
            </table>
            
            <p id='espacio'>a</p>
            <center><input type='submit' value='Volver' name='btn_Configuracion' class='btn_examinar_pg'></center>
            <p id='espacio'>a</p>
           </form>";
              $query="SELECT * FROM gestion";
             $resultado=mysql_query($query);

          while ($row=mysql_fetch_array($resultado)) {
          echo "<table class='tabla_100'><form method='post'>";
          echo "<tr><td><input type='text' value='".$row['gestion']."' name='gestion' size='5'></td>
                <td><input type='text' value='".$row['semestre']."' name='semestre' size='10'> <input type='text' value='".$row['ID_Gestion']
                ."' name='ID_Gestion' style='width:1px; visibility:hidden;'</td>
                <td><input type='submit' class='btn_editar'value='Editar' name='btn_Editar_Gestion'></td>
                <td><input type='submit' class='btn_eliminar' value='Eliminar' name='btn_Eliminar_Gestion'></td></tr>";
          echo "</form></table>";}


    }

   // BOTON AGREGAR NUEVO TIPO DOCENTE

    if(isset($_POST['btn_agregar_tipo_d']))
    {
      echo "<h4 class='etiqueta_h3'>Inserte el tipo de docente para asignar a los Planes Globales</h4>
            <h5>(*) Se recomienda no dejar campos vacios</h5><p id='espacio'>a</p>
           <form method='post' action=''>
           <table class='tabla_100'>
            <tr><td class='td_tabla'>Tipo de Docente</td>
            <td><input type='text' name='txt_Tipo_Docente' size='15'></td>
            
            <td><input type='submit' class='btn_crear' name='btn_agregar_tipo_docente' value='Crear Tipo'>
            </td></tr>
            </table>
            <p id='espacio'>a<p>
            <center><input type='submit' value='Volver' name='btn_Configuracion' class='btn_examinar_pg'></center>
           </form>";

        $query="SELECT * FROM tipo";
        $resultado=mysql_query($query);
        echo "<table class='tabla_100'>";
        while ($row=mysql_fetch_array($resultado)) {
          echo "<form method='post'>";
          echo "<tr><td class='td_tabla'>Docente</td><td><input type='text' value='".$row['Tipo']."' name='txt_Tipo' size='15'></td>
                 <input type='text' name='ID_Tipo' value='".$row['ID_Tipo']."' style='width:1px; visibility:hidden;'></td>
                
                <td><input type='submit' value='Editar' class='btn_editar' name='btn_Editar_Tipo_D'></td>
                <td><input type='submit' value='Eliminar' class='btn_eliminar' name='btn_Eliminar_Tipo_D'></td></tr>";
          echo "</form>";
      }
      echo "</table>";
    }

    //FUNCION MOSTRAR TIPOS DE DOCENTES
    function mostrar_tipos_docente()
    {
      require("coneccion.php");
        echo "<h4 class='etiqueta_h3'>Inserte el tipo de docente para asignar a los Planes Globales</h4>
            <h5>(*) Se recomienda no dejar campos vacios</h5><p id='espacio'>a</p>
           <form method='post' action=''>
           <table class='tabla_100'>
            <tr><td class='td_tabla'>Tipo de Docente</td>
            <td><input type='text' name='txt_Tipo_Docente' size='15'></td>
            
            <td><input type='submit' class='btn_crear' name='btn_agregar_tipo_docente' value='Crear Tipo '>
            </td></tr>
            </table>
            <p id='espacio'>a<p>
            <center><input type='submit' value='Volver' name='btn_Configuracion' class='btn_examinar_pg'></center>
           </form>";

        $query="SELECT * FROM tipo";
        $resultado=mysql_query($query);
        echo "<table class='tabla_100'>";
        while ($row=mysql_fetch_array($resultado)) {
          echo "<form method='post'>";
          echo "<tr><td class='td_tabla'>Docente</td><td><input type='text' value='".$row['Tipo']."' name='txt_Tipo' size='15'></td>
                 <input type='text' name='ID_Tipo' value='".$row['ID_Tipo']."' style='width:1px; visibility:hidden;'></td>
                
                <td><input type='submit' value='Editar' class='btn_editar' name='btn_Editar_Tipo_D'></td>
                <td><input type='submit' value='Eliminar' class='btn_eliminar' name='btn_Eliminar_Tipo_D'></td></tr>";
          echo "</form>";
      }
      echo "</table>";
    }
   
    if(isset($_POST['btn_agregar_tipo_docente']))
    {  $Txt_Docente_Tipo=$_POST['txt_Tipo_Docente'];

      if($Txt_Docente_Tipo!="" )
      {
        echo "<p class='mensaje_crear'>Registro de tipo de docente correctamente</p>";
        $query="INSERT INTO tipo values('','$Txt_Docente_Tipo')";
        mysql_query($query);

        mostrar_tipos_docente();
      }

      if($Txt_Docente_Tipo=="" )
      {
        echo "<p class='mensaje_correcto'>Llene el campo para realizar un registro correto del tipo de docente</p>";
       mostrar_tipos_docente();
      }

    }
    //BOTON ELIMINAR TIPOS DE DOCENTE

    if(isset($_POST['btn_Eliminar_Tipo_D']))
    { $ID_Tipo=$_POST['ID_Tipo'];

       $query="DELETE FROM tipo WHERE ID_Tipo='$ID_Tipo'";
       mysql_query($query);
       echo "<p class='mensaje_error'>Se elimino correctamente el tipo de docente</p>";
       mostrar_tipos_docente();
    }

     // BOTON EDITAR TIPO DOCENTE

    if(isset($_POST['btn_Editar_Tipo_D']))
    {
       $ID_Tipo=$_POST['ID_Tipo'];
       $txt_Tipo=$_POST['txt_Tipo'];
       
       if($txt_Tipo!=""){
         
         $query="UPDATE tipo SET tipo='$txt_Tipo' WHERE ID_Tipo='$ID_Tipo'";
         mysql_query($query);
         echo "<p class='mensaje_crear'>Se edito correctamente la gestion</p>";
        mostrar_tipos_docente();
       }

       if($txt_Tipo=="")
       {
         echo "<p class='mensaje_correcto'>(*)Se recomienda para editar correctamente insertar datos en los campos vacios</p>";
         mostrar_tipos_docente();
       }

      
    }

   //FUNCION MOSTRAR AGREGAR NUEVA GESTION

    function mostrar_agregar_gestion()
    {
      require("coneccion.php");
    echo "</p><h4 class='etiqueta_h3'> Para una insercion correcta seleccion numero de gestion - anio</h4></p>";
      echo "<form method='post' action=''>
           <table class='tabla_100'>
            <tr><td class='td_tabla'>Gestion</td>
            <td><input type='text' name='txt_nueva_gestion' size='10'></td>
            <td class='td_tabla' >Semestre</td>
            <td><input type='text' name='txt_nuevo_semestre' size='10'></td>
            
            <td><input type='submit' class='btn_crear' name='btn_agregar_gestion' value='Crear Gestion'></br>
           
            </table>
            
            <p id='espacio'>a</p>
            <center><input type='submit' value='Volver' name='btn_Configuracion' class='btn_examinar_pg'></center>
            <p id='espacio'>a</p>
           </form>";
              $query="SELECT * FROM gestion";
             $resultado=mysql_query($query);

          while ($row=mysql_fetch_array($resultado)) {
          echo "<table class='tabla_100'><form method='post'>";
          echo "<tr><td><input type='text' value='".$row['gestion']."' name='gestion' size='5'></td>
                <td><input type='text' value='".$row['semestre']."' name='semestre' size='10'> <input type='text' value='".$row['ID_Gestion']
                ."' name='ID_Gestion' style='width:1px; visibility:hidden;'</td>
                <td><input type='submit' class='btn_editar'value='Editar' name='btn_Editar_Gestion'></td>
                <td><input type='submit' class='btn_eliminar' value='Eliminar' name='btn_Eliminar_Gestion'></td></tr>";
          echo "</form></table>";}

  }

    if(isset($_POST['btn_agregar_gestion']))
    {
      $txt_gestion=$_POST['txt_nueva_gestion'];
      $txt_semestre=$_POST['txt_nuevo_semestre'];
      $txt_gestion;

      if($txt_gestion!="" && $txt_semestre!="")
      {
        echo "<p class='mensaje_crear'>Registro de gestion correctamente</p>";
        $query="INSERT INTO gestion values('','$txt_gestion','$txt_semestre')";
        mysql_query($query);

        mostrar_agregar_gestion();
      }

      if($txt_gestion=="" || $txt_semestre=="")
      {
        echo "<p class='mensaje_correcto'>Llene el campo de gestion y semestre para realizar un registro correto</p>";
        mostrar_agregar_gestion();
      }
    

    }
 
  

    // BOTON ELIMINAR GESTIONES

    if(isset($_POST['btn_Eliminar_Gestion']))
    {
       $ID_Gestion=$_POST['ID_Gestion'];
       $query="DELETE FROM gestion WHERE ID_Gestion='$ID_Gestion'";
       mysql_query($query);
       echo "<p class='mensaje_error'>Se elimino correctamente la gestio</p>";
       mostrar_agregar_gestion();
    }

    // BOTON EDITAR GESTIONES

    if(isset($_POST['btn_Editar_Gestion']))
    {
       $ID_Gestion=$_POST['ID_Gestion'];
       $gestion=$_POST['gestion'];
       $semestre=$_POST['semestre'];

       if($gestion!="" && $semestre!=""){
         
         $query="UPDATE gestion SET gestion='$gestion', semestre='$semestre' WHERE ID_Gestion='$ID_Gestion'";
         mysql_query($query);
         echo "<p class='mensaje_correcto'>Se edito correctamente la gestion</p>";
         mostrar_agregar_gestion();
       }

       if($gestion=="" || $semestre=="")
       {
         echo "<p class='mensaje_error'>(*)Se recomienda para editar insertar datos en los campos vacios</p>";
         mostrar_agregar_gestion();
       }

      
    }
   



    if (isset($_POST['btn_Restaurar_bd'])) 
    { 
     echo "</p><center><h4 class='etiqueta_h3'>Lista de Exportacion de backups del Sistema </h4></center></p>";
      $directorio = opendir("db_recovery/."); //ruta actual
      while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
      {
  
       if (is_dir($archivo))//verificamos si es o no un directorio
       {  }
       else
       { 
        echo "<form method='post' action=''>";
        echo "<center><input type='submit' value='".$archivo."' name='bd_recovbery'></center></form>";
       }
      }
 
   }

   if(isset($_POST['bd_recovbery'])){
   
     $data_bd=$_POST['bd_recovbery'];
   

     // $backup=$_FILES['archivo']['name'];
      //FACE DE ELIMINACION
     /*$enlace =mysql_connect("192.168.2.5","mmolecular","H7U3C1bE");

      if (!$enlace) {
        die('No pudo conectarse: ' . mysql_error()); }

      $sql = 'DROP DATABASE tis_mmolecular';
    
      if (mysql_query($sql, $enlace)) 
      {//echo "La base de datos planglobal se creó correctamente\n";
       }
      
      else {echo 'Error al eliminar la base de datos: ' . mysql_error() . "\n";}

      $sql = 'CREATE DATABASE tis_mmolecular';
    
      if (mysql_query($sql, $enlace)) 
      { //echo "La base de datos planglobal se creó correctamente\n";
      }
      
      else {echo 'Error al crear la base de datos: ' . mysql_error() . "\n";}

      // FACE DE RESTAURACION

      $formatos=array('.sql',); 
   

       $mysqli = new mysqli("192.168.2.5","mmolecular","H7U3C1bE",'tis_mmolecular');

       $handle = fopen("db_recovery/$data_bd", 'rb');
    
      if ($handle) {
        while (!feof($handle)) {
            
            $buffer = stream_get_line($handle, 1000000, ";\n");
            $mysqli->query($buffer);
        }
      }
        //echo "Peak MB: ",memory_get_peak_usage(true)/1024/1024;     
        crear_triggers();   
       echo "<script>alert('Recuperacion de la Base de Datos Exitosa')</script>";
       header("refresh:0; url=Crear_Plan_Global.php");
  
     */
     
     echo "Base de Datos Restaurada Correctamente";
     mostrar_config();
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

                $("select[name=materia]").html('<option value="0">Cargando...</option>');
                 
              
                $.post("opciones.php",
                    {ID_Carrera:$(this).val()},
                    function(valor){
                        $("select[name=materia]").html(valor);
                    }
                )

            })




    
               $("select[name=nivel").change(function(){

                $("select[name=materia]").html('<option value="0">Cargando...</option>');
                 
                $.post("opciones.php",
                    {"ID_Materia":$(this).val()},
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


<?php 

   //FUNCION DE TRIGGERS
    function crear_triggers(){

    $conexion=mysql_connect("192.168.2.5","mmolecular","H7U3C1bE");
    mysql_select_db('tis_mmolecular',$conexion);

    $sql='CREATE TRIGGER `datos_kardex` AFTER DELETE ON `planglobal` FOR EACH ROW insert into kardex(ID_PG_K,tipo_K,ID_Materia_K,ID_Docente_K,gestion_K) values (Old.ID_PG,Old.tipo,Old.ID_Materia,Old.ID_Docente,Old.gestion)';
        //mysql_query($sql); 
       if (mysql_query($sql, $conexion)) {
        //echo "Se creo los triggers correctamente\n";
    } else {
        echo 'Error al crear los triggers: ' . mysql_error() . "\n";
    }

    }
   ?>

</article>

<?php
  require("vistas/footer.php");
  /*DROP TRIGGER IF EXISTS `datos_kardex`;CREATE DEFINER=`root`@`localhost` TRIGGER `datos_kardex` AFTER DELETE ON `planglobal` FOR EACH ROW insert into kardex(ID_PG_K,ID_Tipo_K,ID_Materia_K,ID_Docente_K,ID_Gestion_K) values (Old.ID_PG,Old.ID_Tipo,Old.ID_Materia,Old.ID_Docente,Old.ID_Gestion)*/
 ?>

