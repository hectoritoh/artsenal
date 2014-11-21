





function getProducto(  id_producto ){

	$.ajax({
		url: Routing.generate("producto_detalle_mostrar" , {  id_producto: id_producto }),
		success: function( response ){
			$("#modalProducto").html( response  );
			// stButtons.locateElements(); 
		}
	});
}



function getProductosBy(){

	
	var subcategoria = $("#subcategoria").val(); 
	var precio = $("#precio").val(); 
	var ciudad = $("#ciudad").val(); 


	$.ajax({
		url: Routing.generate("productos_filtro" , { categoria : categoria ,   subcategoria: subcategoria  , precio : precio , ciudad : ciudad }),
		success: function( response ){
			$("#productos").html( response  );
		}
	});

}


var indice_paginacion = 0 ;
var cargandoProductos = false ;


function cargarMasProductos(   ){


	$("#btn_paginador").html("Cargando"); 

	if (!cargandoProductos) {

		cargandoProductos = true ;
		indice_paginacion++;
		$.ajax({
			url: Routing.generate('get_productos_paginacion', {indice: indice_paginacion}),
			success: function( response ){
				var contenido = $(response).hide();
				$('#listaProductos').append( contenido  );
				contenido.slideDown('slow');
				cargandoProductos = false ; 
				$("#btn_paginador").html("Cargar Mas"); 

			}, error: function(){
				alert("Favor intente en unos momentos");
				cargandoProductos = false ; 
				$("#btn_paginador").html("Cargar Mas"); 
			}

		});
	};

}




$(document).ready(function(){



	$('[data-toggle="tooltip"]').tooltip(); 


	$("#btn_paginador").click(cargarMasProductos); 
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






function addtoCart(  url  ){

	$.ajax({
		url:url, 
		success: function(json){

			if (json.response  == "ok") {
				alert("producto agregado al carrito de compras");
			}else{
				alert("error al agregar producto al carrito de compras");
			}

			
		}
	});

}