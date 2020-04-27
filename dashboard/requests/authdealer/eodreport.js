var zoneid = $('#zoneid').val();


// var currentDate = new Date();

// var date = currentDate.getDate();
// var month = currentDate.getMonth(); //Be careful! January is 0 not 1
// var year = currentDate.getFullYear();

// var dateString = year + "-" + (month + 1) + "-" + date;

var d = new Date(),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

var dateString = [year, month, day].join('-');


let CustomerURl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
let fetchCustomerURL = CustomerURl + zoneid + "%22%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"

let ordersURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
let fetchordersURL = ordersURL + zoneid + "%22%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"


let ordercountURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22zoneid%22%3A%22"
let fetchordercountURL = ordercountURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


let orderDeliveredURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22status%22%3A%22delivered%22%20%2C%20%22zoneid%22%3A%22"
let fetchorderDeliveredURL = orderDeliveredURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


let customerCountURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/count?where=%7B%22zoneid%22%3A%22"
let fetchcustomerCountURL = customerCountURL + zoneid + "%22%20%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"




// let donutchartUl = $("#baseurl").val() + "admin/get_graph_data_by_zone/" + zoneid;


const zgRef = document.querySelector('zing-grid');
fetch(fetchordersURL)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


const zgRefc = document.querySelector('#customer_table');
fetch(fetchCustomerURL)
	.then(res => res.json())
	.then(data => zgRefc.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


function _exportDataToCSV() {
	const data = zgRef.getData();
	const csvData = Papa.unparse(data);
	console.log('--- exporting data ----', data, csvData);
	_downloadCSV('export-all.csv', csvData);
}


function _exportDatasToCSV() {
	const data = zgRefc.getData();
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

//reload for orders
zgRef.executeOnLoad(() => {
	// Add event listener to button
	reloadOBtn.addEventListener('click', () => {
	zgRef.refresh();
  });
});

//reload for customer
zgRefc.executeOnLoad(() => {
	// Add event listener to button
	reloadCBtn.addEventListener('click', () => {
		zgRefc.refresh();
  });
});



// //fetchcustomercount
// $.ajax({
// 	url: fetchcustomerCountURL,
// 	contentType: "application/json",
// 	type: "GET",
// 	// data: JSON.stringify(object),
// 	dataType: "JSON",
// 	success: function (data) {
// 		console.log(data);
// 		$("#customerscount").val(data.count);
// 		var customercount = data.count;
		
// 		// orderscount(customercount);
// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
// 		$.notify({
// 			message: "Error hitting endpoint check network connectivity"
// 		}, {
// 			type: "Danger"
// 		});
// 		console.log(jqXHR);
// 		console.log(textStatus);
// 		console.log(errorThrown);
// 	}
// });

// //orderscount
// $.ajax({
// 	url: fetchordercountURL,
// 	contentType: "application/json",
// 	type: "GET",
// 	// data: JSON.stringify(object),
// 	dataType: "JSON",
// 	success: function (data) {
// 		console.log(data);
// 		$("#orderscount").val(data.count);
// 		var ordercount = data.count;
	
// 		ordersdeliveredcount(ordercount);
// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
// 		$.notify({
// 			message: "Error hitting endpoint check network connectivity"
// 		}, {
// 			type: "Danger"
// 		});
// 		console.log(jqXHR);
// 		console.log(textStatus);
// 		console.log(errorThrown);
// 	}
// })


// //fetchdeliveredorderscount
// function ordersdeliveredcount(ordercount) {
// 	$.ajax({
// 		url: fetchorderDeliveredURL,
// 		contentType: "application/json",
// 		type: "GET",
// 		// data: JSON.stringify(object),
// 		dataType: "JSON",
// 		success: function (data) {
// 			console.log(data);
// 			$("#orderssDeliverredcount").val(data.count);
// 			var orderdeliveredcount = data.count;
// 			Morris.Donut({
// 				element: 'order-count',
// 				data: [
// 					{
// 						label: "All 0rders",
// 						value: ordercount
// 					},
// 					{
// 						label: "Delivered  0rders",
// 						value: orderdeliveredcount
// 					},

// 				],
// 				resize: true
// 			});


// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			$.notify({
// 				message: "Error hitting endpoint check network connectivity"
// 			}, {
// 				type: "Danger"
// 			});
// 			console.log(jqXHR);
// 			console.log(textStatus);
// 			console.log(errorThrown);
// 		}
// 	})

// }


















$("#calendar").kendoCalendar({

	change: function () {
		document.getElementById('order-count').style.display = 'none';
		document.getElementById('orders-count').style.display = 'block';
		var value = this.value();
		console.log(value); //value is the selected date in the calendar

		var currentdate = new Date(value);
		month = '' + (currentdate.getMonth() + 1),
			day = '' + currentdate.getDate(),
			year = currentdate.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		var dateString = [year, month, day].join('-');
		console.log(dateString)
		// var fetchanniversaryURL = fetchanniversary + dateString


		let fetchordersURL = ordersURL + zoneid + "%22%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"
		let fetchordercountURL = ordercountURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"
		let fetchorderDeliveredURL = orderDeliveredURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"

		const zgRef = document.querySelector('zing-grid');
		fetch(fetchordersURL)
			.then(res => res.json())
			.then(data => zgRef.setData(data.data))
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));


		// $.ajax({
		// 	url: fetchordercountURL,
		// 	contentType: "application/json",
		// 	type: "GET",
		// 	// data: JSON.stringify(object),
		// 	dataType: "JSON",
		// 	success: function (data) {
		// 		console.log(data);
		// 		$("#orderscount").val(data.count);
		// 		var ordercount = data.count;
			
		// 		ordersdeliveredcount(ordercount);
		// 	},
		// 	error: function (jqXHR, textStatus, errorThrown) {
		// 		$.notify({
		// 			message: "Error hitting endpoint check network connectivity"
		// 		}, {
		// 			type: "Danger"
		// 		});
		// 		console.log(jqXHR);
		// 		console.log(textStatus);
		// 		console.log(errorThrown);
		// 	}
		// })


		//fetchdeliveredorderscount
		// function ordersdeliveredcount(ordercount) {
		// 	$.ajax({
		// 		url: fetchorderDeliveredURL,
		// 		contentType: "application/json",
		// 		type: "GET",
		// 		// data: JSON.stringify(object),
		// 		dataType: "JSON",
		// 		success: function (data) {
		// 			console.log(data);
		// 			$("#orderssDeliverredcount").val(data.count);
		// 			var orderdeliveredcount = data.count;
		// 			Morris.Donut({
		// 				element: 'orders-count',
		// 				data: [
		// 					{
		// 						label: "All 0rders",
		// 						value: ordercount
		// 					},
		// 					{
		// 						label: "Delivered  0rders",
		// 						value: orderdeliveredcount
		// 					},

		// 				],
		// 				resize: true
		// 			});


		// 		},
		// 		error: function (jqXHR, textStatus, errorThrown) {
		// 			$.notify({
		// 				message: "Error hitting endpoint check network connectivity"
		// 			}, {
		// 				type: "Danger"
		// 			});
		// 			console.log(jqXHR);
		// 			console.log(textStatus);
		// 			console.log(errorThrown);
		// 		}
		// 	})

		// }


	}


});


$("#calendar2").kendoCalendar({

	change: function () {
		document.getElementById('customer-count').style.display = 'none';
		document.getElementById('customers-count').style.display = 'block';
		var value = this.value();
		console.log(value); //value is the selected date in the calendar

		var currentdate = new Date(value);
		month = '' + (currentdate.getMonth() + 1),
			day = '' + currentdate.getDate(),
			year = currentdate.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		var dateString = [year, month, day].join('-');
		console.log(dateString)
		// var fetchanniversaryURL = fetchanniversary + dateString

		let fetchCustomerURL = CustomerURl + zoneid + "%22%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"
		let fetchcustomerCountURL = customerCountURL + zoneid + "%22%20%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


		const zgRefc = document.querySelector('#customer_table');
		fetch(fetchCustomerURL)
			.then(res => res.json())
			.then(data => zgRefc.setData(data.data))
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));

		//fetchcustomercount
		// $.ajax({
		// 	url: fetchcustomerCountURL,
		// 	contentType: "application/json",
		// 	type: "GET",
		// 	// data: JSON.stringify(object),
		// 	dataType: "JSON",
		// 	success: function (data) {
		// 		console.log(data);
		// 		$("#customerscount").val(data.count);
		// 		var customercount = data.count;
		// 		Morris.Donut({
		// 			element: 'customers-count',
		// 			data: [{
		// 					label: "Registered Users",
		// 					value: customercount
		// 				},
						

		// 			],
		// 			resize: true
		// 		});
		// 		// orderscount(customercount);
		// 	},
		// 	error: function (jqXHR, textStatus, errorThrown) {
		// 		$.notify({
		// 			message: "Error hitting endpoint check network connectivity"
		// 		}, {
		// 			type: "Danger"
		// 		});
		// 		console.log(jqXHR);
		// 		console.log(textStatus);
		// 		console.log(errorThrown);
		// 	}
		// });


	}


});
