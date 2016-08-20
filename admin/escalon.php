<style type="text/css">
	.txt_invi{
     
     width: 0px;
     visibility: hidden;
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



</style>

<?php
require("coneccion.php");

   echo "<form method='POST'><input type='submit' name='btn_M' value='mostrar'></form>";


   if(isset($_POST['btn_M']))
   {
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

			            <input type='text' name='ID_Materia' value='$ID_Materia' class='txt_invi'>

		                <input type='submit' name='btn_examinar' class='txt_direc' value='$Nombre_Materia - Grupo - $Grupo'></br>";
		            
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

?>