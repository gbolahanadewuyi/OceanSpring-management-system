var zoneid = $('#zoneid').val();
var baseurl = $('#baseurl').val();








$.ajax({
	url: baseurl + "admin/get_dashboard_data_by_zone/" + zoneid,
	contentType: "application/json",
	type: "GET",
	// data: JSON.stringify(object),
	dataType: "JSON",
	success: function (data) {
        console.log(data);
      

		$(".users").html(data.users);
		$(".activeusers").html(data.activeusers);
        $(".loyaltyusers").html(data.loyalty);
          var totalsales = data.sales * 3.40
		$(".sales").html("₵" + totalsales );
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
