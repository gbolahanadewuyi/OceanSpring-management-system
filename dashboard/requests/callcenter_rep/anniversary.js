var zoneid = $('#zoneid').val();
let fetchanniversary = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/getAnniversary?date="
var currentdate = new Date();
month = '' + (currentdate.getMonth() + 1),
	day = '' + currentdate.getDate(),
	year = currentdate.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

var dateString = [year, month, day].join('-');
var fetchanniversaryURL = fetchanniversary + dateString
const zgRef = document.querySelector('zing-grid');

fetch(fetchanniversaryURL)
	.then(res => res.json())
	.then(
		function (data) {
			const newArray = data.results.filter(element => element.zoneid == zoneid);
			zgRef.setData(newArray)
		}
	)
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));

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




$("#calendar").kendoCalendar({

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
		var fetchanniversaryURL = fetchanniversary + dateString
		fetch(fetchanniversaryURL)
			.then(res => res.json())
			.then(
				function (data) {
					const newArray = data.results.filter(element => element.zoneid == zoneid);
					zgRef.setData(newArray)
				}

			)
			.catch(err => console.error('--- Error In Fetch Occurred ---', err));
	}
});
