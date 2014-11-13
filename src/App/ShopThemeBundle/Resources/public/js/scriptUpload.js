
var files;
var $cropObj; 


  var scalex ;
  var scaley ;

      $dataX = $("#dataX"),
    $dataY = $("#dataY"),
    $dataHeight = $("#dataHeight"),
    $dataWidth = $("#dataWidth");


// Add events
$('input[type=file]').on('change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
	files = event.target.files;
}







// Catch the form submit and upload the files
function uploadFiles(event)
{
    event.stopPropagation(); // Stop stuff happening
    event.preventDefault(); // Totally stop stuff happening

    // START A LOADING SPINNER HERE

    // Create a formdata object and add the files
    var data = new FormData();
    $.each(files, function(key, value)
    {
        data.append(key, value);
    });
    
    $.ajax({
        url:  Routing.generate("upload_imagen_tienda") ,
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                
                $("#imageCrop").show(); 
                $("#imageCrop").attr("src",  image_path + data.image_name ); 
                
                $cropObj =  $("#imageCrop").cropper({
                  aspectRatio: 16 / 9,
                  data: {
                    x: 480,
                    y: 60,
                    width: 640,
                    height: 360
                  },
                  preview: ".img-preview",
                  done: function(data) {
                    
                  }
                });




 



                
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}



// Catch the form submit and upload the files
function cropAndSave()
{ 
    // START A LOADING SPINNER HERE

    
    
    $.ajax({
    	url:  Routing.generate("upload_imagen_crop_tienda" , {id_tienda : _tienda_id}) ,
    	type: 'POST',
    	data: {  imgBase64 :  $cropObj.cropper("getDataURL", "image/png")   },
    	// cache: false,
    	// dataType: 'json',
        // processData: false, // Don't process the files
        // contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
        	if(typeof data.error === 'undefined')
        	{
                
              $("#modalImagen").modal('hide'); 
              $("#tienda_imagen_cabecera").css('background-image', 'url(' +   image_tienda_path  + data.image_name   + ')');

              
                
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}


function grabarImagen(){

}



$(document).ready(  function(){

	

	$('#upload').on('submit', uploadFiles);



}); 