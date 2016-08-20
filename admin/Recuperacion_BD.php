<?php 
// variables
header("refresh:15; url=index.php");


$dbhost = 'localhost';
$dbname = 'planglobal';
$dbuser = 'root';
$dbpass = '';
 

backup_tables('localhost','root','','planglobal');


/* backup the db OR just a table */
//En la variable $talbes puedes agregar las tablas especificas separadas por comas:
//profesor,estudiante,clase
//O déjalo con el asterisco '*' para que se respalde toda la base de datos

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
   
   $link = mysql_connect($host,$user,$pass);
   mysql_select_db($name,$link);
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
      	 echo $row[0];echo "</br>";
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
   //echo $fechaDeLaCopia = date("d-l-F-Y "); 
   $time = time();
            $anio =date("Y", $time);
            $mes =date("m", $time);
            $dia =date("d", $time);
            
           $fecha=$anio."-".$mes."-".$dia;
  // echo $time1 = date('H:i:s', time() - date('Z')); // 10:00:00 
   //echo "</br>";
   //echo $time = date('H:i:s', time());

   $handle = fopen('db_recovery/db-backup -$fecha'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
   fwrite($handle,$return);
   fclose($handle);
}


?>