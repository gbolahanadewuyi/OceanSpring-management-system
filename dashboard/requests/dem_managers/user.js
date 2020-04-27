var apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/?filter=%7B%20%22order%22%3A%20%22datetime%20DESC%22%20%7D";
var userUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/";
var orderDetail = "https://loyalty-dot-techloft-173609.appspot.com/api/Orderdetails";
var postUrl = $('#baseurl').val() + 'admin/userdata';
var justask = '';

const zgRef = document.querySelector('zing-grid');
fetch('https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/?filter=%7B%20%22order%22%3A%20%22datetime%20DESC%22%20%7D')
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


function user_register_post() {


	$('#userBtn').attr('disabled', true); //set button enable
	$('#userBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');



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
		"zoneid": $('#zone').val(),
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
		"frequency": $('#for').val(),

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
				$("#userData")[0].reset();
				$("#add-user").modal("hide");
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

			$('#userbtn').attr('disabled', false); //set button enable
			$('#userbtn').html('Save');
			$("#userData")[0].reset();
			$("#add-user").modal("hide");

		}

	});

}


function ussd_user_post() {


	$('#userEBtn').attr('disabled', true); //set button enable
	$('#userEBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');



	//var fid = $('#phone').val();
	//var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	//var c = 233;
     //var phonenumber = c + itemId;
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
		"zoneid": $('#Ezone').val(),
		"ro": $('#EArname').val(),
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
				$.notify({
					message: 'User registration completion succesful'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$("#userData")[0].reset();
				$("#add-user").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			}
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



// var table;
// $(function () {
// 	table = $('#user_data').DataTable({	
// 		"processing": true, //Feature control the processing indicator.
// 		"serverSide": true, //Feature control DataTables' server-side processing mode.
// 		// "order": [], //Initial no order.

// 		// Load data for the table's content from an Ajax source

// 		"ajax": {
// 			"url": apiUrl,
// 			"type": "GET",

// 		},


// 		"columns": [
// 			{

// 				"data": "id"
// 			},
// 			{

// 				"data": "name"
// 			},
// 			{
// 				"data": "msisdn"
// 			},
// 			{
// 				"data": "cardnumber"
// 			},
// 			{
// 				"data": "datetime"
// 			},
// 			{
// 				"data": "id",
// 				"searchable": false,
// 				"sortable": false,
// 				"render": function (id, type, full, meta) {

// 					return '<a href="javascript:void(0)"  onclick="edit_user(' + id + ')"><i class="fa fa-edit" ></i></a>';
// 				}
// 			},


// 		]
// 	});

// });

function edit_user(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: userUrl + id,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#add-user").modal();
			$(".modal-title").text("Edit User-data");
			// $("#id").val(data.id);
			$("#Efirst").val(data.name);
			$("#Ephone").val(data.msisdn);
			$("#Ecard").val(data.cardnumber);
			$('#userBtn').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="update_ussd_user()"> Update </button>');

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}
