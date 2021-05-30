<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <link href="../../css/estilo.css" rel="stylesheet" />
    <link href="../../css/layout.css" rel="stylesheet" />
</head>
<body>
<header>
    <a href="../../index.html"><img src="../../images/principal.jpg"></a>
</header>
<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $isbn = isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
    $paginas = isset($_POST["paginas"]) ? mb_strtoupper(trim($_POST["paginas"]), 'UTF-8') : null;
    $sql =  "INSERT INTO libro VALUES (0, '$nombre', '$isbn', '$paginas')";
    echo($sql);
    if ($conn->query($sql) === TRUE) {
        echo "<h1>OLibro Ingresado</h1>";
        header("Location agregar-capitulo.php");
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
    $conn->close();





    include '../../config/conexionBD.php';
    $sql3= "select lib_id FROM libro where lib_nombre='$nombre';";
    $result = $conn->query($sql3);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            if($row['lib_id']){
                $id = $row['lib_id'];
            }
        }
    }
    $items1 = ($_POST['numero']);
	$items2 = ($_POST['titulo']);
	$items3 = ($_POST['autor']);
    while(true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $numero=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $titulo=(( $item2 !== false) ? $item2 : ", &nbsp;");
        $autor=(( $item3 !== false) ? $item3 : ", &nbsp;");
        $id_u = 0;

        $sql4 = "select aut_id FROM autor where aut_nombre='$autor'";

        $result3 = $conn->query($sql4);
        if ($result3->num_rows > 0) {
            while ($row = $result3->fetch_assoc()){
                if($row['aut_id']){
                    $id_autor = $row['aut_id'];
                }
            }
        }
        echo($id_autor);
        //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
        $valores='("'.$id_u.'","'.$numero.'","'.$titulo.'", "'.$id.'","'.$id_autor.'"),';

        //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
        $valoresQ= substr($valores, 0, -1);
        
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $sql2 = "INSERT INTO capitulo (cap_id, cap_numero, cap_titulo, libro_lib_id, autor_aut_id) 
        VALUES $valoresQ";

        
        $sqlRes = $conn->query($sql2) or mysql_error();

        
        // Up! Next Value
        $item1 = next( $items1 );
        $item2 = next( $items2 );
        $item3 = next( $items3 );
        
        // Check terminator
        if($item1 === false && $item2 === false && $item3 === false) break;

    }
    $conn->close();
?>
</body>
<footer>
        Joseph Nicolás Reinoso Villa - Universidad Politécnica Salesiana <a class="celular" href="tel:+593984709368">(+593) 98 470 9368</a> <a class="mail" href="mailto:jreinosov@est.ups.edu.ec"> jreinosov@est.ups.edu.ec</a> 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>