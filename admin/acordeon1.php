<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - No auto height</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  
  $( function() {
    $( "#accordion" ).accordion({
     
      heightStyle: "content"

    });
    
    $( "#accordion" ).accordion({
        collapsible: true  
      
    });

  } );

   $( function() {
    $( "#accordion1" ).accordion({
      collapsible: true  
      
    });

     $( "#accordion1" ).accordion({
       heightStyle: "content"
      
    });



  } );
  

  </script>
</head>
<body>
 
<div style="width:50%; font-size:10px;">
<div id="accordion">
  <h3>Seleccione la carrera</h3>

  <div>
        <div id="accordion1">
        <h3>Section 1</h3>
        <div>

        </div>

  </div>

  </div>



</div>
</div>


<?php
   
   require("coneccion.php");

   $sql="SELECT * FROM facultad";
   $consulta=mysql_query($sql);

   while ($row=mysql_fetch_array($consulta)) {
    $facultad=$row['Facultad'];
     echo "<div id='accordion'>
      <h3>$facultad</h3>
       <div>
      </div>
     </div>";
   }




  ?>
 
 
</body>
</html>