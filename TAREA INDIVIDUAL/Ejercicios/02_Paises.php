<?php
/*
  indices.php   */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
	$G8 = array(
		'EUROPA' => array("Alemania", "Francia", "Italia", "Reino Unido"),
		'ASIA' => array("Rusia", "Japón"),
		'AMERICA' => array("Estados Unidos", "Canada"),
		'AFRICA' => array("Sudafrica"),
		'OCEANIA' => null
	);

	// IMPRIME LA ESTRUCTURA DE UN ARREGLO DE FORMA RECURSIVA	
	echo "<pre>";
	print_r($G8);
	echo "</pre>";


	echo  "</br> </br> PAISES DEL G8: </br> </br>";

	// IMPRIMA LA INFORMACION EN UNA TABLA  
	// LA PRIMERA FILA ES EL NOMBRE DE CADA CONTINENTE (CELDAS DE COLOR BLANCO CON NEGRILLAS) 
	// LAS SIGUIENTES FILAS TIENEN COLORES ALTERNADOS
	//  LAS CELDAS VACIAS SON DE COLOR PLOMO
	?>

	<!-- CREA UNA TABLA EN HTML	 -->
	<table border=1 style="text-align:center;width:80%">

		<!-- CREA FILA PARA LOS ÍNDICES -->
		<tr>
			<th colspan="<?php echo count($G8) + 1; ?>" bgcolor="#EC7063">CONTINENTES</th>
		</tr>
		<tr>
			<?php
			foreach ($G8 as $continente => $paises) {
				echo "<td>$continente</td>";
			}
			?>
		</tr>

		<!-- CREA CODIGO PHP  -->
		<?php
		$tam = count($G8);  //CUENTA EL TOTAL DE FILAS DE LA MATRIZ
		echo "<br>NUMERO DE CONTINENTES:  $tam <br>";
		$html = NULL;
		$maxColum = 0;

		// ************* AVERIGUA LA MAXIMA COLUMNA DE LA TABLA ***********************
		foreach ($G8 as $f => $info) {
			//for($i=0;$i<$tam;$i++){
			$tam2 = count($info);   // AVERIGUA EL TAMAÑO DE COLUMNAS POR CADA FILA

			//echo "<br>TAM2:  $tam2 <br>";

			$maxColum = ($maxColum >= $tam2) ? $maxColum  : $tam2;   // ALMACENA EL VALOR MAXIMO DE LAS COLUMNAS DE LA MATRIZ
		}
		//****************************************************
		
		// $html .= 'CODIGO HTML'    .  $variable  . 'CODIGO HTML' ;

		// ALGORITMO PARA IMPRIMIR EN UNA PAGINA WEB UTILIZANDO TABLAS EN FORMA DINÁMICA
		$bandera = true;
		for ($c = 0; $c < $maxColum; $c++) { // Recorre las columnas (países)
			// ALTERNAR LOS COLORES DE LA FILA EN UNA TABLA
			if ($bandera) {
				$html .= '<tr bgcolor="#D6FAF2">';
			} else {
				$html .= '<tr bgcolor="#D6DEFA">';
			}
			$bandera = !$bandera;

			// Crea cada columna en HTML
			foreach ($G8 as $f => $info) {
				if (isset($info[$c])) {
					if (empty($info[$c])) {
						$html .= '<td bgcolor="#454444"> </td>'; // Imprime una celda de color plo­mo
					} else {
						$html .= '<td>' . $info[$c] . ' </td>'; // Imprime el valor de la celda
					}
				} else {
					$html .= '<td bgcolor="#454444"> </td>'; // Si no hay país en esa columna, imprime una celda de color plo­mo
				}
			}
			$html .= '</tr>'; // Cierra la fila HTML
		}

		// IMPRIME TODA LA TABLA  
		echo $html;

		// CIERRA EL ALGORITMO PHP   
		?>

	</table>

</body>

</html>