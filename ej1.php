<!--Ejercicio 1.  Encuesta.
Modifica el ejercicio 4 de Actividades 1 
para almacenar las opciones de la encuesta en un array.
Virginia Ordoño Bernier
-->
<?php
$procesaFormulario = false;
$msg = "";
$errorMsg = "";
$item = "";
$points = "";
$itemsArray = array();
$value = "";
$cont = "";
$checked = "";

if (isset($_POST["refresh"])) {
    $procesaFormulario = false;
}

if (isset($_POST["submit"])) {
    //Controlamos que ningún ítem quede sin valorar
    $cont = 0;
    for ($i = 1; $i < 7; $i++) {

        if (isset($_POST['Item' . $i])) {
            $cont++;
        }
        if ($cont == 3) {
            $procesaFormulario = true;
            $errorMsg = "";
        } else {
            $errorMsg = "Debes valorar todos los ítems";
        }
    }
}

if ($procesaFormulario) {

    $points = 0;

    for ($i = 1; $i < 7; $i++) {

        //Recorremos todas las puntuaciones y  comprobamos
        $item = $_POST['Item' . $i];

        //Si la puntuación es mayor la actualizamos e inciamos array con el ítem correspondiente
        if ($item > $points) {
            $points = $item;
            $itemsArray = array();
            array_push($itemsArray, 'Item' . $i);
            //Si la puntuación es igual,  añadimos el ítem correspondiente al array de máximos
        } else if ($item == $points) {
            array_push($itemsArray, 'Item' . $i);
        }
    }

    $msg = "Mayor puntuación: " . $points  . "<br>";
}
?>

<form action="" method="post">
    <h1>Ejercicio 4</h1>
    <h2>Valora cada ítem de 1 a 5 y comprueba cuál es el más valorado. </h2>
    <?php
    for ($i = 1; $i < 7; $i++) {

        echo "<label>Ítem $i: </label>";

        for ($j = 1; $j < 6; $j++) {
            //Si procesa formulario, mantenemos la puntuación establecida por el usuario
            if ($procesaFormulario) {
                if ($_POST['Item' . $i] == $j) {
                    $checked = "checked";
                } else {
                    $checked = "";
                }
            }
            echo "<input type='radio' name='Item" . $i . "' value='$j' $checked>$j";
        }
        echo ('<br>');
    }
    ?>
    <br>
    <button type="reset" name="">Limpiar</button>
    <button type="submit" name="submit">Comprobar</button>
    <br><br>
    <span><?php echo $errorMsg ?></span><br>
    <span><?php echo $msg ?></span><br>
    <?php
 
    //Recorremos el array con los ítems que tienen máxima puntuación
    foreach ($itemsArray as $key => $value) {
        echo $value . ", ";
    }

    if ($procesaFormulario) {
        echo "<br><br><button type='submit' name='refresh'>Volver a votar</button>";
    }
    ?>
</form>