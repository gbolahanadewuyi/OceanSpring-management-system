var zoneid = $('#zoneid').val();
var username = $('#username').val();
var baseurl = $('#baseurl').val();
var stockledger = 'https://loyalty-dot-techloft-173609.appspot.com/api/Admins/stockLegder'

let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/";
let updateUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/update?where=%7B%22id%22%3A";
let SaveStockUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Stockreceiveds";
let dispatchStockUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Stockdispatcheds";

var zone = 'https://loyalty-dot-techloft-173609.appspot.com/api/Zones'
var dems = "https://loyalty-dot-techloft-173609.appspot.com/api/Dems"

// let id = $('#apiId').val();
// let token = $('#apiToken').val();

var d = new Date(),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

var dateString = [year, month, day].join('-');


const zgRef = document.querySelector('zing-grid');
fetch(stockledger)
	.then(res => res.json())
	.then(
		function (data) {
			const preArray = data.results.filter(element => element.date !== null);
			console.log(preArray);
			const postArray = preArray.filter(element => element.date.includes(dateString) == true && element.zoneid == zoneid)
			console.log(postArray);
			zgRef.setData(postArray);

		}
	)

	.catch(err => console.error('--- Error In Fetch Occurred ---', err));

///
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
	url: dems,
	contentType: "application/json",
	type: "GET",
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		var html = "";
		var i;
		for (i = 0; i < data.data.length; i++) {
			html += '<option value="' + data.data[i].id + '">' + data.data[i].name + '</option>';
			$('#depot').html('<option value="">Select Dem</option>' + html);


		}
	},
	error: function (jqXHR, textStatus, errorThrown) {
		console.log('Error reaching endpoint');
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});


function keep_stock() {


	$('#stockBTN').attr('disabled', true); //set button enable
	$('#stockBTN').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	var stockdate = $('#date').val();
	var item = $("#item").val();
	var quantity = $("#quantity").val();
	var wbnum = $("#wbnum").val();
	var drivername = $("#drivername").val();
	var vechileno = $("#vechileno").val();
	// var recievedby = $("#recievedby").val();

	let object = {
		"id": 0,
		"stockdate": stockdate,
		"item": item,
		"quantity": quantity,
		"waybillnumber": "",
		"drivername": "",
		"vehicleregistration": "",
		"receivedby": username,
		"zoneid": ""
	};

	console.log(object);

	$.ajax({
		url: SaveStockUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#stockform")[0].reset();
			// $('#stockBTN').attr('disabled', false); //set button enable
			// $("#stock").modal("hide");
			$.notify({
				message: 'Stock record saved successfully'
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
			$("#stockform")[0].reset();
			// $('#stockBTN').attr('disabled', false); //set button enable
			// $("#stock").modal("hide");
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


// function showinput(that) {
// 	if (that.value == "OTHER") {
// 		$("#preachh").replaceWith($("#otherpreacher"));
// 		$("#otherpreacher").attr("style", "display: block");
// 		// document.getElementById("#otherpreacher").style.visibility="visible";
// 		var item = $("#d-item").val();
// 	var quantity = $("#d-quantity").val();
// 	var dispatchtype = $("#Dtype").val();
// 	var zone = $("#RRzone").val();
// 	var riderassigned = $("#RRname").val();
// 	var vehicleregistration = $("#RVno").val();
// 	var dispatchtime = $("#Tdispatch").val();
// 	}
// }

function showinput(that) {
	console.log(that.value);
	if (that.value == 'DAMAGES' || that.value == 'REBAGGING') {
		$("#depot").attr("style", "display: none");
		$("#rider").attr("style", "display: none");
		$("#vnumber").attr("style", "display: none");


	} else {
		$("#depot").attr("style", "display: block");
		$("#rider").attr("style", "display: block");
		$("#vnumber").attr("style", "display: block");


		$("#depot").attr("required", true);
		$("#rider").attr("required", true);
		$("#vnumber").attr("required", true);

	}
}

function checkSTOCK() {
	totalstock();
}


function totalstock() {
	var quantityDispatched = $("#d-quantity").val();

	$.ajax({
		async: true,
		crossDomain: true,
		url: $("#baseurl").val() + "admin/get_totalstock/" + zoneid,
		type: "GET",
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.data.status == 200) {
				console.log(data);
				var totalstock = parseInt(data.data.totalstock)
				if (totalstock > quantityDispatched) {
					dispatch_stock();
				} else {
					$.notify({
						message: "Quantity being dispatched is more than quantity in stock"
					}, {
						type: 'danger'
					});
				}
			} else {
				$.notify({
					message: "Error"
				}, {
					type: 'danger'
				});
			}
		},

		error: function (jqXHR, textStatus, errorThrown) {
			console.log("Error reaching endpoint");
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);

		}



	});
}

function dispatch_stock() {


	$('#dstockBtn').attr('disabled', true); //set button enable
	$('#dstockBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	var item = $("#d-item").val();
	var quantity = $("#d-quantity").val();
	var dispatchtype = $("#Dtype").val();

	var depot_dispatched_to = $("#depot").val();

	var riderassigned = $("#RRname").val();
	var vehicleregistration = $("#RVno").val();
	var dispatchtime = $("#Tdispatch").val();
	// var dispatchedby = $("#dispatchBy").val();

	let object = {
		"id": 0,
		"item": item,
		"quantity": quantity,
		"dispatchtype": dispatchtype,
		"riderassigned": riderassigned,
		"vehicleregistration": vehicleregistration,
		"dispatchtime": dispatchtime,
		"dispatchedby": username,
		"zoneid": depot_dispatched_to
	};

	console.log(object);

	$.ajax({
		url: dispatchStockUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#d-stockform")[0].reset();
			$('#dstockBtn').attr('disabled', false); //set button enable
			$('#dstockBtn').html('Save');
			$.notify({
				message: 'Stock dispatched successfully'
			}, {
				type: 'success'
			});


			// setTimeout(function () { // wait for 5 secs(2)
			// 	location.reload(); // then reload the page.(3)
			// }, 1000);

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log('error hitting endpoint');
			console.log(textStatus);
			console.log(errorThrown);
			console.log(jqXHR);
			$("#d-stockform")[0].reset();
			$('#dstockBtn').attr('disabled', false); //set button enable
			$('#dstockBtn').html('Save');
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
