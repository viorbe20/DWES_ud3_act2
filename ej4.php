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
//array que contiene los alumnos y sus notas
$modules = array(
    "DWES" => array(
        "Andrea Solís Tejada" => array(5, 7),
        "Carlos Chávez Hernández"  => array(4, 4),
        "Daniel Ayala Cantador" => array(3, 7)
    ),
    "DWEC" => array(
        "Andrea Solís Tejada" => array(2, 6),
        "Carlos Chávez Hernández"  => array(5.8, 6),
        "Daniel Ayala Cantador" => array(2, 2)
    ),
    "DIW" => array(
        "Andrea Solís Tejada" => array(5, 5),
        "Carlos Chávez Hernández"  => array(9, 3),
        "Daniel Ayala Cantador" => array(2, 2)
    ),
    "DAW" => array(
        "Andrea Solís Tejada" => array(4, 7.5),
        "Carlos Chávez Hernández"  => array(8, 10),
        "Daniel Ayala Cantador" => array(6, 4)
    ),
    "EIE" => array(
        "Andrea Solís Tejada" => array(3, 10),
        "Carlos Chávez Hernández"  => array(5.8, 6),
        "Daniel Ayala Cantador" => array(6, 5)
    ),
    "HLC" => array(
        "Andrea Solís Tejada" => array(3, 5),
        "Carlos Chávez Hernández"  => array(5, 5),
        "Daniel Ayala Cantador" => array(5, 6)
    ),
);

$students = array(
    1 => array(
        "Nombre" => "Andrea Solís Tejada",
        "DWES" => array(4, 7),
        "DWEC" => array(5, 9),
        "DIW" => array(10, 6),
        "DIAW" => array(7, 2.5),
        "HLC" => array(9, 10),
        "EIE" => array(6, 7),
    ),
    2 => array(
        "Nombre" => "Carlos Chávez Hernández",
        "DWES" => array(6, 3),
        "DWEC" => array(3, 6),
        "DIW" => array(10, 6.5),
        "DIAW" => array(7, 8),
        "HLC" => array(9, 4),
        "EIE" => array(6, 7),
    ),
    3 => array(
        "Nombre" => "Daniel Ayala Cantador",
        "DWES" => array(8, 3),
        "DWEC" => array(10, 3),
        "DIW" => array(7, 8),
        "DAW" => array(9.5, 10),
        "HLC" => array(4, 7),
        "EIE" => array(8, 9),
    ),
    4 => array(
        "Nombre" => "David Pérez Ruiz",
        "DWES" => array(10, 6),
        "DWEC" => array(2, 8),
        "DIW" => array(9, 10),
        "DAW" => array(6, 7),
        "HLC" => array(8, 9),
        "EIE" => array(10, 6),
    ),
    5 => array(
        "Nombre" => "Javier Cebrián Muñoz",
        "DWES" => array(7.5, 8),
        "DWEC" => array(4, 9),
        "DIW" => array(10, 6),
        "DAW" => array(4, 8),
        "HLC" => array(9, 10),
        "EIE" => array(6, 2),
    ),
    6 => array(
        "Nombre" => "Jesús Díaz Rivas",
        "DWES" => array(3.5, 7),
        "DWEC" => array(8, 9),
        "DIW" => array(10, 4),
        "DAW" => array(4, 8),
        "HLC" => array(9.5, 10),
        "EIE" => array(6, 7),
    ),
    7 => array(
        "Nombre" => "Rubén Ramírez Ribera",
        "DWES" => array(8.5, 9),
        "DWEC" => array(10, 6),
        "DIW" => array(4, 8),
        "DAW" => array(9, 10),
        "HLC" => array(6, 3),
        "EIE" => array(8, 9),
    ),
    8 => array(
        "Nombre" => "Virginia Ordoño Bernier",
        "DWES" => array(10, 4),
        "DWEC" => array(7, 8),
        "DIW" => array(9, 10),
        "DAW" => array(3.5, 7),
        "HLC" => array(8, 9),
        "EIE" => array(6, 6),
    ),
);

$procesaBoton1 = false;
$procesaBoton2 = false;
$procesaBoton3 = false;
$procesaBoton4 = false;
$procesaBoton5 = false;
$boletinNotas = false;
$media = "";
$dwesNotas = array();
$dwecNotas = array();
$diwNotas = array();
$dawNotas = array();
$hlcNotas = array();
$eieNotas = array();
//Carga nombres de los módulos con más aprobados
$highestMarksArray = array();
//Carga el número de aprobados máximo
$highestMark = 0;
//Carga la selección de la lista desplegable
$selectedOption = "";
//Guarda la evaluación que queremos mostrar
$index = "";


/**
 * Dados un array con notas y el nombre del módulo, devuelve un array con los aprobados
 */
function cargaAprobados($marksArray, $moduleName)
{
    $aprobadosArray = array();

    foreach ($marksArray[$moduleName] as $value) {
        for ($i = 0; $i < count($value); $i++) {
            if ($value[$i] >= 5) {
                $aprobadosArray[] = $value[$i];
            }
        }
    }
    return $aprobadosArray;
}

/**
 * Dados un array con notas y el nombre del módulo, 
 * devuelve un array con los suspensos
 */
function cargaSuspensos($marksArray, $moduleName)
{
    $suspensosArray = array();

    foreach ($marksArray[$moduleName] as $value) {
        for ($i = 0; $i < count($value); $i++) {
            if ($value[$i] < 5) {
                $suspensosArray[] = $value[$i];
            }
        }
    }
    return $suspensosArray;
}

//Muestra listado alumnos con notas
if (isset($_POST['submit1'])) {
    $procesaBoton1 = true;
}

//Muestra la asignatura con más aprobados
if (isset($_POST['submit2'])) {
    $procesaBoton2 = true;

    //Cargamos arrays con aprobados y contamos
    $dwesNotas = count(cargaAprobados($modules, "DWES"));
    $dwecNotas = count(cargaAprobados($modules, "DWEC"));
    $diwNotas = count(cargaAprobados($modules, "DIW"));
    $dawNotas = count(cargaAprobados($modules, "DAW"));
    $hlcNotas = count(cargaAprobados($modules, "HLC"));
    $eieNotas = count(cargaAprobados($modules, "EIE"));

    //Comparamos números de aprobados
    //Carga nombres de los módulos con más aprobados
    if ($dwesNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $dwesNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DWES";
    } else if ($dwesNotas == $highestMark) {
        $highestMarksArray[] = "DWES";
    }

    if ($dwecNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $dwecNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DWEC";
    } else if ($dwecNotas == $highestMark) {
        $highestMarksArray[] = "DWEC";
    }

    if ($diwNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $diwNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DIW";
    } else if ($diwNotas == $highestMark) {
        $highestMarksArray[] = "DIW";
    }

    if ($dawNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $dawNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DAW";
    } else if ($dawNotas == $highestMark) {
        $highestMarksArray[] = "DAW";
    }

    if ($hlcNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $hlcNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "HLC";
    } else if ($hlcNotas == $highestMark) {
        $highestMarksArray[] = "HLC";
    }
    if ($eieNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $eieNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "EIE";
    } else if ($eieNotas == $highestMark) {
        $highestMarksArray[] = "EIE";
    }
}

//Muestra la asignatura con más aprobados
if (isset($_POST['submit3'])) {
    $procesaBoton3 = true;

    //Cargamos arrays con aprobados y contamos
    $dwesNotas = count(cargaSuspensos($modules, "DWES"));
    $dwecNotas = count(cargaSuspensos($modules, "DWEC"));
    $diwNotas = count(cargaSuspensos($modules, "DIW"));
    $dawNotas = count(cargaSuspensos($modules, "DAW"));
    $hlcNotas = count(cargaSuspensos($modules, "HLC"));
    $eieNotas = count(cargaSuspensos($modules, "EIE"));

    //Comparamos números de aprobados
    //Carga nombres de los módulos con más aprobados
    if ($dwesNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $dwesNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DWES";
    } else if ($dwesNotas == $highestMark) {
        $highestMarksArray[] = "DWES";
    }

    if ($dwecNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $dwecNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DWEC";
    } else if ($dwecNotas == $highestMark) {
        $highestMarksArray[] = "DWEC";
    }

    if ($diwNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $diwNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DIW";
    } else if ($diwNotas == $highestMark) {
        $highestMarksArray[] = "DIW";
    }

    if ($dawNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $dawNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "DAW";
    } else if ($dawNotas == $highestMark) {
        $highestMarksArray[] = "DAW";
    }

    if ($hlcNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $hlcNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "HLC";
    } else if ($hlcNotas == $highestMark) {
        $highestMarksArray[] = "HLC";
    }
    if ($eieNotas > $highestMark) {
        //Actualizamos número y array y añadimos el nombre del módulo
        $highestMark = $eieNotas;
        $highestMarksArray = array();
        $highestMarksArray[] = "EIE";
    } else if ($eieNotas == $highestMark) {
        $highestMarksArray[] = "EIE";
    }
}

//Muestra número de aprobados de cada asignatura
if (isset($_POST['submit4'])) {
    $procesaBoton4 = true;

    //Cargamos arrays con aprobados y contamos
    $dwesNotas = count(cargaAprobados($modules, "DWES"));
    $dwecNotas = count(cargaAprobados($modules, "DWEC"));
    $diwNotas = count(cargaAprobados($modules, "DIW"));
    $dawNotas = count(cargaAprobados($modules, "DAW"));
    $hlcNotas = count(cargaAprobados($modules, "HLC"));
    $eieNotas = count(cargaAprobados($modules, "EIE"));
}

//Muestra boletín de notas según evaluación seleccionada
if (isset($_POST['submit5'])) {
    $procesaBoton5 = true;
}

//Genera boletín de notas
if (isset($_POST['generate'])) {
    $procesaBoton5 = true;
    $boletinNotas = true;
    $selectedOption = $_POST['selectedOption'];
}

//Recarga la página
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
        <li>Listados de alumnos con las notas de la primera y segunda evaluación, junto con su nota media. <button type="submit" name="submit1"> Mostrar</button></li><br>
        <li>Asignatura con mayor número de aprobados. <button type="submit" name="submit2"> Mostrar</button></li><br>
        <li>Asignatura con mayor número de suspensos. <button type="submit" name="submit3"> Mostrar</button></li><br>
        <li>Número de aprobados en cada asignatura. <button type="submit" name="submit4"> Mostrar</button></li><br>
        <li>Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable. <button type="submit" name="submit5"> Mostrar</button></li>
    </ol>
    <button type="submit" name="refresh"> Limpiar</button>
    <br><br>
</form>

<!--Primer botón-->
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
<form>
    <?php
    if ($procesaBoton1) {
    ?>

        <table style="border: 1px solid black">
            <tr>
                <th rowspan=2>Alumnos</th>
                <th colspan=3>DWES</th>
                <th colspan=3>DWEC</th>
                <th colspan=3>DIW</th>
                <th colspan=3>DAW</th>
                <th colspan=3>HLC</th>
                <th colspan=3>EIE</th>
            </tr>
            <tr>
            <?php
            for ($i = 1; $i < 7; $i++) {
                echo "<th>1ª Eval.</th><th>2ª Eval.</th><th style='background-color:grey'>Media</th>";
            };
            echo ("</tr>");
            echo ("<tr>");
            foreach ($students as $array) {

                foreach ($array as $modulos => $value) {
                    $media = 0;
                    //Nombres alumnos
                    if ($modulos == "Nombre") {
                        echo "<td>$value</td>";
                    } else {
                        foreach ($value as $notas) {
                            echo "<td>$notas</td>";
                            $media = ($media + $notas);
                        }
                        $media = $media / 2;
                        echo "<td style='background-color:grey'>$media</td>";
                    }
                }
                echo ("</tr>");
            }

            echo ("</table>");
        } ?>
</form>

<!--Segundo botón-->
<form action="" method="post">
    <?php
    if ($procesaBoton2) {

        echo "El número mayor de aprobados es " . $highestMark;
        echo "<br><br>";
        echo "Módulo/s: ";
        foreach ($highestMarksArray as $key) {
            echo $key . ", ";
        }
    } ?>
</form>

<!--Tercer botón-->
<form action="" method="post">
    <?php
    if ($procesaBoton3) {

        echo "El número mayor de suspensos es " . $highestMark;
        echo "<br><br>";
        echo "Módulo/s: ";
        foreach ($highestMarksArray as $key) {
            echo $key . ", ";
        }
    } ?>
</form>

<!--Cuarto botón-->
<form action="" method="post">
    <?php
    if ($procesaBoton4) {

        echo "Números de aprobados de cada asignatura:";
        echo "<br><br>";
        echo "DWES: " . $dwesNotas . "<br>";
        echo "DWEC: " . $dwecNotas . "<br>";
        echo "DIW: " . $diwNotas . "<br>";
        echo "DAW: " . $dawNotas . "<br>";
        echo "HLC: " . $hlcNotas . "<br>";
        echo "EIE: " . $eieNotas . "<br>";
    } ?>
</form>

<!--Quinto botón-->
<form action="" method="post">
    <?php
    if ($procesaBoton5) {

        //Mantenemos la selección de la lista después del submit
        $option1 = "";
        $option2 = "";

        if ($boletinNotas) {
            if ($selectedOption == "1ª Evaluación") {
                $option1 = "selected";
            } else if ($selectedOption == "2ª Evaluación") {
                $option2 = "selected";
            }
        }        
    ?>
        <label>Elija una opción para generar un boletín de notas.</label>
        <select name="selectedOption">
            <option <?php echo $option1 ?>> 1ª Evaluación</option>";
            <option <?php echo $option2 ?>> 2ª Evaluación </option>";
        </select>
        <br><br>
        <button type="submit" name="generate">Generar Boletín</button>
        <br><br>
    <?php
    } ?>
</form>

<?php
if ($boletinNotas) {
?>
    <form action="" method="post">
        <table style="border: 1px solid black">
        <tr><th colspan=7 style=background-color:lightblue>Notas <?php echo $selectedOption?></th></tr>
            <tr>
                <th rowspan=2>Alumnos</th>
                <th colspan=1>DWES</th>
                <th colspan=1>DWEC</th>
                <th colspan=1>DIW</th>
                <th colspan=1>DAW</th>
                <th colspan=1>HLC</th>
                <th colspan=1>EIE</th>
            </tr>
            <tr>
                <?php
                echo ("</tr>");
                echo ("<tr>");
                //Seleccionamos las notas a mostrar según la evaluación
                if ($selectedOption == "1ª Evaluación") {
                    $index = 0;
                } else if ($selectedOption == "2ª Evaluación") {
                    $index = 1;
                }
                foreach ($students as $array) {

                    foreach ($array as $modulos => $value) {
                        $media = 0;
                        //Nombres alumnos
                        if ($modulos == "Nombre") {
                            echo "<td>$value</td>";
                        } else {
                            echo "<td>$value[$index]</td>";
                        }
                    }
                    echo ("</tr>");
                }
        
                echo ("</table>");
?>
</form>   
<?php

}
?>