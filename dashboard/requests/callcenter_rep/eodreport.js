var zoneid = $('#zoneid').val();
var operatorid = $('#userid').val();


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
let fetchordersURL = ordersURL + zoneid + "%22%2C%20%22datetime%22%3A%22" + dateString + "%22%2C%20%20%22assigned%22%3A%22" + operatorid + "%22%7D%2C%20%22order%22%3A%20%22id%20DESC%22%7D"


let ordercountURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22zoneid%22%3A%22"
let fetchordercountURL = ordercountURL + zoneid + "%22%2C%20%22datetime%22%3A%22" + dateString + "%22%2C%20%20%22assigned%22%3A%22" + operatorid + "%22%2C%20%22order%22%3A%20%22id%20DESC%22%7D"


let orderDeliveredURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22status%22%3A%22delivered%22%20%2C%20%22zoneid%22%3A%22"
let fetchorderDeliveredURL = orderDeliveredURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


let customerCountURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/count?where=%7B%22zoneid%22%3A%22"
let fetchcustomerCountURL = customerCountURL + zoneid + "%22%20%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"




// let donutchartUl = $("#baseurl").val() + "admin/get_graph_data_by_zone/" + zoneid;

const zgRefd = document.querySelector('#calls_table');
fetch('https://api.osdeliverygh.com/api/Supports/calls')
	.then(res => res.json())
	.then(
		function (data) {
			const newArray = data.results.filter(element => element.dateofcall.includes(dateString) == true);
			console.log(newArray);
			// return newArray
			zgRefd.setData(newArray)
		}
	)
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


const zgRefo = document.querySelector('#order-table');
fetch(fetchordersURL)
	.then(res => res.json())
	.then(data => zgRefo.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


const zgRefc = document.querySelector('#customer_table');
fetch(fetchCustomerURL)
	.then(res => res.json())
	.then(data => zgRefc.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));

function _exportDataaToCSV() {
	const data = zgRefd.getData();
	const csvData = Papa.unparse(data);
	console.log('--- exporting data ----', data, csvData);
	_downloadCSV('export-all.csv', csvData);
}

function _exportDataToCSV() {
	const data = zgRefo.getData();
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



//reload for calls
zgRefd.executeOnLoad(() => {
	// Add event listener to button
	reloadCallBtn.addEventListener('click', () => {
		zgRefd.refresh();
	});
});

//reload for orders
zgRefo.executeOnLoad(() => {
	// Add event listener to button
	reloadOBtn.addEventListener('click', () => {
		zgRefo.refresh();
	});
});

//reload for customers
zgRefc.executeOnLoad(() => {
	// Add event listener to button
	reloadCUBtn.addEventListener('click', () => {
		zgRefc.refresh();
	});
});


//fetchcustomercount
$.ajax({
	url: fetchcustomerCountURL,
	contentType: "application/json",
	type: "GET",
	// data: JSON.stringify(object),
	dataType: "JSON",
	success: function (data) {
		console.log(data);
		$("#customerscount").val(data.count);
		var customercount = data.count;
		orderscount(customercount);
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


//fetchorderscount
function orderscount(customercount) {
	$.ajax({
		url: fetchordercountURL,
		contentType: "application/json",
		type: "GET",
		// data: JSON.stringify(object),
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#orderscount").val(data.count);
			var ordercount = data.count;
			ordersdeliveredcount(customercount, ordercount);
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
	})
}

//fetchdeliveredorderscount
function ordersdeliveredcount(customercount, ordercount) {
	$.ajax({
		url: fetchorderDeliveredURL,
		contentType: "application/json",
		type: "GET",
		// data: JSON.stringify(object),
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#orderssDeliverredcount").val(data.count);
			var orderdeliverycount = data.count;
			Morris.Donut({
				element: 'donut-example',
				data: [{
						label: "Registered Users",
						value: customercount
					},
					{
						label: "All Orders",
						value: ordercount
					},
					{
						label: "Delivered Orders",
						value: orderdeliverycount
					}
				],
				resize: true
			});

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
	})
}





$("#order-calendar").kendoCalendar({

	change: function () {
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

		let fetchordersURL = ordersURL + zoneid + "%22%2C%20%22datetime%22%3A%22" + dateString + "%22%2C%20%20%22assigned%22%3A%22" + operatorid + "%22%7D%2C%20%22order%22%3A%20%22id%20DESC%22%7D"


		const zgRefo = document.querySelector('#zing-grid');
		fetch(fetchordersURL)
			.then(res => res.json())
			.then(data => zgRefo.setData(data.data))
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));
	}
});






$("#customer-calendar").kendoCalendar({

	change: function () {
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
		let fetchCustomerURL = CustomerURl + zoneid + "%22%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"

		const zgRefc = document.querySelector('#customer_table');
		fetch(fetchCustomerURL)
			.then(res => res.json())
			.then(data => zgRefc.setData(data.data))
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));

	}
});

$("#calls-calendar").kendoCalendar({

	change: function () {
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

		const zgRefd = document.querySelector('#calls_table');
		fetch('https://api.osdeliverygh.com/api/Supports/calls')
			.then(res => res.json())
			.then(
				function (data) {
					const newArray = data.results.filter(element => element.dateofcall.includes(dateString) == true);
					console.log(newArray);
					// return newArray
					zgRefd.setData(newArray)
				}
			)
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));

	}

});
