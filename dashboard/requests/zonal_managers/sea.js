var zoneid = $('#zoneid').val();
var sea = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins?filter=%7B%22where%22%3A%7B%22roleid%22%3A%2211%22%2C%20%20%22zoneid%22%3A%22" 
var fetchseaurl = sea + zoneid + "%22%7D%2C%22order%22%3A%22id%20DESC%22%7D"
var seaURL = "https://loyalty-dot-techloft-173609.appspot.com/api/Roles?filter=%7B%22where%22%3A%7B%22role%22%3A%22Sales%20Executive%20Assistant%22%7D%7D"
var Users = "https://loyalty-dot-techloft-173609.appspot.com/api/Admins"


const zgRef = document.querySelector('zing-grid');
fetch(fetchseaurl)
	.then(res => res.json())
	.then(data => zgRef.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));





//fetch S.E.A ID
$.ajax({
	url: seaURL,
	contentType: "application/json",
	type: "GET",
	dataType: "JSON",
	success: function (data) {
		console.log(data);
        $("#SEArole").val(data.data[0].roleid);

		
		
	},
	error: function (jqXHR, textStatus, errorThrown) {
		console.log('Error reaching endpoint');
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	}
});



function add_sea() {


	$('#btnSave').attr('disabled', true); //set button enable
	$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var name = $("#SEAname").val();
	var phone = $("#SEAphone").val();
	var email = $("#SEAemail").val();
	var username = $("#SEAusername").val();
	var role = $("#SEArole").val();




	let object = {
		"id": 0,
		"msisdn": phone,
		"name": name,
		"status": "active",
		"roleid": role,
		"zoneid": zoneid,
		"email": email,
		"realm": "string",
		"username": username,
        "emailVerified": true,
        // "dem": ""
         

	};

	console.log(object);

	$.ajax({
		url: Users,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);

			$.notify({
				message: 'New SEA created successfully'
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

			$("#sea-form")[0].reset()

		}

	});

}



