<SCRIPT LANGUAGE='JavaScript'>
<!--

// -----------------------------------------------------------------
// Biblioteca de funciones JavaScript para el manejo de fechas
// -----------------------------------------------------------------

// -----------------------------------------------------------------
// Funci�n que calcula el n�mero de d�as de un mes dado de un a�o dado
// -----------------------------------------------------------------
   function diasMes (mes, anyo)
   {
      var ndias;

      if (mes==1 || mes==3 || mes==5 || mes==7 || mes==8 || mes==10 || mes==12)
         ndias = 31;
      else if (mes==4 || mes==6 || mes==9 || mes==11)
         ndias = 30;
      else if (mes==2)
         if (bisiesto (anyo))
            ndias = 29;
         else
            ndias = 28;
      return (ndias);
   }

// -----------------------------------------------------------------
// Funci�n que indica si un a�o es bisiesto
// -----------------------------------------------------------------
   function bisiesto (anyo)
   {
      var bis;
      
      bis = anyo%4==0 && anyo%100!=0 || anyo%400==0;
      return (bis);
   }

// -->
</SCRIPT>
