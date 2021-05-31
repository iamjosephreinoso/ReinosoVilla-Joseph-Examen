<!DOCTYPE html>
<html>
<head>
    <link href="../../css/estilo.css" rel="stylesheet" />
    <link href="../../css/layout.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script type="text/javascript" src="../../config/validar.js"></script>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <script>
        src="https://code.jquery.com/jquery-3.3.1.min.js"
	    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	    crossorigin="anonymous"
        $(function(){
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function(){
					$("#tabla tr:eq(0)").clone().appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
            
        });
	</script>
    <script type="text/javascript">
        $(document).ready(function(){
            recargarLista();
            $('#autor').on('click', function(){
                recargarLista();
            });
        })
    </script>
    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"../controlador/datos_autor.php",
                data:"continente=" + $('#autor').val(),
                success:function(r){
                    $('#nacionalidad').html(r);
                }
            });
        }
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
    <form id="formulario02" method="POST" action="../controlador/agregar.php">
    <h1>Agregar Libro</h1>
     </select>
        <br><label for="nombre">Nombre (*)</label>
        <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el nombre del libro"/>
        <br><label for="isbn">ISBN (*)</label>
        <input type="text" id="isbn" name="isbn" value="" placeholder="Ingrese el ISBN del libro" onkeyup="return validarISBN(this)"/>
        <span id="mensajeISBN" class="error"></span>
        <br><label for="paginas">Número de Páginas (*)</label>
        <input type="text" id="paginas" name="paginas" value="" placeholder="Ingrese el números de páginas" onkeyup="return validarNumero(this)"/>
        <h2>Datos del Capítulo</h2>
        <from method="POST">   
        <table class="table bg-info"  id="tabla">
		<tr class="fila-fija">
			<td><input required name="numero[]" placeholder="Número del Capítulo" onkeyup="return validarNumero(this)"/></td>
			<br><td><input required name="titulo[]"  placeholder="Título"/></td>
			<br><td><select id="autor" name="autor[]">
            <option>Selecionar</option>
            <?php
                while ($row = $result->fetch_assoc()){
                    $nombre = $row['aut_nombre'];
                    echo("<option>$nombre</option>");
                }                
            ?>
            </select></td>
            <td name="nacionalidad" id="nacionalidad"></td>
            <td class="eliminar"><input type="button" value="Eliminar"/></td>
		</tr>
		</table>
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
