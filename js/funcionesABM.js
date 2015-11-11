function RegistrarUsuario()
{  
  if(!validar())
  {
    alert("Todos los campos son obligatorios");
    return;
  }    
	var envio = new FormData();
  var miTipo = $('input:radio[name=tipo]:checked').val()
  envio.append("tipo",miTipo);
	envio.append("nombre",$("#nombre").val());
	envio.append("clave",$("#clave").val());
	envio.append("correo",$("#correo").val());
	envio.append("quehago","InsertarUsuario");
	var files = $("#foto").get(0).files;
	for (var i = 0; i < files.length; i++) 
    {
        envio.append("foto", files[i]);
    }
     var miAjax = $.ajax({
              method: "POST",
              url: "nexo.php",              
              cache: false,                      
              contentType: false,
              processData: false,
              data: envio,                            
      });
     miAjax.done(function(resultado){
     	MostrarListado();
     });

}

function validar()
{
  if($("#nombre").val()=="")    
    return false;
  if($("#clave").val()=="")
    return false;
  if($("#correo").val()=="")
    return false;
  if($("#foto").val()=="")
    return false;
  if(!isValidEmail($("#correo").val()))
    return false;

  return true;
}

function ActualizarNombre()
{  
  var miNombre = $("#nombre").val();
  var miId = $("#id").val();
  var miAjax= $.ajax({
    method:"post",
    url:"nexo.php",
    data:{
      nombre:miNombre,
      id:miId,
      quehago:"ActualizarNombre"
    }
  });
  miAjax.done(function(resultado){  
      MostrarListado();
  });
}

function Borrar(id)
{    
  var miId = id;
  var miAjax= $.ajax({
    method:"post",
    url:"nexo.php",
    data:{      
      id:miId,
      quehago:"Borrar"
    }
  });
  miAjax.done(function(resultado){  
      MostrarListado();
  });
}

function isValidEmail(mail)
{
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
}