const zgRefc = document.querySelector('#customer_table');
fetch('https://loyalty-dot-techloft-173609.appspot.com/api/Customers')
	.then(res => res.json())
	.then(data => zgRefc.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));



function _exportDatasToCSV() {
	const data = zgRefc.getData();
	const csvData = Papa.unparse(data);
	console.log('--- exporting data ----', data, csvData);
	_downloadCSV('export-all.csv', csvData);
}



	// Add event listener to button
  reloadCBtn.addEventListener('click', () => {
	zgRefc.refresh();
  });




//ussd table
const zgRef = document.querySelector('#ussd-table');
fetch('https://loyalty-dot-techloft-173609.appspot.com/api/Registrations?filter=%7B%22where%22%3A%7B%22authenticated%22%3A%220%22%7D%2C%20%22order%22%3A%22id%20DESC%22%7D')
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
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


// zgRef.executeOnLoad(() => {
	// Add event listener to button
	reloadUBtn.addEventListener('click', () => {
		zgRef.refresh();
	});
// });
