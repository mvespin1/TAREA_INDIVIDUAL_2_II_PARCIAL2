<?php

function validarCI($dcedula){

if(is_null($dcedula) || empty($dcedula)){
  echo "Por Favor Ingrese la Cedula";
}else{
    $cantDigitos=strlen($dcedula);
    
    $sum = 0;
    for($i=0; $i < ($cantDigitos - 1); $i++){
		
      /*echo $dcedula[$i];
      echo "<br>";*/
	  
      if (($i % 2) == 0){
        //echo $i . " ES PAR<br>";
        $R = $dcedula[$i] * 2;
        if ($R > 9){
          $R -= 9;
        }
      }else{
        //echo $i . " ES IMPAR<br>";
        $R = $dcedula[$i] * 1;
      }

     // echo "MULTIPLICACION: " . $R;
     // echo "<br>"; 

      $sum += $R;

     }//FOR

    // echo "<br><br>SUMA: " . $sum;
    //  echo "<br>"; 

      $digVerificador = $dcedula[9];
      if (($sum % 10) == 0){
        return ($digVerificador == 0);
      }else{
        $residuo = $sum % 10;
        return ($digVerificador == (10 - $residuo));
      }    


          
  }
}//fin de la funcion



//echo "PETICION POST";
/*echo "<pre>";
  print_r($_POST);
echo "</pre>";*/

$cedula = $_POST["cedula"];
$verificador=validarCI($cedula);
echo "<br>";
$texto = ($verificador) ? " es una cedula Correcta" : " es una cedula incorrecta";

//CEDULA
echo "<h4>VERIFICACION DE CEDULA</h4>";
echo "LA CEDULA: " . $cedula . $texto . "<br>";

?>