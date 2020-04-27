let apiUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Orders";
// let id = $('#apiId').val();
// let token = $('#apiToken').val();

var table;
$(function () {
	table = $('#voucher_data').DataTable({
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"searching": true,
		"order": [], //Initial no order.

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": apiUrl, 
			"type": "GET",
			
		},

		//Set column definition initialisation properties.
		"columns": [
            { "data": "id" },
            { "data": "ordernumber" },
            { "data": "msisdn" },
            { "data": "item" },
            { "data": "quantity" },
            { "data": "datetime" }
        ]
	});

});