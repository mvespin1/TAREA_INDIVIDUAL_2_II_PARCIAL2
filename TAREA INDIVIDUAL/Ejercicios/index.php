<?php

$html = '
<!DOCTYPE html>
<html>
<head>
    <title>MENU EJERCICIOS</title>
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
    <p style="text-align:center;">MENU EJERCICIOS</p>
    <p style="text-align:center;">================================</p>
    <br>
    <p style="text-align:left; margin-left:100px;">1. FACTORIAL</p>
    <p style="text-align:left; margin-left:100px;">2. SERIE MATEMATICA</p>
    <p style="text-align:left; margin-left:100px;">3. PRIMOS</p>
    <p style="text-align:left; margin-left:100px;">4. FIBONACCI</p>
    <p style="text-align:left; margin-left:100px;">5. CUBO</p>
    <p style="text-align:left; margin-left:100px;">6. FRACCIONARIO</p>
    <p style="text-align:left; margin-left:100px;">7. TRIANGULO DE PASCAL (FUNCIONES)</p>
    <p style="text-align:left; margin-left:100px;">8. CEDULA (SIN ARREGLOS)</p>
    <p style="text-align:left; margin-left:100px;">9. CEDULA (MATRICES)</p>
    <p style="text-align:left; margin-left:100px;">10. PAISES G8</p>

    <p style="text-align:left; margin-left:100px;">11. SALIR</p>
</div>
<br>

<div>
    <form method="post">
        <label style="margin-left:100px;" for="opcion">Ingresar una opción (1-11):</label>
        <input type="text" name="opcion" id="opcion" required><br><br>
        <button style="margin-left:100px;" type="submit">Calcular</button>
    </form>
</div>

</body>
</html>';


$finPrograma = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['opcion'])) {
        $op = $_POST['opcion'];

        switch ($op) {
            case '1':
                //FACTORIAL
                $html .= '
                <div>
                    <form method="post">
                        <label style="margin-left:100px;" for="numero">Ingresar un número:</label>
                        <input type="number" name="numero" id="numero" required><br><br>
                        <input type="hidden" name="opcion" value="1">
                        <button style="margin-left:100px;" type="submit">Calcular Factorial</button>
                    </form>
                </div>';

                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $resultado = factorial($numero);

                    $html .= '<h3 style="margin-left:100px;">FACTORIAL DE UN NÚMERO</h3>';
                    $html .= "<p style='margin-left:100px;'>El factorial del número $numero da como resultado $resultado</p><br><br>";
                }
                break;

            case '2':
                //SERIE MATEMÁTICA
                $html .= '
                <div>
                    <form method="post">
                        <label style="margin-left:100px;" for="numero">Ingresar un número:</label>
                        <input type="number" name="numero" id="numero" required><br><br>
                        <input type="hidden" name="opcion" value="2">
                        <button style="margin-left:100px;" type="submit">Calcular Serie Matemática</button>
                    </form>
                </div>';

                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $serieMatematica = serieNum($numero);

                    $html .= '<h3 style="margin-left:100px;">SERIE MATEMÁTICA</h3>';
                    $html .= "<p style='margin-left:100px;'>La serie matemática de $numero términos es </p>";
                    $html .= "<p style='margin-left:100px;'>" . implode(" ", $serieMatematica) . "</p>" . "<br><br>";
                }
                break;

            case '3':
                //NÚMERO PRIMO
                $html .= '
                    <div>
                        <form method="post">
                            <label style="margin-left:100px;" for="numero">Ingresar un número:</label>
                            <input type="number" name="numero" id="numero" required><br><br>
                            <input type="hidden" name="opcion" value="3">
                            <button style="margin-left:100px;" type="submit">Calcular Número Primo</button>
                        </form>
                    </div>';

                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $mensaje = (primo($numero)) ? ' es PRIMO' : ' NO es PRIMO';

                    $html .= "<h3 style='margin-left:100px;'>NÚMERO PRIMO</h3>";
                    $html .= "<p style='margin-left:100px;'>El número $numero $mensaje </p><br><br>";
                }
                break;

            case '4':
                //SERIE DE FIBONACCI
                $html .= '
                        <div>
                            <form method="post">
                                <label style="margin-left:100px;" for="numero">Ingresar un número:</label>
                                <input type="number" name="numero" id="numero" required><br><br>
                                <input type="hidden" name="opcion" value="4">
                                <button style="margin-left:100px;" type="submit">Calcular Serie de Fibonacci</button>
                            </form>
                        </div>';

                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $serieDeFibonacci = fibonacci($numero);

                    $html .= '<h3 style="margin-left:100px;">SERIE DE FIBONACCI</h3>';
                    $html .= "<p style='margin-left:100px;'>Los $numero números de FIBONACCI son " . implode(" ", $serieDeFibonacci) . "</p>";
                } 
                break;

            case '5':
                //CUBO

                $html .= '
                <div>
                    <form method="post">
                        <button style="margin-left:100px;" type="submit">Calcular numeros que cumplen con la condicion:</button>
                    </form>
                </div>';

                define('MAX', 1000000);
                $html .= '<h3 style="margin-left:100px;">NÚMEROS QUE CUMPLEN CONDICIÓN DEL CUBO</h3>';
                $html .= "<p style='margin-left:100px;'>Los números enteros entre 1 y " . MAX . " que cumplen con la condición son:</p>";
                for ($num = 1; $num <= MAX; $num++) {
                    if (cubos($num)) {
                        $html .= "<p style='margin-left:100px;'>$num</p>";
                    }
                }
                break;

                case '6':
                    //FRACCIONARIOS

                $html .= '
                
                <div>
                <form method="post">
    
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

                <button style="margin-left:100px;" type="submit">Calcular Fraccionarios:</button>

                </form>
    
            </div>';
                    
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
                
                
                case '7':
                    //TRIANGULO DE PASCAL
    
                    $html .= '
                    <div>
                        <form method="post">
            
                            <label style="margin-left:130px;" for="numero">Ingresar el numero de filas del triangulo de Pascal</label>
                            <input type="number" name="numero" id="numero" required><br><br>
                    
                            <button style="margin-left:100px;" type="submit">Imprimir Triangulo:</button>
                    
                        </form>
                    </div>';

                    if (isset($_POST['numero'])) {
                        $num = $_POST['numero'];
                        $triangulo = '<div style="margin-left:100px;"><pre>' . pascal($num) . '</pre></div>';
                        $html .= $triangulo;
                    }
    
                    break;  
                    
                    
                    case '8':
                        //CEDULA (SIN ARREGLOS)
        
                        $html .= '
                        <div>
                            <form method="post">
                
                                <label style="margin-left:130px;" for="numero">Ingresar Cédula</label>
                                <input type="text" name="numero" required><br><br>
                        
                                <button style="margin-left:100px;" type="submit">Verificar Cedula:</button>
                        
                            </form>
                        </div>';
        
                        break;  

                        case '9':
                            //CEDULA (MATRICES)
            
                            $html .= '
                            <div>
                                <form method="post">
                    
                                    <label style="margin-left:130px;" for="cedula">Ingresar Cédula</label>
                                    <input type="text" name="cedula" id="cedula" required><br><br>
                            
                                    <button style="margin-left:130px;" type="submit" name="verificar">Verificar Cédula</button>
                            
                                </form>
                            </div>';
            
                            break;  

            case '11':
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


//COMBINACIONES
function combinaciones($n, $r)
{
    return factorial($n) / (factorial($r) * factorial($n - $r));
}

//PASCAL
function pascal($f)
{
    $triangulo = '';
    for ($fila = 0; $fila <= $f; $fila++) {
        $espacios = $f - $fila;

        // Imprimir espacios en blanco
        for ($i = 0; $i < $espacios; $i++) {
            $triangulo .= " ";
        }

        for ($columna = 0; $columna <= $fila; $columna++) {
            $num = combinaciones($fila, $columna);
            $triangulo .= $num . " ";
        }

        $triangulo .= "<br>";
    }
    return $triangulo;
}


//CEDULA SIN ARREGLOS
//VALIDAR DATOS
function validarDatos($texto)
{
    $size = strlen($texto);

    for ($i = 0; $i < $size; $i++) {
        if (is_numeric($texto[$i])) {
            continue;
        } else {
            return false;
        }
    }

    return true;
}

//COMPROBAR CÉDULA
function ComprobarCedula($cedula)
{
    if (!validarDatos($cedula)) {
        return "La cédula contiene caracteres no válidos";
    }

    $tamanoCedula = strlen($cedula);

    if ($tamanoCedula != 10) {
        return "La cédula debe tener 10 dígitos";
    }

    $suma = 0;

    // Multiplicar posiciones impares por 2 y sumarlos
    for ($i = 0; $i < $tamanoCedula - 1; $i++) {
        if (($i + 1) % 2 != 0) {
            $multiplicado = $cedula[$i] * 2;
            if ($multiplicado >= 10) {
                $multiplicado -= 9;
            }
            $suma += $multiplicado;
        } else {
            $suma += $cedula[$i];
        }
    }

    // Obtener el residuo de las divisiones sucesivas por 10
    $residuo = $suma % 10;

    // Calcular el dígito verificador
    $digitVerif = ($residuo != 0) ? 10 - $residuo : 0;

    if ($digitVerif != $cedula[$tamanoCedula - 1]) {
        return "La cédula no es válida";
    }

    return "La cédula es válida";
}

//VERIFICAR CÉDULA
if (isset($_POST['verificar'])) {
    $cedula = $_POST['cedula'];
    $resultado = ComprobarCedula($cedula);

    $html .= "
    <div>
        <p style='margin-left:130px;'>$resultado</p>
    </div>";
}

?>



