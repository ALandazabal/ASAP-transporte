$(document).ready( function(){
	$("#myTable input[type=checkbox]").on("change", function(){
		this.checked = !this.checked;
		$.post("", function(){
			
		});
	});
});