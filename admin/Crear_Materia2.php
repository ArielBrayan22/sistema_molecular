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
<form method='post' action='Crear_Materia.php'>
                  <center>
                  <table class='tabla_menu'>
                  <tr><td class='btn_menu_sup'><input  type='submit' class='btn_menu_sup' value='Materias' name='btn_Ver_Listado_Materias'></td>
                  </form>
                  <form method='post' action='Crear_Materia2.php'>
                  <td class='btn_menu_sup'><input  class='btn_menu_sup' type='submit' name='btn_Crear_Materia' value='Crear Materia' ></td>
                  <td class='btn_menu_sup'><input  class='btn_menu_sup' type='submit' name='btn_Crear_Departamentos' value='Sectores' ></td></tr>
                  </table>
                  </center>
                  </form>

        

 
 
  <?php

  require('coneccion.php');
   mostrar_buscador_solo();

  if(isset($_POST['btn_depa']))
  {
        $ID_F=$_POST['ID_Facultad'];
 
      $sql="SELECT * FROM facultad";
    $consulta=mysql_query($sql);
     
      while($row=mysql_fetch_array($consulta))
    {
      $ID_Facultad=$row['ID_Facultad'];
      $Facultad=$row['Facultad'];
      echo "<form method='post' action=''>
              <input type='text' name='ID_Facultad' value='$ID_Facultad' class='txt_invi'>
              <input type='submit' name='btn_depa' class='txt_direc' value='$Facultad'>
              </form>"; 

      if($row['ID_Facultad']==$ID_F){
          $row['ID_Facultad'];
        
        $sql1="SELECT * FROM Departamento WHERE ID_Facultad='$ID_F'";
          $consulta1=mysql_query($sql1);

          while ($row1=mysql_fetch_array($consulta1)) {
            $ID_Dep=$row1['ID_Departamento'];
              $Departamento=$row1['Departamento'];

              echo "<form method='post' action=''>

              <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
              <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
              <input type='submit' name='btn_car' class='txt_direc' value='$Departamento'>
              </form>";
          }


        }
   
     
        }

  }

  if(isset($_POST['btn_car']))
  {
          $ID_F=$_POST['ID_Facultad'];
           $ID_Dep1=$_POST['ID_Departamento'];
          
          $sql="SELECT * FROM facultad";
        $consulta=mysql_query($sql);
          
          while($row=mysql_fetch_array($consulta))
        {
        $ID_Facultad=$row['ID_Facultad'];
        $Facultad=$row['Facultad'];
        echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_Facultad' class='txt_invi'>
                <input type='submit' name='btn_depa' class='txt_direc' value='$Facultad'>
                </form>"; 

         if($row['ID_Facultad']==$ID_F){
              
          $sql1="SELECT * FROM Departamento WHERE ID_Facultad='$ID_F'";
          $consulta1=mysql_query($sql1);

          while ($row1=mysql_fetch_array($consulta1)) {
            $ID_Dep=$row1['ID_Departamento'];
              $Departamento=$row1['Departamento'];

              echo "<form method='post' action=''>

              <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
              <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
              <input type='submit' name='btn_car' class='txt_direc' value='$Departamento'>
              </form>";

              if($row1['ID_Departamento']==$ID_Dep1)
              {
                  $sql2="SELECT * FROM carrera WHERE ID_Departamento='$ID_Dep1'";
                $consulta2=mysql_query($sql2);

                while ($row2=mysql_fetch_array($consulta2)) {
          
          $ID_Carrera=$row2['ID_Carrera'];
                $Carrera=$row2['nombre_carrera'];
              
                echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
                <input type='text' name='ID_Departamento' value='$ID_Dep1' class='txt_invi'>
                <input type='text' name='ID_Carrera' value='$ID_Carrera' class='txt_invi'>
                <input type='submit' name='btn_nivel' class='txt_direc' value='$Carrera'>
                </form>";
                 
                 }

             }
             
         }
          
       }
     }
  }

  //MOSTRAR NIVELES

  if(isset($_POST['btn_nivel']))
  {
           $ID_F=$_POST['ID_Facultad'];
           $ID_Dep1=$_POST['ID_Departamento'];
           $ID_C=$_POST['ID_Carrera'];
          
          $sql="SELECT * FROM facultad";
        $consulta=mysql_query($sql);
          
          while($row=mysql_fetch_array($consulta))
        {
        $ID_Facultad=$row['ID_Facultad'];
        $Facultad=$row['Facultad'];
        echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_Facultad' class='txt_invi'>
                <input type='submit' name='btn_depa' class='txt_direc' value='$Facultad'>
                </form>"; 

         if($row['ID_Facultad']==$ID_F){
              
          $sql1="SELECT * FROM Departamento WHERE ID_Facultad='$ID_F'";
          $consulta1=mysql_query($sql1);

          while ($row1=mysql_fetch_array($consulta1)) {
            $ID_Dep=$row1['ID_Departamento'];
              $Departamento=$row1['Departamento'];

              echo "<form method='post' action=''>

              <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
              <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
              <input type='submit' name='btn_car' class='txt_direc' value='$Departamento'>
              </form>";

              if($row1['ID_Departamento']==$ID_Dep1)
              {
                  $sql2="SELECT * FROM carrera WHERE ID_Departamento='$ID_Dep1'";
                $consulta2=mysql_query($sql2);

                while ($row2=mysql_fetch_array($consulta2)) {
          
          $ID_Carrera=$row2['ID_Carrera'];
                $Carrera=$row2['nombre_carrera'];
              
                echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
                <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
                <input type='text' name='ID_Carrera' value='$ID_Carrera' class='txt_invi'>
                <input type='submit' name='btn_nivel' class='txt_direc' value='$Carrera'>
                </form>";

                if($row2['ID_Carrera']==$ID_C)
                {
                        $sql3="SELECT DISTINCT Nivel_Materia FROM materia WHERE ID_Carrera='$ID_C' ORDER BY Nivel_Materia ASC";
                      $consulta3=mysql_query($sql3);

                while ($row3=mysql_fetch_array($consulta3)) {
                    
                    $Nivel=$row3['Nivel_Materia'];
                    
              
                echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
                <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
                <input type='text' name='ID_Carrera' value='$ID_Carrera' class='txt_invi'>
                <input type='text' name='Nivel' value='$Nivel' class='txt_invi'>

                <input type='submit' name='btn_Mat' class='txt_direc' value='$Nivel'>
                </form>";
                }
               }                 
               }
             }      
            }
       }
     }
  }
  

    //MOSTRAR MATERIAS

  if(isset($_POST['btn_Mat']))
  {
          $ID_F=$_POST['ID_Facultad'];
          $ID_Dep1=$_POST['ID_Departamento'];
          $ID_C=$_POST['ID_Carrera'];
          $Nivel_S=$_POST['Nivel'];

          
          $sql="SELECT * FROM facultad";
        $consulta=mysql_query($sql);
          
          while($row=mysql_fetch_array($consulta))
        {
        $ID_Facultad=$row['ID_Facultad'];
        $Facultad=$row['Facultad'];
        echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_Facultad' class='txt_invi'>
                <input type='submit' name='btn_depa' class='txt_direc' value='$Facultad'>
                </form>"; 

         if($row['ID_Facultad']==$ID_F){
              
          $sql1="SELECT * FROM Departamento WHERE ID_Facultad='$ID_F'";
          $consulta1=mysql_query($sql1);

          while ($row1=mysql_fetch_array($consulta1)) {
            $ID_Dep=$row1['ID_Departamento'];
              $Departamento=$row1['Departamento'];

              echo "<form method='post' action=''>

              <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
              <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
              <input type='submit' name='btn_car' class='txt_direc' value='$Departamento'>
              </form>";

              if($row1['ID_Departamento']==$ID_Dep1)
              {
                  $sql2="SELECT * FROM carrera WHERE ID_Departamento='$ID_Dep1'";
                $consulta2=mysql_query($sql2);

                while ($row2=mysql_fetch_array($consulta2)) {
          
          $ID_Carrera=$row2['ID_Carrera'];
                $Carrera=$row2['nombre_carrera'];
              
                echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
                <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
                <input type='text' name='ID_Carrera' value='$ID_Carrera' class='txt_invi'>
                <input type='submit' name='btn_nivel' class='txt_direc' value='$Carrera'>
                </form>";

                if($row2['ID_Carrera']==$ID_C)
                {
                        $sql3="SELECT DISTINCT Nivel_Materia FROM materia WHERE ID_Carrera='$ID_C' ORDER BY Nivel_Materia ASC";
                      $consulta3=mysql_query($sql3);

                while ($row3=mysql_fetch_array($consulta3)) {
                    
                    $Nivel=$row3['Nivel_Materia'];
                    
              
                  echo "<form method='post' action=''>
                <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
                <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
                <input type='text' name='ID_Carrera' value='$ID_Carrera' class='txt_invi'>
                <input type='text' name='Nivel' value='$Nivel' class='txt_invi'>

                <input type='submit' name='btn_Mat' class='txt_direc' value='$Nivel'>
                </form>";

                  if($Nivel_S==$row3['Nivel_Materia'])
                  {
                    
                    $sql4="SELECT * FROM materia WHERE ID_Carrera='$ID_C' 
                           AND Nivel_Materia='$Nivel_S' ORDER BY Grupo ASC";
                      $consulta4=mysql_query($sql4);

                      while ($row4=mysql_fetch_array($consulta4)) {
                        $ID_Materia=$row4['ID_Materia'];
                        $Nombre_Materia=$row4['Nombre_Materia'];
                        $Grupo=$row4['Grupo'];

                        echo "<form method='post' action=''>

                  <input type='text' name='ID_Facultad' value='$ID_F' class='txt_invi'>
                  <input type='text' name='ID_Departamento' value='$ID_Dep' class='txt_invi'>
                  <input type='text' name='ID_Carrera' value='$ID_Carrera' class='txt_invi'>
                  <input type='text' name='Nivel' value='$Nivel' class='txt_invi'>

                  <input type='text' name='txt_ID_M' value='$ID_Materia' class='txt_invi'>

                 <input type='submit' name='btn_Examinar' class='txt_direc' value='$Nombre_Materia - Grupo - $Grupo'></br>";
                
                  }
                 }
                }
               }
             }
            } 
          }
       }
     }
    }

    //BOTON SELECCION PARA CREAR MATERIA
    if(isset($_POST['btn_Crear_Materia']))
    {
      echo "<center><form method='post' action=''>
            <p id='espacio'>a</p>";
       
        echo '<form action="" method="post">
        <table class="tabla_100" > 

        <tr><td colspan="2" class="td_tabla"><h4>Creacion de Materia</h4>
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
        <tr><td colspan="2"><center><input type="submit" class="btn_Crear_pg" name="btn_Mostrar_Campos_Materia" value="Crear Materia"></center></td></tr</tr>
        </table></form>';
      
        }

       //FUNCION SELECCION PARA CREAR MATERIA

        function mostrar_selec_materia()
        {
        require("coneccion.php");
       echo "<form method='post' action=''>
            <p id='espacio'>a</p>";
       
        echo '<form action="" method="post">
        <table class="tabla_100" > 

        <tr><td colspan="2" class="td_tabla"><h4>Creacion de Materia</h4>
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
        <tr><td colspan="2"><center><input type="submit" class="btn_Crear_pg" name="btn_Mostrar_Campos_Materia" value="Crear Materia"></center></td></tr</tr>
        </table></form>';
      
        }
        

        //BOTON MOSTRAR PANEL DE CAMPOS MATERIA

        if(isset($_POST['btn_Mostrar_Campos_Materia']))
        {

          $Seleccion_F=$_POST['facultad'];
          $Seleccion_C=$_POST['carrera'];
          $Seleccion_D=$_POST['departamento'];
         
        for ($i=0;$i<count($Seleccion_F);$i++) 
          {  $ID_Facultad=$Seleccion_F[$i];} 

        for ($i=0;$i<count($Seleccion_C);$i++) 
          {  $ID_Carrera=$Seleccion_C[$i];} 

        for ($i=0;$i<count($Seleccion_D);$i++) 
          {  $ID_Departamento=$Seleccion_D[$i];}
        
        //echo $ID_Facultad." ".$ID_Departamento." ".$ID_Carrera;

      
         if($ID_Facultad>0 && $ID_Departamento>0 && $ID_Carrera>0)
         {
            
          $query="SELECT * FROM carrera WHERE ID_Carrera='$ID_Carrera'";
          $resultado=mysql_query($query);
          while ($row=mysql_fetch_array($resultado)) {
              $carrera=$row['nombre_carrera'];  
          }
       
          echo "<form method='post' action=''>
                <table class='tabla_100'>
                <tr><td class='td_tabla' colspan='2' ><h4 class='etiqueta_h3'>Carrera : $carrera</h4>
                <h5>Ingrese los Datos de la Nueva Materia y no olvide que todos los campos son obligatorios</h5></p></td></tr>
   
                <tr><td class='td_tabla'>Nombre Materia</td><td><input type='text' size='60' name='txt_Nombre_M'  placeholder='Nombre de la Materia' ></td></tr>

                <tr><td class='td_tabla'>Codigo</td><td><input type='text' name='txt_Codigo_M'  placeholder='Codigo Materia'></td></tr>

                <tr><td class='td_tabla'>Nivel</td><td>
                
                <select name='nivel'>
                <option value=''>Nivel</option>
                <option value='A'>A</option>
                <option value='B'>B</option>
                </select>

                </td></tr>

                <tr><td class='td_tabla'>Grupo</td><td><input type='text' size='8' name='txt_Grupo_M'  placeholder='Numero'></td></tr>

                <tr><td class='td_tabla'>Carga Horaria</td><td><input type='text' size='10' name='txt_Carga_M'  placeholder='Colacar Numero'> hrs/mes</td></tr>

                <tr><td class='td_tabla'>Materias Relacionadas</td><td>
                <textarea placeholder='LLene el campo con las Materias Relacionadas a la creada' name='txt_Materias_R' 
                cols='60' rows='2' ></textarea></td></tr>

                <tr><td colspan='2'><center>
                <input type='text' name='txt_ID_Carrera' value='".$ID_Carrera."' style='visibility:hidden; width:1px;'> 
                <input type='submit' name='btn_Ingresar_Materia' class='btn_Crear_pg' value='Crear Materia'> 
                <input type='text' name='txt_ID_Departamento' value='".$ID_Departamento."' style='visibility:hidden; width:1px;'> 
                </center></td></tr>
                
                </table></form>";

          echo "<form method='post'><p id='espacio'>a</p>
                <center>
                <input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Materia'></center>
                </form>";
         }
          

         else{
          echo "<p class='mensaje_correcto'>Seleccione todos los campos</p>";
          mostrar_selec_materia();

     
        }
         
         }


        //FUNCION MOSTRAR CREAR MATERIA

        function mostrar_campos_materia($ID_Carrera,$ID_Departamento)
        {
              require("coneccion.php");
             
          
              $query="SELECT * FROM carrera WHERE ID_Carrera='$ID_Carrera'";
              $resultado=mysql_query($query);
              while ($row=mysql_fetch_array($resultado)) {
              $carrera=$row['nombre_carrera'];  
              }
       
          echo "<form method='post' action=''>
                <table class='tabla_100'>
                <tr><td class='td_tabla' colspan='2' ><h4 class='etiqueta_h3'>Carrera : $carrera</h4>
                <h5>Ingrese los Datos de la Nueva Materia y no olvide que todos los campos son obligatorios</h5></p></td></tr>
   
                <tr><td class='td_tabla'>Nombre Materia</td><td><input type='text' size='60' name='txt_Nombre_M'  placeholder='Nombre de la Materia' ></td></tr>

                <tr><td class='td_tabla'>Codigo</td><td><input type='text' name='txt_Codigo_M'  placeholder='Codigo Materia'></td></tr>

                <tr><td class='td_tabla'>Nnivel</td><td>
                
                <select name='nivel'>
                <option value=''>Nivel</option>
                <option value='A'>A</option>
                <option value='B'>B</option>
                </select>

                </td></tr>

                <tr><td class='td_tabla'>Grupo</td><td><input type='text' size='8' name='txt_Grupo_M'  placeholder='Numero'></td></tr>

                <tr><td class='td_tabla'>Carga Horaria</td><td><input type='text' size='10' name='txt_Carga_M'  placeholder='Colacar Numero'> hrs/mes</td></tr>

                <tr><td class='td_tabla'>Materias Relacionadas</td><td>
                <textarea placeholder='LLene el campo con las Materias Relacionadas a la creada' name='txt_Materias_R' 
                cols='60' rows='2' ></textarea></td></tr>

                <tr><td colspan='2'><center>
                <input type='text' name='txt_ID_Carrera' value='".$ID_Carrera."' style='visibility:hidden; width:1px;'> 
                <input type='submit' name='btn_Ingresar_Materia' class='btn_Crear_pg' value='Crear Materia'> 
                <input type='text' name='txt_ID_Departamento' value='".$ID_Departamento."' style='visibility:hidden; width:1px;'> 
                </center></td></tr>
                
                </table></form>";

          echo "<form method='post'><p id='espacio'>a</p>
                <center>
                <input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Materia'></center>
                </form>";
                    
        }


        if(isset($_POST['btn_Ingresar_Materia'])){
          //echo "materia ingresada correctamente";
          $Nombre_M=$_POST['txt_Nombre_M'];
          $Codigo_M=$_POST['txt_Codigo_M'];
          $Grupo_M=$_POST['txt_Grupo_M'];
          //$Nivel_M=$_POST['txt_Nivel_M'];
          $CargaH_M=$_POST['txt_Carga_M'];
          $Materias_R=$_POST['txt_Materias_R'];

          $ID_Carrera=$_POST['txt_ID_Carrera'];
          $ID_Departamento=$_POST['txt_ID_Departamento'];

           $nivel=$_POST['nivel'];


          if($Nombre_M!="" && $Codigo_M!="" && $Grupo_M!="" && $nivel!="" && $CargaH_M!="" && $Materias_R!="")
          {
            $query="INSERT INTO `materia` (`ID_Materia`, `Nombre_Materia`, `Codigo`, `Grupo`, 
                                         `Nivel_Materia`, `Carga_Horaria`, `Materias_Relacionadas`,`ID_Departamento`,`ID_Carrera`) 
          VALUES (NULL, '$Nombre_M', '$Codigo_M', '$Grupo_M', '$nivel', '$CargaH_M', '$Materias_R','$ID_Departamento','$ID_Carrera');";
            $resultado=mysql_query($query,$link);
            mostrar_buscador();
            echo "<p class='mensaje_crear'>Se creo correctamente la materia</p>";
            listar_materias();

           }


        else{
             echo "<p class='mensaje_correcto'>Desbes llenar todos los campos vacios</p>";
              mostrar_campos_materia($ID_Carrera,$ID_Departamento);
        }
        }

     //FUNCION DE MOSTRAR LAS MATERIAS CREADAS EN SU TOTALIDAD

        function mostrar_buscador(){
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
        
        echo "<h4 class='etiqueta_h3'>Lista de las Materias Creadas</h4>";
        echo "<h5> (*) Presione los botones de Editar para realizar cambios de datos y Eliminar pra borra la materia</h5></P>";
        }
        
           function mostrar_buscador_solo(){
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
        }


         function listar_materias()
         {
          require("coneccion.php");
          echo "<p id='espacio'>a</p>";
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

        //FUNCION MOSTRAR LISTA DE MATERIAS

         function Ver_Listado_Materias()
         {
          require("coneccion.php");
         
            echo "<p id='espacio'>a</><h4 class='etiqueta_h3'>Lista de las Materias Creadas</h>";
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

        // BOTON LISTADO DE MATERIAS

         if(isset($_POST['btn_Ver_Listado_Materias']))
         {
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
            echo "<h5> (*) Presione el link de examninar para obtener mas informacion de la materia</h5>
            <p id='espacio'>a</p>";

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
            
          echo "<p id='espacio'>a</p>";
         }
         
         
      if(isset($_POST['btn_Examinar']))
      {
         $ID_Materia=$_POST['txt_ID_M'];
         
         //mostrar_buscador_solo();

        echo "<h3>Materia a detalle </h3>";
        echo "<h5> (*) Presione los botones de Editar para realizar cambios de datos y Eliminar pra borra la materia</h5><p id='espacio'>a</p>";

          $query="SELECT * FROM materia m,carrera c, departamento d WHERE m.ID_Departamento=d.ID_Departamento AND m.ID_Carrera=c.ID_Carrera AND m.ID_Materia='$ID_Materia';";
          
          $resultado=mysql_query($query,$link);

          while($row=mysql_fetch_array($resultado))
          {
              echo "<form method='post' action=''> <table class='tabla_100'>
                      <tr><td class='td_tabla'>Materia</td><td colspan='7'>".$row['Nombre_Materia']."</td></tr>
                      <tr><td class='td_tabla''>Codigo</td><td>".$row['Codigo']."</td>
                      <td>Grupo</td><td>".$row['Grupo']."</td>
                      <td>Nivel</td> <td>".$row['Nivel_Materia']."</td>
                      <td>Carga Horaria</td><td>".$row['Carga_Horaria']." hrs/mes</td></tr>
                      <tr><td class='td_tabla'>Materias Relacionadas</td><td colspan='7'>
                      ".$row['Materias_Relacionadas']."</td></tr>
                
                      <tr><td class='td_tabla'>Carrera</td><td colspan='7'>".$row['nombre_carrera']."</td></tr>

                      <tr><td class='td_tabla' >Departamento</td><td colspan='7'>
                      ".$row['Departamento']."</td></tr>
                    
                     <tr><td id='td_caract'> <input type='submit' class='btn_editar' value='Editar' name='btn_Editar_M'></td>
                     <td colspan='7'> <input type='submit' class='btn_eliminar'value='Eliminar' name='btn_Eliminar_M'>
                     <input type='text' value='".$row['ID_Materia']."' name='txt_ID_M' style='visibility:hidden'>
                      </td></tr>
                     </form> </table><p id='espacio'>a</p>";
          }

         echo "<p id='espacio'>a</p>";

        echo "<form method='post' action='Crear_Materia.php'><center><input type='submit' class='btn_examinar_pg' 
                 value='volver' name='btn_Ver_Listado_Materias'></center></form>";


         }

         //funcion editar materia
        function mostrar_editar_materia($ID_Materia)
        {
          require("coneccion.php");     
           $query="SELECT * FROM materia m, carrera c, departamento d
                  WHERE m.ID_Materia='$ID_Materia' AND m.ID_Departamento=d.ID_Departamento AND m.ID_Carrera=c.ID_Carrera";

          $resultado=mysql_query($query,$link);

          while($row=mysql_fetch_array($resultado))
          {
              echo "<table class='tabla_100'><form method='post' action=''>

                     <tr><td colspan='3' class='td_tabla' ><H4 class='etiqueta_h3'>Editado de Materia</H4>
                     <h5>(*) Se recomienda que no deje campos vacios ya que no se podra editar correctamente</h5></td></tr>
                   
                     <tr><td class='td_tabla' >Materia </td><td colspan='3'><input type='text' size='60' name='txt_Nombre_M' value='".$row['Nombre_Materia']."'></td></tr>

                     <tr><td class='td_tabla'>Codigo</td><td colspan='3'><input name='txt_Codigo_M' value='".$row['Codigo']."'></td></tr>

                     <tr><td class='td_tabla' >Grupo</td><td colspan='3'><input name='txt_Grupo_M' value='".$row['Grupo']."'></td></tr>

                     <tr><td class='td_tabla' >Nivel</td><td colspan='3'>
                        <select name='nivel'>
                        <option value=''>Nivel</option>
                        <option value='A'>A</option>
                        <option value='B'>B</option>
                        </select>

                     </td></tr>

                     <tr><td class='td_tabla' >Carga Horaria</td><td colspan='3'><input name='txt_Carga_M' value='".$row['Carga_Horaria']."'> hrs/mes</td></tr>

                     <tr><td class='td_tabla' >Materias Relacionadas</td><td colspan='3'><textarea cols='60' rows='2' name='txt_Materias_R'>".$row['Materias_Relacionadas']."</textarea></td></tr>
                     
                     <tr><td class='td_tabla'>Departamento</td><td>".$row['Departamento']."</td><td>";

                     $query="SELECT * FROM departamento";
                     $consulta=mysql_query($query);
                     echo "<select name='departamento'> <option value=''>Departamento</option>";
                     while($row1=mysql_fetch_array($consulta))
                     {
                      echo" <option value=".$row1['ID_Departamento'].">".$row1['Departamento']."</option>";  
                     }

                     echo"</select></td></tr>

                     <tr><td class='td_tabla'>Carrera</td><td>".$row['nombre_carrera']." </td>
                     <td>";
                    
                     echo '<select name="carrera">
                            <option value="">Seleccione la carrera</option>
                            <option value="" disabled="disabled">carreras</option>
                             </select>';
                    
                     echo "<tr><td colspan='3'> <center>
                     <input type='text' value='".$ID_Materia."' name='txt_ID_Materia' style='visibility:hidden; width:1px;'>
                     <input type='submit' value='Editar' name='btn_Editar_Materia' class='btn_editar'></center>  
                     </td></tr>
                     </form>";
          }

          echo "</table><p id='espacio'>a</p>";
          
          echo "<form method='post' action='Crear_Materia.php'><center>
          <input type='submit' name='btn_Ver_Listado_Materias' value='volver' class='btn_examinar_pg'></center>
          </form>";

        }

         //BOTON PARA EDITAR MATERIA

         if(isset($_POST['btn_Editar_M'])){

           $ID_Materia=$_POST['txt_ID_M'];

           $query="SELECT * FROM materia m, carrera c, departamento d
                  WHERE m.ID_Materia='$ID_Materia' AND m.ID_Departamento=d.ID_Departamento AND m.ID_Carrera=c.ID_Carrera";

          $resultado=mysql_query($query,$link);

          while($row=mysql_fetch_array($resultado))
          {
              echo "<table class='tabla_100'><form method='post' action=''>

                     <tr><td colspan='3' class='td_tabla' ><H4 class='etiqueta_h3'>Editado de Materia</H4>
                     <h5>(*) Se recomienda que no deje campos vacios ya que no se podra editar correctamente</h5></td></tr>
                   
                     <tr><td class='td_tabla' >Materia </td><td colspan='3'><input type='text' size='60' name='txt_Nombre_M' value='".$row['Nombre_Materia']."'></td></tr>

                     <tr><td class='td_tabla'>Codigo</td><td colspan='3'><input name='txt_Codigo_M' value='".$row['Codigo']."'></td></tr>

                     <tr><td class='td_tabla' >Grupo</td><td colspan='3'><input name='txt_Grupo_M' value='".$row['Grupo']."'></td></tr>

                     <tr><td class='td_tabla' >Nivel</td><td colspan='3'>
                        <select name='nivel'>
                        <option value=''>Nivel</option>
                        <option value='A'>A</option>
                        <option value='B'>B</option>
                        </select>

                     </td></tr>

                     <tr><td class='td_tabla' >Carga Horaria</td><td colspan='3'><input name='txt_Carga_M' value='".$row['Carga_Horaria']."'> hrs/mes</td></tr>

                     <tr><td class='td_tabla' >Materias Relacionadas</td><td colspan='3'><textarea cols='60' rows='2' name='txt_Materias_R'>".$row['Materias_Relacionadas']."</textarea></td></tr>
                     
                     <tr><td class='td_tabla'>Departamento</td><td>".$row['Departamento']."</td><td>";

                     $query="SELECT * FROM departamento";
                     $consulta=mysql_query($query);
                     echo "<select name='departamento'> <option value=''>Departamento</option>";
                     while($row1=mysql_fetch_array($consulta))
                     {
                      echo" <option value=".$row1['ID_Departamento'].">".$row1['Departamento']."</option>";  
                     }

                     echo"</select></td></tr>

                     <tr><td class='td_tabla'>Carrera</td><td>".$row['nombre_carrera']." </td>
                     <td>";
                    
                     echo '<select name="carrera">
                            <option value="">Seleccione la carrera</option>
                            <option value="" disabled="disabled">carreras</option>
                             </select>';
                    
                     echo "<tr><td colspan='3'> <center>
                     <input type='text' value='".$ID_Materia."' name='txt_ID_Materia' style='visibility:hidden; width:1px;'>
                     <input type='submit' value='Editar' name='btn_Editar_Materia' class='btn_editar'></center>  
                     </td></tr>
                     </form>";
          }

          echo "</table><p id='espacio'>a</p>";
          
          echo "<form method='post' action='Crear_Materia.php'><center>
          <input type='submit' name='btn_Ver_Listado_Materias' value='volver' class='btn_examinar_pg'></center>
          </form>";

         }

      
      if(isset($_POST['btn_Editar_Materia']))
      {
        //echo "MATERIA EDITADA CORRECTAMENTE";
           $ID_Materia=$_POST['txt_ID_Materia'];

           $Nombre_M=$_POST['txt_Nombre_M'];
           $Codigo_M=$_POST['txt_Codigo_M'];
           $Grupo_M=$_POST['txt_Grupo_M'];
           $Nivel_M=$_POST['nivel'];
           $CargaH_M=$_POST['txt_Carga_M'];
           $Materias_R=$_POST['txt_Materias_R'];
          
           $Seleccion_D=$_POST['departamento'];
           $Seleccion_C=$_POST['carrera'];

           if($Seleccion_C!='' && $Seleccion_D!='' &&  $Nivel_M!=''){

           for ($i=0;$i<count($Seleccion_C);$i++) 
              {  $ID_Carrera=$Seleccion_C[$i];} 
           for ($i=0;$i<count($Seleccion_D);$i++) 
              {  $ID_Departamento=$Seleccion_D[$i];} 
             

           if($Nombre_M!="" && $Codigo_M!="" && $Grupo_M!="" && $Nivel_M!="" && $CargaH_M!="" && $Materias_R!="" && $ID_Departamento!="-" && $ID_Carrera!='-')
            {
               $query="UPDATE `materia` 
                 SET `Nombre_Materia` = '$Nombre_M',
                     `Codigo` = '$Codigo_M', 
                     `Grupo` = '$Grupo_M', 
                     `Nivel_Materia` = '$Nivel_M',
                     `Carga_Horaria` = '$CargaH_M',
                     `Materias_Relacionadas` = '$Materias_R',
                     `ID_Departamento` = '$ID_Departamento',
                     `ID_Carrera` = '$ID_Carrera'

                      WHERE `materia`.`ID_Materia` = $ID_Materia;";

                $resultado=mysql_query($query,$link);

                echo "<p class='mensaje_crear'>Se realizo cambios correctamente en las selecciones y los campos</p>";
                mostrar_editar_materia($ID_Materia);
              }
            }

         else{
                echo "<p class='mensaje_correcto'>Debe seleccionar todos los campos</p>";
                mostrar_editar_materia($ID_Materia);


         }
         /* if($ID_Departamento=="-" && $ID_Carrera=="-"){

            if($Nombre_M=="" || $Codigo_M=="" ||  $Grupo_M=="" || $Nivel_M=="" || $CargaH_M=="" || $Materias_R=="" )
             {
               echo "Complete los Campos Correctamente";
               mostrar_editar_materia($ID_Materia);
             }
             else{
               echo "No se selecciono ninguna cambio";
               mostrar_editar_materia($ID_Materia);
             }
          }*/

         
          
        
          
         /* if($Nombre_M!="" && $Codigo_M!="" && $Grupo_M!="" && $Nivel_M!="" && $CargaH_M!="" && $Materias_R!="" && $ID_Departamento!="-" && $ID_Carrera=='-')
            {
                $query="UPDATE `materia` 
                 SET `Nombre_Materia` = '$Nombre_M',
                     `Codigo` = '$Codigo_M', 
                     `Grupo` = '$Grupo_M', 
                     `Nivel_Materia` = '$Nivel_M',
                     `Carga_Horaria` = '$CargaH_M',
                     `Materias_Relacionadas` = '$Materias_R',
                     `ID_Departamento` = '$ID_Departamento'

                      WHERE `materia`.`ID_Materia` = $ID_Materia;";

              $resultado=mysql_query($query,$link);

              echo "Se realizo cambios en la seleccion de departamento";
              // Ver_Listado_Materias();
            }

           if($Nombre_M!="" && $Codigo_M!="" && $Grupo_M!="" && $Nivel_M!="" && $CargaH_M!="" && $Materias_R!="" && $ID_Departamento=="-" && $ID_Carrera!='-')
            {
               $query="UPDATE `materia` 
                 SET `Nombre_Materia` = '$Nombre_M',
                     `Codigo` = '$Codigo_M', 
                     `Grupo` = '$Grupo_M', 
                     `Nivel_Materia` = '$Nivel_M',
                     `Carga_Horaria` = '$CargaH_M',
                     `Materias_Relacionadas` = '$Materias_R',
                     `ID_Carrera` = '$ID_Carrera'

                      WHERE `materia`.`ID_Materia` = $ID_Materia;";

               $resultado=mysql_query($query,$link);

              echo "Se realizo cambios en seleccion de carrera";
              Ver_Listado_Materias();
            }*/

      }
 
       // BOTON ELIMINAR MATERIA

        if(isset($_POST['btn_Eliminar_M']))
        {
            $ID_Materia=$_POST['txt_ID_M'];
            $query="DELETE FROM `materia` WHERE ID_Materia=$ID_Materia";
            $resultado=mysql_query($query,$link);
            mostrar_buscador_solo();
            echo "<p class='mensaje_error'>Materia eliminada Correctamente</p>";
            Ver_Listado_Materias();
        }

      //BOTON CREAR DEPARTAMENTOS DE LAS MATERIAS
      
      if(isset($_POST['btn_Crear_Departamentos']))
      {
        echo "<p id='espacio'>a</p><form method='post' action=''></p>
             
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4> Creacion de sectores del organigrama de la universidad </H4>
              <h5>(*) Se recomienda que llene cada campo asignado</h5></td></tr>

              <tr>
              <td><center><input type='submit' class='btn_Crear_pg' value='Crear Nuevo Facultad' name='btn_Crear_Facultad'>
              </center></td></tr>

               <tr>
              <td><center><input type='submit' class='btn_Crear_pg' value='Crear Nuevo Departamento' name='btn_Crear_D'>
              </center></td></tr>
              
              <tr>
              <td><center><input type='submit' class='btn_Crear_pg' value='Crear Nueva Carrera' name='btn_Crear_Carrera'>
              </center></td></tr>


               </table></form><p id='espacio'>a</p>";

      }
   

     //boton crear facultad

      if(isset($_POST['btn_Crear_Facultad']))
      {  

            echo "<p id='espacio'>a</p><form method='post' action=''></p>
             
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4>Creacion de Facultades </H4>
              <h5>(*) Se recomienda que llene el cada asignado</h5></td></tr>
              <tr><td class='td_tabla'> Departamento </td><td><input type='text' size='40' name='txt_Nuevo_F' placeholder='Escriba el nuevo departamento'></td>
              <td><input type='submit' class='btn_Crear' value='Crear Nuevo' name='btn_Insertar_F'></td>

               </td></tr></table></form><p id='espacio'>a</p>";

              echo "<form method='post'><center><input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Departamentos' ></center></form>";
            
             echo "<p id='espacio'>a</p><table class='tabla_100'>";

               require("coneccion.php");
               $sql="SELECT * FROM Facultad";
               $resultado=mysql_query($sql);
               while($row=mysql_fetch_array($resultado))
               {
                echo "<form method='post' action=''>
                <tr><td><input type='text' value='".$row['Facultad']."' size='70' class='text_llenado' name='txt_Facultad'> 
                <input type='text' value='".$row['ID_Facultad']."' name='ID_Facultad' style='visibility:hidden; width:1px;'> </td>";
                echo "<td> <input type='submit' value='Editar' name='btn_Editar_F' class='btn_editar'></br>
                <input type='submit' name='btn_Eliminar_F' value='Eliminar' class='btn_eliminar'></td></tr>
               </form>";
               }  
         echo "</table><p id='espacio'>a</p>";

      }


      if(isset($_POST['btn_Insertar_F']))
      { 
        $txt_Nuevo_Dep=$_POST['txt_Nuevo_F'];

        if($txt_Nuevo_Dep!='')
        {
         
          $sql="INSERT INTO `Facultad` (`ID_Facultad`, `Facultad`) VALUES (NULL, '$txt_Nuevo_Dep')";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_crear'>Se ingreso correctamente la nueva Facultad</p>";
          mostrar_facultades();
        }
       
        else
        {
        
          echo "<p class='mensaje_correcto'>Se recomienda llenar el campo de la nueva facultad</p>";
          mostrar_facultades();
        }
      }

     
     //funcion mostrar facultades
       function mostrar_facultades(){
          
          echo "<p id='espacio'>a</p><form method='post' action=''></p>
             
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4>Creacion de Facultades </H4>
              <h5>(*) Se recomienda que llene cada campo asignado</h5></td></tr>
              <tr><td class='td_tabla'> Departamento </td><td><input type='text' size='40' name='txt_Nuevo_F' placeholder='Escriba el nuevo departamento'></td>
              <td><input type='submit' class='btn_Crear' value='Crear Nuevo' name='btn_Insertar_F'></td>

               </td></tr></table></form><p id='espacio'>a</p>";

              echo "<form method='post'><center><input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Departamentos' ></center></form>";
            
             echo "<p id='espacio'>a</p><table class='tabla_100'>";

               require("coneccion.php");
               $sql="SELECT * FROM Facultad";
               $resultado=mysql_query($sql);
               while($row=mysql_fetch_array($resultado))
               {
                echo "<form method='post' action=''>
                <tr><td><input type='text' value='".$row['Facultad']."' size='70' class='text_llenado' name='txt_Facultad'> 
                <input type='text' value='".$row['ID_Facultad']."' name='ID_Facultad' style='visibility:hidden; width:1px;'> </td>";
                echo "<td> <input type='submit' value='Editar' name='btn_Editar_F' class='btn_editar'></br>
                <input type='submit' name='btn_Eliminar_F' value='Eliminar' class='btn_eliminar'></td></tr>
               </form>";
               }  
         echo "</table><p id='espacio'>a</p>";

       }

     //BOTON INSERTAR DEPARTAMENTO A LA BD

      if(isset($_POST['btn_Editar_F']))
      {
          $txt_Facultad=$_POST['txt_Facultad'];
          $ID_Facultad=$_POST['ID_Facultad'];

        if($txt_Facultad=="")
        {
          echo "<p class='mensaje_correcto'> Se recomienda no ingresar datos vacios a la facultad</p>";
          mostrar_facultades();
        }

        if($txt_Facultad!="")
        {
        
          $sql="UPDATE `facultad` SET `Facultad` = '$txt_Facultad' 
          WHERE `facultad`.`ID_Facultad` = '$ID_Facultad'";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_crear'> Se edito correctamente la facultad elegida</p>";
          mostrar_facultades();
        }

      }

    //BOTON INSERTAR DEPARTAMENTO A LA BD

      if(isset($_POST['btn_Eliminar_F']))
      {
          $ID_Facultad=$_POST['ID_Facultad'];

          $sql="DELETE FROM `facultad` WHERE `facultad`.`ID_Facultad` = '$ID_Facultad' ";
          $resultado=mysql_query($sql);
          echo "<p class='mensaje_error'>Se elimino correctamente el departamento elegido</p>";
          mostrar_facultades();
      }

  // BOTON CREAR DEPARTAMENTO
      if(isset($_POST['btn_Crear_D']))
      {
          echo "<p id='espacio'>a</p><form method='post' action=''></p>
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4>Creacion de Departamentos</H4>
              <h5>(*) Se recomienda que llene el campo asignado</h5></td></tr>
              <tr><td class='td_tabla'> Departamento </td>
              <td>
              <select name='facultad' style='width:80%;'>
                  <option value='0'>Seleccione la facultad</option>";
                  $sql="SELECT * FROM facultad";
                  $resultado=mysql_query($sql);

                  while($row=mysql_fetch_array($resultado))
                  {
                    echo "<option value='".$row['ID_Facultad']."'>".$row['Facultad']."</option>";
                  }
              
              echo "</select> 
             
          
              <input type='text' size='47' name='txt_Nuevo_Dep' placeholder='Escriba el nuevo departamento'>

              </td>
              <td><input type='submit' class='btn_Crear' value='Crear Nuevo' name='btn_Insertar_D'></td>

               </td></tr></table></form><p id='espacio'>a</p>";

                echo "<form method='post'><center><input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Departamentos' ></center></form><p id='espacio'>a</p>";

         echo "<table class='tabla_100'>";

               require("coneccion.php");
               $sql="SELECT * FROM departamento";
               $resultado=mysql_query($sql);
               while($row=mysql_fetch_array($resultado))
               {
                echo "<form method='post' action=''>
                <tr><td class='td_tabla'> Departamento </td><td><input type='text' value='".$row['Departamento']."' size='35' name='txt_Dep'> 
                <input type='text' value='".$row['ID_Departamento']."' name='txt_ID_Dep' style='visibility:hidden; width:1px;'> </td>";
                echo "<td> <input type='submit' value='Editar' name='btn_Editar_D' class='btn_editar'></td>
                <td><input type='submit' name='btn_Eliminar_D' value='Eliminar' class='btn_eliminar'></td></tr>
               </form>";
               }  
         echo "</table>";   

      }

      function mostrar_depa()
      {
        require("coneccion.php");
         echo "<p id='espacio'>a</p><form method='post' action=''></p>
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4>Creacion de Departamentos</H4>
              <h5>(*) Se recomienda que llene el campo asignado</h5></td></tr>
              <tr><td class='td_tabla'> Departamento </td>
              <td>
              <select name='facultad' style='width:80%;'>
                  <option value='0'>Seleccione la facultad</option>";
                  $sql="SELECT * FROM facultad";
                  $resultado=mysql_query($sql);

                  while($row=mysql_fetch_array($resultado))
                  {
                    echo "<option value='".$row['ID_Facultad']."'>".$row['Facultad']."</option>";
                  }
              
                echo "</select> 
                <input type='text' size='47' name='txt_Nuevo_Dep' placeholder='Escriba el nuevo departamento'>

                </td>
                <td><input type='submit' class='btn_Crear' value='Crear Nuevo' name='btn_Insertar_D'></td>

                </td></tr></table></form><p id='espacio'>a</p>";

                echo "<form method='post'><center><input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Departamentos' ></center></form> <p id='espacio'>a</p>";

                echo "<table class='tabla_100'>";

               require("coneccion.php");
               $sql="SELECT * FROM departamento";
               $resultado=mysql_query($sql);
               while($row=mysql_fetch_array($resultado))
               {
                echo "<form method='post' action=''>
                <tr><td class='td_tabla'> Departamento </td><td><input type='text' value='".$row['Departamento']."' size='35' name='txt_Dep'> 
                <input type='text' value='".$row['ID_Departamento']."' name='txt_ID_Dep' style='visibility:hidden; width:1px;'> </td>";
                echo "<td> <input type='submit' value='Editar' name='btn_Editar_D' class='btn_editar'></td>
                <td><input type='submit' name='btn_Eliminar_D' value='Eliminar' class='btn_eliminar'></td></tr>
               </form>";
               }  
         echo "</table>";   

      }
      
      //BOTON INSERTAR DEPARTAMENTO A LA BD

      if(isset($_POST['btn_Insertar_D']))
      { 
         $txt_Nuevo_F=$_POST['txt_Nuevo_Dep'];
         $facultad=$_POST['facultad'];

        if($txt_Nuevo_F!='' && $facultad>0)
        {
            for ($i=0; $i <count($facultad) ; $i++) { 
              $ID_Facultad=$facultad[$i];
            }
          $sql="INSERT INTO `departamento` (ID_Departamento, Departamento,ID_Facultad) 
                VALUES (NULL, '$txt_Nuevo_F','$ID_Facultad')";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_crear'>Se ingreso correctamente la nuva Facultad</p>";
          mostrar_depa();
        }

        else
        {
          echo "<p class='mensaje_correcto'>Se recomienda llenar el campo de nuevo departamento</p>";
          mostrar_depa();
        }

      }

      //BOTON INSERTAR DEPARTAMENTO A LA BD

      if(isset($_POST['btn_Editar_D']))
      {
          $txt_Dep=$_POST['txt_Dep'];
          $ID_Departamento=$_POST['txt_ID_Dep'];

        if($txt_Dep=="")
        {
          echo "<p class='mensaje_correcto'> Se recomienda no ingresar datos vacios al departamento</p>";
          mostrar_depa();
        }

        if($txt_Dep!='')
        {
        
          $sql="UPDATE `departamento` SET `Departamento` = '$txt_Dep' 
          WHERE `departamento`.`ID_Departamento` = '$ID_Departamento'";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_crear'> Se edito correctamente el departamento elegido</p>";
          mostrar_depa();
        }

      }

    //BOTON INSERTAR DEPARTAMENTO A LA BD

      if(isset($_POST['btn_Eliminar_D']))
      {
          $ID_Departamento=$_POST['txt_ID_Dep'];

          $sql="DELETE FROM `departamento` WHERE `departamento`.`ID_Departamento` = '$ID_Departamento' ";
          $resultado=mysql_query($sql);
          echo "<p class='mensaje_error'>Se elimino correctamente el departamento elegido</p>";
          mostrar_depa();
      }

     
     // CREAR NUEVA CARRERA

      if(isset($_POST['btn_Crear_Carrera']))
      {
           echo "<p id='espacio'>a</p><form method='post' action=''></p>
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4>Creacion de Carreras segun Departamento</H4>
              <h5>(*) Se recomienda que llene el campo asignado</h5></td></tr>
              <tr>
              <td>";
              echo '<select name="facultad" class="select_fact">
                <option value="0">Seleccione la Facultad</option>';

                $sql = "SELECT * FROM facultad ORDER BY Facultad ASC";
                $qr = mysql_query($sql) or die(mysql_error());
                while($ln = mysql_fetch_assoc($qr)){
                    echo '<option value="'.$ln['ID_Facultad'].'">'.$ln['Facultad'].'</option>';
                }
               
                echo '</select><p id="espacio">a</p>
                
                 <select name="departamento">
                  <option value="0">Seleccione el departamento</option>
                    <option value="1" disabled="disabled">departamentos</option>
                </select> <p id="espacio">a</p>'; 
                

                echo "<input type='text' size='47' name='txt_Nuevo_C' placeholder='Escriba la nueva carrera'>

                </td>
                <td><input type='submit' class='btn_Crear' value='Crear Nuevo' name='btn_Insertar_C'></td>

                </td></tr></table></form><p id='espacio'>a</p>";

                echo "<form method='post'><center><input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Departamentos' ></center></form> <p id='espacio'>a</p>";

                echo "<table class='tabla_100'>";

               
               $sql="SELECT * FROM carrera";
               $resultado=mysql_query($sql);
               while($row=mysql_fetch_array($resultado))
               {
                echo "<form method='post' action=''>
                <tr><td class='td_tabla'> Carrera </td><td><input type='text' value='".$row['nombre_carrera']."' size='35' name='txt_Carrera'> 
                <input type='text' value='".$row['ID_Carrera']."' name='ID_Carrera' style='visibility:hidden; width:1px;'> </td>";
                echo "<td> <input type='submit' value='Editar' name='btn_Editar_C' class='btn_editar'></td>
                <td><input type='submit' name='btn_Eliminar_C' value='Eliminar' class='btn_eliminar'></td></tr>
               </form>";
               }  
         echo "</table>";   

      }

      function mostrar_carre(){
        require("coneccion.php");
        echo "<p id='espacio'>a</p><form method='post' action=''></p>
              <table class='tabla_100'>

              <tr><td class='td_tabla' colspan='3'> <H4>Creacion de Carreras segun Departamento</H4>
              <h5>(*) Se recomienda que llene el campo asignado</h5></td></tr>
              <tr>
              <td>";
              echo '<select name="facultad" class="select_fact">
                <option value="0">Seleccione la Facultad</option>';

                $sql = "SELECT * FROM facultad ORDER BY Facultad ASC";
                $qr = mysql_query($sql) or die(mysql_error());
                while($ln = mysql_fetch_assoc($qr)){
                    echo '<option value="'.$ln['ID_Facultad'].'">'.$ln['Facultad'].'</option>';
                }
               
                echo '</select><p id="espacio">a</p>
                
                 <select name="departamento">
                  <option value="0">Seleccione el departamento</option>
                    <option value="1" disabled="disabled">departamentos</option>
                </select> <p id="espacio">a</p>'; 
                

                echo "<input type='text' size='47' name='txt_Nuevo_C' placeholder='Escriba la nueva carrera'>

                </td>
                <td><input type='submit' class='btn_Crear' value='Crear Nuevo' name='btn_Insertar_C'></td>

                </td></tr></table></form><p id='espacio'>a</p>";

                echo "<form method='post'><center><input type='submit' class='btn_examinar_pg' value='volver' name='btn_Crear_Departamentos' ></center></form> <p id='espacio'>a</p>";

                echo "<table class='tabla_100'>";

               
               $sql="SELECT * FROM carrera";
               $resultado=mysql_query($sql);
               while($row=mysql_fetch_array($resultado))
               {
                echo "<form method='post' action=''>
                <tr><td class='td_tabla'> Carrera </td><td><input type='text' value='".$row['nombre_carrera']."' size='35' name='txt_Carrera'> 
                <input type='text' value='".$row['ID_Carrera']."' name='ID_Carrera' style='visibility:hidden; width:1px;'> </td>";
                echo "<td> <input type='submit' value='Editar' name='btn_Editar_C' class='btn_editar'></td>
                <td><input type='submit' name='btn_Eliminar_C' value='Eliminar' class='btn_eliminar'></td></tr>
               </form>";
               }  
         echo "</table>";   


      }


      //CREAR NUEVA CARRERA

      if(isset($_POST['btn_Insertar_C']))
      {
           $txt_Nuevo_C=$_POST['txt_Nuevo_C'];
           $Seleccion_F=$_POST['facultad'];
           $Seleccion_D=$_POST['departamento'];

        if($Seleccion_F>0 && $Seleccion_D>0 && $txt_Nuevo_C!=""){

          for ($i=0;$i<count($Seleccion_F);$i++) 
              {  $ID_Facultad=$Seleccion_F[$i];} 

          for ($i=0;$i<count($Seleccion_D);$i++) 
              {  $ID_Departamento=$Seleccion_D[$i];}

          $sql="INSERT INTO `carrera` (ID_Carrera, nombre_carrera,ID_Departamento) 
                VALUES (NULL, '$txt_Nuevo_C','$ID_Departamento')";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_crear'>Se ingreso correctamente la nueva Carrera</p>";
          mostrar_carre();

        

        }
        else{
           echo "<p class='mensaje_correcto'>Se recomienda seleccionar todas las opciones</p>";
           mostrar_carre();
        }

      }
      //Editar Carrera
      if(isset($_POST['btn_Editar_C']))
      {   $txt_Carrera=$_POST['txt_Carrera'];
          $ID_Carrera=$_POST['ID_Carrera'];


        if($txt_Carrera=="")
        {
          echo "<p class='mensaje_correcto'> Se recomienda no ingresar datos vacios para crear carrera</p>";
          mostrar_carre();
        }

        if($txt_Carrera!='')
        {
        
          $sql="UPDATE `carrera` SET `nombre_carrera` = '$txt_Carrera' 
          WHERE `carrera`.`ID_Carrera` = '$ID_Carrera'";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_crear'> Se edito correctamente la carrera elegida</p>";
           mostrar_carre();
        }


      }
      
      //Eliminar Carrera
      if(isset($_POST['btn_Eliminar_C']))
      { 
         $ID_Carrera=$_POST['ID_Carrera'];

          $sql="DELETE FROM `carrera`  
          WHERE `carrera`.`ID_Carrera` = '$ID_Carrera'";
          $resultado=mysql_query($sql);

          echo "<p class='mensaje_error'> Se elimino correctamente la carrera</p>";
           mostrar_carre();
      }


        //BOTON BUSCAR MATERIAS

        if(isset($_POST['btn_Buscar_Materias'])){
        $Text_a_Buscar=$_POST['txt_buscar_pg'];
        //mostrar_buscador_solo();

        echo "<p id='espacio'>a</p><h4>Resultados de Buscar Materia </h4>";
        echo "<h5> (*) Presione los botones de Editar para realizar cambios de datos y Eliminar pra borra la materia</h5></p>";

        if($Text_a_Buscar!="")
        {
             $query="SELECT * FROM materia m,carrera c WHERE m.ID_Carrera=c.ID_Carrera AND m.Nombre_Materia LIKE '%$Text_a_Buscar%'
                  ORDER BY m.Nivel_Materia ASC";
          
          $resultado=mysql_query($query,$link);
          $cont=0;
          while($row=mysql_fetch_array($resultado))
          {   $cont++;
              echo "<form method='post' action=''> <table class='tabla_100'><p id='espacio'>a</p>
                      <tr><td class='td_tabla'>Materia</td><td colspan='7'>".$row['Nombre_Materia']."</td></tr>
                      <tr><td class='td_tabla'>Codigo</td><td>".$row['Codigo']."</td>
                      <td>Grupo</td><td>".$row['Grupo']."</td>
                      <td>Nivel</td> <td>".$row['Nivel_Materia']."</td>
                      <td>Carga Horaria</td><td>".$row['Carga_Horaria']." hrs/mes</td></tr>
                      <tr><td class='td_tabla' >Materias Relacionadas</td><td colspan='7'>
                      ".$row['Materias_Relacionadas']."</td></tr>
                      <tr><td class='td_tabla'>Carrera</td><td colspan='7'>".$row['nombre_carrera']."</td></tr>
                    
                     <tr><td> <input type='submit' value='Editar' class='btn_editar' name='btn_Editar_M'></td>
                     <td colspan='7'> <input type='submit' value='Eliminar' class='btn_eliminar' name='btn_Eliminar_M'>
                     <input type='text' value='".$row['ID_Materia']."' name='txt_ID_M' style='visibility:hidden'>
                      </td></tr>
                     </form> </table></p>";
          }

          if($cont==0)
          {
             echo "<p class='mensaje_correcto'>No se encontraron materias relacionadas</p>";
          }

        }
        else{
         
          echo "<p class='mensaje_correcto'> Debes escribir algun dato para realizar la busqueda</p>";

        }

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
