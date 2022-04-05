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
//Variable que contiene la forma de recorrer el array
$loopRow = "";
$loopColumn = "";
$n = 1;

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
for ($i = 0; $i <= LENGTHBOARD; $i++) {
    echo "<br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {
$text = "|".$i.$j."|";
        echo $boardArray[$i][$j] = $text;
    }
}

$boardArray[0][0] = "*";

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
    //Cargamos también la $i++ del recorrido posterior para saber si tenemos que sumar 1, -1 o 0
    do {
        $rowDirection = $direction[rand(0, 2)];
        //echo "<br>directionR" . $rowDirection;
        switch ($rowDirection) {
            case '+':
                $lastLR = $firstLR + ($wordLength - 1);
                $loopRow = "+1"; 
                break;
            case '-':
                $lastLR = $firstLR - ($wordLength - 1);
                $loopRow = "-1"; 
                break;
            case '=':
                $lastLR = $firstLR;
                $loopRow = "+0"; 
                break;
        }
        //echo "<br>lastLR" . $lastLR;
    } while ($lastLR > LENGTHBOARD || $lastLR < 0);

    //Según la dirección de la columna, calculamos la posición de columna de la última letra
    //Controlamos que no se salga del tablero generando números hasta que cuadre
    //Cargamos también la $i++ del recorrido posterior para saber si tenemos que sumar 1, -1 o 0
    do {

        //Verificamos que al menos una coordenada se desplaza
        do {
            $columnDirection = $direction[rand(0, 2)];
        } while ($columnDirection == "=" && $rowDirection == "=");

        
        //echo "<br>firstLC=>" . $firstLC;
        //echo "<br>directionColumn=>" . $columnDirection;
        //echo "<br>rowColumn=>" . $rowDirection;
        switch ($columnDirection) {
            case '+':
                $lastLC = $firstLC + ($wordLength - 1);
                $loopColumn = "1"; 
                break;
            case '-':
                $lastLC = $firstLC - ($wordLength - 1);
                $loopColumn = "-1"; 
                break;
            case '=':
                $lastLC = $firstLC;
                $loopColumn = "0"; 
                break;
        }
        //echo "<br>lastLC=>" . $lastLC;
    } while ($lastLC > LENGTHBOARD || $lastLC < 0);

    //Recorremos array y comporbamos cada cuadrado
    $wordLength = 6;
   for ($index=0; $index < $wordLength; $index++) { 
    
    echo "<br>posicion=>" . $boardArray[$firstLR][$firstLC];
    
    if ($rowDirection == "+") {
        $firstLR = $firstLR + 1;
    } else if ($rowDirection == "-"){
        $firstLR = $firstLR - 1;
    }

    if ($columnDirection == "+") {
        $firstLC = $firstLC + 1;
    } else if ($columnDirection == "-"){
        $firstLC = $firstLC - 1;
    }
    
   }

   

    // for ($i = $firstLR; $i = $lastLR; $loopRow++) {
    //     echo "<br>";
    //     for ($j = $firstLC; $j = $lastLC; $loopColumn++) {
    //         //echo $boardArray[$i][$j];
    //         echo "<br>" . $i;
    //         echo "<br>" . $j;
    //     }
    // }



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