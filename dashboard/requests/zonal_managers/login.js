let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins/verify";
let loginUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins/login";

function login() {
	window.swal({
		title: "Logging in...",
		text: "Please wait",
		imageUrl: $('#baseurl').val()  + "dashboard/images/91.gif",
		showConfirmButton: false,
		allowOutsideClick: false
	});

	var logData = {
		"email": $('#email').val(),
		"password": $('#password').val(),

	}

	console.log(logData);

	$.ajax({
		url: apiUrl,
		"headers": {
			"content-type": "application/json"
		},
		type: "POST",
		data: JSON.stringify(logData),
		dataType: "JSON",
		success: function (data) {

		},

		error: function (jqXHR, textStatus, errorThrown) {
			swal("oops", "Email or password incorect", "error");
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
