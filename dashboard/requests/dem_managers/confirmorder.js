let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/";
let updateDelivery ="https://loyalty-dot-techloft-173609.appspot.com/api/Deliveries";
let SaveOrderUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders";
let updateUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/update?where=%7B%22id%22%3A"
let driverUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Riders/findOne?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22"
let deliveryUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Deliveries";
// let id = $('#apiId').val();
// let token = $('#apiToken').val();

// var table;
// $(function () {
// 	table = $('#order_data').DataTable({

// 		"processing": true, //Feature control the processing indicator.
// 		"serverSide": true, //Feature control DataTables' server-side processing mode.
// 		"searching": true,
// 		"order": [], //Initial no order.

// 		// Load data for the table's content from an Ajax source
// 		"ajax": {
// 			"url": $("#baseurl").val() + "dem/get_confirmed_orders",
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
			$("#edit_confirmed_order").modal();
			// $(".showBTN").text("Update");
			$("#id").val(data.id);
            
            
			$('.showBTN').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="updateOrder(' + data.data.id + ')"> Update </button>');

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}

  function order_delivery(){
	check_driver();
	
	
  }

function updateOrder() {


	$('#btnSave').attr('disabled', true); //set button enable
	$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> processing please wait...');

	// var where = {"id":1};
	//  var a = JSON.stringify(where);
	var id = $('#id').val();
	var regData = {

		"status": $('#status').val(),

	};

	// var b = updateUrl + a;


	// console.log(b);
	console.log(regData);

	$.ajax({
		url: updateUrl + id + "%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				$.notify({
					message: 'order updated successfully'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				// $("#editOrder")[0].reset();
				// $("#edit_order").modal("hide");
				// setTimeout(function () { // wait for 5 secs(2)
				// 	location.reload(); // then reload the page.(3)
				// }, 1000);
			}
			if (data.count == 0) {
				$.notify({
					message: 'Error updating order'
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
			// $('#userbtn').attr('disabled', false); //set button enable
			// $('#userbtn').html('Save');

		}

	});

}


function check_driver() {


	// $('#btnSave').attr('disabled', true); //set button enable
	// $('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	
	var riderNumber = $("#phoneOD").val();
	$.ajax({
		async: true,
		crossDomain: true,
		url: driverUrl + riderNumber + "%22%7D%7D",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if(data.msisdn == riderNumber){
				var  riderid = data.id;
				dispatch_order(riderid);
				updateOrder();
			}

			 if(data.error.statusCode == 404){
				$('#btnSave').attr('disabled', false); //set button enable
				$('#btnSave').html('Dispatch');
			
				$.notify({
					// options
					message: 'Error!, Driver number not valid'
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

 function dispatch_order(riderid){

    var orderid = $("#id").val();
	var object = {
		"id": 0,
	   "orderid": orderid,
	   "riderid": riderid,
	   
   };
	console.log(object);

	$.ajax({
		url: deliveryUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#editOrder")[0].reset();
			$('#btnSave').attr('disabled', false); //set button enable
			$('#btnSave').html('save changes');
			$("#edit_confirmed_order").modal("hide");
			$.notify({
				message: 'order dispatched successfully'
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
			$("#editOrder")[0].reset();
			$('#btnSave').attr('disabled', false); //set button enable
			$("#edit_confirmed_order").modal("hide");
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

function make_Order() {


	$('#btnSaveOrder').attr('disabled', true); //set button enable
	$('#btnSaveOrder').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var orderMobile = $("#mobileOrder").val();
	var itemOrder = $("#itemOrder").val();
	var quantityOrder = $("#quantityOrder").val();
	var dateOrder = $("#dateOrder").val();
	var statusOrder = $("#statusOrder").val();

	let object = {
		 "id": 0,
		"msisdn": orderMobile,
		"item": itemOrder,
		"quantity": quantityOrder,
		"datetime": dateOrder,
		"status": statusOrder
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
