let loginUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins/login";


var baseUrl = $('#baseurl').val();

function login() {
	window.swal({
		title: "Logging in...",
		text: "Please wait",
		imageUrl: $('#baseurl').val() + "dashboard/images/91.gif",
		showConfirmButton: false,
		allowOutsideClick: false
	});

	var logData = {
		"email": $('#email').val(),
		"password": $('#password').val(),

	}

	console.log(logData);

	$.ajax({
		url: loginUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(logData),
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			swal("Nice!", "You have logged in successfully", "success");
			start_session(data.userId, data.id, data.zoneid,data.roleid, data.name) 
			// setTimeout(function () {
			// 	window.location.assign("admin/dashboard");
			// }, 5000);


		},

		error: function (jqXHR, textStatus, errorThrown) {
			swal("oops", "incorrect email or password", "error");
			console.log('Error reaching endpoint');
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}


function start_session(id, token, zoneid,roleid,name) {

      var sessionData = {
		  'id':id,
		   'token':token,
		   'zoneid':zoneid,
		   'roleid':roleid,
		   'name':name
	  }

	console.log(sessionData);

	$.ajax({
		url: baseUrl + "check_session/start_session/",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(sessionData),
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if (data.logged_in == true && data.roleid == 0) {
				location.assign(baseUrl + "admin/dashboard");
			} else if (data.logged_in == true && data.roleid == 1) {
				location.assign(baseUrl + "admin/dashboard");
			} else if (data.logged_in == true && data.roleid == 2) {
				window.location.assign("zonalmanager/dashboard");
			} else if (data.logged_in == true && data.roleid == 3) {
				window.location.assign("call_manager/dashboard");
			} else if (data.logged_in == true && data.roleid == 4) {
				window.location.assign("dem_manager/dashboard");
			} else if (data.logged_in == true && data.roleid == 5) {
				window.location.assign("callrep/dashboard");
			}
			else if (data.logged_in == true && data.roleid == 7) {
				window.location.assign("depot/dashboard");
			}
			else if (data.logged_in == true && data.roleid == 8) {
				window.location.assign("authdealer/dashboard");
			}
			else if (data.logged_in == true && data.roleid == 10) {
				window.location.assign("transportmanager/dashboard");
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



// function Login() {

// 	window.swal({
// 		title: "Processing...",
// 		text: "Please wait",
// 		imageUrl:"https://osd-web-dot-techloft-173609.appspot.com" + "dashboard/images/91.gif",
// 		showConfirmButton: false,
// 		allowOutsideClick: false
// 	});


// 	var logData = {
// 		"phonenumber": $('#phone').val()

// 	}

// 	console.log(logData);

// 	$.ajax({
// 		url: apiUrl,
// 		"headers": {
// 			"content-type": "application/json"
// 		},
// 		type: "POST",
// 		data: JSON.stringify(logData),
// 		dataType: "JSON",
// 		success: function (data) {

// 			if (data.results.statusCode = 201) {
// 				console.log(data);
// 				//window.swal("Success",data.messages.message+ "\n A follow up call will be made to you once your account has been approved", "success");
// 				$('#login')[0].reset(); // reset form on modals
// 				window.swal({
// 					title: "Account activation code!",
// 					text: "Please type SMS activation code sent to your mobile",
// 					type: "input",
// 					allowOutsideClick: false,
// 					showCancelButton: false,
// 					closeOnConfirm: false,
// 					showLoaderOnConfirm: true,
// 					inputPlaceholder: "SMS Code"
// 				}, function (inputValue) {
// 					if (inputValue === false) return false;
// 					if (inputValue === "") {
// 						swal.showInputError("The SMS Code field is required!");
// 						return false
// 					}
// 					if (inputValue.length < 7) {
// 						swal.showInputError("At least 6 Characters required!");
// 						return false
// 					}
// 					activate_account(logData.phonenumber, inputValue);
// 					//so here we will run a validation from ajax to endpoint again
// 					//swal("Nice!", "Merchant account activated  successfully", "success");
// 				});
// 			}

// 			if (data.results.statusCode = 400) {
// 				swal("oops!", "Mobile number not valid", "error");
// 			}



// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			swal("oops", "error reaching endpoint", "error");
// 			console.log('Error reaching endpoint');
// 			console.log(jqXHR);
// 			console.log(textStatus);
// 			console.log(errorThrown);
// 		}
// 	});

// }

// function activate_account(mobile, code) {

// 	let activateData = {
// 		"phonenumber": mobile,
// 		"otp": code
// 	}

// 	$.ajax({
// 		url: loginUrl,
// 		"headers": {
// 			"content-type": "application/json"
// 		},
// 		type: "POST",
// 		data: JSON.stringify(activateData),
// 		dataType: "JSON",
// 		success: function (data) {
// 			console.log(data);

// 			swal("Nice!", "You have logged in successfully", "success");
// 			setTimeout(function () {
// 				window.location.assign("https://osd-web-dot-techloft-173609.appspot.com/admin/dashboard");
// 			}, 5000);


// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			console.log('Error reaching endpoint');
// 			console.log(jqXHR);
// 			console.log(textStatus);
// 			console.log(errorThrown);
// 		}
// 	});

// }
