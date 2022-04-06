<?php
//Longitud del tablero
DEFINE("LENGTHBOARD", 9);
//Array que contiene los datos de la tabla
$boardArray = array();
//Dirección que va a tomar la palabra: = igual, + suma y - resta
$direction = array("+", "-", "=");
$rowDirection = "";
$columnDirection = "";
$sameLetter = false;

//Array de palabras
$capitalsArray = array("MADRID", "LONDRES", "PARIS");
$alphabet = array("a", "b", "c", "d", "e", "f");
$capitalsArrayLenght = count($capitalsArray);
//$wordsFinished = false;
//Array que rellenaremos con los datos de cada palabra una vez colocadas y que usaremos para una comprobación final
$capitalsDataArray = array();
//array_push($capitalsArray, array("Nombre"=>"MADRID"));

//Contiene la palabra que se vaya a colocar en ese momento. Cada letra ocupa una posición del array
$currentWord = array();
$currentWordLength = "";

//Contiene la posición de la primera y la última letra
//$firstLetter = array();
//$lastLetter = array();

//Contiene coordenadas de primera y última letra
$firstLR = "";
$firstLC = "";
$lastLR = "";
$lastLC = "";
$row = "";
$column = "";
$wordSet = true;
//Indica cuando se ha colocado una palabra y poder pasar a la siguiente
$wordSet = false;
$letterSet = false;

//Array inicial
for ($i = 0; $i <= LENGTHBOARD; $i++) {
    //echo "<br><br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {
        $boardArray[$i][$j] = "0";
    }
}

do {
    //Seleccionamos siempre la primera capital del array.
    //Cuando se coloca, se elimina del array
    $key = $capitalsArray[0];

    //Creamos fila y columna inicial para la primera letra de palabra actual
    $firstLR = rand(0, 9);
    $firstLC = rand(0, 9);

    //Cargamos en una variable la longitud de la palabra
    //Extrae la palabra del array y la separa en letras dentro de un array
    $currentWord = str_split($key);
    $currentWordLength = count($currentWord);

    //Según la dirección de la línea, calculamos la posición de la línea de la última letra.
    //Controlamos que no se salga del tablero generando números hasta que cuadre
    do {
        $rowDirection = $direction[rand(0, 2)];
        //echo "<br>Dirección  de la fila => " . $rowDirection;
        switch ($rowDirection) {
            case '+':
                $lastLR = $firstLR + ($currentWordLength - 1);
                break;
            case '-':
                $lastLR = $firstLR - ($currentWordLength - 1);
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
        //echo "<br>Direction  de la columna => " . $columnDirection;

        switch ($columnDirection) {
            case '+':
                $lastLC = $firstLC + ($currentWordLength - 1);
                break;
            case '-':
                $lastLC = $firstLC - ($currentWordLength - 1);
                break;
            case '=':
                $lastLC = $firstLC;
                break;
        }
    } while ($lastLC > LENGTHBOARD || $lastLC < 0);

    echo ('<br><br>Capital seleccionada=> ' . $key);
    echo '<br>' . $key . " inicia en " . $firstLR . $firstLC;
    echo '<br>' . $key . " termina en " . $lastLR . $lastLC;
    echo '<br>Longitud de ' . $key . " => " . $currentWordLength;

    //Cargamos datos de capital y coordenadas en el array de verificación
    $capitalsDataArray = array("Nombre" => $key, "Empieza" => $firstLR . $firstLC, "Acaba" => $lastLR . $lastLC);
    //Comprobación colocación array
    // foreach ($capitalsDataArray as $key => $value) {
    //     echo ('<br>' . $key . ": " . $value);
    // }

    //Cargamos estas variables con la posición de la letra incial y 
    //las usaremos como índices para recorrer el array inicial
    $row = $firstLR;
    $column = $firstLC;

    //Recorremos la palabra para ir comprobando cada letra
    do {

        foreach ($currentWord as $key => $value) {
            //Siempre comprobamos la primera letra
            //Cuando se coloque la eliminamos del array
            $letter = $value;
            echo ('<br><br>Letra actual => ' . $letter);
            echo ('<br>Contenido => ' . $boardArray[$row][$column]);

            //Si hay letra, comprobamos si es la misma
             //Siempre inicia en false
            $sameLetter = false;
            if ($boardArray[$row][$column] == $letter) {
                echo ('<br>Misma letra' . $letter);
                $sameLetter = true;
            }

            //Si el contenido de la sopa es =, o la letra es la misma, colocamos letra
            if (($boardArray[$row][$column] == "0") || $sameLetter) {
                echo ('<br>Contiene numérico => ' . $boardArray[$row][$column]);
                //Sobreescribimos
                $boardArray[$row][$column] =  $letter;
                echo ('<br>Nuevo contenido => ' . $boardArray[$row][$column]);

                //Seguimos recorriendo la palabra hasta el final y haciendo las mismas comprobaciones
                if ($rowDirection == "+") {
                    $row = $row + 1;
                } else if ($rowDirection == "-") {
                    $row = $row - 1;
                }

                if ($columnDirection == "+") {
                    $column = $column + 1;
                } else if ($columnDirection == "-") {
                    $column = $column - 1;
                }
                //Si se coloca eliminamos la letra del array 
                array_splice($currentWord, 0, 1);
                echo ('<br>letra colocada');
            } else {
                echo ('<br>Nooooooo se puede colocar');
                $wordSet = false; 
                //Si no la coloca vuelve a empezar al proceso con la misma palabra
            }
        }

    } while ($wordSet);


    //Si sale del array anterior, es que se ha colocado la palabra por lo que se elimina del array
    array_splice($capitalsArray, 0, 1);
} while (count($capitalsArray) > 0);


for ($i = 0; $i <= LENGTHBOARD; $i++) {
    echo "<br><br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {
        if ($boardArray[$i][$j] != 0) {
            echo "<span style='color:red'>" . $boardArray[$i][$j] . "</span>";
        } else {
            echo $boardArray[$i][$j] = $alphabet[rand(0, 5)];
        }
    }
}

?>

<!--Muestra tablero interno-->
<!DOCTYPE HTML>
<html lang='es'>

<head>
    <style>
        .square1 {
            background-color: paleturquoise;
            width: 30px;
            height: 30px;
            *justify-content: center;
            *align-items: center;
            margin-top: 15px;
            padding: 5px;

        }

        .letter {
            color: blue;
        }
    </style>
</head>

<body>

</body>

</html>