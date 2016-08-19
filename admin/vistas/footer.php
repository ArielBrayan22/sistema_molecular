 <article id='usuario'>
   <p></p>  
   <center><table id="tabla_user">
      <?php
           require ("coneccion.php");
           $query="SELECT * FROM `docente` WHERE ID_Docente=$ID_User";
          
           $resultado=mysql_query($query,$link);
   
           while($row=mysql_fetch_array($resultado))
           {
              echo "<tr><td id='td_color' colspan='2'><center><h4>Informacion de cuenta</h4></center></td></tr>
              <tr><td colspan='2'><center><img src='imagenes/user.jpg' width='100' height='100'></center></td></tr>";
              echo "<tr><td id='td_color'>Usuario</td><td>".$row['Nombre_Completo']." "
              .$row['Apellidos']."</td></tr>";
              echo "<tr><td id='td_color'>Cargo </td><td>Administrador</td></tr>";
              echo "<tr><td id='td_color'>Titulo Academico </td><td>".$row['Profesion']."</td></tr>";
              echo "<tr><td id='td_color'>CodSIS </td><td>".$row['User_Login']."</td></tr>";
              echo "<tr><td id='td_color' colspan='2'><center><a class='subtitulos' href='salir.php'>Cerrar Sesion</center></a></td></tr>";
           }
       ?>
     </table></center>
   </article>

</body>


<footer>

<article id="footer">
<hr></hr>
 <center>

 <h4 id="titulo_footer">Paginas Amigas</h4> </center>
  <center>
 <h4 id="titulo_footer">
 <a id="link_footer" href="http://www.fcyt.umss.edu.bo/"> Fcyt </a>
 <a id="link_footer" href="http://www.umss.edu.bo/"> Umss </a>
 <a id="link_footer" href="http://sagaa.fcyt.umss.edu.bo/admision/noticias.php"> Saga </a>
 <a id="link_footer" href="http://enlinea.umss.edu.bo/moodle2/login/"> Moodle </a>
 <a id="link_footer" href="http://enlinea.umss.edu.bo/claroline/"> Caroline </a>
 </h4>
 </center>
 <p id='copiright'> © Developer team Molecular Software Engineering Service 2016. </p>



</article>



</footer>
</html>