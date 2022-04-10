<!--Ejercicio 2.  Países y capitales.
Diseña y almacena en un array una lista de países junto con sus capitales. 
Muestra un formulario que permita al usuario introducir las capitales de los países presentados. 
En respuesta al formulario, la aplicación mostrará el número de aciertos y fallos. 
Incluye una opción que permita visualizar las opciones correctas. 
Virginia Ordoño Bernier
-->

<?php
$procesaFormulario = false;
$procesaCapitales = false;
$selectedOption = "";
$selected = "";
$countries = array(
    "España" => "Madrid",
    "Portugal" => "Lisboa",
    "Francia" => "París",
    "Italia" => "Roma",
    "Alemania" => "Berlín",
    "Bélgica" => "Bruselas",
    "China" => "Pekín",
    "Dinamarca" => "Copenhague",
    "Grecia" => "Atenas",
    "Irlanda" => "Dublín",

);
$selectedCountries = "";
//Array que recoge las capitales introducidas por el usuario
$userAnswers = array();
$n = 0;
$spanMssg = "";
$type = "hidden";
$showCoincidences = false; //Muestra los aciertos
$class = "";
$aciertos = "";
$fallos = "";

//Pulsa botón mostrar
if (isset($_POST['submit'])) {
    $procesaFormulario = true;
}

if ($procesaFormulario) {
    $selectedOption = $_POST['selectedOption'];

    //Creamos un nuevo array con los países seleccionados
    $selectedCountries = array_slice($countries, 0, $selectedOption);

    //inicializamos un array vacío
    for ($i = 0; $i < $selectedOption; $i++) {
        $userAnswers[] = "";
    }
}

//Pulsa botón comprobar
if (isset($_POST['check'])) {
    $procesaFormulario = true;
    $procesaCapitales = true;
}

if ($procesaCapitales) {
    //Cargamos array con las respuestas del usuario
    $userAnswers = $_POST['capital'];
    $selectedOption = $_POST["hiddenNumber"];
    $selectedCountries = array_slice($countries, 0, $selectedOption);
}

//Pulsa botón mostrar solución
if (isset($_POST['hint'])) {
    $procesaFormulario = true;
    $procesaCapitales = true;
    $showCoincidences = true;
    $userAnswers = $_POST['capital'];
    $selectedOption = $_POST["hiddenNumber"];
    $selectedCountries = array_slice($countries, 0, $selectedOption);
}

//Pulsa botón para refrescar
if (isset($_POST['refresh'])) {
    $procesaFormulario = false;
}
?>

<form action="" method="post">
    <h1>Ejercicio 2</h1>
    <h2>Completa con la capital correspondiente según el país.</h2>

    <label>Selecciona el número de países:</label>
    <select name="selectedOption">
        <?php
        for ($i = 1; $i < 11; $i++) {

            if ($selectedOption == $i) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option $selected>$i</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Mostrar" name="submit">
</form>

<!--Muestra los países-->
<?php
if ($procesaFormulario) {
?>
    <form action="" method="post">
        <?php

        //Imprimimos tantos inputs como se haya indicado en la lista
        $n = 0;
        $aciertos = 0;
        $fallos = 0;
        foreach ($selectedCountries as $pais => $capital) {
            echo "<input type='text' name='pais' value= " . $pais . " readonly>";
            echo " <input type='text' name='capital[]' value= " . $userAnswers[$n] . ">";
            //Comprueba si las respuestas son correctas para darle color
            if ($capital == $userAnswers[$n]) {
                $class = "right";
                $aciertos = $aciertos + 1; 
            } else {
                $class = "wrong";
                $fallos = $fallos + 1; 
            };
            $n++;

            //Se activa con el botón comprobar
            if ($showCoincidences == true) {
                $type = 'text';
            } else {
                $type = 'hidden';
            }

            echo " <input class=$class type=$type name='solution' value= $capital readonly>";
        ?>
            <br><br>
            <style>
                .right {
                    color: green;
                }

                .wrong {
                    color: red;
                }

            </style>
        <?php
        }

        ?>
        <!--Guardamos número de países a mostrar para la comprobación en el siguiente submit--->
        <input type="hidden" value=<?php echo $selectedOption ?> name="hiddenNumber">
        <button type="submit" name="hint">Solución</button>
        <button type="submit" name="check">Aciertos y fallos</button>
        <br><br>
        <?php
        if (isset($_POST['check']) || isset($_POST['hint'])) {
            echo "<span>Aciertos: $aciertos </span><br>";
            echo "<span>Fallos: $fallos </span>";
        }
        ?>

        <br><br>
        <button type="submit" name="refresh">Comenzar</button>
    <?php
}
    ?>
    </form>