<form>
	<input type="text" name="nombre" id="nombre" placeholder="Nombre">
	<input type="text" name="correo" id="correo" placeholder="E-Mail">
	<input type="password" name="clave" id="clave" placeholder="Password"><br>
	Admin:<input type="radio" name="tipo" id="tipo" value="a">
	User:<input type="radio" name="tipo" id="tipo" value="u" checked><br>
	<input type="file" name="foto" id="foto" placeholder="Foto">
	<input type="button" value="Registrar Usuario" onclick="RegistrarUsuario()">
</form>