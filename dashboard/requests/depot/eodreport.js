var zoneid = $('#zoneid').val();
var baseurl = $('#baseurl').val();

var d = new Date(),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

var dateString = [year, month, day].join('-');


$.ajax({
	url: baseurl + "admin/get_zonal_eodreport/" + dateString + "/" + zoneid,
	contentType: "application/json",
	type: "GET",
	// data: JSON.stringify(object),
	dataType: "JSON",
	success: function (data) {
		console.log(data);


		$(".OT").html(data.totalstock);
		$(".OD").html(data.totaldispatched);
		$(".OP").html(data.stockdamaged);
		// $(".CM").html(data.stockrebagged);
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



$("#summary-calendar").kendoCalendar({

	change: function () {
		var value = this.value();
		console.log(value); //value is the selected date in the calendar

		var currentdate = new Date(value);
		month = '' + (currentdate.getMonth() + 1),
			day = '' + currentdate.getDate(),
			year = currentdate.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		var dateString = [year, month, day].join('-');
		console.log(dateString)
		$.ajax({
			url: baseurl + "admin/get_zonal_eodreport/" + dateString + "/" + zoneid,
			contentType: "application/json",
			type: "GET",
			// data: JSON.stringify(object),
			dataType: "JSON",
			success: function (data) {
				console.log(data);

				$(".SR").html(data.totalstock);
				$(".SD").html(data.totaldispatched);
				$(".SDA").html(data.stockdamaged);
				$(".SRE").html(data.stockrebagged);
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



	}
});
