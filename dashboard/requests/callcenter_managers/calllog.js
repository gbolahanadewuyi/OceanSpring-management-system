let fetchCalls = 'https://api.osdeliverygh.com/api/Supports/calls';
let addCall = 'https://api.osdeliverygh.com/api/Supports/addcall';
// https://loyalty-dot-techloft-173609.appspot.com/api/Supports/addcall
var operatorname = $('#Username').val();


const zgRef = document.querySelector('zing-grid');
fetch(fetchCalls)
	.then(res => res.json())
	.then(data => zgRef.setData(data.results))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));






	function _renderClassActivity(value) {
		console.log(value);
		var currentDate = new Date(value);
		 console.log(currentDate);
		//  return currentDate
		return `<span class="">${currentDate}</span>`;
		 

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

function LogCall() {

	$('#btnSave').attr('disabled', true); //set button enable
	$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var customerNumber = $('#cusmobile').val();
	var mobileid = customerNumber.substring(1, customerNumber.length);
	var c = 233;


	var phonenumber = c + mobileid;
	var purpose = $('#poc').val();
	var feedback = $('#feedback').val();
	var comment = $('#comment').val();
	var operatorNumber = $('#opnumber').val();

	let object = {
		"customerNumber": phonenumber,
		"purpose": purpose,
		"feedback": feedback,
		"operator": operatorname,
		"operatorNumber": operatorNumber,
		"comments": comment
	};
	console.log(object);
	$.ajax({
		url: addCall,
		// async: true,
		// crossDomain: true,s
		// header:{
		// 	"Content-Type":"application/json"
		// },
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			if (data.results.statusCode == 201) {
				console.log(data);
				$("#callogForm")[0].reset();
				$('#btnSave').attr('disabled', false); //set button enable
				$('#btnSave').html('Save changes');
				$("#callmodal").modal("hide");
				$.notify({
					message: 'Call logged successfully'
				}, {
					type: 'success'
				});
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			} else {
				$("#callogForm")[0].reset();
				$('#btnSave').attr('disabled', false); //set button enable
				$('#btnSave').html('Save changes');
				$("#callmodal").modal("hide");
				$.notify({
					message: 'Call log unsucessful'
				}, {
					type: 'danger'
				});
				$("#callmodal").modal("show");
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
// 	table = $('#calllog-data').DataTable({

// 		"processing": true, //Feature control the processing indicator.
// 		"serverSide": true, //Feature control DataTables' server-side processing mode.
// 		"searching": true,
// 		// "order": [], //Initial no order.

// 		// Load data for the table's content from an Ajax source
// 		"ajax": {
// 			url: fetchCalls,      
// 			type: "GET",
// 			dataSrc: "results",
// 			// success : function(data){
// 			// 	 console.log(data);
// 			// 	 console.log(data.data.results);
// 			// },
// 			// error: function (jqXHR, textStatus, errorThrown) {
// 			// 	console.log('error hitting endpoint');
// 			// 	console.log(textStatus);
// 			// 	console.log(errorThrown);
// 			// 	console.log(jqXHR);
		
	
// 			// }
		

		


// 		},
		
// 		// "columnDefs": [{
// 		// 		"orderable": false, //set not orderable
// 		// 	},

// 		// ],
// 		//Set column definition initialisation properties.
// 		"columns": [
// 			// {
// 			// 	"data.": "id"
// 			// },
// 			{
// 				"data": "dateofcall"
// 			},
// 			{
// 				"data": "customerNumber"
// 			},
// 			{
// 				"data": "purpose"
// 			},
// 			{
// 				"data": "feedback"
// 			},
// 			{
// 				"data": "operator"
// 			},
// 			{
// 				"data": "operatorNumber"
// 			},
// 		]
// 	});


// });

function CallLogs() {

	$.ajax({
		async: true,
		crossDomain: true,
		url: fetchCalls,
		type: "GET",
		dataType: "JSON",

		success: function (data) {
			console.log(JSON.stringify(data));
			return data;
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
