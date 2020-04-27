var zoneid = $('#zoneid').val();
// var apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/?filter=%7B%20%22order%22%3A%20%22datetime%20DESC%22%20%7D";
var userUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/";
var orderDetail = "https://loyalty-dot-techloft-173609.appspot.com/api/Orderdetails";
var postUrl = $('#baseurl').val() + 'admin/userdata';
var custRewardUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/rewards?phonenumber="
var delUserUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/"
var customerEdit = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/"
var updatecustomer = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/update?where=%7B%22id%22%3A%22"
var ro = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
var fetchRO = ro + zoneid + "%22%7D%20%2C%20%22order%22%20%3A%20%22id%20DESC%22%7D"

var checkTelephone = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22"

var justask = '';


let url = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
var fetchcustomersurl = url + zoneid + "%22%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"
const zgRef = document.querySelector('zing-grid');
fetch(fetchcustomersurl)
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



$.ajax({
	url: fetchRO,
	contentType: "application/json",
	type: "GET",
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		var html = "";
		var i;
		for (i = 0; i < data.data.length; i++) {
			html += '<option value="' + data.data[i].name + '">' + data.data[i].name + '</option>';
			$('#Arname').html('<option value="">Select R O</option>' + html);
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

	var phone = $('#phone').val();
	var phonefid = phone.substring(1, phone.length);
	//   var info = $('#card').prepend('20151012');
	var c = 233;

	var phonenumber = c + phonefid


	// var fid = $('#phone').val();
	// var itemId = fid.substring(1, fid.length);
	// //   var info = $('#card').prepend('20151012');
	// var c = 233;
	// var phonenumber = c + itemId;
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
		"ro": $('#Arname').val(),
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
		"frequency": $('#for').val()


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

				$('#userbtn').attr('disabled', false);
				$('#userBtn').html('Save changes'); //set button enable
				$("#customersData")[0].reset();
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

			$('#userbtn').attr('disabled', false);
			$('#userBtn').html('Save changes'); //set button enable
			$("#customersData")[0].reset();


		}

	});

}

function update_customer(id) {


	$('#userCBtn').attr('disabled', true); //set button enable
	$('#userCBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');



	var fid = $('#Cphone').val();
	var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	var c = 233;
	var phonenumber = c + itemId;
	var regData = {
		"firstname": $("#Cfirst").val(),
		"lastname": $("#Clast").val(),
		"landmark": $("#Clandmark").val(),
		"location": $("#Clocation").val(),
		"msisdn": fid,
		"ro": $("#CArname").val(),
		"alternatephonenumber": $("#Calt_phone").val()


	};

	console.log(regData);
	$.ajax({
		url: updatecustomer + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				$.notify({
					message: 'Customer data updated successfully '
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$("#customerData")[0].reset();
				$("#edit-customer").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			}
			if (data.count == 0) {
				$.notify({
					message: 'Error updating customer data'
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

			$('#userCBtn').attr('disabled', false); //set button enable
			$('#userCBtn').html('update');
			$("#customerData")[0].reset();
			$("#edit-customer").modal("hide");

		}

	});

}


// function edit_user(id) {
// 	$("div.form-group").removeClass("has-error"); // clear error class
// 	$("div.form-group").removeClass("has-success"); // clear error class
// 	$(".text-danger").empty();
// 	console.log(id);
// 	$.ajax({
// 		async: true,
// 		crossDomain: true,
// 		url: userUrl + id,
// 		//   headers: {
// 		// 	"content-type":"application/json"
// 		//   },
// 		type: "GET",
// 		dataType: "JSON",
// 		success: function (data) {
// 			console.log(data);
// 			$("#add-user").modal();
// 			$(".modal-title").text("Edit User-data");
// 			// $("#id").val(data.id);
// 			$("#Efirst").val(data.name);
// 			$("#Ephone").val(data.msisdn);
// 			$("#Ecard").val(data.cardnumber);
// 			$('#userBtn').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="update_ussd_user()"> Update </button>');

// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			console.log("error hitting endpoint");
// 			console.log("textStatus");
// 			console.log("errorThrown");
// 		}
// 	});
// }

function edit_customer(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: customerEdit + id,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#edit-customer").modal();
			$(".modal-title").text("Edit Customer Data");
			// $("#id").val(data.id);
			$("#Cfirst").val(data.firstname);
			$("#Clast").val(data.lastname);
			$("#Clocation").val(data.location);
			$("#Clandmark").val(data.landmark);
			$("#Cphone").val(data.msisdn);
			$("#CArname").val(data.ro);
			$('#userCBtn').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="update_customer(' + data.id + ')"> Update </button>');
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}


function delete_customer(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	if (confirm('Are you sure you want to remove this customer?')) {
		$.ajax({
			async: true,
			crossDomain: true,
			url: delUserUrl + id,
			//   headers: {
			// 	"content-type":"application/json"
			//   },
			type: "DELETE",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				$.notify({
					message: 'Customer deleted succesfully'
				}, {
					type: 'success'
				});
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("error hitting endpoint");
				console.log("textStatus");
				console.log("errorThrown");
			}
		});

	}

}

function customer_info(msisdn) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(msisdn);
	$.ajax({
		async: true,
		crossDomain: true,
		url: custRewardUrl + msisdn,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#customer-info").modal();
			$(".modal-title").text("Customer Reward Information");
			$("#ciphone").html(data.results.customer);
			$("#qp").html(data.results.qtyPurchased);
			$("#rewards").html(data.results.rewards);
			$("#loyaltyrewards").html(data.results.rewards);



			$("#referralscount").html(data.results.referrals);
			$("#referralspurchased").html(data.results.referralPurchased);
			$("#referralReward").html(data.results.referralReward);

			$("#totalreferralReward").html(data.results.referralReward);



		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});



}
