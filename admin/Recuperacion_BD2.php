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
 require('/coneccion.php');

     echo '<table class="tabla_menu">
                      <form method="post" action="Crear_Plan_Global2.php"><tr><td>
                      <input type="submit" class="btn_menu_sup" value="Lista Planes Globales" name="btn_Ver_Planes_Globales"></form></td>';

                echo "<form method='post' action='Crear_Plan_Global_2.php'>
                      <td><input  type='submit' class='btn_menu_sup' name='btn_Crear_Plan_Global' value='Crear Plan Global'></td>";

                 echo "<td><input type='submit' class='btn_menu_sup' value='Kardex' name='btn_kardex_PG'></td>
                  <td><input type='submit' class='btn_menu_sup' value='Bitacora' name='btn_Registro_PG'></td>
                  <td><input type='submit' class='btn_menu_sup' value='Configuraciones' name='btn_Configuracion'></form></td></tr></table>";
                  
  backup("hola mundo");

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
            <form method='post' action='Crear_Plan_Global_2.php'>   
            <tr><td><input type='submit' class='btn_crear_config' value='Restaurar Base de Datos' name='btn_Restaurar_bd'></td>
            <td>Esta funcion realizara la restauracion de la base de datos segun la seleccion del administracion y la lista de almacenaje de BD.</td></tr>

            <tr><td><input type='submit' class='btn_crear_config' value='Insertar Gestion' name='btn_mostrar_gestion'></td>
            <td>Con esta funcion se agregar una nueva gestion para crear Planes globales</td></tr>

           <tr><td><input type='submit' class='btn_crear_config' value='Insertar Tipo de Docente' name='btn_agregar_tipo_d'></td>
            <td>Con este boton el administrador podra crear un nuevo tipo de docente</td></tr>
            </form>
            </table>";
    }

    function backup($h)
    {
      echo "<p class='mensaje_crear'>Base de Datos exportada correctamente</p>";
      mostrar_config();

    }

/* backup the db OR just a table 

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
   
   $link = mysql_connect("192.168.2.5","mmolecular","H7U3C1bE");
   mysql_select_db("tis_mmolecular",$link);
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
          $row[0];echo "</br>";
          $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   
   //cycle through
   $return="";
   foreach($tables as $table)
   {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';

      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   
   //save file
  // echo $fechaDeLaCopia = date("d-l-F-Y ", time()); 
  // echo $time1 = date('H:i:s', time() - date('Z')); // 10:00:00 
   //echo "</br>";
   //echo $time = date('H:i:s', time());

   $handle = fopen('admin/db_recovery/db-backup'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
   fwrite($handle,$return);
   fclose($handle);

   echo "<script>alert('Creacion Exitosa del Archivo de Respaldo .sql $fechaOficial')</script>";
   header("refresh:0; url=Crear_Plan_Global.php");
}
*/

?>
</article>

<?php
  require("vistas/footer.php");
  /*DROP TRIGGER IF EXISTS `datos_kardex`;CREATE DEFINER=`root`@`localhost` TRIGGER `datos_kardex` AFTER DELETE ON `planglobal` FOR EACH ROW insert into kardex(ID_PG_K,ID_Tipo_K,ID_Materia_K,ID_Docente_K,ID_Gestion_K) values (Old.ID_PG,Old.ID_Tipo,Old.ID_Materia,Old.ID_Docente,Old.ID_Gestion)*/
 ?>

