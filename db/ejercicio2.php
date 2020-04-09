<HTML>

<HEAD>
   <TITLE>Curso de PHP - Ejercicio 2</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<?PHP
   if (isset($enviar))
   {
      print ("<H1>Curso de PHP - Ejercicio 2. Resultados de la votación</H1>\n");

   // Conectar con la base de datos
      $connection = mysql_connect ("localhost", "root", "admin")
         or die ("No se puede conectar al servidor");
      mysql_select_db ("lindavista")
         or die ("No se puede seleccionar BD");

   // Obtener votos actuales
      $instruccion = "select votos1, votos2 from votos";
      $consulta = mysql_query ($instruccion, $connection)
         or die ("Fallo en la selección");
      $resultado = mysql_fetch_array ($consulta);

  // Actualizar votos
     $votos1 = $resultado["votos1"];
     $votos2 = $resultado["votos2"];
     if ($voto == "si")
        $votos1 = $votos1 + 1;
     else if ($voto == "no")
        $votos2 = $votos2 + 1;
     $instruccion = "update votos set votos1=$votos1, votos2=$votos2";
     $actualizacion = mysql_query ($instruccion, $connection)
        or die ("Fallo en la modificación");

   // Desconectar
      mysql_close ($connection);

   // Mostrar mensaje de agradecimiento
      print ("<P>Su voto ha sido registrado. Gracias por participar</P>\n");
      print ("<A HREF='ejercicio2-resultados.php'>Ver resultados</A>\n");
   }
   else
   {
?>

<H1>Curso de PHP - Ejercicio 2</H1>

<P>¿Cree ud. que el precio de la vivienda seguirá subiendo al ritmo actual?</P>

<FORM ACTION="ejercicio2.php" METHOD="POST">
   <INPUT TYPE="RADIO" NAME="voto" VALUE="si" CHECKED>Sí<BR>
   <INPUT TYPE="RADIO" NAME="voto" VALUE="no">No<BR><BR>
   <INPUT TYPE="SUBMIT" NAME="enviar" VALUE="votar">
</FORM>

<A HREF="ejercicio2-resultados.php">Ver resultados</A>

<?PHP
   }
?>

</BODY>
</HTML>
