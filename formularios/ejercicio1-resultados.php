<HTML>

<HEAD>
   <TITLE>Curso de PHP - Ejercicio 1. Resultados del formulario</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<H1>Curso de PHP - Ejercicio 1. Resultados del formulario</H1>

<P>Estos son los datos introducidos:</P>

<?PHP
   print ("<UL>\n");
   print ("<LI>Nombre: $nombre\n");
   print ("<LI>Curso: $curso\n");
   print ("<LI>Titulaci�n: $titulacion\n");
   print ("</UL>\n");
?>

[ <A HREF='javascript:history.back()'>Volver</A> ]

</BODY>
</HTML>
