var zoneid = $('#zoneid').val();
let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/customers?filter=%7B%20%22order%22%3A%20%22id%20DESC%22%20%7D";
let customerUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/"
var url = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22zoneid%22%3A%22"
var fetchcustomersurl = url + zoneid + "%22%20%7D%2C%20%20%22order%22%3A%20%22id%20DESC%22%20%7D"
var custRewardUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/rewards?phonenumber="
var delUserUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/"
var customerEdit = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/"
var updatecustomer = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers/update?where=%7B%22id%22%3A%22"
// let id = $('#apiId').val();
// let token = $('#apiToken').val();




const zgRefc = document.querySelector('#customer_table');
fetch(fetchcustomersurl)
	.then(res => res.json())
	.then(data => zgRefc.setData(data.data))
	.catch(err => console.error('--- Error In Fetch Occurred ---', err));



function _exportDataToCSV() {
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



zgRefc.executeOnLoad(() => {
	// Add event listener to button
  reloadCBtn.addEventListener('click', () => {
	zgRefc.refresh();
  });
});





function update_customer(id) {


	$('#userCBtn').attr('disabled', true); //set button enable
	$('#userCBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');



	var fid = $('#Cphone').val();
	var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	var c = 233;
	var phonenumber = c + itemId;
	var regData = {
		"firstname": $("#Cfirst").val(),
		"lastname": $("#Clast").val(),
		"landmark": $("#Clandmark").val(),
		"location": $("#Clocation").val(),
		"msisdn": fid,
		"ro": $("#CArname").val(),
		"alternatephonenumber": $("#Calt_phone").val()
	};

	console.log(regData);
	$.ajax({
		url: updatecustomer + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.count !== 0) {
				console.log('success');
				$.notify({
					message: 'Customer data updated successfully '
				}, {
						type: 'success'
					});
				// $.notify("Product created successfully");
				$("#customerData")[0].reset();
				$("#edit-customer").modal("hide");
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);
			}
			if (data.count == 0) {
				$.notify({
					message: 'Error updating customer data'
				}, {
						type: 'danger'
					});
			}

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

			$('#userCBtn').attr('disabled', false); //set button enable
			$('#userCBtn').html('update');
			$("#customerData")[0].reset();
			$("#edit-customer").modal("hide");

		}

	});

}







function edit_customer(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: customerEdit + id,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#edit-customer").modal();
			$(".modal-title").text("Edit Customer Data");
			// $("#id").val(data.id);
			$("#Cfirst").val(data.firstname);
			$("#Clast").val(data.lastname);
			$("#Clocation").val(data.location);
			$("#Clandmark").val(data.landmark);
			$("#Cphone").val(data.msisdn);
			$("#CArname").val(data.ro);
			$('#userCBtn').html('<button type="submit" class="btn btn-primary  pull-right" id="updateBTN" onclick="update_customer(' + data.id + ')"> Update </button>');
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});
}


function delete_customer(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	if (confirm('Are you sure you want to remove this customer?')) {
		$.ajax({
			async: true,
			crossDomain: true,
			url: delUserUrl + id,
			//   headers: {
			// 	"content-type":"application/json"
			//   },
			type: "DELETE",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				$.notify({
					message: 'Customer deleted succesfully'
				}, {
						type: 'success'
					});
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log("error hitting endpoint");
				console.log("textStatus");
				console.log("errorThrown");
			}
		});

	}

}

function customer_info(msisdn) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(msisdn);
	$.ajax({
		async: true,
		crossDomain: true,
		url: custRewardUrl + msisdn,
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#customer-info").modal();
			$(".modal-title").text("Customer Reward Information");
			$("#ciphone").html(data.results.customer);
			$("#qp").html(data.results.qtyPurchased);
			$("#rewards").html(data.results.rewards);
			$("#loyaltyrewards").html(data.results.rewards);



			$("#referralscount").html(data.results.referrals);
			$("#referralspurchased").html(data.results.referralPurchased);
			$("#referralReward").html(data.results.referralReward);

			$("#totalreferralReward").html(data.results.referralReward);



		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log("textStatus");
			console.log("errorThrown");
		}
	});



}
