<?php
//Longiutd del tablero
DEFINE("LENGTHBOARD", 10);
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
    echo "<br>";
    for ($j = 0; $j < LENGTHBOARD; $j++) {
        $boardArray[$i][$j] = $text;
    }
}

//Mientras no haya númeor válido no lo coloca
$validNumber = true;

do {
    //Creamos fila y columna inicial y dirección
    $firstLR = rand(0, 9);
    $firstLC= rand(0, 9);
    $rowDirection = $direction[rand(0,2)];
    $columnDirection = $direction[rand(0,2)];
    
    //Contiene la primera letra con columna y fila
    $firstLetter[$firstLR][$firstLC] = "M";//$currentWord[0];
    
    echo "<br>Primera línea=>" . $firstLR;
    echo "<br>Primera columna=>" . $firstLC;
    echo "<br>Dirección línea=>" . $rowDirection;
    
    //Según la dirección de la línea, calculamos la línea de la última letra
    switch ($rowDirection) {
        case '+':
            $lastLR = $firstLR +($wordLength-1);
            break;
            case '-':
                $lastLR = $firstLR - ($wordLength-1);
                break;
                case '=':
                    $lastLR = $firstLR;
                    break;
    }
    
    echo "<br>Dirección columna=>" . $columnDirection;
    switch ($columnDirection) {
        case '+':
            $lastLC = $firstLC +($wordLength-1);
            break;
            case '-':
                $lastLC = $firstLC - ($wordLength-1);
                break;
                case '=':
                    $lastLC = $firstLC;
                    break;
    }
    echo "<br><br>Primera línea=>" . $firstLR;
    echo "<br>Primera columna=>" . $firstLC;
    echo "<br>Última línea=>" . $lastLR;
    echo "<br>Última columna=>" . $lastLC;

    $lastLetter[$lastLR][$lastLC] ="M";//$currentWord[0];
    
    $validNumber = false;
    //Establecemos la posición final

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