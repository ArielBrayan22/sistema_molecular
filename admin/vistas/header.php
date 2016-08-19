<html>
<head>
  <title>Sistema de Planes Globales</title>
  <link rel="icon" type="image/jpg" href="imagenes/fcyt.jpg" />
  <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
   <link rel="stylesheet" type="text/css" href="estilos/estilo_admin.css">
 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>


  <header class="cabecera">
    <a class="titulo" href="#">PLANES GLOBALES Y PROGRAMAS ANALITICOS </a> <!-- / #logo-header -->
    <nav class='cabecera-nav'>
      <ul class="cabecera-ul">
             <li class="cabecera-li" ><a class="subtitulos" href="Operaciones_Manual_de_Usuario.php">Ayuda</a></li>
             <li class="cabecera-li" ><a class="subtitulos" href="identificacion.php">Contactos</a></li>
             <li class="cabecera-li"><a class="subtitulos" href="modelo/salir.php">Salir</a></li>

      </ul>
    </nav><!-- / nav -->
  </header><!-- / #main-header -->

<hr></hr>
<aside id="menu">
  
  <header>
    <div class="menu_bar">
      <a href="#" class="bt-menu">Menu<img src="imagenes/menu_icon.png" class='icono_menu'></a>
    </div>
 
    <nav>
      <ul class='etiqueta_menu'>
        <li class='titulo'><a href="menu_root.php" class="link">Inicio</a></li>
        <li class='titulo'><a href="Crear_Plan_Global.php" class="link">Crear Plan Global</a></li>
        <li class='titulo'><a href="Crear_Materia.php" class="link">Crear Materia</a></li>
        <li class='titulo'><a href="Crear_Docente.php" class="link">Crear Docente</a></li>
        <li class='titulo'><a href="PG_PA_publico.php" class="link">Planes Globales y Programas Analiticos</a></li>
        <li class='titulo'><a href="Operaciones_Manual_de_Usuario.php" class="link">Manual de Usuario</a></li>
      </ul>
    </nav>
  </header>
   
  </aside>

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    
    $(document).ready(main);
 
var contador = 1;
 
function main () {
  $('.menu_bar').click(function(){
    if (contador == 1) {
      $('nav').animate({
        left: '0'
      });
      contador = 0;
    } else {
      contador = 1;
      $('nav').animate({
        left: '-100%'
      });
    }
  });
 
  // Mostramos y ocultamos submenus
  $('.submenu').click(function(){
    $(this).children('.children').slideToggle();
  });
}
  </script>
