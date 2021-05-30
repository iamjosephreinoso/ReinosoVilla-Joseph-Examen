<?php 
    $conexion=mysqli_connect('localhost:3307','root','root','examen');
    $continente = $_POST['continente'];
	$sql="SELECT aut_nacionalidad 
		    from autor 
		    where aut_nombre='$continente'";

	$result=mysqli_query($conexion,$sql);
	$cadena="<label></label>";
	while ($ver=mysqli_fetch_array($result)) {
		$cadena=$cadena.'<input type="text" value='.$ver['aut_nacionalidad'].' disabled>';
    }
	echo  $cadena."</select>";    
?>