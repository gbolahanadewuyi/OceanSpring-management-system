function end_session(){

	var baseUrl = $('#baseurl').val();

	$.ajax({
	url: baseUrl + "check_session/end_session", 
	contentType: "application/json",
	type: "POST",
	// data: JSON.stringify(activateData),
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		if(data.status == true){
			location.assign(baseUrl + "admin");
					}
	},
	error: function (jqXHR, textStatus, errorThrown) {
		console.log('Error reaching endpoint');
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});
}