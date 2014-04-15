
$(document).ready(function(){


	
	// $("#left_content").height($("#content").height());

	/*
	controla el hover en el menu
	*/
	$(".top_menu_item").hover(function(){
		$(this).addClass('active');
	}, function(){
		$(".top_menu_item").removeClass('active');
	});



	$("input.upload").change(function(){
		readURL(this);
	});




	$('#productoForm').ajaxForm(function(response) { 
		alert("Articulo ingresado correctamente");
		$("#contenido2").html(   response ); 

		
		initProductoForm();
	}); 



	$(".tabs_tienda").click(function(){
		$(".tabs_tienda").removeClass("tabs_tienda_selected");
		$(this).addClass("tabs_tienda_selected");
	});

});


function mostrar_producto (url) {
	
	$("#modal_contenido").load(url);
	$('#myModal').modal();


}


function agregar_carrito(  url  ){
	$.ajax({
		url: url , 
		success: function( responseJson ){
			alert("producto agregado");
		} 
	});
}

function initProductoForm(){


	$('#productoForm').ajaxForm(function(response) { 
		alert("Articulo ingresado correctamente");
		$("#contenido2").html(   response ); 
	}); 

	$("input.upload").change(function(){
		readURL(this);
	});



}



function mostrarCuentas(  cuenta ){
	$(".cuentas").hide();
	$("#" +  cuenta ).show();
}


function loadSubcategorias(  url  , input  ){
	$("#productos" ).load(   url + $(input).val() ); 
}


function mostrar_contenido(  indice ){
	$(".contenido_tabs").slideUp();	
	$(".contenido_tabs").eq(indice-1).slideDown();
}

function readURL(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$(input).parent(".fileUpload").css('background-image', "url(" + e.target.result + " )");
		}

		reader.readAsDataURL(input.files[0]);
	}
}


