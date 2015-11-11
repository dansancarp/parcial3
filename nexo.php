<?php
session_start();
require_once "clases/AccesoDatos.php";
require_once "clases/Usuario.php";

$quehago = $_POST['quehago'];
switch ($quehago) 
{
	case 'MostrarFormRegistro':	
		include "partes/formRegistro.php";
		break;

	case 'MostrarFormLogin':
		include "partes/formLogin.php";
		break;


	case 'MostrarFormEditar':
		include "partes/formEditar.php";
		break;

	case 'MostrarListado':
		include "partes/listado.php";
		break;


	case 'Login':
		$u = Usuario::BuscarUnUsuarioParaLogin($_POST['correo'],$_POST['clave']);
		if($u!=null)
		{
			$_SESSION['id'] = $u->id;
			$_SESSION['tipo'] = $u->tipo;
			setcookie("clave",$u->clave);
			setcookie("correo",$u->correo);
			echo true;
		}
		else
		{
			echo false;
		}
		break;

	case 'InsertarUsuario':
		$u = new Usuario();
		$u->nombre = $_POST['nombre'];
		$u->correo = $_POST['correo'];
		$u->clave = $_POST['clave'];
		$u->tipo = $_POST['tipo'];
		$u->foto = "fotos/".$_FILES['foto']['name'];
		//guardo foto
			if(!move_uploaded_file($_FILES['foto']['tmp_name'],"fotos/".$_FILES['foto']['name']))
				{
					echo "error al subir";					
				}			
		$u->InsertarUsuario();
		break;	

	case 'ActualizarNombre':
		$u = Usuario::TraerUsuarioPorId($_POST['id']);
		$u->nombre = $_POST['nombre'];
		$u->ModificarUsuario();
		break;
	case 'Borrar':
		$u = Usuario::BorrarUsuario($_POST['id']);		
		break;
}
?>