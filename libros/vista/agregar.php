<!DOCTYPE html>
<html>
<head>
    <link href="../../css/estilo.css" rel="stylesheet" />
    <link href="../../css/layout.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <script>
        $(function(){
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
            });
            
        });
	</script>
</head>
<body>
    <?php
        include '../../config/conexionBD.php';
        $sql = "SELECT aut_nombre FROM autor;";
        $result = $conn->query($sql);
    ?>
    <header>
    <a href="../../index.html"><img src="../../images/principal.jpg"></a>
    </header>
    <br>
    <form id="formulario01" method="POST" action="../controlador/agregar.php">
    <h1>Agregar Libro</h1>
     </select>
        <br><label for="nombre">Nombre (*)</label>
        <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el nombre del libro"/>
        <br><label for="isbn">ISBN (*)</label>
        <input type="text" id="isbn" name="isbn" value="" placeholder="Ingrese el ISBN del libro"/>
        <br><label for="paginas">Número de Páginas (*)</label>
        <input type="text" id="paginas" name="paginas" value="" placeholder="Ingrese el números de páginas"/>
        <h2>Datos del Capítulo</h2>
        <from method="POST">
        <h3 class="bg-primary text-center pad-basic no-btm">Nuevo Capítulo</h3>
        <table class="table bg-info"  id="tabla">
		<tr class="fila-fija">
			<td><input required name="numero[]" placeholder="Número"/></td>
			<br><td><input required name="titulo[]" placeholder="Título"/></td>
			<br><td><select id="autor" name="autor[]">
            <?php
                while ($row = $result->fetch_assoc()){
                    $nombre = $row['aut_nombre'];
                    echo("<option>$nombre</option>");
                }                
            ?>
            </select></td>
		</tr>
		</table>
            <?php
                while ($row = $result->fetch_assoc()){
                    $nombre = $row['aut_nombre'];
                    echo("<option>$nombre</option>");
                }                
            ?>
        </select>
        <div class="btn-der">
        <br><button id="adicional" name="adicional" type="button" class="btn btn-warning"> Agregar Nuevo Capítulo </button>
        </div>
        </from>
        <input type="submit" id="agregar" name="agregar" value="Agregar Libro" /> 
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
</body>
<footer>
        Joseph Nicolás Reinoso Villa - Universidad Politécnica Salesiana <a class="celular" href="tel:+593984709368">(+593) 98 470 9368</a> <a class="mail" href="mailto:jreinosov@est.ups.edu.ec"> jreinosov@est.ups.edu.ec</a> 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>