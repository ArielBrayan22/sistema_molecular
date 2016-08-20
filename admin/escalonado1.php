<style type="text/css">
	.txt_invi{
     
     width: 0px;
	}
	form{
		margin: 0px;
	}

	.txt_direc{
      border: none;
      color: blue;
      background: white;
       font-size:11px;
      font-size-adjust: all;
      margin: 0px;
	}

	.select{
     background: white;
     border: none;
     color: blue;
	}

	.option{
     border:none;
	}

	.div_F{
		background: red;
		width: 35%;
		float: left;
	}

	.div_D{
		background: green;
		width: 13%;
		float: left;
	}

	.div_C{
		background: yellow;
		width: 20%;
		float: left;
	}

	.div_N{
		background: blue;
		width: 10%;
		float: left;
	}

	.div_M{
		background:orange;
		width: 20%;
		float: left;
	}


</style>


<?php
require("coneccion.php");

function mostrar_F(){
	require("coneccion.php");

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
   }
}

if(isset($_POST['btn_depa']))
{
    $ID_Facultad_S=$_POST['ID_Facultad'];
    echo "<div class='div_F'>";

	mostrar_F();
	echo "</div>";
   
    echo "<div class='div_D'>";
	$sql="SELECT * FROM departamento WHERE ID_Facultad='$ID_Facultad_S'";
    $consulta=mysql_query($sql);

    while($row=mysql_fetch_array($consulta))
    {
        $departamento= $row['Departamento'];
        $ID_Departamento=$row['ID_Departamento'];
   
         echo "<form method='post' action='escalonado1.php'>
         <input type='text' name='ID_Facultad' value='$ID_Facultad_S'  class='txt_invi'>
         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
         <input type='submit' name='btn_carre' value='$departamento'  class='txt_direc'>
         </form>";
    }
  echo "</div>";

}


function mostrar_D($ID_Facultad){
    require("coneccion.php");

    $sql="SELECT * FROM departamento WHERE ID_Facultad='$ID_Facultad'";
    $consulta=mysql_query($sql);

    while($row=mysql_fetch_array($consulta))
    {
        $departamento= $row['Departamento'];
        $ID_Departamento=$row['ID_Departamento'];
   
         echo "<form method='post' action='escalonado1.php'>
         <input type='text' name='ID_Facultad' value='$ID_Facultad'  class='txt_invi'>
         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
         <input type='submit' name='btn_carre' value='$departamento'  class='txt_direc'>
         </form>";
    }

}

if(isset($_POST['btn_carre']))
{
	 $ID_Facultad=$_POST['ID_Facultad'];
	 $ID_Departamento=$_POST['ID_Departamento'];
      echo "<div class='div_F'>";
    mostrar_F();
      echo "</div>";
      echo "<div class='div_D'>";
    mostrar_D($ID_Facultad);
      echo "</div>";

      echo "<div class='div_C'>";
    $sql="SELECT * FROM carrera WHERE ID_Departamento='$ID_Departamento'";
    $consulta=mysql_query($sql);

    while($row=mysql_fetch_array($consulta))
    {
        $carrera= $row['nombre_carrera'];
        $ID_Carrea=$row['ID_Carrera'];
   
         echo "<form method='post' action='escalonado1.php'>

         <input type='text' name='ID_Facultad' value='$ID_Facultad'  class='txt_invi'>
         
         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
         
         <input type='text' name='ID_Carrera' value='$ID_Carrea'  class='txt_invi'> 
         
         <input type='submit' name='btn_nivel' value='$carrera'  class='txt_direc'>
         </form>";
    }

      echo "</div>";
}


 function mostrar_C($ID_Facultad,$ID_Departamento)
 {
 	$sql="SELECT * FROM carrera WHERE ID_Departamento='$ID_Departamento'";
    $consulta=mysql_query($sql);

    while($row=mysql_fetch_array($consulta))
    {
        $carrera= $row['nombre_carrera'];
        $ID_Carrea=$row['ID_Carrera'];
   
         echo "<form method='post' action='escalonado1.php'>

         <input type='text' name='ID_Facultad' value='$ID_Facultad'  class='txt_invi'>
         
         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
         
         <input type='text' name='ID_Carrera' value='$ID_Carrea'  class='txt_invi'> 
         
         <input type='submit' name='btn_nivel' value='$carrera'  class='txt_direc'>
         </form>";
    }
 }

 if(isset($_POST['btn_nivel']))
 { 
 	$ID_Facultad=$_POST['ID_Facultad'];
    $ID_Departamento=$_POST['ID_Departamento'];
    $ID_Carrera=$_POST['ID_Carrera'];

     echo "<div class='div_F'>";
 	mostrar_F();
 	 echo "</div>";

 	  echo "<div class='div_D'>";
    mostrar_D($ID_Facultad);
     echo "</div>";

     echo "<div class='div_C'>";
    mostrar_C($ID_Facultad,$ID_Departamento);
     echo "</div>";

     echo "<div class='div_N'>";

      echo "<form method='post' action='escalonado1.php'>

         <input type='text' name='ID_Facultad' value='$ID_Facultad'  class='txt_invi'>
         
         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
         
         <input type='text' name='ID_Carrera' value='$ID_Carrera'  class='txt_invi'> 

         <select name='nivel'>
         <option value='A' >A</option>
         <option value='B'>B</option>
         <option value='C'>C</option>
         </select>

         <input type='submit' name='btn_materias' value='ver'  class='txt_direc'>
         </form>";
     echo "</div>";
 	
 }


 if(isset($_POST['btn_materias']))
 {

 	 $ID_Facultad=$_POST['ID_Facultad'];
     $ID_Departamento=$_POST['ID_Departamento'];
     $ID_Carrera=$_POST['ID_Carrera'];
    
     echo "<div class='div_F'>";
    mostrar_F();
     echo "</div>";
     echo "<div class='div_D'>";
    mostrar_D($ID_Facultad);
     echo "</div>";
      echo "<div class='div_C'>";
    mostrar_C($ID_Facultad,$ID_Departamento);
     echo "</div>";

     echo "<div class='div_N'>";

     echo "<form method='post' action='escalonado1.php'>

         <input type='text' name='ID_Facultad' value='$ID_Facultad'  class='txt_invi'>
         
         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
         
         <input type='text' name='ID_Carrera' value='$ID_Carrera'  class='txt_invi'> 

         <select name='nivel' class='select'>
         <option value='A'  class='option'>A</option>
         <option value='B' class='option'>B</option>
         <option value='C' class='option'>C</option>
         </select>

         <input type='submit' name='btn_materias' value='ver'  class='txt_direc'>


         </form>";


     $Nivel=$_POST['nivel'];
  
     for ($i=0; $i <count($Nivel); $i++) { 
             $Nivel_S=$Nivel[$i];
          }     
      echo "</div>";

    //$Nivel_S;
      echo "<div class='div_M'>";
     
	    $sql="SELECT * FROM materia WHERE ID_Carrera='$ID_Carrera' AND Nivel_Materia='$Nivel_S'";
	    $consulta=mysql_query($sql);

	    while($row=mysql_fetch_array($consulta))
	    {
	        $materia= $row['Nombre_Materia'];
	        $ID_Materia=$row['ID_Materia'];
	   
	         echo "<form method='post' action='escalonado1.php'>

	         <input type='text' name='ID_Facultad' value='$ID_Facultad'  class='txt_invi'>
	         
	         <input type='text' name='ID_Departamento' value='$ID_Departamento'  class='txt_invi'> 
	         
	         <input type='text' name='ID_Carrera' value='$ID_Carrera'  class='txt_invi'> 

	         <input type='text' name='ID_Materia' value='$ID_Materia'  class='txt_invi'> 
	         
	         <input type='submit' name='' value='$materia'  class='txt_direc'>
	         </form>";
	    }

	   echo "</div>";



 }

?>