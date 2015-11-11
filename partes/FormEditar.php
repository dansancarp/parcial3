<form>		
	<input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id'];?>">	
	<input type="text" name="nombre" id="nombre" placeholder="Nombre">	
	<input type="button" value="Actualizar" onclick="ActualizarNombre()">
</form>