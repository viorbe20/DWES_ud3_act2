<!--Ejercicio 4.  Notas académicas.
A partir de un array que almacene los datos de la primera y segunda evaluación de los alumnos de 2o DAW, 
mostrar un menú de navegación que muestre la siguiente información. 
• Listados de alumnos con las notas de la primera y segunda evaluación, junto con su nota media. 
Asignatura con mayor número de aprobados. Asignatura con mayor número de suspensos. 
Número de aprobados en cada asignatura. 
Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable.
Virginia Ordoño Bernier
-->
<?php
$students = array(
    1 => array(
        "Nombre" => "Andrea Solís Tejada",
        "DWES" => array(6, 7),
        "DWEC" => array(8, 9),
        "DIW" => array(10, 6),
        "DIAW" => array(7, 8),
        "HLC" => array(9, 10),
        "EIE" => array(6, 7),
    ),
    2 => array(
        "Nombre" => "Carlos Chávez Hernández",
        "DWES" => array(6, 7),
        "DWEC" => array(8, 9),
        "DIW" => array(10, 6),
        "DIAW" => array(7, 8),
        "HLC" => array(9, 10),
        "EIE" => array(6, 7),
    ),
    3 => array(
        "Nombre" => "Daniel Ayala Cantador",
        "DWES" => array(8, 9),
        "DWEC" => array(10, 6),
        "DIW" => array(7, 8),
        "DIAW" => array(9, 10),
        "HLC" => array(6, 7),
        "EIE" => array(8, 9),
    ),
    4 => array(
        "Nombre" => "David Pérez Ruiz",
        "DWES" => array(10, 6),
        "DWEC" => array(7, 8),
        "DIW" => array(9, 10),
        "DIAW" => array(6, 7),
        "HLC" => array(8, 9),
        "EIE" => array(10, 6),
    ),
    5 => array(
        "Nombre" => "Javier Cebrián Muñoz",
        "DWES" => array(7, 8),
        "DWEC" => array(8, 9),
        "DIW" => array(10, 6),
        "DIAW" => array(7, 8),
        "HLC" => array(9, 10),
        "EIE" => array(6, 7),
    ),
    6 => array(
        "Nombre" => "Jesús Díaz Rivas",
        "DWES" => array(6, 7),
        "DWEC" => array(8, 9),
        "DIW" => array(10, 6),
        "DIAW" => array(7, 8),
        "HLC" => array(9, 10),
        "EIE" => array(6, 7),
    ),
    7 => array(
        "Nombre" => "Rubén Ramírez Ribera",
        "DWES" => array(8, 9),
        "DWEC" => array(10, 6),
        "DIW" => array(7, 8),
        "DIAW" => array(9, 10),
        "HLC" => array(6, 7),
        "EIE" => array(8, 9),
    ),
    8 => array(
        "Nombre" => "Virginia Ordoño Bernier",
        "DWES" => array(10, 6),
        "DWEC" => array(7, 8),
        "DIW" => array(9, 10),
        "DIAW" => array(6, 7),
        "HLC" => array(8, 9),
        "EIE" => array(10, 6),
    ),
);
$procesaBoton1 = false;
$procesaBoton2 = false;
$procesaBoton3 = false;
$procesaBoton4 = false;
$procesaBoton5 = false;
$highlight = "";


if (isset($_POST['submit1'])) {
    $procesaBoton1 = true;
    $highlight = "color";
}

if (isset($_POST['refresh'])) {
    $procesaBoton1 = false;
    $procesaBoton2 = false;
    $procesaBoton3 = false;
    $procesaBoton4 = false;
    $procesaBoton5 = false;
}






?>
<!--Menú navegación-->
<form action="" method="post">
    <h1>Ejercicio 4</h1>
    <h2>Pulsa cualquier botón para ver la diferente información. </h2><br>
    <ol>
        <li class="<?php echo $highlight ?>">Listados de alumnos con las notas de la primera y segunda evaluación, junto con su nota media. <button type="submit" name="submit1"> Mostrar</button></li><br>
        <li>Asignatura con mayor número de aprobados. <button type="submit" name="submit2"> Mostrar</button></li><br>
        <li>Asignatura con mayor número de suspensos. <button type="submit" name="submit3"> Mostrar</button></li><br>
        <li>Número de aprobados en cada asignatura. <button type="submit" name="submit4"> Mostrar</button></li><br>
        <li>Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable. <button type="submit" name="submit5"> Mostrar</button></li>
    </ol>
    <button type="submit" name="refresh"> Limpiar</button>
    <br>

    <!--Primer botón-->
    <?php
    if ($procesaBoton1) {
        echo ("<table style=\"border: 1px solid black;\">");
        echo ("<tr><th rowspan=2>Alumnos</th><th colspan=2>DWES</th><th colspan=2>DWEC</th><th colspan=2>DIW</th><th colspan=2>DAW</th><th colspan=2>HLC</th><th colspan=2>EIE</th></tr>");
        echo ("<tr><th>1ª Eval.</th><th>2ª Eval.</th><th>1ª Eval.</th><th>2ª Eval.</th><th>1ª Eval.</th><th>2ª Eval.</th><th>1ª Eval.</th><th>2ª Eval.</th><th>1ª Eval.</th><th>2ª Eval.</th><th>1ª Eval.</th><th>2ª Eval.</th></tr>");
        echo ("<tr>");
        foreach ($students as $array) {

            foreach ($array as $modulos => $value) {

                //Nombres alumnos
                if ($modulos == "Nombre") {
                    echo "<td>$value</td>";
                    
                }else {
                    foreach ($value as $notas) {
                        echo "<td>$notas</td>";
                    }
                }
            }
            echo ("</tr>");
        }

        echo ("</table>");
    }

    ?>


    <style type="text/css">
        table {
            margin: 8px;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 2px 6px;
        }

        th {
            border: 1px solid black;
            text-align: center;
            padding: 2px 6px;
        }

        .color {
            color: purple;
            font-weight: bolder;
        }
    </style>




</form>