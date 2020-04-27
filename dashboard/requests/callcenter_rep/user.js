var zoneid = $('#zoneid').val();
var userID = $('#userid').val();
var username = $('#Username').val();


var postUrl = $('#baseurl').val() + 'admin/userdata';
var userUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations?filter=%7B%22where%22%3A%7B%22id%22%3A%22"
var checkTelephone = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22"
var ussdUsers = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/update?where=%7B%22id%22%3A%22"
var justask = '';

const zgRef = document.querySelector('#ussd-table');
fetch('https://loyalty-dot-techloft-173609.appspot.com/api/Registrations?filter=%7B%22where%22%3A%7B%22authenticated%22%3A%220%22%7D%2C%20%22order%22%3A%22id%20DESC%22%7D')
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


function _exportDataToCSV() {
	const data = zgRef.getData();
	const csvData = Papa.unparse(data);
	console.log('--- exporting data ----', data, csvData);
	_downloadCSV('export-all.csv', csvData);
}



// use built in anchor tag functionality to download the csv through a blob
function _downloadCSV(fileName, data) {
	const aRef = document.querySelector('#downloadAnchor');
	let json = JSON.stringify(data),
		blob = new Blob([data], {
			type: "octet/stream"
		}),
		url = window.URL.createObjectURL(blob);
	aRef.href = url;
	aRef.download = fileName;
	aRef.click();
	window.URL.revokeObjectURL(url);
}


zgRef.executeOnLoad(() => {
	// Add event listener to button
	reloadUBtn.addEventListener('click', () => {
		zgRef.refresh();
	});
});



// const zgRefc = document.querySelector('#customer_table');
// fetch(fetchcustomersurl)
// 	.then(res => res.json())
// 	.then(data => zgRefc.setData(data.data))
// 	.catch(err => console.error('--- Error In Fetch Occurred ---', err));
function check_user_telephone() {

	$('#userBtn').attr('disabled', true); //set button enable
	$('#userBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');

	var phone = $('#phone').val();
	if (phone.length > 10 || phone.length < 10) {
		$('#userBtn').attr('disabled', false); //set button enable
		$('#userBtn').html('Save changes');
		$("#customersData")[0].reset();
		$.notify({
			message: 'Oops Error, Incorrect number'
		}, {
			type: 'danger'
		});
	} else {

		var mobile = phone.substring(1, phone.length);
		var c = 233;
		var phonenumber = c + mobile;

		var varcheckTelUrl = checkTelephone + phonenumber + "%22%7D%7D"
		$.ajax({
			url: varcheckTelUrl,
			contentType: "application/json",
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				var i;
				if (jQuery.isEmptyObject(data) == true) {
					user_register_post()
				} else if (jQuery.isEmptyObject(data) == false) {
					$('#userBtn').attr('disabled', false); //set button enable
					$('#userBtn').html('Save changes');
					$("#customersData")[0].reset();
					$.notify({
						message: 'Error registering customer, customer telephone number already exists '
					}, {
						type: 'danger'
					});

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





}



function user_register_post() {



	if ($("#milo").is(":checked")) {
		var milo = "Milo,"
	} else {
		milo = ""
	}
	if ($("#wPowder").is(":checked")) {
		var wPowder = "Washing Powder,"
	} else {
		wPowder = ""
	}
	if ($("#sugar").is(":checked")) {
		var sugar = "Sugar,"
	} else {
		sugar = ""
	}
	if ($("#bread").is(":checked")) {
		var bread = "Bread,"
	} else {
		bread = ""
	}
	if ($("#milk").is(":checked")) {
		var milk = "Milk,"
	} else {
		milk = ""
	}
	if ($("#bSoap").is(":checked")) {
		var bSoap = "Bathing Soap,"
	} else {
		bSoap = ""
	}
	if ($("#toothpaste").is(":checked")) {
		var toothpaste = "Toothpaste,"
	} else {
		toothpaste = ""
	}
	if ($("#babyCon").is(":checked")) {
		var babyCon = "Baby Conditional,"
	} else {
		babyCon = ""
	}
	if ($("#water").is(":checked")) {
		var water = "Water"
	} else {
		water = ""
	}

	// var justaskstring = [milo, wPowder, sugar, bread, milk, bSoap, toothpaste, babyCon, water].join(',');

	justask += milo + wPowder + sugar + bread + milk + bSoap + toothpaste + babyCon + water;


	console.log(justask);



	var fid = $('#phone').val();
	var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	var c = 233;
	var phonenumber = c + itemId;
	var regData = {
		"id": 0,
		"phone": phonenumber,
		"first": $('#first').val(),
		"last": $('#last').val(),
		"alternatephonenumber": $('#alt_phone').val(),
		"home": $('#home').val(),
		"dateofbirth": $('#date').val(),
		"gender": $('#gender').val(),
		"cardnumber": $('#card').val(),
		"location": $('#location').val(),
		"landmark": $('#landmark').val(),
		"zoneid": zoneid,
		"ro": username,
		"fai": justask,
		"day": $('#day').val(),
		"time": $('#time').val(),
		"quantity": $('#Quantity').val(),
		"cashondelivery": $('#cash').val(),
		"momo": $('#momo').val(),
		"other": $('#other').val(),
		"autodelivery": $('#auto').val(),
		"calltoconfirm": $('#call').val(),
		"subscription": $('#sub').val(),
		"frequency": $('#for').val(),
		"operatorid": userID


	};





	console.log(regData);

	$.ajax({
		url: postUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.status == 200) {
				console.log('success');
				$.notify({
					message: 'Customer registration succesful'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$("#customersData")[0].reset();
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			}
			if (data.status == 400) {
				$.notify({
					message: 'Error adding new customer'
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

			$('#userBtn').attr('disabled', false); //set button enable
			$('#userBtn').html('Save changes');
			$("#customersData")[0].reset();


		}

	});

}


function check_ussduser_telephone() {

	$('#userEBtn').attr('disabled', true); //set button enable
	$('#userEBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var phone = $('#Ephone').val();
	if (phone.length < 12 || phone.length > 12) {
		$('#userEBtn').attr('disabled', false); //set button enable
		$('#userEBtn').html('Save changes');
		$("#userData")[0].reset();
		$.notify({
			message: 'Oops Error, Incorrect number. phonenumber must start with 233 and must be 12 in number'
		}, {
			type: 'danger'
		});
	} else {
		var varcheckTelUrl = checkTelephone + phone + "%22%7D%7D"
		$.ajax({
			url: varcheckTelUrl,
			contentType: "application/json",
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				var i;
				if (jQuery.isEmptyObject(data) == true) {
					ussd_user_post()
				} else if (jQuery.isEmptyObject(data) == false) {
					$('#userEBtn').attr('disabled', false); //set button enable
					$('#userEBtn').html('Save changes');
					$("#userData")[0].reset();
					$.notify({
						message: 'Error registering customer, customer telephone number already exists'
					}, {
						type: 'danger'
					});

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

}
function check_ussduser_telephone() {

	$('#userEBtn').attr('disabled', true); //set button enable
	$('#userEBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var phone = $('#Ephone').val();
	if (phone.length < 12 || phone.length > 12) {
		$('#userEBtn').attr('disabled', false); //set button enable
		$('#userEBtn').html('Save changes');
		$("#userData")[0].reset();
		$.notify({
			message: 'Oops Error, Incorrect number. phonenumber must start with 233 and must be 12 in number'
		}, {
			type: 'danger'
		});
	} else {
		var varcheckTelUrl = checkTelephone + phone + "%22%7D%7D"
		$.ajax({
			url: varcheckTelUrl,
			contentType: "application/json",
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				var i;
				if (jQuery.isEmptyObject(data) == true) {
					ussd_user_post()
				} else if (jQuery.isEmptyObject(data) == false) {
					$('#userBtn').attr('disabled', false); //set button enable
					$('#userBtn').html('Save changes');
					$("#customersData")[0].reset();
					$.notify({
						message: 'Error registering customer, customer telephone number already exists '
					}, {
						type: 'danger'
					});

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

}

function ussd_user_post() {


	// $('#userEBtn').attr('disabled', true); //set button enable
	// $('#userEBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');



	//var fid = $('#phone').val();
	//var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	//var c = 233;
	//var phonenumber = c + itemId;

	var id = $("#Eid").val();
	var regUssdData = {
		"id": 0,
		"phone": $('#Ephone').val(),
		"first": $('#Efirst').val(),
		"last": $('#Elast').val(),
		"alternatephonenumber": $('#Ealt_phone').val(),
		"home": $('#Ehome').val(),
		"dateofbirth": $('#Edate').val(),
		"gender": $('#Egender').val(),
		"cardnumber": $('#Ecard').val(),
		"location": $('#Elocation').val(),
		"landmark": $('#Elandmark').val(),
		"zoneid": zoneid,
		"ro": '',
		"fai": justask,
		"day": $('#Eday').val(),
		"time": $('#Etime').val(),
		"quantity": $('#EQuantity').val(),
		"cashondelivery": $('#Ecash').val(),
		"momo": $('#Ecash').val(),
		"other": $('#Eother').val(),
		"autodelivery": $('#Eauto').val(),
		"calltoconfirm": $('#Ecall').val(),
		"subscription": $('#Esub').val(),
		"frequency": $('#Efor').val(),
		"operatorid": userID


	};





	console.log(regUssdData);

	$.ajax({
		url: postUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regUssdData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.status == 200) {
				console.log('success');

				authenticateUSSDUser(id);
			} else
			if (data.status == 400) {
				$.notify({
					message: 'Error completing user registration'
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

			$('#userEBtn').attr('disabled', false); //set button enable
			$('#userEBtn').html('Save');
			$("#userData")[0].reset();
			$("#add-user").modal("hide");

		}

	});

}




function edit_user(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: userUrl + id + "%22%7D%7D",
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#add-user").modal();
			$(".modal-title").text("Edit User-data");
			$("#Eid").val(data.data[0].id);
			$("#Efirst").val(data.data[0].name);
			$("#Ephone").val(data.data[0].msisdn);
			$("#Ecard").val(data.data[0].cardnumber);
			// $('#userBtn').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="update_ussd_user()"> Update </button>');

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}


function authenticateUSSDUser(id) {
	console.log(id)
	let object = {
		"authenticated": 1
	}

	$.ajax({
		url: ussdUsers + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count == 1) {
				$.notify({
					message: 'User registration completion succesful'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$('#userEBtn').attr('disabled', false); //set button enable
				$('#userEBtn').html('Save');
				$("#userData")[0].reset();
				$("#add-user").modal("hide");

				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);

			} else {
				$('#userEBtn').attr('disabled', false); //set button enable
				$('#userEBtn').html('Save');
				$("#userData")[0].reset();
				$("#add-user").modal("hide");

				$.notify({
					message: 'Error completing user registration, please try again'
				}, {
					type: 'danger'
				});





			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			$.notify({
				// options
				message: 'error hitting endpoint'
			}, {
				// settings
				type: 'Danger'
			});
			console.log("error hitting endpoint");
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}




	})

}
