var zoneid = $('#zoneid').val();
var callrep = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins"

// var callreps = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22" 
//  var fetchcallreps = callreps + zoneid + "%22%7D%20%2C%20%22order%22%20%3A%20%22id%20DESC%22%7D"

 var callreps = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22" 
 var fetchcallreps = callreps + zoneid + "%22%2C%20%22roleid%22%3A%20%225%22%7D%20%2C%20%22order%22%20%3A%20%22id%20DESC%22%7D"

const zgRef = document.querySelector('zing-grid');
fetch(fetchcallreps)
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

	function add_callep() {


		$('#btnSaveOrder').attr('disabled', true); //set button enable
		$('#btnSaveOrder').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	    var phone = $("#crphone").val();
		var mobileid = phone.substring(1, phone.length);
		var c = 233;
	
	
		var phonenumber = c + mobileid;
		var name = $("#crname").val();
		var email = $("#cremail").val();
		var username = $("#crusername").val();
		var password = $("#crpassword").val();
		


		let object = {
			"id": 0,
			"msisdn": phonenumber,
			"name": name,
			"status": "active",
			"roleid": 5,
			"zoneid": zoneid,
			"email": email,
			"realm": "string",
            "username": username,
            "password": password,
			"emailVerified": true

		};

		console.log(object);

		$.ajax({
			url: callrep,
			contentType: "application/json",
			type: "POST",
			data: JSON.stringify(object),
			dataType: "json",
			success: function (data) {
				console.log(data);

				$.notify({
					message: 'Call rep account created successfully'
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

				$.notify({
					// options
					message: 'Error reaching endpoint, check your network connectivity'
				}, {
					// settings
					type: 'danger'
				});
               
                $("#callrep-form")[0].reset()

			}

		});

	}
