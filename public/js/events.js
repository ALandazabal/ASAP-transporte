$(document).ready( function(){
	$("#app-navbar-collapse .navbar-right").togle();
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

$("#tviaje").change(function(event){
	$("#origin2").empty();
	if($("#comuna").val() != 0){
		$("#origin2").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{

		$.get("comunas/"+event.target.value+"", function(response,precio){
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
$("#origin2t").change(function(event){
	$("#comunat").empty();
	if(event.target.value != 0){
		$("#comunat").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{
			console.log("Hola");

		$.get("../transfer-comuna/"+$("#tviajet").val()+"", function(response,precio){
		/*$.get("../transfer-comuna/1", function(response,precio){*/
			console.log(response);
			for(i=0; i<response.length; i++){
				$("#comunat").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	}
});

$("#tviajet").change(function(event){
	$("#comunat").empty();
	if($("#origin2t").val() != 0){
		$("#comunat").append("<option value='0'>Aeropuerto Internacional Comodoro Arturo Medino Benítez</option>");
	}else{

		$.get("../transfer-comuna/"+event.target.value+"", function(response,precio){
		/*$.get("comunas/1", function(response,precio){*/
			//console.log("Hola");
			console.log(response);
			for(i=0; i<response.length; i++){
				$("#comunat").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
			}
		});
	}
});