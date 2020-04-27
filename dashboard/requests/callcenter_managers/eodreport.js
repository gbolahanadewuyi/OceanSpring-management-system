var zoneid = $('#zoneid').val();
var baseurl = $('#baseurl').val();

var d = new Date(),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

var dateString = [year, month, day].join('-');



// let callurl = "https://loyalty-dot-techloft-173609.appspot.com/api/Supports/calls?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
// let fetchurl = callurl + zoneid + "%22%2C%20%22dateofcall%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"

let CustomerURl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
let fetchCustomerURL = CustomerURl + zoneid + "%22%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%20%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"

let ordersURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
let fetchordersURL = ordersURL + zoneid + "%22%7D%7D"


let ordercountURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22zoneid%22%3A%22"
let fetchordercountURL = ordercountURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


let orderDeliveredURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22status%22%3A%22delivered%22%20%2C%20%22zoneid%22%3A%22"
let fetchorderDeliveredURL = orderDeliveredURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


let orderCancelledURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/count?where=%7B%22status%22%3A%22Cancelled%22%20%2C%20%22zoneid%22%3A%22"
let fetchCancelledURL = orderCancelledURL + zoneid + "%22%20%2C%20%22datetime%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"


let customerCountURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/count?where=%7B%22zoneid%22%3A%22"
let fetchcustomerCountURL = customerCountURL + zoneid + "%22%20%2C%20%22entrydate%22%3A%20%22" + dateString + "T00%3A00%3A00.000Z%22%7D"





$.ajax({
	url: baseurl + "admin/get_eodreport_data_by_zone/" + zoneid + "/" + dateString,
	contentType: "application/json",
	type: "GET",
	// data: JSON.stringify(object),
	dataType: "JSON",
	success: function (data) {
		console.log(data);

		$(".CR").html(data.customer);
		$(".OT").html(data.orders);
		$(".OD").html(data.deliveredorders);
		$(".OP").html(data.pendingorders);
		$(".TQO").html(data.total_quantity_ordered);
		$(".TQD").html(data.total_quantity_delivered);
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


const zgRef = document.querySelector('zing-grid');
fetch('https://api.osdeliverygh.com/api/Supports/calls')
	.then(res => res.json())
	.then(
		function (data) {
			const newArray = data.results.filter(element => element.dateofcall.includes(dateString) == true);
			console.log(newArray);

			// return newArray
			zgRef.setData(newArray)


			var callcount = newArray.length
			$(".CM").html(callcount);

			const callanswered = newArray.filter(element => element.feedback == 'Answered')
			var callansweredcount = callanswered.length
			$(".CA").html(callansweredcount);

			const callunanswered = newArray.filter(element => element.feedback !== 'Answered')
			var callunansweredcount = callunanswered.length
			$(".CU").html(callunansweredcount);




		}
	)
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));

const zgRefc = document.querySelector('#order_table');
fetch(fetchordersURL)
	.then(res => res.json())
	.then(
		function (data) {
			const newArray = data.data.filter(element => element.datetime.includes(dateString) == true);
			console.log(newArray);

			// return newArray
			zgRefc.setData(newArray)

		}
	)
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


const zgRefd = document.querySelector('#customer_table');
fetch(fetchCustomerURL)
	.then(res => res.json())
	.then(data => zgRefd.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


function _exportDataaToCSV() {
	const data = zgRef.getData();
	const csvData = Papa.unparse(data);
	console.log('--- exporting data ----', data, csvData);
	_downloadCSV('export-all.csv', csvData);
}

function _exportDataToCSV() {
	const data = zgRefc.getData();
	const csvData = Papa.unparse(data);
	console.log('--- exporting data ----', data, csvData);
	_downloadCSV('export-all.csv', csvData);
}

function _exportDatasToCSV() {
	const data = zgRefd.getData();
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

// zgRef.executeOnLoad(() => {
// 	// Add event listener to button
// 	reloadUBtn.addEventListener('click', () => {
// 	zgRef.refresh();
//   });
// });

//reload calls table
zgRef.executeOnLoad(() => {
	// Add event listener to button
	reloadCallBtn.addEventListener('click', () => {
		zgRef.refresh();
	});
});
//reload order table
zgRefc.executeOnLoad(() => {
	// Add event listener to button
	reloadOBtn.addEventListener('click', () => {
		zgRefc.refresh();
	});
});

//reload order table
zgRefd.executeOnLoad(() => {
	// Add event listener to button
	reloadCUBtn.addEventListener('click', () => {
		zgRefd.refresh();
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
// 		console.log(customercount)
// 		Morris.Donut({
// 			element: 'customer-example',
// 			data: [{
// 					label: "Customer Count",
// 					value: customercount
// 				}
// 				// {
// 				// 	label: "Delivered Orders",
// 				// 	value: orderdelivered
// 				// },
// 				// {
// 				// 	label: "Cancelled Orders",
// 				// 	value: cancelledcount
// 				// }
// 			],
// 			resize: true
// 		});

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


// //fetchorderscount

// $.ajax({
// 	url: fetchordercountURL,
// 	contentType: "application/json",
// 	type: "GET",
// 	// data: JSON.stringify(object),
// 	dataType: "JSON",
// 	success: function (data) {
// 		console.log(data);
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
// });

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
// 			var orderdelivered = data.count;
// 			ordersCancelledcount(ordercount, orderdelivered)

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

// //fetchcancelledorderscount
// function ordersCancelledcount(ordercount, orderdelivered) {
// 	$.ajax({
// 		url: fetchCancelledURL,
// 		contentType: "application/json",
// 		type: "GET",
// 		// data: JSON.stringify(object),
// 		dataType: "JSON",
// 		success: function (data) {
// 			console.log(data);
// 			var cancelledcount = data.count;
// 			Morris.Donut({
// 				element: 'order-example',
// 				data: [{
// 						label: "All Orders",
// 						value: ordercount
// 					},
// 					{
// 						label: "Delivered Orders",
// 						value: orderdelivered
// 					},
// 					{
// 						label: "Cancelled Orders",
// 						value: cancelledcount
// 					}
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



$("#summary-calendar").kendoCalendar({

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
		$.ajax({
			url: baseurl + "admin/get_eodreport_data_by_zone/" + zoneid + "/" + dateString,
			contentType: "application/json",
			type: "GET",
			// data: JSON.stringify(object),
			dataType: "JSON",
			success: function (data) {
				console.log(data);

				$(".CR").html(data.customer);
				$(".OT").html(data.orders);
				$(".OD").html(data.deliveredorders);
				$(".OP").html(data.pendingorders);
				$(".TQO").html(data.total_quantity_ordered);
				$(".TQD").html(data.total_quantity_delivered);
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

		// const zgRef = document.querySelector('zing-grid');
		fetch('https://api.osdeliverygh.com/api/Supports/calls')
			.then(res => res.json())
			.then(
				function (data) {
					const newArray = data.results.filter(element => element.dateofcall.includes(dateString) == true);
					console.log(newArray);

					// // return newArray
					// zgRef.setData(newArray)


					var callcount = newArray.length
					$(".CM").html(callcount);

					const callanswered = newArray.filter(element => element.feedback == 'Answered')
					var callansweredcount = callanswered.length
					$(".CA").html(callansweredcount);

					const callunanswered = newArray.filter(element => element.feedback !== 'Answered')
					var callunansweredcount = callunanswered.length
					$(".CU").html(callunansweredcount);




				}
			)
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));


	}
});




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
		let fetchordersURL = ordersURL + zoneid + "%22%7D%7D";

		const zgRefc = document.querySelector('#order_table');
		fetch(fetchordersURL)
			.then(res => res.json())
			.then(
				function (data) {
					const newArray = data.data.filter(element => element.datetime.includes(dateString) == true);
					console.log(newArray);

					// return newArray
					zgRefc.setData(newArray)

				}
			)
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

		const zgRefd = document.querySelector('#customer_table');
		fetch(fetchCustomerURL)
			.then(res => res.json())
			.then(data => zgRefd.setData(data.data))
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

		const zgRef = document.querySelector('zing-grid');
		fetch('https://api.osdeliverygh.com/api/Supports/calls')
			.then(res => res.json())
			.then(
				function (data) {
					const newArray = data.results.filter(element => element.dateofcall.includes(dateString) == true);
					console.log(newArray);
					// return newArray
					zgRef.setData(newArray)


				}
			)
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));

	}

});
