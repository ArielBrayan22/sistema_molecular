<?php
$link=mysql_connect("localhost","root","");
  if($link)
  {   mysql_select_db("planglobal",$link);
     //echo "conexion realizada";
      mysql_set_charset('utf8');
     
   }
   else {
   	echo "esta fallando coneccion a base de datos";
   }

?>