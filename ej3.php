<!--Ejercicio 3.  Comunidades Autónomas.
A partir de un array que almacena comunidades autónomas y provincias, 
escribe un programa que muestre aleatoriamente una comunidad autónoma y 
presente un formulario con un checkbox que permita seleccionar las provincias 
que pertenecen a la comunidad. 
En respuesta al formulario, la aplicación mostrará número de aciertos y fallos. 
Incluye una opción que permita visualizar las opciones correctas.
Virginia Ordoño Bernier
-->

<?php
$comunidadesArray = array(
    'Andalucía' => array("Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaén", "Málaga", "Sevilla"),
    'Aragón' => array("Zaragoza", "Huesca", "Teruel"),
    'Asturias' => array("Asturias"),
    'Baleares' => array("Baleares"),
    'Canarias' => array("Las Palmas", "Santa Cruz de Tenerife"),
    'Cantabria' => array("Cantabria"),
    'Castilla_y_León' => array("Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"),
    'Castilla_La_Mancha' => array("Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo"),
    'Cataluña' => array("Barcelona", "Gerona", "Lleida", "Tarragona"),
    'Extremadura' => array("Badajoz", "Cáceres"),
    'Galicia' => array("A Coruna", "Lugo", "Ourense", "Pontevedra"),
    'Madrid' => array("Madrid"),
    'Murcia' => array("Murcia"),
    "Navarra" => array("Navarra"),
    "País_Vasco" => array("Álava", "Bizkaia", "Gipuzkoa"),
    "La_Rioja" => array("La Rioja"),
    "Ceuta" => array("Ceuta"),
    "Melilla" => array("Melilla")
);
$procesaFormulario = false;
$showSolution = false;
$aciertos = "";
$fallos = "";
$errorMsg = '';
$randomCA = array_rand($comunidadesArray);
$selectedProvinces = array();


if (isset($_POST['submit'])) {
    $procesaFormulario = true;
}

if ($procesaFormulario) {

    //Si no se selecciona provincia mostramos mensaje
    if (!isset($_POST['provinces'])) {
        $procesaFormulario = false;
        $errorMsg = "Selecciona al menos una provincia.";
    } else {
        //Guardamos las provincias seleccionadas
        $selectedProvinces = $_POST['provinces'];
        $randomCA = $_POST['selectedComunidad'];

        //Calculamos fallos y aciertos
        $aciertos = 0;
        $fallos = 0;

        foreach ($selectedProvinces as $province) {
            if (in_array($province, $comunidadesArray[$randomCA]) == 1) {
                $aciertos = $aciertos + 1;
            } else {
                $fallos = $fallos + 1;
            }
        }
    }
}

if (isset($_POST['submit2'])) {
    $procesaFormulario = true;
    $showSolution = true;
    $randomCA = $_POST['selectedComunidad'];
    //echo $comunidadesArray[$randomCA];
}


?>
<!--Primer formulario-->
<form action="" method="post">
    <h1>Ejercicio 3</h1>
    <h2>Selecciona las provincias que pertenecen a la comunidad mostrada.</h2>

    <h3><?php echo $randomCA ?> </h3>
    <input type="hidden" name="selectedComunidad" value=<?php echo $randomCA ?>>

    <?php
    foreach ($comunidadesArray as $comunidades => $value) {

        foreach ($value as $provincia) {
            //array_push($provinciasArray, $provincias);
            echo $provincia;
            //Si se ha seleccionado, lo marcamos para que se mantenga tras el submit
            $selected = (in_array($provincia, $selectedProvinces)) ? 'checked' : '';
            echo "<input type ='checkbox' name='provinces[]' value = \"" . $provincia . "\" $selected>";
        }
    }
    ?>
    <br><br>
    <input type="submit" value="Comprobar" name="submit">
    <br><br>
    <span class='error'><?php echo $errorMsg ?></span>
    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</form>

<!--Tras submit, muestra aciertos y fallos-->
<?php
if ($procesaFormulario) {
?>
    <form action="" method="post">
        <?php
        echo "Aciertos: $aciertos" . '<br>';
        echo "Fallos: $fallos";
        ?>
        <br><br>
        <input type="submit" value="Mostrar solución" name="submit2">
        <!--Conservamos la comundiad autónoma ya que se mostrará en el siguiente submit-->
        <input type="hidden" name="selectedComunidad" value=<?php echo $randomCA ?>>
    </form>
<?php
}

//Muestra solución
if ($showSolution) {
?>

    <h3><?php echo $randomCA ?></h3>
<?php
    foreach ($comunidadesArray[$randomCA] as $key => $value) {
        echo $value . '<br>';
    }
}
?>
<style>
    h3{
        color: blue;
    }
</style>