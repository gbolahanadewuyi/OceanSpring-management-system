const zgRef = document.querySelector('zing-grid');
fetch('https://api.osdeliverygh.com/api/Orders')
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));

// Javascript code to execute after DOM content
// ZingGrid.registerMethod(_renderClassActivity);

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
