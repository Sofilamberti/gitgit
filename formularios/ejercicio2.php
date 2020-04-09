<HTML>

<HEAD>
   <TITLE>Curso de PHP - Ejercicio 5</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<H1>Curso de PHP - Ejercicio 5</H1>

<FORM ACTION="ejercicio2-resultados.php" METHOD="POST" ENCTYPE="multipart/form-data">

<H2>Elementos  de tipo INPUT</H2>

<H3>TEXT</H3>
Introduzca la cadena a buscar:
<INPUT TYPE="text" NAME="cadena" VALUE="valor por defecto" SIZE="20">
<HR>

<H3>RADIO</H3>
<INPUT TYPE="radio" NAME="titulacion" VALUE="II" CHECKED>I.Inform�tica
<INPUT TYPE="radio" NAME="titulacion" VALUE="ITIG">I.T.I. Gesti�n
<INPUT TYPE="radio" NAME="titulacion" VALUE="ITIS">I.T.I. Sistemas
<HR>

<H3>CHECKBOX</H3>
<INPUT TYPE="checkbox" NAME="extras[]" VALUE="garaje" CHECKED>Garaje
<INPUT TYPE="checkbox" NAME="extras[]" VALUE="piscina">Piscina
<INPUT TYPE="checkbox" NAME="extras[]" VALUE="jardin">Jard�n
<HR>

<H3>BUTTON</H3>
<INPUT TYPE="button" NAME="nueva" VALUE="A�adir una m�s">
<HR>

<H3>FILE</H3>
<INPUT TYPE="file" NAME="fichero">
<HR>

<H3>HIDDEN</H3>
<?PHP
   $usuario = "mariano";
   print ("<INPUT TYPE='hidden' NAME='username' VALUE='$usuario'>\n");
?>
<HR>

<H3>PASSWORD</H3>
Contrase�a: <INPUT TYPE="password" NAME="clave">
<HR>

<H3>SUBMIT</H3>
<INPUT TYPE="submit" NAME="enviar" VALUE="Enviar datos">
<HR>

<H2>Elemento SELECT</H2>

<H3>SELECT SIMPLE</H3>
<SELECT NAME="titulacion">
   <OPTION VALUE="II" SELECTED>Ingenier�a Inform�tica
   <OPTION VALUE="ITIG">Ingenier�a T�cnica en Inform�tica de Gesti�n
   <OPTION VALUE="ITIS">Ingenier�a T�cnica en Inform�tica de Sistemas
</SELECT>
<HR>

<H3>SELECT M�LTIPLE</H3>
<SELECT MULTIPLE SIZE="3" NAME="idiomas[]">
   <OPTION VALUE="ingles" SELECTED>Ingl�s
   <OPTION VALUE="frances">Franc�s
   <OPTION VALUE="aleman">Alem�n
   <OPTION VALUE="holandes">Holand�s
</SELECT>
<HR>

<H2>Elemento TEXTAREA</H2>
<TEXTAREA COLS="50" ROWS="5" NAME="comentario">
Este libro me parece ...
</TEXTAREA>
<BR><BR>
<HR>

<BR>
<INPUT TYPE="SUBMIT" NAME="enviar" VALUE="enviar">
<INPUT TYPE="RESET" VALUE="borrar datos">

</FORM>

</BODY>
</HTML>
