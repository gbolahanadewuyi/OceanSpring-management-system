let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/";
let updateUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/update?where=%7B%22id%22%3A";
let SaveOrderUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders";
var checkorderURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/"
var assignUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/assignRep?access_token="
var zoneid = $('#zoneid').val();
var operatorname = $('#Username').val();
var token = $('#accessToken').val();
var operatorid = $('#userid').val();
var url = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
var patchorderurl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/"

var fetchorderUrl = url + zoneid + "%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D";
const zgRef = document.querySelector('zing-grid');
fetch(fetchorderUrl)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));

// Javascript code to execute after DOM content
ZingGrid.registerMethod(_renderClassActivity);

function _renderClassActivity(record, $cell) {

	return record.status.toLowerCase();
}





function renderActivityType(value) {
	let classes, type;
	switch (value) {
		case 'Confirmed':
			classes = '';
			type = 'confirmed';
			break;
		case 'Dispatched':
			classes = '';
			type = 'dispatched';
			break;
		case 'Delivered':
			classes = '';
			type = 'delivered';
			break;
		case 'Pending':
			classes = '';
			type = 'pending';
			break;
		default:
			classes = '';
			type = 'pending';
	}
	return `<i class="fas ${classes}"></i> <span class="${type}">${value}</span>`;
}

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

// Javascript code to execute after DOM content
const menuItem = document.querySelector('zg-menu-item[role="exportSelection"]');
// global reference to zing-grid on page
// const zgRef = document.querySelector('zing-grid');
let data = [];
let dataKeys = [];

let csvData = null;
zgRef.addEventListener('grid:select', function (e) {
	const data = e.detail.ZGData.data;
	csvData = Papa.unparse(data);
	console.log('--- exporting selected data ----', data, csvData);
});



// var table;
// $(function () {
// 	table = $('#order_data').DataTable({

// 		"processing": true, //Feature control the processing indicator.
// 		"serverSide": true, //Feature control DataTables' server-side processing mode.
// 		"searching": true,
// 		"order": [], //Initial no order.

// 		// Load data for the table's content from an Ajax source
// 		"ajax": {
// 			"url": $("#baseurl").val() + "admin/get_orders",
// 			"type": "GET",


// 		},
// 		// "columnDefs": [{
// 		// 		"orderable": false, //set not orderable
// 		// 	},

// 		// ],
// 		//Set column definition initialisation properties.
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
// 				"data": "item"
// 			},
// 			{
// 				"data": "quantity"
// 			},
// 			{
// 				"data": "datetime"
// 			},
// 			{
// 				"data": "status"
// 			},

// 			{
// 				"data": "id",
// 				"searchable": false,
// 				"sortable": false,
// 				"render": function (id, type, full, meta) {

// 					return '<a href="javascript:void(0)"  onclick="edit_order(' + id + ')"><i class="fa fa-edit" ></i></a>';
// 				}
// 			},

// 		]
// 	});


// });

function reload_table() {
	table.ajax.reload(null, false); //reload datatable ajax
}







function make_Order() {


	$('#btnSaveOrder').attr('disabled', true); //set button enable
	$('#btnSaveOrder').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var Mobile = $("#mobileOrder").val();
	var mobileid = Mobile.substring(1, Mobile.length);
	var c = 233;


	var phonenumber = c + mobileid;
	var itemOrder = $("#itemOrder").val();
	var quantityOrder = $("#quantityOrder").val();
	var dateOrder = $("#dateOrder").val();


	let object = {
		"id": 0,
		"msisdn": phonenumber,
		"item": itemOrder,
		"quantity": quantityOrder,
		"datetime": dateOrder,
		"zoneid": zoneid,
		"status": "Confirmed",
		"assigned": operatorid
	};

	console.log(object);

	$.ajax({
		url: SaveOrderUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#makeOrder")[0].reset();
			$('#btnSaveOrder').attr('disabled', false); //set button enable
			$('#btnSaveOrder').html('save changes');
			$("#order").modal("hide");
			$.notify({
				message: 'order updated successfully'
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
			$("#makeOrder")[0].reset();
			$('#btnSaveOrder').attr('disabled', false); //set button enable
			$('#btnSaveOrder').html('save changes');
			$("#order").modal("hide");
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



// function check_order(id) {
// 	$("div.form-group").removeClass("has-error"); // clear error class
// 	$("div.form-group").removeClass("has-success"); // clear error class
// 	$(".text-danger").empty();
// 	console.log(id);
// 	$.ajax({
// 		async: true,
// 		crossDomain: true,
// 		url: checkorderURL + id,
// 		//   headers: {
// 		// 	"content-type":"application/json"
// 		//   },
// 		type: "GET",
// 		dataType: "JSON",
// 		success: function (data) {
// 			console.log(data);
// 			if (data.assigned == null) {
// 				assign_order(id);

// 			} else if (data.assigned == operatorid) {
// 				edit_order(id)
// 			} else {

// 				$.notify({
// 					// options
// 					message: 'Oops, sorry Order ' + data.id + ' has been assigned to agent ' + data.assigned + ' '
// 				}, {
// 					// settings
// 					type: 'danger'
// 				});

// 			}


// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			console.log("error hitting endpoint");
// 			console.log("textStatus");
// 			console.log("errorThrown");
// 		}
// 	});
// }


// function assign_order(id) {

// 	let object = {
// 		"orderId": id
// 	}

// 	$.ajax({
// 		url: assignUrl + token,
// 		contentType: "application/json",
// 		type: "POST",
// 		data: JSON.stringify(object),
// 		dataType: "json",
// 		success: function (data) {
// 			console.log(data);
// 			$.notify({
// 				// options
// 				message: 'This order has now been assigned to you. you are to follow up on this order'
// 			}, {
// 				// settings
// 				type: 'success'
// 			});

// 			edit_order(id)
// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			console.log('error hitting endpoint');
// 			console.log(textStatus);
// 			console.log(errorThrown);
// 			console.log(jqXHR);
// 			$.notify({
// 				// options
// 				message: 'Error reaching endpoint, check your network connectivity'
// 			}, {
// 				// settings
// 				type: 'danger'
// 			});


// 		}

// 	});

// }

function edit_order(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: apiUrl + id,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);

			$("#edit_order").modal();
			$(".modal-title").text("Edit Order");
			// $(".showBTN").text("Update");
			$("#id").val(data.id);
			$("#mobile").val(data.msisdn);
			$("#item").val(data.item);
			$("#quantity").val(data.quantity);
			$("#date").val(data.datetime);
			// $("#status").val(data.status);
			$("#Repid").val(data.assigned);
			$('#statusupdate').append('<option selected="selected" value=" ' + data.status + '" >' + data.status + '</option>');
			// $('#multiSelect6').append(data);

			$('.showBTN').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="updateOrder(' + data.id + ')"> Update </button>');



		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}

function updateOrder() {


	$('#btnSave').attr('disabled', true); //set button enable
	$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Updating user data please wait...');

	// var where = {"id":1};
	//  var a = JSON.stringify(where);
	var id = $('#id').val();
	var regData = {
	


		// "id": $("#id").val(),
		"ordernumber": "",
		"msisdn": $("#mobile").val(),
		"status": $('#statusupdate').val(),
		"datetime": $('#date').val(),
		"assigned": $('#Repid').val(),
		"item": $('#item').val(),
		"quantity": $('#quantity').val(),
		"zoneid": zoneid,




	};




	// console.log(b);
	console.log(regData);

	$.ajax({
		url: patchorderurl + id,
		contentType: "application/json",
		type: "PATCH",
		data: JSON.stringify(regData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$.notify({
				message: 'order updated successfully'
			}, {
				type: 'success'
			});
			// $.notify("Product created successfully");
			$("#editOrder")[0].reset();
			$("#edit_order").modal("hide");
			setTimeout(function () { // wait for 5 secs(2)
				location.reload(); // then reload the page.(3)
			}, 1000);
			// if (data.count !== 0) {
			// 	console.log('success');
			// 	$.notify({
			// 		message: 'order updated successfully'
			// 	}, {
			// 		type: 'success'
			// 	});
			// 	// $.notify("Product created successfully");
			// 	$("#editOrder")[0].reset();
			// 	$("#edit_order").modal("hide");
			// 	setTimeout(function () { // wait for 5 secs(2)
			// 		location.reload(); // then reload the page.(3)
			// 	}, 1000);
			// }
			// if (data.count == 0) {
			// 	$.notify({
			// 		message: 'Error updating order'
			// 	}, {
			// 		type: 'danger'
			// 	});
			// }

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

		}

	});

}
