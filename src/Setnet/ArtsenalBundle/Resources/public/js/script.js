

function getCategorias(  url_request   ){


    $("#subcategoria").val();
    $("#precios").val();
    $("#productosCategoria").hide('slow');

    $("#productosCategoria").load(url_request , function(){
        $("#productosCategoria").show('slow');
        $(".art-mostrar").nyroModal();        

    })

}


function getHome(  url_request  ){
    $("#contenido").load(  url_request ); 
}


function addfavorito(   url_request   ){
    $.blockUI(); 
    $.post(  url_request  , function(response){
            $.unblockUI(); 
            $("#favorito_btn").html(response ); 
    } );
}

function quitarfavorito(   url_request   ){
    $.blockUI(); 
    $.post(  url_request , function(response){
            $.unblockUI(); 
            $("#favorito_btn").html(response );
    } );
}
