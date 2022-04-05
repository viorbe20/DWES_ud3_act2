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

$sameLetter = false;

//Array de palabras
$wordsArray = array("MADRID", "LONDRES");
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
$row = "";
$column = "";

//Indica cuando se ha colocado una palabra y poder pasar a la siguiente
$wordSet = false;

//Array con 
for ($i = 0; $i <= LENGTHBOARD; $i++) {
    echo "<br><br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {
        $text = $i . $j . " ";
        echo "<span class='square1'>" . $boardArray[$i][$j] = $text . "</span>";
    }
}

$validNumber = "true";
do {

    //Seleccionamos una capital y colocamos en la sopa. 
    //Repetimos el mismo proceso con todas hasta que están todas colocadas.
    foreach ($wordsArray as $key) {

        //Creamos fila y columna inicial para la primera letra de palabra actual
        $firstLR = rand(0, 9);
        $firstLC = rand(0, 9);

        //Cargamos en una variable la longitud de la palabra
        //Extrae la palabra del array y la separa en letras dentro de un array
        $currentWord = str_split($key);
        $wordLength = count($currentWord);

        //Según la dirección de la línea, calculamos la posición de la línea de la última letra.
        //Controlamos que no se salga del tablero generando números hasta que cuadre
        do {
            $rowDirection = $direction[rand(0, 2)];
            //echo "<br>Dirección  de la fila => " . $rowDirection;
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
            //echo "<br>Direction  de la columna => " . $columnDirection;

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

        echo ('<br><br>Capital seleccionada=> ' . $key);
        echo '<br>' . $key . " inicia en " . $firstLR . $firstLC;
        echo '<br>' . $key . " termina en " . $lastLR . $lastLC;
        echo '<br>Longitud de ' . $key . " => " . $wordLength;

        //Cargamos datos de capital y coordenadas en el array de verificación
        $capitalsArray = array("Nombre" => $key, "Empieza" => $firstLR . $firstLC, "Acaba" => $lastLR . $lastLC);
        //Comprobación colocación array
        // foreach ($capitalsArray as $key => $value) {
        //     echo ('<br>' . $key . ": " . $value);
        // }

        //Recorremos array inicial y leemos lo que hay en cada casilla
        //Lo hacemos hasta que consigamos confirmar el sitio la palabra
        do {
            $row = $firstLR;
            $column = $firstLC;

            for ($index = 0; $index < $wordLength; $index++) {
                //echo ('<br><br>Contenido de posición ' . $firstLR . $firstLC . " => " . $boardArray[$firstLR][$firstLC]);

                //Recorremos la palabra para ir comprobando cada letra
                foreach ($currentWord as $value => $letter) {
                    //echo ('<br>Letra actual => ' . $letter);

                    //Si hay letra, comprobamos si es la misma
                    if ($boardArray[$row][$column] == $letter) {
                        echo ('<br>Misma letra' . $letter);
                        $sameLetter = true;
                    }

                    echo ('<br><br>Contenido => ' . $boardArray[$row][$column]);
                    //Si el contenido de la sopa es numérico, o la letra es la misma, colocamos letra
                    if (!is_int($boardArray[$row][$column])) {
                        echo ('<br>Contiene numérico => ' . $boardArray[$row][$column]);
                        //Sobreescribimos
                        $boardArray[$row][$column] =  $letter . "-";
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
                    } else {
                        echo ('<br>Nooooooo contiene numérico => ' . $boardArray[$row][$column]);
                    }



                    // if ($sameLetter) {
                    //     echo ('<br>Misma letra => ' . $boardArray[$row][$column] . " y " . $letter);
                    //     $sameLetter = false;
                    // }
                    // if (is_numeric($boardArray[$row][$column] || $sameLetter)) {
                    //     //Volvemos a cambiar la bandera para la próxima vuelta
                    //     $sameLetter = false;
                    //     
                    //     echo ('<br><br>Contenido de posición cambiado ' . $row . $column . " => " . $boardArray[$row][$column]);


                    // } else {
                    //     $wordSet = false;
                    // }
                }

                //En la última lectura del for hacemos que se salga
                if ($index = ($wordLength - 1)) {
                    $wordSet = true;
                }
            }
        } while (!$wordSet);



        //Cambiamos para que empiece con false en la siguiente capital
        $wordSet = false;

        //Aquí ya hemos comprobado que la palabra tiene un espacio
        //echo ('<br>' . $key . " colocada.");
    } //foreach capitales

    $validNumber = false;
} while ($validNumber);

//Imprimimos array relleno
echo ('<br><br>');
for ($i = 0; $i <= LENGTHBOARD; $i++) {
    echo "<br>";
    for ($j = 0; $j <= LENGTHBOARD; $j++) {

        echo "<strong>" . $boardArray[$i][$j] . "</strong>";
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