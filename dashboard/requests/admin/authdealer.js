var zoneid = $('#zoneid').val();

let authdealerURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Authdealers";
let fetchauthdealer = "https://loyalty-dot-techloft-173609.appspot.com/api/Authdealers?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22";
let fetchauthdealerURL = fetchauthdealer + zoneid + "%22%7D%2C%20%22order%22%3A%22dealerid%20DESC%22%7D"
var ro = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
var fetchRO = ro + zoneid + "%22%7D%20%2C%20%22order%22%20%3A%20%22id%20DESC%22%7D"

let checkTelephone = "https://loyalty-dot-techloft-173609.appspot.com/api/Authdealers?filter=%7B%22where%22%3A%7B%22phonenumber%22%3A%22";
let updateDealer = "https://loyalty-dot-techloft-173609.appspot.com/api/Authdealers/update?where=%7B%22dealerid%22%3A%22"
let adminurl = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins"

let checkaccount = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22" 


let newauthdealer = "https://loyalty-dot-techloft-173609.appspot.com/api/Authdealers?filter=%7B%22where%22%3A%7B%22phonenumber%22%3A%22"



const zgRef = document.querySelector('zing-grid');
fetch(fetchauthdealerURL)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));



//   
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


	$('#btnSaveDealer').attr('disabled', true); //set button enable
	$('#btnSaveDealer').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var phone = $('#Amobile').val();
	if (phone.length > 10 || phone.length < 10) {
		$("#authdealerForm")[0].reset();
		$('#btnSaveDealer').attr('disabled', false); //set button enable
		$('#btnSaveDealer').html('save changes');
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
					auth_dealer()
				} else if (jQuery.isEmptyObject(data) == false) {
					$("#authdealerForm")[0].reset();
					$('#btnSaveDealer').attr('disabled', false); //set button enable
					$('#btnSaveDealer').html('save changes');
					$.notify({
						message: 'Error registering Dealer, Dealer telephone number already exists '
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

function auth_dealer() {



	var authmobile = $("#Amobile").val();
	var phone = authmobile.substring(1, authmobile.length);
	var c = 233;

	var phonenumber = c + phone
	var authname = $("#Aname").val();
	var authlocation = $("#Alocation").val();
	var authROname = $("#Arname").val();
	// var zone = $("#zone").val();

	// {
	// 	"id": 0,
	// 	"msisdn": "233506984165",
	// 	"name": "Tunde",
	// 	"status": "string",
	// 	"roleid": 8,
	// 	"zoneid": 0,
	// 	"dateCreated": "2019-05-30T13:15:24.279Z",
	// 	"email": "tundeauth@osdeliverygh.com",
	// 	"realm": "string",
	// 	"username": "tundeauth",
	// 	"emailVerified": true,
	// 	 "password":"123456"
	//   }

	let object = {
		"id": 0,
		"dealernumber": 0,
		"msisdn": phonenumber,
		"location": authlocation,
		"zoneid": zoneid,
		"name": authname,
		"ro": authROname,
		"activated": 0
	}

	console.log(object);

	$.ajax({
		url: authdealerURL,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#authdealerForm")[0].reset();
			$('#btnSaveDealer').attr('disabled', false); //set button enable
			$('#btnSaveDealer').html('save changes');

			$.notify({
				message: 'Authorised dealear registration successful'
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
			$("#authdealerForm")[0].reset();
			$('#btnSaveDealer').attr('disabled', false); //set button enable
			$('#btnSaveDealer').html('save changes');
			$.notify({
				// options
				message: 'Error reaching endpoint, check your network connectivity'
			}, {
				// settings
				type: 'danger'
			});


		}

	});

}


function edit_dealer(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: authdealerURL + "/" + id,
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#edit_dealer").modal();
			// $("#id").val(data.id);
			$("#UAname").val(data.name);
			$("#UAmobile").val(data.phonenumber);
			$("#UAlocation").val(data.location);
			// $('#UArname').append('<option selected="selected" value=" ' + data.ro + '" >' + data.ro + '</option>');
			$('.showUBTN').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="update_dealer(' + data.dealerid + ')"> Update </button>');

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}








function update_dealer(id) {


	$('#btnUpdate').attr('disabled', true); //set button enable
	$('#btnUpdate').html('<i class="fa fa-spinner fa-spin"></i> Updating user data please wait...');



	var authmobile = $("#UAmobile").val();
	var authlocation = $("#UAlocation").val();
	var authname = $("#UAname").val();
	var authROname = $("#UArname").val();
	let object = {
		"phonenumber": authmobile,
		"location": authlocation,
		"name": authname,
		// "ro": authROname,
	}

	console.log(object);

	$.ajax({
		url: updateDealer + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				$.notify({
					message: 'Dealership data  updated successfully'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$("#dealerupdateForm")[0].reset();
				$("#edit_dealer").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			}
			if (data.count == 0) {
				$.notify({
					message: 'Error updating Dealership data'
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
			$('#btnUpdate').attr('disabled', false); //set button enable
			$('#btnUpdate').html('Save');

		}

	});

}







function check_dealer_activation(id) {

	$.ajax({
		url: authdealerURL + "/" + id,
		contentType: "application/json",
		type: "GET",
		dataType: "json",
		success: function (data) {
			if (data.activated == 0) {
				activate_dealer(id)
			} else if (data.activated == 1) {
				$.notify({
					// options
					message: 'Error, Account activated already'
				}, {
					// settings
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


		}

	});

}







function activate_dealer(id) {


	let object = {
		"activated": 1
	}

	console.log(object);

	$.ajax({
		url: updateDealer + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				view_dealer_info(id);

				// $.notify({
				// 	message: 'Dealer Account Activated successfully'
				// }, {
				// 	type: 'success'
				// });

				// // $.notify("Product created successfully");
				// $("#dealerupdateForm")[0].reset();
				// $("#edit_dealer").modal("hide");
				// setTimeout(function () { // wait for 5 secs(2)
				// 	location.reload(); // then reload the page.(3)
				// }, 1000);
			}
			if (data.count == 0) {
				$.notify({
					message: 'Error Activating Dealer Account'
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


		}

	});

}





function view_dealer_info(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: authdealerURL + "/" + id,
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#create_dealer_account").modal();
			$("#UAAname").val(data.name);
			$("#UAAmobile").val(data.phonenumber);


		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}



function create_authdealer_account() {


	$('#btnAUpdate').attr('disabled', true); //set button enable
	$('#btnAUpdate').html('<i class="fa fa-spinner fa-spin"></i> Updating user data please wait...');



	var authmobile = $("#UAAmobile").val();
	var authname = $("#UAAname").val();
	var authpassword = $("#UAApassword").val();
	var authemail = $("#UAAemail").val();
	let object = {

		"id": 0,
		"msisdn": authmobile,
		"name": authname,
		"status": "active",
		"roleid": 8,
		"zoneid": zoneid,
		"email": authemail,
		"realm": "",
		"username": "",
		"emailVerified": true,
		"password": authpassword


	}

	console.log(object);

	$.ajax({
		url: adminurl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#accountForm")[0].reset();
			$('#btnAUpdate').attr('disabled', false); //set button enable
			$('#btnAUpdate').html('save changes');
			$("#create_dealer_account").modal("hide");


			$.notify({
				message: 'Authorised dealear account creation successful'
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
			$("#accountForm")[0].reset();
			$('#btnAUpdate').attr('disabled', false); //set button enable
			$('#btnAUpdate').html('save changes');
			$("#create_dealer_account").modal("hide");

			$.notify({
				// options
				message: 'Error reaching endpoint, check your network connectivity'
			}, {
				// settings
				type: 'danger'
			});


		}

	});

}




//account deactivation

function check_dealer_deactivation(msisdn, id) {
	console.log(msisdn + "," + id);
	$.ajax({
		url: newauthdealer + msisdn + "%22%7D%7D",
		contentType: "application/json",
		type: "GET",
		dataType: "json",
		success: function (data) {
			console.log(data)
			if (data.data[0].activated == 0) {
				$.notify({
					// options
					message: 'Error, Account already deactivated'
				}, {
					// settings
					type: 'danger'
				});
			} else if (data.data[0].activated == 1) {
				deactivate_dealer(msisdn, id)

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


		}
	});

}

function deactivate_dealer(msisdn, id) {


	let object = {
		"activated": 0
	}

	console.log(object);

	$.ajax({
		url: updateDealer + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				account_info(msisdn)

			}
			if (data.count == 0) {
				$.notify({
					message: 'Error Deactivating Dealer Account'
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


		}

	});

}
// https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22233506984165%22%2C%20%22zoneid%22%3A%22100%22%2C%20%22roleid%22%3A%228%22%7D%7D
// https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22233506984165%22%2C%20%22zoneid%22%3A%22100 22%2C%20%22roleid%22%3A%228%22%7D%7D


function account_info(msisdn) {
	
	$.ajax({
		async: true,
		crossDomain: true,
		url: checkaccount + msisdn + "%22%2C%20%22zoneid%22%3A%22" + zoneid  + "%22%2C%20%22roleid%22%3A%228%22%7D%7D",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if (jQuery.isEmptyObject(data) == true) {
				$.notify({
					message: 'Dealer Account Deactivated successfully'
				}, {
					type: 'success'
				});

			} else {
				delete_dealer_account(data.data[0].id);
			}


		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});


}


function delete_dealer_account(id) {

	$.ajax({
		async: true,
		crossDomain: true,
		url: adminurl + "/" + id,
		type: "DELETE",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				$.notify({
					message: 'Dealer Account Deactivated successfully'
				}, {
					type: 'success'
				});
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			} else if (data.count == 0) {
				$.notify({
					message: 'Error Deactivating dealer account'
				}, {
					type: 'danger'
				});
			
			}


		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});


}
