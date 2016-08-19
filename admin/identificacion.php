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
<p id='espacio'>a</p>
<p id='espacio'>a</p>
<p id='espacio'>a</p>
    <center><img src="imagenes/logo_01.png" width="30%" height="30%" ></center>
    <center><h3>Contactos</h3>
        <h4>Correo:umss.molecular.bolivia@.gmail.com</h4>
        <h4>Direccion:Barrio el Profesional Nro 192</h4>
        <h4>Telefonos:7772767 - 65502158 </h4>

    </center>


</article>

<?php
    require("vistas/footer.php");
 ?>
