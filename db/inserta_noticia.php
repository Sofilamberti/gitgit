<HTML>

<HEAD>
   <TITLE>Gestión de noticias - Inserción de nueva noticia</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">

<?PHP
// Incluir bibliotecas de funciones
   include ("lib/fecha.php");
?>

</HEAD>

<BODY>

<?PHP
   //////////////////////////////////////////////////////////////////////////
   // si el formulario ha sido enviado
   //    validar formulario
   // fsi
   // si el formulario ha sido enviado y los datos son correctos
   //    procesar formulario
   // si no
   //    mostrar formulario
   // fsi
   //////////////////////////////////////////////////////////////////////////



   if (isset($insertar))
   {
   // Comprobar que se han introducido todos los datos obligatorios
   // Título
      if (trim($titulo) == "")
      {
         $errores[1] = "¡Debe introducir el título de la noticia!";
         $error = true;
      }
      else
         $errores[1] = "";
   // Texto
      if (trim($texto) == "")
      {
         $errores[2] = "¡Debe introducir el texto de la noticia!";
         $error = true;
      }
      else
         $errores[2] = "";

   // Subir fichero
      $copiarFichero = false;
      $nombreDirectorio = "img/";

   // Para PHP >= 4.1.0 poner $_FILES en lugar de $HTTP_POST_FILES

   // Copiar fichero en directorio de ficheros subidos
   // Se renombra para evitar que sobreescriba un fichero existente
   // Para garantizar la unicidad del nombre se añade una marca de tiempo
      if (is_uploaded_file ($HTTP_POST_FILES['img_destacada']['tmp_name']))
      {
         $idUnico = time();
         $nombreFichero = $idUnico . "-" . $HTTP_POST_FILES['img_destacada']['name'];
         $copiarFichero = true;
      }
   // No se ha introducido ningún fichero
      else if ($HTTP_POST_FILES['img_destacada']['name'] == "")
         $nombreFichero = '';
   // El fichero introducido no se ha podido subir
      else
      {
      }
   }

// Si los datos son correctos, procesar formulario
   if (isset($insertar) && $error==false)
   {

   // Insertar la noticia en la Base de Datos
      $conexion = mysqli_connect ("localhost", "root", "")
         or die ("No se puede conectar con el servidor");
      mysqli_select_db ("primerparcial_2019")
         or die ("No se puede seleccionar la base de datos");

      $fecha = date ("Y-m-d"); // Fecha actual
      $instruccion = "insert into noticias (titulo, cuerpo, idcategorias, fecha, img_destacada) values ('$titulo', '$cuerpo', '$idcategorias', '$fecha', '$nombreFichero')";
      $consulta = mysqli_query ($instruccion, $conexion)
         or die ("Fallo en la consulta");
      mysqli_close ($conexion);

   // Mover fichero de imagen a su ubicación definitiva
      if ($copiarFichero)
         move_uploaded_file ($HTTP_POST_FILES['img_destacada']['tmp_name'],
         $nombreDirectorio . $nombreFichero);

   // Mostrar datos introducidos
      print ("<H1>Gestión de noticias</H1>\n");
      print ("<H2>Resultado de la inserción de nueva noticia</H2>\n");

      print ("La noticia ha sido recibida correctamente:");
      print ("<UL>");
      print ("<LI>Título: " . $titulo);
      print ("<LI>Texto: " . $cuerpo);
      print ("<LI>Categoría: " . $categorias);
      print ("<LI>Fecha: " . date2string($fecha));
      if ($nombreFichero != "")
         print ("<LI>Imagen: <A TARGET='_blank' HREF='" . $nombreDirectorio . $nombreFichero . "'>" . $nombreFichero . "</A>");
      else
         print ("<LI>Imagen: (no hay)");
      print ("</UL>");

      print ("<BR>");
      print ("[ <A HREF='inserta_noticia.php'>Insertar otra noticia</A> | ");
      print ("<A HREF='noticias.html'>Menú principal</A> ]");

   }
   else
   {
?>

<H1>Gestión de noticias</H1>

<H2>Insertar nueva noticia</H2>

<FORM ACTION="inserta_noticia.php" NAME="inserta" METHOD="POST" ENCTYPE="multipart/form-data">
<TABLE>

<!-- Título de la noticia -->
<TR><TD>Título: *</TD>
    <TD><INPUT TYPE="TEXT" NAME="titulo" SIZE="56" MAXLENGTH="50">

<?PHP
   if (isset($insertar))
      print ("VALUE='$titulo'>\n");
   else
      print (">\n");
?>

</TD></TR>

<!-- Texto de la noticia-->
<TR VALIGN="TOP"><TD>Texto: *</TD>
<TD><TEXTAREA COLS="50" ROWS="5" NAME="texto">
<?PHP
   if (isset($insertar))
      print ("$texto");
   print ("</TEXTAREA>");
?>

</TD></TR>

<!-- Categoría de la noticia-->
<TR><TD>Categoría:</TD>
    <TD><SELECT NAME="categoria">
           <OPTION SELECTED>promociones
           <OPTION>ofertas
           <OPTION>costas
        </SELECT></TD></TR>

<!-- Imagen asociada a la noticia -->
<TR><TD>Imagen:</TD>
    <TD><INPUT TYPE="HIDDEN" NAME="MAX_FILE_SIZE" VALUE="102400">
        <INPUT TYPE="FILE" SIZE="44" NAME="imagen">


</TD></TR>

<!-- Botones de envío y borrado -->
<TR><TD></TD>
   <TD><INPUT TYPE="SUBMIT" NAME="insertar" VALUE="Insertar noticia">
       <INPUT TYPE="RESET" VALUE="Borrar formulario"></TD></TR>

</TABLE>
</FORM>

<P CLASS="font8pt">NOTA: los datos marcados con (*) deben ser rellenados
obligatoriamente</P>

<P>[ <A HREF='noticias.html'>Menú principal</A> ]</P>

<?PHP
   }
?>

</BODY>
</HTML>
