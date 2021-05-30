<?php
    //incluir conexión a la base de datos
    include "../../config/conexionBD.php";
    $autor = $_GET['autor'];
    echo("<h1>Resultado de la Búsqueda</h1>");
    $sql="SELECT aut_id FROM autor WHERE aut_nombre = '$autor';";
    $result = $conn->query($sql);
    while ($row1 = $result->fetch_assoc()){
        if($row1['aut_id']){
            $id_autor = $row1['aut_id'];
        }
    }   
    $sql2 = "SELECT * FROM libro l, capitulo c, autor a 
    WHERE c.autor_aut_id = aut_id and l.lib_id = c.libro_lib_id and a.aut_id='$id_autor';";

    $result2 = $conn->query($sql2);
        
    echo " <table style='width:100%' border='1' align='center'>
    <tr>
    <th>Nombre del Libro</th>
    <th>ISBN</th>
    <th>Número de Páginas</th>
    <th>Número Capítulo</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Nacionalidad</th>
    </tr>";
    //-----------------
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row['lib_nombre'] . "</td>";
            echo " <td>" . $row['lib_isbn'] ."</td>";
            echo " <td>" . $row['lib_paginas'] . "</td>";
            echo " <td>" . $row['cap_numero'] . "</td>";
            echo " <td>" . $row['cap_titulo'] ."</td>";
            echo " <td>" . $row['aut_nombre'] . "</td>";
            echo " <td>" . $row['aut_nacionalidad'] . "</td>";
            echo "</tr>";   
        }
    } else {
        echo "<tr>";
        echo " <td colspan='8'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
    }
    echo "</table>";
        $conn->close();
?>