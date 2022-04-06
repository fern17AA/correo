// Registrar un nuevo usuario

$("#registrarUsuario").on("submit", function(e){
    
	e.preventDefault();
	
	var formData = new FormData(document.getElementById("registrarUsuario"));
	formData.append("dato", "valor");

	$.ajax({

		url: "aplicacion/modelo/registrar-usuario.php",
		type: "post",
		dataType: "html",
		data: formData,

		cache: false,
        contentType: false,
        processData: false,
        success: function(datos){
          $("#mensaje").html(datos);
        }
	})
})
// Enviar Email

$(document).on('submit', '#form_insert', function(event) {
	event.preventDefault();
$.ajax({
	url: '../aplicacion/modelo/enviar-email.php',
	type: 'POST',
	dataType: 'json',
	data: $(this).serialize(),
})
.done(function(respuesta) {
	console.log(respuesta);
	if (!respuesta.error) {
		alert('El mensaje se ha enviado.');
	}

	else{
		alert('Ha ocurrido un error');
	}

})
.fail(function(resp) {
	console.log(resp.responseText);
})
.always(function() {
	console.log("complete");
})
});

$("#send").on("click", function(){
console.log("Mostrar mensajes enviados");
var enviados = document.getElementById("enviados");
var inbox = document.getElementById("mostrarInbox");
var noLeidos = document.getElementById("noleidos");
var redactar = document.getElementById("redactarMensaje");

enviados.classList.remove("oculto");
inbox.classList.add("oculto");
noLeidos.classList.add("oculto");
redactar.classList.add("oculto");

})

$("#noLeidos").on("click", function(){
	console.log("Mostrar mensajes no leidos");
	var enviados = document.getElementById("enviados");
	var inbox = document.getElementById("mostrarInbox");
	var noLeidos = document.getElementById("noleidos");
	var redactar = document.getElementById("redactarMensaje");
	
	enviados.classList.add("oculto");
	inbox.classList.add("oculto");
	noLeidos.classList.remove("oculto");
	redactar.classList.add("oculto");

	
	})

	$("#entrada").on("click", function(){
		console.log("Mostrar inbox");
		var enviados = document.getElementById("enviados");
		var inbox = document.getElementById("mostrarInbox");
		var noLeidos = document.getElementById("noleidos");
		var redactar = document.getElementById("redactarMensaje");
		
		enviados.classList.add("oculto");
		inbox.classList.remove("oculto");
		noLeidos.classList.add("oculto");
		redactar.classList.add("oculto");

		
		})

		$("#redactar").on("click", function(){
			console.log("Redactar mensaje");
			var enviados = document.getElementById("enviados");
			var inbox = document.getElementById("mostrarInbox");
			var noLeidos = document.getElementById("noleidos");
			var redactar = document.getElementById("redactarMensaje");
			
			enviados.classList.add("oculto");
			inbox.classList.add("oculto");
			noLeidos.classList.add("oculto");
			redactar.classList.remove("oculto");
			
			})

			//Mostrar ventana modal
			setTimeout(function(){
				$('#modal-info').modal('show');
			}, 5000)

			// Redactar Email (text editor)
			$(function () {
				$("#compose-textarea").wysihtml5();
			});
		
		 	//Select 2
			$(function () {
				$('.select2').select2()
			})

			//Mensajes Recibidos
			$(document).ready(function(){

				function mostrarImbox(view = '')
			 {
				var $mensaje =  $('.mensaje');
				$.ajax({
				 url:"inbox.php",
				 method:"POST",
				 data:{view:view},
				 dataType:"json",
				 success:function(data)
				 {
					$('.mensaje').html(data.notification);
				
				 }
			
				});
			
			 }
			 
			 mostrarImbox();
			
			 // MENSAJES ENVIADOS
			
			 function mensajesEnviados(view = '')
			 {
				var $enviados =  $('.enviados');
				$.ajax({
				 url:"enviados.php",
				 method:"POST",
				 data:{view:view},
				 dataType:"json",
				 success:function(data)
				 {
					$('.mensajeEnviado').html(data.notification);
				
				 }
			
				});
			
			 }
			 
			 mensajesEnviados();
			
			 //MENSAJES NO LEIDOS
			
			function mensajesNoLeidos(view = '') {
				var $noleido=  $('.noleido');
				$.ajax({
				 url:"no-leido.php",
				 method:"POST",
				 data:{view:view},
				 dataType:"json",
				 success:function(data)
				 {
					$('.noleido').html(data.notification);
				
				 }
			
				});
			
			 }
			
			mensajesNoLeidos();
			
			//MOSTRAR NOTIFICACIONES
			
			function cargarNotificaciones(view = '')
			 {
				var $mensaje =  $('.mensaje');
				$.ajax({
				 url:"fetch.php",
				 method:"POST",
				 data:{view:view},
				 dataType:"json",
				 success:function(data)
				 {
					$('#notify').html(data.notification);
			
					if(data.unseen_notification > 0)
					{
					 $('#count').html(data.unseen_notification);
					 $('#recibidos').html(data.unseen_notification);
					 $('#nleidos').html(data.unseen_notification);
					 $('#title').html('('+data.unseen_notification+')' + ' '+'Email');
			
			
					}
			
					else{
						 $('#count').html('');
						$('#title').html('Email');
					}
			
			
				 }
			
				});
			
			 }
			
			setInterval(function(){ 
				mostrarImbox();; 
			 }, 1000);
			
			 setInterval(function(){ 
				cargarNotificaciones();; 
			 }, 1000);
			 
			});