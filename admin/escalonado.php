<style type="text/css">
   form{
   	margin: 0px;
   }
	.txt_invi{
     
     width: 0px;
     margin: 0px;
	}

	.txt_direc{
      border: none;
      color: blue;
      background: white;
      font-size:10px;
      font-size-adjust: all;

	}

	.select{
     background: white;
     border: none;
     color: blue;
	}

	.option{
     border:none;
	}
	.cuerpo1{
		width: 20%;
		background: green;
		padding: 1%;
	}
	.tabla_select{
      width: 10%;
	}

	.tabla_select .td_f{
      background: red;
      width: 10%;
	}

</style>
<?php

require("coneccion.php");

$sql="SELECT * FROM facultad";
$consulta=mysql_query($sql);

echo "<table class='tabla_select'><tr><td class='td_f'>";
while($row=mysql_fetch_array($consulta))
{
    $facultad= $row['Facultad'];
    $ID_Facultad=$row['ID_Facultad'];
   
  echo "<form method='post' action='escalonado1.php'>
        <input type='submit' name='btn_depa' value='$facultad' class='txt_direc'>
        <input type='text' name='ID_Facultad' value='$ID_Facultad' class='txt_invi'> 
       
       </form>";
}

echo "</td></tr></table>";

?>

