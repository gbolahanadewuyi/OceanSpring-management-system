var zoneid = $('#zoneid').val();
var Users = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins"
var roles = "https://loyalty-dot-techloft-173609.appspot.com/api/Roles"

var zone = 'https://loyalty-dot-techloft-173609.appspot.com/api/Zones'
var rider = "https://loyalty-dot-techloft-173609.appspot.com/api/Riders"
var updaterider = "https://loyalty-dot-techloft-173609.appspot.com/api/Riders/update?where=%7B%22id%22%3A%22"
var dems = "https://loyalty-dot-techloft-173609.appspot.com/api/Dems"


const zgRef = document.querySelector('zing-grid');
fetch(Users)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


const zgRefr = document.querySelector('#rolestable');
fetch(roles)
	.then(res => res.json())
	.then(data => zgRefr.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));



const zgRefz = document.querySelector('#zonestable');
fetch(zone)
	.then(res => res.json())
	.then(data => zgRefz.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


const zgRefrider = document.querySelector('#ridertable');
fetch(rider)
	.then(res => res.json())
	.then(data => zgRefrider.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


//reload users table
// reloadUBtn.addEventListener('click', () => {
// 	zgRef.refresh();
// });


//reload role table
reloadRBtn.addEventListener('click', () => {
	zgRefr.refresh();
});


//reload zone table
reloadZBtn.addEventListener('click', () => {
	zgRefz.refresh();
});


reloadRiderBTN.addEventListener('click', () => {
	zgRefrider.refresh();
});




$.ajax({
	url: roles,
	contentType: "application/json",
	type: "GET",
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		var html = "";
		var i;
		for (i = 0; i < data.data.length; i++) {
			html += '<option value="' + data.data[i].roleid + '">' + data.data[i].role + '</option>';
			$('#Urole').html('<option value="">Select Role</option>' + html);

			// $('#multiSelect6').append(data);
		}
	},
	error: function (jqXHR, textStatus, errorThrown) {
		console.log('Error reaching endpoint');
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});

$.ajax({
	url: zone,
	contentType: "application/json",
	type: "GET",
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		var html = "";
		var i;
		for (i = 0; i < data.data.length; i++) {
			html += '<option value="' + data.data[i].id + '">' + data.data[i].name + '</option>';
			$('#Uzone').html('<option value="">Select Zone</option>' + html);
			$('#eRzone').html('<option value="">Select Zone</option>' + html);

			// $('#multiSelect6').append(data);
		}
	},
	error: function (jqXHR, textStatus, errorThrown) {
		console.log('Error reaching endpoint');
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});

$.ajax({
	url: dems,
	contentType: "application/json",
	type: "GET",
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		var html = "";
		var i;
		for (i = 0; i < data.data.length; i++) {
			html += '<option value="' + data.data[i].id + '">' + data.data[i].name + '</option>';
			$('#Dem').html('<option value="">Select Dem</option>' + html);


		}
	},
	error: function (jqXHR, textStatus, errorThrown) {
		console.log('Error reaching endpoint');
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});

// $.ajax({
// 	url: fetchzones,
// 	contentType: "application/json",
// 	type: "GET",
// 	dataType: "JSON",
// 	success: function (data) {
// 		console.log(data);
// 		var html = "";
// 		var i;
// 		for (i = 0; i < data.data.length; i++) {
// 			html += '<option value="' + data.data[i].roleid + '">' + data.data[i].role + '</option>';
// 			$('#Urole').html('<option value="">Select Role</option>' + html);
// 			// $('#multiSelect6').append(data);
// 		}
// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
// 		console.log('Error reaching endpoint');
// 		console.log(jqXHR);
// 		console.log(textStatus);
// 		console.log(errorThrown);
// 	}
// });

function add_user() {


	$('#btnSaveOrder').attr('disabled', true); //set button enable
	$('#btnSaveOrder').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var name = $("#Uname").val();
	var phone = $("#Uphone").val();
	var email = $("#Uemail").val();
	var username = $("#Uusername").val();
	var password = $("#Upassword").val();
	var role = $("#Urole").val();
	var zone = $("#Uzone").val();
	var dem = $("#Dem").val();



	let object = {
		"id": 0,
		"msisdn": phone,
		"name": name,
		"status": "active",
		"roleid": role,
		"zoneid": zone,
		"email": email,
		"realm": "string",
		"username": username,
		"password": password,
		"emailVerified": true,
		"demid":dem

	};

	console.log(object);

	$.ajax({
		url: Users,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);

			$.notify({
				message: 'User account created successfully'
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

			$("#user-form")[0].reset()

		}

	});

}


function add_role() {

	$('#btnRole').attr('disabled', true); //set button enable
	$('#btnRole').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	let object = {
		"roleid": 0,
		"role": $("#nRole").val()


	};
	$.ajax({
		url: roles,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			$('#roleform')[0].reset();
			$('#btnRole').attr('disabled', false);
			$('#btnRole').html('Save changes')
			$('#rolemodal').modal('hide')
			$.notify({
				message: 'New Role created successfully'
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

			$('#roleform')[0].reset();
			$('#btnRole').attr('disabled', false);
			$('#btnRole').html('Save changes')
			$('#rolemodal').modal('hide')

		}

	});
}



function add_zone() {

	$('#btnZone').attr('disabled', true); //set button enable
	$('#btnZone').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	let object = {

		"id": 0,
		"name": $("#nZone").val(),
		"dem": "string"



	};
	$.ajax({
		url: zone,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {

			$('#zoneform')[0].reset();
			$('#btnZone').attr('disabled', false);
			$('#btnZone').html('Save changes')
			$('#zonemodal').modal('hide')

			$.notify({
				message: 'New Role created successfully'
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
			$('#zoneform')[0].reset();
			$('#btnZone').attr('disabled', false);
			$('#btnZone').html('Save changes')
			$('#zonemodal').modal('hide')

			// setTimeout(function () { // wait for 5 secs(2)
			// 	location.reload(); // then reload the page.(3)
			// }, 1000);


		}

	});
}


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
		"status": "string",
		"zoneid": ""



	};
	$.ajax({
		url: rider,
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
				message: 'Rider registration successfull'
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
		"zoneid": $("#eRzone").val()

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
					message: 'Rider data updated successfully'
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
