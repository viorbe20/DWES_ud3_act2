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

$n = 1;

//Array de palabras
$wordsArray = array("MADRID", "LONDRES", "ROMA", "DUBLÍN", "PARÍS");
//Array que rellenaremos con los datos de cada palabra una vez colocadas y que usaremos para una comprobación final
$capitalsArray = array();
//array_push($capitalsArray, array("Nombre"=>"MADRID"));

//Contiene la palabra que se vaya a colocar en ese momento. Cada letra ocupa una posición del array
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

//Array con 
for ($i = 0; $i <= LENGTHBOARD; $i++) {
    echo "<br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {
        $text = $i . $j . " ";
        echo $boardArray[$i][$j] = $text;
    }
}

$boardArray[0][0] = "*";

$validNumber = "true";
do {

    //Seleccionamos una capital y colocamos en la sopa. 
    //Repetimos el mismo proceso con todas hasta que están todas colocadas.
    foreach ($wordsArray as $key) {
        echo ('<br><br>Capital seleccionada=> ' . $key);

        //Creamos fila y columna inicial para la primera letra de palabra actual
        $firstLR = rand(0, 9);
        $firstLC = rand(0, 9);
        echo '<br>' . $key . " inicia en " . $firstLR . $firstLC;

        //Cargamos en una variable la longitud de la palabra
        //Extrae la palabra del array y la separa en letras dentro de un array
        $currentWord = str_split($key);
        $wordLength = count($currentWord);
        echo '<br>Longitud de ' . $key . " => " . $wordLength;

        //Según la dirección de la línea, calculamos la posición de la línea de la última letra.
        //Controlamos que no se salga del tablero generando números hasta que cuadre
        do {
            $rowDirection = $direction[rand(0, 2)];
            echo "<br>Dirección  de la fila => " . $rowDirection;
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
        } while ($lastLR > LENGTHBOARD || $lastLR < 0);

        //Según la dirección de la columna, calculamos la posición de columna de la última letra
        //Controlamos que no se salga del tablero generando números hasta que cuadre
        do {

            //Verificamos que al menos una coordenada se desplaza. Las dos no pueden ser =
            do {
                $columnDirection = $direction[rand(0, 2)];
            } while ($columnDirection == "=" && $rowDirection == "=");
            echo "<br>Direction  de la columna => " . $columnDirection;
            
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
        } while ($lastLC > LENGTHBOARD || $lastLC < 0);


        //Cargamos datos de capital y coordenadas en el array de verificación
        $capitalsArray = array("Nombre" => $key, "Empieza" => $firstLR.$firstLC, "Acaba" => $lastLR.$lastLC);
                foreach ($capitalsArray as $key => $value) {
                    echo('<br>'. $key . ": " .$value) ;
                }
    }//foreach capitales





    //Recorremos array y comporbamos cada cuadrado
    // $wordLength = 6;
    // for ($index = 0; $index < $wordLength; $index++) {

    //     echo "<br><br>posicion=>" . $boardArray[$firstLR][$firstLC];

    //     if (is_numeric($boardArray[$firstLR][$firstLC])) {
    //         $boardArray[$firstLR][$firstLC] = "M";
    //         echo ('<br>contenido=>' . $boardArray[$firstLR][$firstLC]);
    //     }

    //     //Recorremos
    //     if ($rowDirection == "+") {
    //         $firstLR = $firstLR + 1;
    //     } else if ($rowDirection == "-") {
    //         $firstLR = $firstLR - 1;
    //     }

    //     if ($columnDirection == "+") {
    //         $firstLC = $firstLC + 1;
    //     } else if ($columnDirection == "-") {
    //         $firstLC = $firstLC - 1;
    //     }

    //     echo "<br>posicion2=>" . $boardArray[$firstLR][$firstLC];
    // }

    $validNumber = false;
} while ($validNumber);

for ($i = 0; $i <= LENGTHBOARD; $i++) {
    echo "<br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {
        echo $boardArray[$i][$j];
    }
}



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