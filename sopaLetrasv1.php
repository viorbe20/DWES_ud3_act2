<?php
//Longitud del tablero
DEFINE("LENGTHBOARD", 9);
//Array que contiene los datos de la tabla
$boardArray = array();
//Inicia que controla la búsqueda de casilla 
$validNumber = "";
//Contenido de cada casilla
$text = 0;
//Dirección que va a tomar la palabra: = igual, + suma y - resta
$direction = array("+", "-", "=");
$rowDirection = "";
$columnDirection = "";

//Array de palabras
$wordsArray = array("MADRID", "LONDRES", "ROMA");
//Contiene la palabra que se vaya a colocar en ese momento. Cada letra ocupa una posición del array
$word = "";
$currentWord = array();
$wordLength = "";

//Contiene la posición de la primera y la última letra
$firstLetter = array();
$lastLetter = array();

//Contiene coordenadas de primera y última letra
$firstLR = "";
$firstLC = "";
$lastLR = "";
$lastLC = "";

//Extrae la palabra del array y la separa en letras dentro de un array
$word = $wordsArray[0];
$currentWord = str_split($word);
$wordLength = count($currentWord);
//var_dump($currentWord);

//Array con 
for ($i = 0; $i < LENGTHBOARD; $i++) {
    //echo "<br>";
    for ($j = 0; $j < LENGTHBOARD; $j++) {
        $boardArray[$i][$j] = $text;
    }
}

$validNumber = "true";
do {
    //Creamos fila y columna inicial y dirección
    $firstLR = rand(0, 9);
    $firstLC = rand(0, 9);


    //Contiene la primera letra con columna y fila
    $firstLetter[$firstLR][$firstLC] = "M"; //$currentWord[0];

    // echo "<br>Primera línea=>" . $firstLR;
    // echo "<br>Primera columna=>" . $firstLC;
    //echo "<br>Dirección línea=>" . $rowDirection;

    //Según la dirección de la línea, calculamos la posición de la línea de la última letra.
    //Controlamos que no se salga del tablero generando números hasta que cuadre
    do {
        $rowDirection = $direction[rand(0, 2)];
        //echo "<br>directionR" . $rowDirection;
        switch ($rowDirection) {
            case '+':
                $lastLR = $firstLR + ($wordLength - 1);
                break;
            case '-':
                $lastLR = $firstLR - ($wordLength - 1);
                break;
            case '=':
                $lastLR = $firstLR;
                break;
        }
        //echo "<br>lastLR" . $lastLR;
    } while ($lastLR > LENGTHBOARD || $lastLR < 0);

    //Según la dirección de la columna, calculamos la posición de columna de la última letra
    //Controlamos que no se salga del tablero generando números hasta que cuadre
    do {
        $columnDirection = $direction[rand(0, 2)];
        echo "<br>firstLC=>" . $firstLC;
        echo "<br>directionColumn=>" . $columnDirection;
        switch ($columnDirection) {
            case '+':
                $lastLC = $firstLC + ($wordLength - 1);
                break;
            case '-':
                $lastLC = $firstLC - ($wordLength - 1);
                break;
            case '=':
                $lastLC = $firstLC;
                break;
        }
        echo "<br>lastLC=>" . $lastLC;
    } while ($lastLC > LENGTHBOARD || $lastLC < 0);


    //Creamos el array de la última letra con sus coordenadas y le asignamos la letra 
    $lastLetter[$lastLR][$lastLC] = "M"; //$currentWord[0];


    $validNumber = false;
} while ($validNumber);



?>

<!--Muestra tablero interno-->
<!DOCTYPE HTML>
<html lang='es'>

<head>
    <style>
        .square {
            background-color: lightslategray;
            width: 40px;
            height: 40px;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <!-- //Tablero interno
// echo "<table>";
// for ($i = 0; $i < LENGTHBOARD; $i++) {
//     echo "<tr>";
//     for ($j = 0; $j < LENGTHBOARD; $j++) {
//         echo "<td> <div class='square' value=$text name='square$i$j'[]>$text</div> </td>";
//     }
//     echo "</tr>";
// }
// echo "</table>";  -->

</body>

</html>