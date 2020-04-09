<HTML>

<HEAD>
   <TITLE>Curso de PHP - Ejercicio 2. Resultados de la encuesta</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<H1>Curso de PHP - Ejercicio 2. Resultados de la encuesta</H1>

<?PHP

   // Conectar con la base de datos
      $connection = mysql_connect ("localhost", "root", "admin")
         or die ("No se puede conectar al servidor");
      mysql_select_db ("lindavista")
         or die ("No se puede seleccionar BD");

   // Obtener datos actuales de la votación
      $instruccion = "select * from votos";
      $consulta = mysql_query ($instruccion, $connection)
         or die ("Fallo en la selección");
      $resultado = mysql_fetch_array ($consulta);

      $votos1 = $resultado["votos1"];
      $votos2 = $resultado["votos2"];
      $totalVotos = $votos1 + $votos2;

   // Mostrar resultados
      print ("<TABLE>\n");

      $porcentaje = round (($votos1/$totalVotos)*100,2);
      print ("<TR><TD>Sí</TD>\n");
      print ("<TD>$votos1 ($porcentaje%)</TD>\n");
      print ("<TD><IMG SRC='img/punto.gif' HEIGHT='10' WIDTH='" . $porcentaje*4 . "'></TD></TR>\n");

      $porcentaje = round (($votos2/$totalVotos)*100,2);
      print ("<TR><TD>No</TD>\n");
      print ("<TD>$votos2 ($porcentaje%)</TD>\n");
      print ("<TD><IMG SRC='img/punto.gif' HEIGHT='10' WIDTH='" . $porcentaje*4 . "'></TD></TR>\n");

      print ("</TABLE>\n");

      print ("<P>Número total de votos emitidos: $totalVotos </P>\n");

      print ("<P><A HREF='ejercicio2.php'>Página de votación</A></P>\n");

   // Desconectar
      mysql_close ($connection);

?>

</BODY>
</HTML>
