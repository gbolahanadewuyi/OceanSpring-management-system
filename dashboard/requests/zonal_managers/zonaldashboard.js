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
		roundUp(totalsales, 1) 
		
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

/**
 * @param num The number to round
 * @param precision The number of decimal places to preserve
 */
function roundUp(num, precision) {
	precision = Math.pow(10, precision)
	totalsales =  Math.ceil(num * precision) / precision

	$(".sales").html("₵" + totalsales );
  }
  
//   roundUp(192.168, 1) //=> 192.2