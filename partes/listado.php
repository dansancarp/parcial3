<?php
require_once "clases/AccesoDatos.php";
require_once "clases/Usuario.php";
if(isset($_SESSION['id']))
{
	$usuarios = Usuario::TraerTodosLosUsuarios();
	echo "<table border=1>";
	echo "<tr><td>Nombre</td><td>Correo</td><td>Foto</td><td>Tipo</td></tr>";
	foreach ($usuarios as $u) {
		echo "<tr>";
		echo "<td>".$u->nombre."</td>";
		echo "<td>".$u->correo."</td>";
		echo "<td><img src='$u->foto'></td>";
		echo "<td>".$u->tipo."</td>";
		if($_SESSION['tipo']=='a')
		{
			echo "<td><input type='button' value='Borrar' onclick='Borrar($u->id)' class='btn'></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	echo "<h2>Necesita estar logeado</h2>";
}
?>