var zoneid = $('#zoneid').val();
var Users = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins"

var zone = 'https://loyalty-dot-techloft-173609.appspot.com/api/Zones'
var driver = "https://loyalty-dot-techloft-173609.appspot.com/api/Riders"
var updaterider = "https://loyalty-dot-techloft-173609.appspot.com/api/Riders/update?where=%7B%22id%22%3A%22"




const zgRefrider = document.querySelector('#ridertable');
fetch(driver)
	.then(res => res.json())
	.then(data => zgRefrider.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));



reloadRiderBTN.addEventListener('click', () => {
	zgRefrider.refresh();
});





function add_rider() {

	$('#btnRider').attr('disabled', true); //set button enable
	$('#btnRider').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	var phone = $("#nMobile").val();
	var mobile = phone.substring(1, phone.length);
	var c = 233;
	var phonenumber = c + mobile;



	let object = {

		"id": 0,
		"name": $("#nRider").val(),
		"msisdn": phonenumber,
		"status": "",
		"zoneid": "depot"



	};
	$.ajax({
		url: driver,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {

			$('#riderform')[0].reset();
			$('#btnRider').attr('disabled', false);
			$('#btnRider').html('Save changes')
			$('#ridermodal').modal('hide')

			$.notify({
				message: 'Driver registration successfull'
			}, {
				type: 'success'
			});

			setTimeout(function () { // wait for 5 secs(2)
				location.reload(); // then reload the page.(3)
			}, 1000);


		},

		error: function (jqXHR, textStatus, errorThrown) {
			console.log('error hitting endpoint');
			console.log(textStatus);
			console.log(errorThrown);
			console.log(jqXHR);

			$.notify({
				// options
				message: 'Error reaching endpoint, check your network connectivity'
			}, {
				// settings
				type: 'danger'
			});
			$('#riderform')[0].reset();
			$('#btnRider').attr('disabled', false);
			$('#btnRider').html('Save changes')
			$('#ridermodal').modal('hide')

			// setTimeout(function () { // wait for 5 secs(2)
			// 	location.reload(); // then reload the page.(3)
			// }, 1000);


		}

	});
}

function edit_rider(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: rider + "/" + id,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#editridermodal").modal();
			$("#enMobile").val(data.msisdn);
			$("#enRider").val(data.name);
			$('.showREBTN').html('<button type="submit" class="btn btn-primary  pull-right" id="btneRider" onclick="update_rider_info(' + data.id + ')"> Update </button>');





		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}


function update_rider_info(id) {


	$('#btneRider').attr('disabled', true); //set button enable
	$('#btneRider').html('<i class="fa fa-spinner fa-spin"></i> Updating Rider data please wait...');




	var object = {
		"name": $("#enRider").val(),
		"msisdn": $("#enMobile").val(),
		"zoneid": ''

	};


	// console.log(b);
	console.log(object);

	$.ajax({
		url: updaterider + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				$.notify({
					message: 'Driver data updated successfully'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$("#riderEform")[0].reset();
				$("#editridermodal").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			}
			if (data.count == 0) {
				$.notify({
					message: 'Error updating Riderr data'
				}, {
					type: 'danger'
				});
			}

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log('error hitting endpoint');
			console.log(textStatus);
			console.log(errorThrown);
			console.log(jqXHR);
			$.notify({
				// options
				message: 'Error reaching endpoint, check your network connectivity'
			}, {
				// settings
				type: 'danger'
			});
			$('#btneRider').attr('disabled', false); //set button enable
			$('#btneRider').html('Save');

		}

	});

}
