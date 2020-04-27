let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/customers?filter=%7B%20%22order%22%3A%20%22id%20DESC%22%20%7D";
let customerUrl ="https://loyalty-dot-techloft-173609.appspot.com/api/Customers/"
// let id = $('#apiId').val();
// let token = $('#apiToken').val();

const zgRef = document.querySelector('zing-grid');
fetch('https://loyalty-dot-techloft-173609.appspot.com/api/customers?filter=%7B%20%22order%22%3A%20%22id%20DESC%22%20%7D')
  .then(res => res.json())
  .then(data => zgRef.setData(data.data))
  .catch(err => console.error('--- Error In Fetch Occurred ---', err));
// var table;
// $(function () {
// 	table = $('#customer_data').DataTable({
// 		"processing": true, //Feature control the processing indicator.
// 		"serverSide": true, //Feature control DataTables' server-side processing mode.
// 		// "paging": true,
// 		// "order": [], //Initial no order.

// 		// Load data for the table's content from an Ajax source
// 		"ajax": {
// 			"url": apiUrl, 
// 			"type": "GET",
			
// 		},
        
// 		//Set column definition initialisation properties.
// 		"columns": [
// 			{ "data": "id" },
//             { "data": "firstname" },
//             { "data": "lastname" },
//             { "data": "location" },
//             { "data": "landmark" },
//             { "data": "msisdn" },
// 			{ "data": "cardnumber" },
// 			{
// 				"data": "id",
// 				"searchable": false,
// 				"sortable": false,
// 				"render": function (id, type, full, meta) {

// 					return '<a href="javascript:void(0)"  onclick="edit_customer(' + id + ')"><i class="fa fa-edit" ></i></a>';
// 				}
// 			},
//         ]
// 	});

// });



function edit_customer(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: customerUrl + id,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#edit_customer").modal();
			$("#id").val(data.id);
			$("#cFirst").val(data.firstname);
			$("#cLast").val(data.lastname);
			$("#cMobile").val(data.msisdn);
			$("#cusLocation").val(data.location);s
			$("#cusADD").val(data.landmark);
			// $("#cusADD").val(data.cardnumber); 
			

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}    

function update_Customer() {

 
	$('#btnSave').attr('disabled', true); //set button enable
	$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Updating user data please wait...');

	// var where = {"id":1};
	//  var a = JSON.stringify(where);
	var id = $('#id').val();
	var regData = {
	       "id":	$("#id").val(),
		     "first"  :  $("#cFirst").val(),
			 "last" :	$("#cLast").val(),
			 "last" :	$("#cMobile").val(),
		     "location"  : $("#cusLocation").val(),
			 "cusAdd"  :   $("#cusADD").val(),
			 "date"  :   $("#date").val(),
			 

	};
  +   
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
				$("#editOrder")[0].reset();
				$("#edit_order").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
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
			$('#userbtn').attr('disabled', false); //set button enable
			$('#userbtn').html('Save');

		}

	});

}