<?php

$html = '
<!DOCTYPE html>
<html>
<head>
    <title>MENU 01</title>
    <style type="text/css">
        #background{position:absolute; width:99%; height:130%;}
        #fixed {position:absolute; top: 0px; left: 0px;}
        body {
            background-image: url("../Imagenes/fondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
<br><br><br><br><br>
<div>
    <p style="text-align:center;">================================</p>
    <p style="text-align:center;">MENU 01</p>
    <p style="text-align:center;">================================</p>
    <br>
    <p style="text-align:left; margin-left:100px;">1. FACTORIAL</p>
    <p style="text-align:left; margin-left:100px;">2. PRIMO</p>
    <p style="text-align:left; margin-left:100px;">3. SERIE MATEMATICA</p>
    <p style="text-align:left; margin-left:100px;">4. SALIR</p>
</div>
<br>
<div>
    <form method="post">
        
        <label style="margin-left:100px;" for="numero">Ingresar un número:</label>
        <input type="number" name="numero" id="numero" required><br><br>
        
        <label style="margin-left:100px;" for="opcion">Ingresar una opción (1-4):</label>
        <input type="text" name="opcion" id="opcion" required><br><br>
        
        <button style="margin-left:100px;" type="submit">Calcular</button>
    
    </form>
</div>

<br>

</body>
</html>';

$finPrograma = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['opcion'])) {
        $op = $_POST['opcion'];

        switch ($op) {
            case '1':

                //FACTORIAL
                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $resultado = factorial($numero);

                    $html .= '<h3 style="margin-left:100px;">FACTORIAL DE UN NÚMERO</h3>';
                    $html .= "<p style='margin-left:100px;'>El factorial del número $numero da como resultado $resultado</p><br><br>";
                }
                break;

            case '2':
                //NÚMERO PRIMO
                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];

                    $mensaje = (primo($numero)) ? ' es PRIMO' : ' NO es PRIMO';

                    $html .= "<h3 style='margin-left:100px;'>NÚMERO PRIMO</h3>";
                    $html .= "<p style='margin-left:100px;'>El número $numero $mensaje </p><br><br>";
                }
                break;

            case '3':
                //SERIE MATEMÁTICA
                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $serieMatematica = serieNum($numero);
                    
                    $html .= '<h3 style="margin-left:100px;">SERIE MATEMÁTICA</h3>';
                    $html .= "<p style='margin-left:100px;'>La serie matemática de $numero términos es </p>";
                    $html .= "<p style='margin-left:100px;'>" . implode(" ", $serieMatematica) . "</p>" . "<br><br>";

                } 
                break;

            case '4':
                //SALIR
                $finPrograma = true;
                break;

            default:
                break;
        }
    }
}

if (!$finPrograma) {
    echo $html;
}

//FACTORIAL
function factorial($dato)
{
    $total = 1;
    for ($i = $dato; $i >= 1; $i--) {
        $total *= $i;
    }
    return $total;
}

//NUMERO PRIMO
function primo($num)
{
    for ($bandera = true, $i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            $bandera = false;
            break;
        }
    }
    return $bandera;
}

//CALCULAR LA SERIE MATEMÁTICA
function serieNum($terminos)
{
    $serie = array();

    for ($cont = 1; $cont <= $terminos; $cont++) {
        $termino = calcularTermino($cont);
        $serie[] = $termino;
    }

    return $serie;
}

//CALCULAR CADA TÉRMINO DE LA SERIE
function calcularTermino($cont)
{
    $numerador = pow($cont, 2);
    $denominador = factorial($cont);

    if ($cont % 2 == 0) {
        $termino = formarFraccion($numerador, $denominador);
    } else {
        $termino = formarFraccionNegativa($numerador, $denominador);
    }

    return $termino;
}

//FORMAR FRACCION
function formarFraccion($numerador, $denominador)
{
    return $numerador . '/' . $denominador;
}

//FORMAR FRACCION NEGATIVA
function formarFraccionNegativa($numerador, $denominador)
{
    return '-' . $numerador . '/' . $denominador;
}

?>