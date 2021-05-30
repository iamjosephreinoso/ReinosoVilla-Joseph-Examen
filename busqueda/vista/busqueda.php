<!DOCTYPE html>
<html>
<head>
    <link href="../../css/estilo.css" rel="stylesheet" />
    <link href="../../css/layout.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../config/buscar.js"></script>
    <title>Busquéda</title>
</head>
<body>
    <header>
        <a href="../../index.html"><img src="../../images/principal.jpg"></a>
    </header>
    <!--
        BOTON CEDULA 
    -->
    <br>
    <form onsubmit="return buscarA()">
        <div id="Busqueda" align="center"><h1>Buscar por Autor</h1></div>
        <br>
        <input type="text" id="autor" name="autor" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarA()" >
        <br>
        <br>
    </form>
    <div id="informacion"><h1> Información del Libro </h1></div>
    <br>
    <br>
    <br>
</body>
<footer>
        Joseph Nicolás Reinoso Villa - Universidad Politécnica Salesiana <a class="celular" href="tel:+593984709368">(+593) 98 470 9368</a> <a class="mail" href="mailto:jreinosov@est.ups.edu.ec"> jreinosov@est.ups.edu.ec</a> 
        <br/>&copy; Todos los derechos reservados
</footer>
</html>
