function MostrarFormRegistro()
{	
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			quehago:"MostrarFormRegistro"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);		
	});
}

function MostrarFormLogin()
{	
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			quehago:"MostrarFormLogin"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);		
	});
}

function MostrarFormEditar()
{	
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			quehago:"MostrarFormEditar"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);		
	});
}

function MostrarListado()
{	
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			quehago:"MostrarListado"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);		
	});
}