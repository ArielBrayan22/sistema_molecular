<meta charset="UTF-8">
<?php

require("coneccion.php");

$ID_Facultad = $_POST['ID_Facultad'];
$ID_Departamento = $_POST['ID_Departamento'];
$ID_Carrera = $_POST['ID_Carrera'];
$ID_Carrera1 =$_POST['ID_Carrera1'];
$ID_Materia =$_POST['ID_Materia'];


//$ID_Materia = $_POST['ID_Materia'];

$ID_PRUEBA=0;

	if($ID_Facultad!=null)
	{
		$sql = "SELECT * FROM departamento WHERE ID_Facultad = '$ID_Facultad' ORDER BY Departamento ASC";
		$qr = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($qr) == 0){
		    echo  '<option value="0">'.htmlentities('nose encontraron carreras').'</option>';
		  

		}else{
			echo '<option value="-">Seleccione el departamento</option>';
		    while($ln = mysql_fetch_assoc($qr)){
		        echo '<option value="'.$ln['ID_Departamento'].'">'.$ln['Departamento'].'</option>';}
		}
	}

	//mostrar departamentos 

    if($ID_Departamento!=null)
	{  
       

		$sql = "SELECT * FROM carrera WHERE ID_Departamento = '$ID_Departamento' ";
		$qr = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($qr) == 0){
		    echo  '<option value="0">'.htmlentities('nose encontraron carreras').'</option>';
		  

		}else{
			
			
			echo '<option value="-">Seleccione la carrera</option>';
		    while($ln = mysql_fetch_assoc($qr)){
                       
		        echo '<option value="'.$ln['ID_Carrera'].'">'.''.$ID_Carrera." ".$ln['nombre_carrera'].'</option>'; 
		      
		         
		    }

		    
		}
	}

// mostrar materias

	if($ID_Carrera!=null)
	{
		$sql3 = "TRUNCATE `sec_option`";
		mysql_query($sql3) or die(mysql_error());

         $query = "INSERT INTO `sec_option` (`ID_Select`, `ID_Carrera`) VALUES (NULL, '$ID_Carrera') ";
		         mysql_query($query) or die(mysql_error());  
      
	}


	if($ID_Materia!=null)
	{
		//$query = "INSERT INTO `sec_option` (`ID_Select`, `ID_Carrera`) VALUES (NULL, '$ID_Carrera') ";
		        // mysql_query($query) or die(mysql_error());  

        $query = "SELECT * FROM sec_option";
		$res=mysql_query($query);
		$x=0;
     
		while($row=mysql_fetch_array($res))
		{
            $x=$row['ID_Carrera'];
		}

        $sql2 = "SELECT * FROM materia WHERE Nivel_Materia = '$ID_Materia' AND ID_Carrera='$x'";
		$resultado = mysql_query($sql2) or die(mysql_error());

		if(mysql_num_rows($resultado) == 0){
		    echo  '<option value="0">'.htmlentities('nose encontraron materias').'</option>';
		  

		}else{
			echo '<option value="-"> Seleccione la materia</option>';
		    while($ln2 = mysql_fetch_assoc($resultado)){
		        echo '<option value="'.$ln2['ID_Materia'].'">'.$ln2['Nombre_Materia'].' Gupo '.$ln2['Grupo'].'</option>';

		    }
		}
	}


?>