let fetchCalls = 'https://api.osdeliverygh.com/api/Supports/calls';
let addCall = 'https://api.osdeliverygh.com/api/Supports/addcall';

var baseurl = $("#baseurl").val();
var callrepeod = baseurl + "admin/get_calldep_eod"
// https://loyalty-dot-techloft-173609.appspot.com/api/Supports/addcall










// window.onload = () => {
// 	const zgRef = document.querySelector('zing-grid');
// fetch(callrepeod)
// 	.then(res => res.json())
// 	.then(data => zgRef.setData(data))
// 	.catch(err => console.error('--- Error In Fetch Occurred ---', err));
	

// }

// zgRef.addEventListener('row:click', bindExpandEvent);

// 	function bindExpandEvent(e) {
// 		let oDOMRow = e.detail.ZGTarget;
// 		oDOMRow.classList.toggle('active');
// 	}

function Logreport() {

	$('#btnSave').attr('disabled', true); //set button enable
	$('#btnSave').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var customerNumber = $('#cusmobile').val();
	var purpose = $('#poc').val();
	var feedback = $('#feedback').val();
	var comment = $('#comment').val();
	var operator = $('#opname').val();
	var operatorNumber = $('#opnumber').val();

	let object = {
		"customerNumber": customerNumber,
		"purpose": purpose,
		"feedback": feedback,
		"operator": operator,
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
			} else {
				$.notify({
					message: 'Call log unsucessful'
				}, {
					type: 'danger'
				});
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
