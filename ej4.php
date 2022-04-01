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
    1 => array("Andrea Solís Tejada", 6, 7),
    2 => array("Carlos Chávez Hernández", 8, 9),
    3 => array("Daniel Ayala Cantador", 10, 6),
    4 => array("Javier Cebrián Muñoz", 7, 8),
    5 => array("Javier Cebrián Muñoz", 9, 10),
    6 => array("Jesús Díaz Rivas", 6, 7),
    7 => array("Rubén Ramírez Ribera", 8, 9),
    8 => array("Virginia Ordoño Bernier", 10, 6),
);

$students2 = array(
    1 => array(
        "Nombre" => "Andrea Solís Tejada",
        "eva1" => 6,
        "eva2" => 7
    ),
    2 => array(
        "Nombre" => "Carlos Chávez Hernández",
        "eva1" => 8,
        "eva2" => 9
    ),
    3 => array(
        "Nombre" => "Daniel Ayala Cantador",
        "eva1" => 10,
        "eva2" => 6
    ),
    4 => array(
        "Nombre" => "David Pérez Ruiz",
        "eva1" => 7,
        "eva2" => 8
    ),
    5 => array(
        "Nombre" => "Javier Cebrián Muñoz",
        "eva1" => 9,
        "eva2" => 10
    ),
    6 => array(
        "Nombre" => "Jesús Díaz Rivas",
        "eva1" => 6,
        "eva2" => 7
    ),
    7 => array(
        "Nombre" => "Rubén Ramírez Ribera",
        "eva1" => 8,
        "eva2" => 9
    ),
    8 => array(
        "Nombre" => "Virginia Ordoño Bernier",
        "eva1" => 10,
        "eva2" => 6
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
        echo ("<tr><th colspan=1>Alumnos</th><th colspan=1>1ª Eval.</th><th colspan=1>2ª Eval.</th><tr>");
        foreach ($students as $data) {
            echo ("<tr>");
            echo ("<td>$data[0]</td>");
 
            echo ("<td>$data[1]</td>");
            echo ("<td>$data[2]</td>");
            echo ("</tr>");
        }
        echo ("</table>");
    }

    ?>


<style type="text/css">
    table{
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
        .color{
            color: purple;
            font-weight: bolder;
        }
        
    </style>




</form>