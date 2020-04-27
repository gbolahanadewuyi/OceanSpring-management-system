var zoneid = $('#zoneid').val();
var baseurl = $('#baseurl').val();



$.ajax({
	url: baseurl + "admin/get_depot_dashboard_data/" + zoneid,
	contentType: "application/json",
	type: "GET",
	// data: JSON.stringify(object),
	dataType: "JSON",
	success: function (data) {
        console.log(data);
      

		$(".st").html(data.totalstcok);
		$(".sd").html(data.totalstockdispatched);
        $(".Damages").html(data.totalstockdamages);
        // $(".rebagged").html(data.totalstockrebagged);
		
		
	},
	error: function (jqXHR, textStatus, errorThrown) {
		$.notify({
			message: "Error hitting endpoint check network connectivity"
		}, {
			type: "Danger"
		});
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});