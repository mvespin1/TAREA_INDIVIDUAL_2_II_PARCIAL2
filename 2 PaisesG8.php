<?php
/*
  indices.php   */
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>EJEMPLO 02</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.31" />
</head>

<body>
<h1> PAISES DEL G8 </h1>

<?php
	  
	   
	 //INDICES ASOCIATIVOS     
	 $G8=array('EUROPA' => array("Alemania","Francia","Italia","Reino Unido"),
	           'ASIA' => array("Rusia","Japón"),
	           'AMERICA' => array ("USA","Canada"), 
			   'AFRICA' => null,
	           'OCEANIA' => null );
	       	
 // IMPRIME LA ESTRUCTURA DE UN ARREGLO DE FORMA RECURSIVA	
    echo "<pre>";
    	print_r($G8);
	echo "</pre>";  
	 

	echo  "</br> </br> PAISES DEL G8: </br> </br>"; 
	
	foreach($G8 as $indice => $continente){
		echo "</br>CONTINENTE: " . $indice . "<br>"; 
	  
	   if (!isset($continente))
				echo "No existe paises que forman parte del G8 <br>";
	   else	
		 foreach($continente as $c){
			echo  " $c  <br>";
		 }
		
	}          

?>
  
	
</body>

</html>
