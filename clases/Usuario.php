<?php
class Usuario
{
	public $nombre;
	public $clave;
	public $correo;
	public $foto;
	public $id;
	public $tipo;

	public static function BorrarUsuario($id)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from usuario where id=$id");					
			$consulta->execute();
			return $consulta->rowCount();
	 }
  	
	
	 public function InsertarUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarUsuario(:nombre,:correo,:clave,:foto,:tipo)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
				$consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	 public function ModificarUsuario()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("update usuario set nombre=:nombre WHERE id=:id");
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);			
			$consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
			return $consulta->execute();
	 }

	 public static function TraerUsuarioPorId($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where id=$id");
			$consulta->execute();			
			return $consulta->fetchObject("Usuario");		
	}

	 	public static function TraerTodosLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
	}

	public static function BuscarUnUsuarioParaLogin($c,$p)
	{			
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuario WHERE correo LIKE '$c' AND clave LIKE '$p'");
			$consulta->execute();
			$uBuscado= $consulta->fetchObject('Usuario');
			return $uBuscado;				
			
	}	
}
?>