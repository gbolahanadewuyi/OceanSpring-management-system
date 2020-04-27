var baseurl = $("#baseurl").val();
var zoneid = $('#zoneid').val();

let verCUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Loyaltycards?filter=%7B%22where%22%3A%7B%22cardnumber%22%3A%22";
let vercuUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22";
let assignUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/update?where=%7B%22id%22%3A";

let fetchloyalty = baseurl + "admin/get_loyalty_data";
// let id = $('#apiId').val();
// let token = $('#apiToken').val();

const zgRef = document.querySelector('zing-grid');
fetch(fetchloyalty)
	.then(res => res.json())
	.then(function (data) {
		const newArray = data.filter(element => element.zoneid == zoneid);
		console.log(newArray);
		// return newArray
		zgRef.setData(newArray)
	})
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

zgRef.executeOnLoad(() => {
	// Add event listener to button
	reloadLBtn.addEventListener('click', () => {
		zgRef.refresh();
	});
});



function verifyCard() {
	$('#verCBtn').attr('disabled', true); //set button enable
	$('#verCBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');
	// let cardData = OSD00260010
	// 2015101200260010
	// 20151012
	// {
	// 	"cardnumber": $('#card').val()
	// };

	// var cardnumber = $('#card').val();
	var fid = $('#card').val();
	var itemId = fid.substring(3, fid.length);
	//   var info = $('#card').prepend('20151012');
	var c = 20151012;
	var cardnumber = c + itemId;




	var a = verCUrl + cardnumber + "%22%7D%7D";
	console.log(a);

	// console.log(cardData);
	$.ajax({
		async: true,
		crossDomain: true,
		url: verCUrl + cardnumber + "%22%7D%7D",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if ($.isEmptyObject(data) == true) {
				$("#verCard")[0].reset();
				$('#verCBtn').attr('disabled', false); //set button enable
				$('#verCBtn').html('verify');
				$("#loyaltyCard").modal("hide");
				$.notify({
					message: 'card number not valid'
				}, {
					type: 'danger',
				});
			} else if (data.data[0].assigned == 0) {
				// console.log(data);

				$("#verCard")[0].reset();
				$('#verCBtn').attr('disabled', false); //set button enable
				$('#verCBtn').html('verify');
				$("#loyaltyCard").modal("hide");
				$("#customer").modal();
			} else if (data.data[0].assigned !== 0) {
				$("#verCard")[0].reset();
				$('#verCBtn').attr('disabled', false); //set button enable
				$('#verCBtn').html('verify');
				$("#loyaltyCard").modal("hide");
				$.notify({
					message: 'card number as already been assigned'
				}, {
					type: 'danger',
				});

			}

			// } else if (jQuery.isEmptyObject(data)) {
			// 	$("#verCard")[0].reset();
			// 	$('#verCBtn').attr('disabled', false); //set button enable
			// 	$('#verCBtn').html('verify');
			// 	$("#loyaltyCard").modal("hide");
			// 	$.notify({
			// 		message: 'card number not valid'
			// 	}, {
			// 		type: 'danger',
			// 	});
			// }
			// isEmpty(data)



		},
		error: function (jqXHR, textStatus, errorThrown) {
			$.notify({
				message: "Error hitting endpoint check network connectivity"
			}, {
				type: "Danger"
			});
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}

function verifyTelephone() {
	$('#vercnBtn').attr('disabled', true); //set button enable
	$('#vercnBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	var customerNUM = $('#mobile').val();
	// var query = {
	// 	"where": {
	// 		"msisdn": customerNUM
	// 	}
	// };

	// var b = JSON.stringify(query);
	var a = vercuUrl + customerNUM + "%22%7D%7D"
	console.log(a);

	$.ajax({
		async: true,
		crossDomain: true,
		url: vercuUrl + customerNUM + "%22%7D%7D",
		type: "GET",
		dataType: "JSON",

		success: function (data) {
			console.log(data);
			// console.log(data.data[0].id);
			if ($.isEmptyObject(data) == true) {
				$("#verCNform")[0].reset();
				$('#vercnBtn').attr('disabled', false); //set button enable
				$('#vercnBtn').html('verify');
				$("#customer").modal("hide");
				$.notify({
					message: 'Customer number not recognized'
				}, {
					type: 'danger',
				});
			} else {
				$("#verCNform")[0].reset();
				$('#vercnBtn').attr('disabled', false); //set button enable
				$('#vercnBtn').html('verify');
				$("#customer").modal("hide");

				$("#assign").modal();

				$("#cid").val(data.data[0].id);
				$("#telephone").val(data.data[0].msisdn);
				$("#location").val(data.data[0].location);
				var firstname = data.data[0].firstname;
				var lastname = data.data[0].lastname;
				$("#name").val(firstname + " " + lastname);

			}

			// var obj = JSON.parse(data);
			// console.log(obj[0].id);







		},
		error: function (jqXHR, textStatus, errorThrown) {
			$.notify({
				message: "Error hitting endpoint check network connectivity"
			}, {
				type: "Danger"
			});
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}

function assignCN() {
	$('#asignBTN').attr('disabled', true); //set button enable
	$('#asignBTN').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var cardN = $('#customercard').val();
	var card = cardN.substring(3, cardN.length);

	var c = 20151012;
	var cardnumber = c + card;
	//   var info = $('#card').prepend('20151012');


	let cid = $('#cid').val();
	let assignData = {
		"cardnumber": cardnumber
	};

	console.log(assignData);
	$.ajax({
		url: assignUrl + cid + "%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(assignData),
		dataType: "json",
		success: function (data) {
			if (data.count !== 0) {
				console.log(data);
				$.notify({
					message: 'Card Assignment Successful'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");

				$("#assignCNForm")[0].reset();
				$("#assign").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);


			}
			if (data.count == 0) {
				$.notify({
					message: 'Error assigning cardnumber to customer'
				}, {
					type: 'danger',
				});


			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			$.notify({
				message: "Error hitting endpoint check network connectivity"
			}, {
				type: "Danger"
			});
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}

// var table;
// $(function () {
// 	table = $('#loyalty_data').DataTable({
// 		"processing": true, //Feature control the processing indicator.
// 		"serverSide": true, //Feature control DataTables' server-side processing mode.
// 		"searching": true,
// 		"order": [], //Initial no order.

// 		// Load data for the table's content from an Ajax source
// 		"ajax": {
// 			"url": apiUrl + "",
// 			"type": "POST",
// 			"beforeSend": function (xhr) {
// 				xhr.setRequestHeader('User-ID', id);
// 				xhr.setRequestHeader('Authorization', token);
// 			}
// 		},

// 		//Set column definition initialisation properties.
// 		"columnDefs": [{
// 				"orderable": true, //set not orderable
// 			},

// 		],
// 	});

// });
