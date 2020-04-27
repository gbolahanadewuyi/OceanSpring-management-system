let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/";
let updateUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders/update?where=%7B%22id%22%3A";
let SaveStockUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Stockreceiveds";
let dispatchStockUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Stockdispatcheds";
// let id = $('#apiId').val();
// let token = $('#apiToken').val();

function keep_stock() {


	$('#stockBTN').attr('disabled', true); //set button enable
	$('#stockBTN').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	var stockdate = $('#date').val();
	var item = $("#item").val();
	var quantity = $("#quantity").val();
	var wbnum = $("#wbnum").val();
	var drivername = $("#drivername").val();
	var vechileno = $("#vechileno").val();
	var recievedby = $("#recievedby").val();

	let object = {
		"id": 0,
		"stockdate": stockdate,
		"item": item,
		"quantity": quantity,
		"waybillnumber": wbnum,
		"drivername": drivername,
		"vehicleregistration": vechileno,
		"receivedby": recievedby,
	};

	console.log(object);

	$.ajax({
		url: SaveStockUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#stockform")[0].reset();
			$('#stockBTN').attr('disabled', false); //set button enable
			$("#stock").modal("hide");
			$.notify({
				message: 'Stock record saved successfully'
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
			$("#stockform")[0].reset();
			$('#stockBTN').attr('disabled', false); //set button enable
			$("#stock").modal("hide");
			$.notify({
				// options
				message: 'Error reaching endpoint, check your network connectivity'
			}, {
				// settings
				type: 'danger'
			});


		}

	});

}
   function checkSTOCK(){
	   totalstock();
   }


    function totalstock(){
		var quantityDispatched = $("#d-quantity").val();

		$.ajax({
			async: true,
			crossDomain: true,
			url : $("#baseurl").val() + "admin/get_totalstock",
			type:"GET",
			dataType:"json",
			success: function(data){
				console.log(data);
              if(data.data.status == 200){
				  console.log(data);
				  if(data.data.totalstock > quantityDispatched){
					dispatch_stock() ;
				  }else{
					$.notify({
						message: "Quantity being dispatched is more than quantity in stock"
					}, {
						type: 'danger'
					});
				  }
			  }else{
				$.notify({
					message: "Error"
				}, {
					type: 'danger'
				});
			  }
			},
			
			error:  function(jqXHR, textStatus, errorThrown){
				console.log("Error reaching endpoint");
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);

			}
		
			

		});
	}

function dispatch_stock() {


	$('#dstockBtn').attr('disabled', true); //set button enable
	$('#dstockBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');


	var item = $("#d-item").val();
	var quantity = $("#d-quantity").val();
	var riderassigned = $("#RRname").val();
	var vehicleregistration = $("#RVno").val();
	var dispatchtime = $("#Tdispatch").val();
	var dispatchedby = $("#dispatchBy").val();

	let object = {
		"id": 0,
		"item": item,
		"quantity": quantity,
		"riderassigned": riderassigned,
		"vehicleregistration": vehicleregistration,
		"dispatchtime": dispatchtime,
		"dispatchedby": dispatchedby
	};

	console.log(object);

	$.ajax({
		url: dispatchStockUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#d-stockform")[0].reset();
			$('#dstockBtn').attr('disabled', false); //set button enable
			$("#dispatch-stock").modal("hide");
			$.notify({
				message: 'Stock dispatched successfully'
			}, {
				type: 'success'
			});


			// setTimeout(function () { // wait for 5 secs(2)
			// 	location.reload(); // then reload the page.(3)
			// }, 1000);

		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log('error hitting endpoint');
			console.log(textStatus);
			console.log(errorThrown);
			console.log(jqXHR);
			$("#d-stockform")[0].reset();
			$('#dstockBtn').attr('disabled', false); //set button enable
			$("#dispatch-stock").modal("hide");
			$.notify({
				// options
				message: 'Error reaching endpoint, check your network connectivity'
			}, {
				// settings
				type: 'danger'
			});


		}

	});

}
