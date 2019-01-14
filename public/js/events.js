$(document).ready( function(){
	$("#app-navbar-collapse .navbar-right").togle();
});

$("#tviaje").change(function(event){
	//$("#origin2").empty();
	$("#comuna").empty();

	/*if($("#comuna").val() != 0){
		$("#origin2").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{*/

		$.get("comunas/"+event.target.value+"", function(response,precio){
		/*$.get("comunas/1", function(response,precio){*/
			//console.log("Hola");
			console.log(response);
			$("#comuna").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
			for(i=0; i<response.length; i++){
				$("#comuna").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	/*}*/
});

$("#comuna").change(function(event){
	$("#origin2").empty();
	if(event.target.value != 0){
		$("#origin2").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{

		$.get("comunas/"+$("#tviaje").val()+"", function(response,precio){
		/*$.get("comunas/1", function(response,precio){*/
			//console.log("Hola");
			console.log(response);
			for(i=0; i<response.length; i++){
				$("#origin2").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	}
});



//Transfers create
$("#tviajet").change(function(event){
	$("#origin2").empty();
	$("#comunat").empty();
	/*if($("#origin2").val() != 0){
		$("#comunat").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{

		*/$.get("../transfer-comuna/"+event.target.value+"", function(response,precio){
		/*$.get("comunas/1", function(response,precio){*/
			//console.log("Hola");
			console.log(response);
			$("#origin2").append("<option value='null' selected='selected'>Seleccione un origen</option>");
			$("#origin2").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
			for(i=0; i<response.length; i++){
				$("#origin2").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	/*}*/
});

$("#origin2").change(function(event){
	$("#comunat").empty();
	if(event.target.value != 0){
		$("#comunat").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{
			console.log("Hola");

		$.get("../transfer-comuna/"+$("#tviajet").val()+"", function(response,precio){
		/*$.get("../transfer-comuna/1", function(response,precio){*/
			console.log(response);
			$("#comunat").append("<option value='null' selected='selected'>Seleccione un destino</option>");
			for(i=0; i<response.length; i++){
				$("#comunat").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	}
});