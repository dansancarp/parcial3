function Login()
{
	var miClave = $("#clave").val();
	var miCorreo = $("#correo").val();
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			clave:miClave,
			correo:miCorreo,
			quehago:"Login"
		}
	});
	miAjax.done(function(resultado){
		if(resultado)
		{
			MostrarListado();
		}
		else
		{
			$("#principal").html("<h2>Error en el login !!!</h2>");
		}
		$("#Contador").load("index.php #Contador");
	});
}