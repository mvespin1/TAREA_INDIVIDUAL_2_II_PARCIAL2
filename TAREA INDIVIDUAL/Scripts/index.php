<?php

$html = '
<!DOCTYPE html>
<html>
<head>
    <title>MENU 02</title>
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
    <p style="text-align:center;">MENU 02</p>
    <p style="text-align:center;">================================</p>
    <br>
    <p style="text-align:left; margin-left:100px;">1. FIBONACCI</p>
    <p style="text-align:left; margin-left:100px;">2. CUBO</p>
    <p style="text-align:left; margin-left:100px;">3. FRACCIONARIOS</p>
    <p style="text-align:left; margin-left:100px;">4. SALIR</p>
</div>
<br>
<div>
    <form method="post">

        <div id="op1">
            <label style="margin-left:100px;" for="numero"><b>Ingresar un número (Necesario para la opción 1)</b>:</label>
            <input type="number" name="numero" id="numero" min="0" max="50">
        </div>
        <br>
         
        <div id="op3">
            <p style="margin-left:100px;"><b>Ingresar los números fraccionarios (Necesario para la opción 3):</b></p> 

            <p style="margin-left:100px;"><b>A:</b></p>
            <label style="margin-left:100px;" for="numeradorA">Numerador A:</label>
            <input type="number" name="numeradorA" id="numeradorA">
            <label style="margin-left:100px;" for="denominadorA">Denominador A:</label>
            <input type="number" name="denominadorA" id="denominadorA"><br><br>

            <p style="margin-left:100px;"><b>B:</b></p>
            <label style="margin-left:100px;" for="numeradorB">Numerador B:</label>
            <input type="number" name="numeradorB" id="numeradorB">
            <label style="margin-left:100px;" for="denominadorB">Denominador B:</label>
            <input type="number" name="denominadorB" id="denominadorB"><br><br>
            
            <p style="margin-left:100px;"><b>C:</b></p>
            <label style="margin-left:100px;" for="numeradorC">Numerador C:</label>
            <input type="number" name="numeradorC" id="numeradorC">
            <label style="margin-left:100px;" for="denominadorC">Denominador C:</label>
            <input type="number" name="denominadorC" id="denominadorC"><br><br>
            
            <p style="margin-left:100px;"><b>D:</b></p>
            <label style="margin-left:100px;" for="numeradorD">Numerador D:</label>
            <input type="number" name="numeradorD" id="numeradorD">
            <label style="margin-left:100px;" for="denominadorD">Denominador D:</label>
            <input type="number" name="denominadorD" id="denominadorD">

        </div>
            
        <br><br><br>

        <div>
            <label style="margin-left:100px;" for="opcion"><b>Ingresar una opción (1-4): </b></label>
            <input type="text" name="opcion" id="opcion" required>
        </div>
            
        <br>

        <button style="margin-left:100px;" type="submit">Calcular</button>
    </form>
</div>


<br><br>

</body>
</html>';

$finPrograma = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['opcion'])) {
        $op = $_POST['opcion'];

        switch ($op) {
            case '1':
                //SERIE DE FIBONACCI
                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $serieDeFibonacci = fibonacci($numero);

                    $html .= '<h3 style="margin-left:100px;">SERIE DE FIBONACCI</h3>';
                    $html .= "<p style='margin-left:100px;'>Los $numero números de FIBONACCI son " . implode(" ", $serieDeFibonacci) . "</p>";
                } 
                break;

            case '2':
                // NÚMEROS QUE CUMPLEN LA CONDICIÓN
                define('MAX', 1000000);
                $html .= '<h3 style="margin-left:100px;">NÚMEROS QUE CUMPLEN CONDICIÓN DEL CUBO</h3>';
                $html .= "<p style='margin-left:100px;'>Los números enteros entre 1 y " . MAX . " que cumplen con la condición son:</p>";
                for ($num = 1; $num <= MAX; $num++) {
                    if (cubos($num)) {
                        $html .= "<p style='margin-left:100px;'>$num</p>";
                    }
                }
                break;

            case '3':
                //EXPRESIÓN MATEMÁTICA
                $numeradorA = $_POST['numeradorA'];
                $denominadorA = $_POST['denominadorA'];
                $numeradorB = $_POST['numeradorB'];
                $denominadorB = $_POST['denominadorB'];
                $numeradorC = $_POST['numeradorC'];
                $denominadorC = $_POST['denominadorC'];
                $numeradorD = $_POST['numeradorD'];
                $denominadorD = $_POST['denominadorD'];

                $resultado = SerieMatematica(
                    $numeradorA,
                    $denominadorA,
                    $numeradorB,
                    $denominadorB,
                    $numeradorC,
                    $denominadorC,
                    $numeradorD,
                    $denominadorD
                );

                $html .= '<h3 style="margin-left:100px;">EXPRESIÓN MATEMÁTICA</h3>';

                if (is_numeric($resultado)) {
                    $html .= "<p style='margin-left:100px;'>El resultado de la expresión matemática es " . $resultado . "</p>";
                } else {
                    $html .= "<p style='margin-left:100px;'>No se pudo calcular la expresión matemática.</p>";
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

//SERIE DE FIBONACCI
function fibonacci($n) {
    $serieDeFibonacci = array();

    if ($n >= 1) {
        $serieDeFibonacci[] = 1;
    }
    if ($n >= 2) {
        $serieDeFibonacci[] = 1;
    }

    $f1 = 1;
    $f2 = 1;
    for ($i = 3; $i <= $n; $i++) {
        $f3 = $f1 + $f2;
        $serieDeFibonacci[] = $f3;
        $f1 = $f2;
        $f2 = $f3;
    }

    return $serieDeFibonacci;
}

//CUBO DE LOS DÍGITOS IGUAL AL NÚMERO
function cubos($num) {
    $digitos = str_split($num);
    $sumaCubos = 0;
    foreach ($digitos as $digito) {
        $sumaCubos += pow($digito, 3);
    }
    return $sumaCubos == $num;
}

//SERIE MATEMÁTICA
function SerieMatematica($numeradorA, $denominadorA, $numeradorB, $denominadorB, $numeradorC, $denominadorC, $numeradorD, $denominadorD)
{
    // VERIFICAR QUE LOS NUMERADORES Y DENOMINADORES SEAN NÚMEROS ENTEROS
    if (
        !filter_var($numeradorA, FILTER_VALIDATE_INT) ||
        !filter_var($denominadorA, FILTER_VALIDATE_INT) ||
        !filter_var($numeradorB, FILTER_VALIDATE_INT) ||
        !filter_var($numeradorB, FILTER_VALIDATE_INT) ||
        !filter_var($denominadorC, FILTER_VALIDATE_INT) ||
        !filter_var($numeradorC, FILTER_VALIDATE_INT) ||
        !filter_var($numeradorD, FILTER_VALIDATE_INT) ||
        !filter_var($denominadorD, FILTER_VALIDATE_INT)
    ) {
        return 'Los numeradores y denominadores no son números enteros.';
    }

    // VERIFICAR QUE LOS DENOMINADORES SEAN DIFERENTES DE CERO
    if ($denominadorA === 0 || $denominadorB === 0 || $denominadorC === 0 || $denominadorD === 0) {
        return 'Los denominadores no pueden ser cero.';
    }

    // CALCULAR LOS TERMINOS A, B, C Y D
    $A = $numeradorA / $denominadorA;
    $B = $numeradorB / $denominadorB;
    $C = $numeradorC / $denominadorC;
    $D = $numeradorD / $denominadorD;

    $resultado = $A + ($B * $C) - $D;

    return $resultado;
}


?>





