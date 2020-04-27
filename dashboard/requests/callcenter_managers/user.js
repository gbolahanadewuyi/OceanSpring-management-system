var zoneid = $('#zoneid').val();
var userID = $('#userid').val();
var username = $('#Username').val();


var postUrl = $('#baseurl').val() + 'admin/userdata';
var userUrl = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations?filter=%7B%22where%22%3A%7B%22id%22%3A%22"
var checkTelephone = "https://loyalty-dot-techloft-173609.appspot.com/api/Customers?filter=%7B%22where%22%3A%7B%22msisdn%22%3A%22"
var ussdUsers = "https://loyalty-dot-techloft-173609.appspot.com/api/Registrations/update?where=%7B%22id%22%3A%22"
// 1611945 "%22%7D"
var justask = '';

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


zgRef.executeOnLoad(() => {
	// Add event listener to button
	reloadUBtn.addEventListener('click', () => {
		zgRef.refresh();
	});
});



// const zgRefc = document.querySelector('#customer_table');
// fetch(fetchcustomersurl)
// 	.then(res => res.json())
// 	.then(data => zgRefc.setData(data.data))
// 	.catch(err => console.error('--- Error In Fetch Occurred ---', err));


function check_user_telephone() {

	$('#userBtn').attr('disabled', true); //set button enable
	$('#userBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');

	var phone = $('#phone').val();
	if (phone.length > 10 || phone.length < 10) {
		$('#userBtn').attr('disabled', false); //set button enable
		$('#userBtn').html('Save changes');
		$("#customersData")[0].reset();
		$.notify({
			message: 'Oops Error, Incorrect number'
		}, {
			type: 'danger'
		});
	} else {

		var mobile = phone.substring(1, phone.length);
		var c = 233;
		var phonenumber = c + mobile;

		var varcheckTelUrl = checkTelephone + phonenumber + "%22%7D%7D"
		$.ajax({
			url: varcheckTelUrl,
			contentType: "application/json",
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				var i;
				if (jQuery.isEmptyObject(data) == true) {
					user_register_post()
				} else if (jQuery.isEmptyObject(data) == false) {
					$('#userBtn').attr('disabled', false); //set button enable
					$('#userBtn').html('Save changes');
					$("#customersData")[0].reset();
					$.notify({
						message: 'Error registering customer, customer telephone number already exists '
					}, {
						type: 'danger'
					});

				}

			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log('Error reaching endpoint');
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

	}





}


function user_register_post() {



	if ($("#milo").is(":checked")) {
		var milo = "Milo,"
	} else {
		milo = ""
	}
	if ($("#wPowder").is(":checked")) {
		var wPowder = "Washing Powder,"
	} else {
		wPowder = ""
	}
	if ($("#sugar").is(":checked")) {
		var sugar = "Sugar,"
	} else {
		sugar = ""
	}
	if ($("#bread").is(":checked")) {
		var bread = "Bread,"
	} else {
		bread = ""
	}
	if ($("#milk").is(":checked")) {
		var milk = "Milk,"
	} else {
		milk = ""
	}
	if ($("#bSoap").is(":checked")) {
		var bSoap = "Bathing Soap,"
	} else {
		bSoap = ""
	}
	if ($("#toothpaste").is(":checked")) {
		var toothpaste = "Toothpaste,"
	} else {
		toothpaste = ""
	}
	if ($("#babyCon").is(":checked")) {
		var babyCon = "Baby Conditional,"
	} else {
		babyCon = ""
	}
	if ($("#water").is(":checked")) {
		var water = "Water"
	} else {
		water = ""
	}

	// var justaskstring = [milo, wPowder, sugar, bread, milk, bSoap, toothpaste, babyCon, water].join(',');

	justask += milo + wPowder + sugar + bread + milk + bSoap + toothpaste + babyCon + water;


	console.log(justask);



	var fid = $('#phone').val();
	var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	var c = 233;
	var phonenumber = c + itemId;
	var regData = {
		"id": 0,
		"phone": phonenumber,
		"first": $('#first').val(),
		"last": $('#last').val(),
		"alternatephonenumber": $('#alt_phone').val(),
		"home": $('#home').val(),
		"dateofbirth": $('#date').val(),
		"gender": $('#gender').val(),
		"cardnumber": $('#card').val(),
		"location": $('#location').val(),
		"landmark": $('#landmark').val(),
		"zoneid": zoneid,
		"ro": username,
		"fai": justask,
		"day": $('#day').val(),
		"time": $('#time').val(),
		"quantity": $('#Quantity').val(),
		"cashondelivery": $('#cash').val(),
		"momo": $('#momo').val(),
		"other": $('#other').val(),
		"autodelivery": $('#auto').val(),
		"calltoconfirm": $('#call').val(),
		"subscription": $('#sub').val(),
		"frequency": $('#for').val(),
		"operatorid": userID


	};





	console.log(regData);

	$.ajax({
		url: postUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.status == 200) {
				console.log('success');
				$.notify({
					message: 'Customer registration succesful'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$("#customersData")[0].reset();
				$('#userBtn').attr('disabled', false); //set button enable
				$('#userBtn').html('Save Changes');
				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);


			}
			if (data.status == 400) {
				$.notify({
					message: 'Error adding new customer'
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

			$('#userBtn').attr('disabled', false); //set button enable
			$('#userBtn').html('Save Changes');
			$("#customersData")[0].reset();


		}

	});

}


function check_ussduser_telephone() {

	$('#userEBtn').attr('disabled', true); //set button enable
	$('#userEBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing please wait...');

	var phone = $('#Ephone').val();
	if (phone.length < 12 || phone.length > 12) {
		$('#userEBtn').attr('disabled', false); //set button enable
		$('#userEBtn').html('Save changes');
		$("#userData")[0].reset();
		$.notify({
			message: 'Oops Error, Incorrect number. phonenumber must start with 233 and must be 12 in number'
		}, {
			type: 'danger'
		});
	} else {
		var varcheckTelUrl = checkTelephone + phone + "%22%7D%7D"
		$.ajax({
			url: varcheckTelUrl,
			contentType: "application/json",
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				var i;
				if (jQuery.isEmptyObject(data) == true) {
					ussd_user_post()
				} else if (jQuery.isEmptyObject(data) == false) {
					$('#userEBtn').attr('disabled', false); //set button enable
					$('#userEBtn').html('Save changes');
					$("#userData")[0].reset();
					$.notify({
						message: 'Error registering customer, customer telephone number already exists'
					}, {
						type: 'danger'
					});

				}

			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log('Error reaching endpoint');
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});

	}

}

function ussd_user_post() {


	// $('#userEBtn').attr('disabled', true); //set button enable
	// $('#userEBtn').html('<i class="fa fa-spinner fa-spin"></i> Saving user data please wait...');



	//var fid = $('#phone').val();
	//var itemId = fid.substring(1, fid.length);
	//   var info = $('#card').prepend('20151012');
	//var c = 233;
	//var phonenumber = c + itemId;

	var id = $("#Eid").val();
	var regUssdData = {
		"id": 0,
		"phone": $('#Ephone').val(),
		"first": $('#Efirst').val(),
		"last": $('#Elast').val(),
		"alternatephonenumber": $('#Ealt_phone').val(),
		"home": $('#Ehome').val(),
		"dateofbirth": $('#Edate').val(),
		"gender": $('#Egender').val(),
		"cardnumber": $('#Ecard').val(),
		"location": $('#Elocation').val(),
		"landmark": $('#Elandmark').val(),
		"zoneid": zoneid,
		"ro": '',
		"fai": justask,
		"day": $('#Eday').val(),
		"time": $('#Etime').val(),
		"quantity": $('#EQuantity').val(),
		"cashondelivery": $('#Ecash').val(),
		"momo": $('#Ecash').val(),
		"other": $('#Eother').val(),
		"autodelivery": $('#Eauto').val(),
		"calltoconfirm": $('#Ecall').val(),
		"subscription": $('#Esub').val(),
		"frequency": $('#Efor').val(),
		"operatorid": userID


	};





	console.log(regUssdData);

	$.ajax({
		url: postUrl,
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(regUssdData),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.status == 200) {
				console.log('success');

				authenticateUSSDUser(id);
			} else
			if (data.status == 400) {
				$.notify({
					message: 'Error completing user registration'
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

			$('#userEBtn').attr('disabled', false); //set button enable
			$('#userEBtn').html('Save');
			$("#userData")[0].reset();
			$("#add-user").modal("hide");

		}

	});

}




function edit_user(id) {
	$("div.form-group").removeClass("has-error"); // clear error class
	$("div.form-group").removeClass("has-success"); // clear error class
	$(".text-danger").empty();
	console.log(id);
	$.ajax({
		async: true,
		crossDomain: true,
		url: userUrl + id + "%22%7D%7D",
		//   headers: {
		// 	"content-type":"application/json"
		//   },
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			console.log(data);
			$("#add-user").modal();
			$(".modal-title").text("Edit User-data");
			$("#Eid").val(data.data[0].id);
			$("#Efirst").val(data.data[0].name);
			$("#Ephone").val(data.data[0].msisdn);
			$("#Ecard").val(data.data[0].cardnumber);


		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log("error hitting endpoint");
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}



function authenticateUSSDUser(id) {
	console.log(id)
	let object = {
		"authenticated": 1
	}

	$.ajax({
		url: ussdUsers + id + "%22%7D",
		contentType: "application/json",
		type: "POST",
		data: JSON.stringify(object),
		dataType: "json",
		success: function (data) {
			if (data.count == 1) {
				$.notify({
					message: 'User registration completion succesful'
				}, {
					type: 'success'
				});
				// $.notify("Product created successfully");
				$('#userEBtn').attr('disabled', false); //set button enable
				$('#userEBtn').html('Save');
				$("#userData")[0].reset();
				$("#add-user").modal("hide");

				setTimeout(function () { // wait for 5 secs(2)
					location.reload(); // then reload the page.(3)
				}, 1000);

			} else {
				$('#userEBtn').attr('disabled', false); //set button enable
				$('#userEBtn').html('Save');
				$("#userData")[0].reset();
				$("#add-user").modal("hide");

				$.notify({
					message: 'Error completing user registration, please try again'
				}, {
					type: 'danger'
				});




			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			$.notify({
				// options
				message: 'error hitting endpoint'
			}, {
				// settings
				type: 'Danger'
			});
			console.log("error hitting endpoint");
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		}




	})

}


// {
// 	"sheets": {
// 		"Teams": [
// 			{
// 			"Team": "Albania",
// 			"FIFA ranking": "45",
// 			"Group": "A",
// 			"Byline": "Ermal Kuka",
// 			"Coach": "Gianni De Biasi ",
// 			"Bio": "Albania will be competing at their first major tournament after finishing before Serbia and Denmark in their qualifying group. Gianni De Biasi prefers to play a 4-3-3 formation which quickly transforms into 4-5-1 in defence.",
// 			"strengths": "The team rely on a very solid defence and apply a high pressing game to try to force opponents into making mistakes. Di Biasi's system needs a hard-working forward and in Sokol Cikalleshi he has that.",
// 			"weaknesses": "Scoring goals. There are no two ways about it. This is not a high-scoring side and that may well be their undoing in France.",
// 			"next match": "Switzerland"
// 		}, {
// 			"Team": "France",
// 			"FIFA ranking": "21",
// 			"Group": "A",
// 			"Byline": "<a href=\"https://twitter.com/Paul_Doyle?lang=en-gb\">Paul Doyle</a>",
// 			"Coach": "Didier Deschamps",
// 			"Bio": "One of the most talented teams at the Euros. Didier Deschamps is now using a settled 4-3-3 formation that the players are comfortable with after failed experiments with 4-2-3-1 and 4-4-2 (diamond) ",
// 			"strengths": "The hosts have arguably the best and most dynamic midfield in Europe with players such as Paul Pogba, Blaise Matuidi, Dmitri Payet and N'Golo N'Kanté.",
// 			"weaknesses": "The defence. They should be OK in the central area but the full-backs – likely to be Patrice Evra (35) and Bacary Sagna (33) – will struggle against pace.",
// 			"next match": "Romania"
// 		}, {
// 			"Team": "Romania",
// 			"FIFA ranking": "19",
// 			"Group": "A",
// 			"Byline": "<a href=\"https://twitter.com/LucianLipovan\">Lucian Lipovan</a>",
// 			"Coach": "Anghel Iordanescu",
// 			"Bio": "This is a hard-working team that are very difficult to beat. Anghel Iordanescu's side plays in a 4-2-3-1 formation and the 66-year-old has a group of hard-working, capable players at his disposal.",
// 			"strengths": "Romania's organised and extremely stingy defence is the envy of all other managers at the tournament – they conceded only twice in 10 qualifiers.",
// 			"weaknesses": "There does not seem to be a plan B and, while they are good on the counterattack, they often struggle to create chances from midfield. ",
// 			"next match": "France"
// 		}, {
// 			"Team": "Switzerland",
// 			"FIFA ranking": "14",
// 			"Group": "A",
// 			"Byline": "<a href=\"https://twitter.com/MaxKern3\">Max Kern</a>",
// 			"Coach": "Vladimir Petkovic",
// 			"Bio": "Vladimir Petkovic, the Croatian-Bosnian manager, has a hugely talented squad at his disposal, with a settled defence and creativity and bite in midfield. They will play either 4-2-3-1 or 4-3-3.",
// 			"strengths": "The Swiss have a good blend of young and old. The midfield is probably their strongest area with Granit Xhaka sitting deep and Xherdan Shaqiri further upfield.",
// 			"weaknesses": "The pace of the centre-backs – probably Johan Djourou and Fabian Schär – is a potential problems and they may struggle for goals.",
// 			"next match": "Albania"
// 		}, {
// 			"Team": "England",
// 			"FIFA ranking": "10",
// 			"Group": "B",
// 			"Byline": "<a href=\"https://twitter.com/domfifield\">Dominic Fifield</a>",
// 			"Coach": "Roy Hodgson",
// 			"Bio": "Hodgson's England are now a reasonably slick outfit, employing either an adventurous 4-3-3 system or switching to the midfield diamond (which saw them come from 2-0 behind to win 3-2 in Germany in March).",
// 			"strengths": "Finally, this is a young, dynamic team with two effervescent Spurs players likely to make a difference this summer in the way they attack - Dele Alli and Harry Kane. ",
// 			"weaknesses": "The defence looks vulnerable, with Chris Smalling and Gary Cahill prone to the occasional lapse. Hodgson, remarkably, has only three centre-backs in his squad (although Dier can play there as well).",
// 			"next match": "Russia"
// 		}, {
// 			"Team": "Russia",
// 			"FIFA ranking": "27",
// 			"Group": "B",
// 			"Byline": "<a href=\"https://twitter.com/G_o_s_h_a\">Gosha Chernov</a>",
// 			"Coach": "Leonid Slutsky",
// 			"Bio": "Russia finally gave up on Fabio Capello in July 2015 when in danger of missing out on France. CSKA Moscow's Leonid Slutsky took over and his 4-2-3-1 – and man-management – suited the players much better. ",
// 			"strengths": "This team look like they are enjoying their football again. There is speed on the flanks and the options up front – Aleksandr Kerzhakov, Artyom Dzyuba and Fyodor Smolov – have all been in good form. ",
// 			"weaknesses": "The centre-backs Sergey Ignashevich and Vasili Berezutski are still first choice in central defence and that is a concern. Alan Dzagoev's injury is also a huge blow. ",
// 			"next match": "England"
// 		}, {
// 			"Team": "Slovakia",
// 			"FIFA ranking": "32",
// 			"Group": "B",
// 			"Byline": "<a href=\"https://twitter.com/LukasVrablik\">Lukáš Vráblik</a>",
// 			"Coach": "Jan Kozak",
// 			"Bio": "Slovakia are resurgent under Jan Kozak, who prefers a  4-2-3-1 system with Marek Hamsik in a free role. Beat Spain in qualifying to finish ahead of Ukraine in their group. ",
// 			"strengths": "Marek Hamsik had not played as well for Slovakia as he had for Napoli before Kozak took over, but now he makes the national side tick with his tireless running and ability to create and score goals. ",
// 			"weaknesses": "Hamsik again, sadly. Slovakia rely heavily on the 28-year-old, which means there is little in the way of attacking threat should he be nullified.\n",
// 			"next match": "Wales"
// 		}, {
// 			"Team": "Wales",
// 			"FIFA ranking": "24",
// 			"Group": "B",
// 			"Byline": "<a href=\"https://twitter.com/StuartJamesGNM\">Stuart James</a>",
// 			"Coach": "Chris Coleman",
// 			"Bio": "Wales chopped and changed formations during qualification but their favoured system is 3-4-2-1, which saw them win key matches in Cyprus and Israel and at home against Belgium.",
// 			"strengths": "There is no denying it: Gareth Bale is the Wales national team in so many ways and the main reason they are in France. He scored seven and set up two of their 11 goals during qualifying.",
// 			"weaknesses": "The absence of a proven Premier League centre-forward. Simon Church, Sam Vokes and Robson-Kanu have all auditioned for the role but none of them are prolific. ",
// 			"next match": "Slovakia"
// 		}, {
// 			"Team": "Germany",
// 			"FIFA ranking": "5",
// 			"Group": "C",
// 			"Byline": "Jens Kirschneck",
// 			"Coach": "Joachim Löw",
// 			"Bio": "The world champions have lost some key players, such as the captain, Philipp Lahm, and were beaten by the Republic of Ireland in a qualifier as well as against Slovakia in a recent friendly. ",
// 			"strengths": "Germany's spine is incredibly strong, with Manuel Neuer, Jérôme Boateng, Toni Kroos and Thomas Müller, and there is an abundance of attacking midfielders to call upon.  ",
// 			"weaknesses": "Central midfield looks a bit inexperienced after injuries to Ilkay Gündogan and Bastian Schweinsteiger, as do the full-back positions, where Sebastian Rudy and Jonas Hector could start. ",
// 			"next match": "Ukraine"
// 		}, {
// 			"Team": "Northern Ireland",
// 			"FIFA ranking": "26",
// 			"Group": "C",
// 			"Byline": "<a href=\"https://twitter.com/AHunterGuardian?lang=en-gb\">Andy Hunter</a>",
// 			"Coach": "Michael O'Neill",
// 			"Bio": "Northern Ireland topped their qualifying group ahead of Romania with the manager, Michael O'Neill, trying all sorts of formations (4-3-3, 4-1-4-1 and 4-3-2-1). They are a really difficult side to break down.",
// 			"strengths": "\"We are going to have to outrun the opposition, as simple as that,\" said Michael O'Neill after they had qualified. The five-man midfield takes some breaking down.",
// 			"weaknesses": "There is a lack of depth in the squad, illustrated best perhaps by the fact that they have tried a three-man defence after losing Chris Brunt to injury. Not a lot of other options around.",
// 			"next match": "Poland"
// 		}, {
// 			"Team": "Poland",
// 			"FIFA ranking": "27",
// 			"Group": "C",
// 			"Byline": "<a href=\"https://twitter.com/MaciejSlominski\">Maciej Slominski</a>",
// 			"Coach": "Adam Nawalka",
// 			"Bio": "Poland no longer rely on counterattacking as much as they used to in the past, Adam Nawalka preferring to keep possession and build their attacks carefully.",
// 			"strengths": "Poland are one of few sides to still have two out-and-out forwards in their starting XI, Arkadiusz Milik providing the perfect foil for Robert Lewandowski. ",
// 			"weaknesses": "Injuries have deprived Nawałka of the winger Pawel Wszolek and the winger-turned-left-back Maciej Rybus and that could be a problem in France.",
// 			"next match": "Northern Ireland"
// 		}, {
// 			"Team": "Ukraine",
// 			"FIFA ranking": "22",
// 			"Group": "C",
// 			"Byline": "<a href=\"https://twitter.com/frankov11?lang=en\">Artem Frankov</a>",
// 			"Coach": "Mykhaylo Fomenko",
// 			"Bio": "An obdurate side playing 4-2-3-1 with a emphasis on the counterattack, Mykhaylo Fomenko's team do not create a lot chances – so will have to make sure they take them.",
// 			"strengths": "The star wingers, Andriy Yarmolenko and Yevhen Konoplyanka, can create and score goals while the defence is supremely organised – and can even contribute with the odd goal from set pieces.",
// 			"weaknesses": "There is a distinct lack of options up front behind the first-choice striker, Roman Zozulya, who, remarkably, is suspended for six months from domestic football for attacking a referee.",
// 			"next match": "Germany"
// 		}, {
// 			"Team": "Croatia",
// 			"FIFA ranking": "23",
// 			"Group": "D",
// 			"Byline": "<a href=\"https://twitter.com/MihoTopic\">Mihovil Topic</a>",
// 			"Coach": "Ante Cacic",
// 			"Bio": "Ante Cacic took over from Niko Kovac last year but despite being in the job for nine months he does not seem to know what his favoured formation is.",
// 			"strengths": "The pure quality of the central midfielders Luka Modric (Real Madrid) and Ivan Rakitic (Barcelona) may be enough to take Croatia out of the group. ",
// 			"weaknesses": "Up front, Mario Mandzukic is still first choice, despite scoring only one of Croatia’s 20 goals in the qualifiers and despite his style not fitting that well with the rest of the team.",
// 			"next match": "Turkey"
// 		}, {
// 			"Team": "Czech Republic",
// 			"FIFA ranking": "29",
// 			"Group": "D",
// 			"Byline": "<a href=\"https://twitter.com/michalpetrak\">Michal Petrák</a> and <a href=\"https://twitter.com/podvinho?lang=en\">Tomáš Podvín</a>",
// 			"Coach": "Pavel Vrba",
// 			"Bio": "A fantastically organised side who can punch well above their weight. Pavel Vrba loves the 4-2-3-1 formation and wants his team to attack, especially down the flanks.",
// 			"strengths": "The Czechs' flexibility is their strength, the team equally adept at pressing high against weaker opponents and sitting back to defend against so-called better sides.",
// 			"weaknesses": "The team is still a bit too reliant on the veteran Tomas Rosicky and can fail to break down teams in his absence (although they lost only one of five qualifiers without him).",
// 			"next match": "Spain"
// 		}, {
// 			"Team": "Spain",
// 			"FIFA ranking": "6",
// 			"Group": "D",
// 			"Byline": "<a href=\"https://twitter.com/rogerxuriach\">Roger Xuriach</a> and <a href=\"https://twitter.com/CarlosMartinRio\">Carlos Martín</a>",
// 			"Coach": "Vicente del Bosque",
// 			"Bio": "Strangely for a team going in to the tournament looking for their third consecutive European Championship, they are surrounded by doubt, especially in midfield and up front.",
// 			"strengths": "The quality of some of the players is the envy of most managers and Vicente del Bosque normally manages to get the best out of them (the 2014 World Cup notwithstanding).",
// 			"weaknesses": "Spain can struggle for goals, with Del Bosque often playing Cesc Fàbregas as a false 9 - although there is also Álvaro Morata, Aritz Aduriz or Nolito to choose from up front. ",
// 			"next match": "Czech Republic"
// 		}, {
// 			"Team": "Turkey",
// 			"FIFA ranking": "13",
// 			"Group": "D",
// 			"Byline": "<a href=\"https://twitter.com/UgurMeleke\">Ugur Meleke</a>",
// 			"Coach": "Fatih Terim",
// 			"Bio": "Turkey struggled initially in qualifying but Fatih Terim stuck to his methods and this is an exciting side which prefers the 4-2-3-1 system.",
// 			"strengths": "Attacking midfield, where players such as Arda Turan, Hakan Calhanoglu, Oguzhan Ozyakup, Gokhan Tore and Yunus Malli are all options.",
// 			"weaknesses": "Central defence is not an area where Terim is spoilt for choice, often preferring to play the defensive midfielder Mehmet Topal there having decided not to call up Omer Toprak. ",
// 			"next match": "Croatia"
// 		}, {
// 			"Team": "Belgium",
// 			"FIFA ranking": "2",
// 			"Group": "E",
// 			"Byline": "<a href=\"https://twitter.com/HLNinEngeland\">Kristof Terreur</a>",
// 			"Coach": "Marc Wilmots",
// 			"Bio": "The side have been ranked the best team in the world for a large part of the past year and Marc Wilmots has arguably the best squad in the tournament.",
// 			"strengths": "Their front line is bursting with young, attacking talent, Eden Hazard, Kevin De Bruyne, Romelu Lukaku, Divock Origi and Yannick Carrasco all options for the front four positions.",
// 			"weaknesses": "Central defence. Vincent Kompany's injury means Thomas Vermaelen or the inexperienced Jason Denayer will play alongside Toby Aldeweireld.",
// 			"next match": "Italy"
// 		}, {
// 			"Team": "Italy",
// 			"FIFA ranking": "15",
// 			"Group": "E",
// 			"Byline": "<a href=\"https://twitter.com/PWhelan88\">Pádraig Whelan</a>",
// 			"Coach": "Antonio Conte",
// 			"Bio": "A modern tinkerman, Antonio Conte has tried all sorts of formations in qualifying and recent friendlies, from 3-5-2 and 3-4-3 to a conventional 4-4-2.",
// 			"strengths": "A defence containing the Juve block of Gianluigi Buffon, Andrea Berzagli, Leonardo Bonucci and Giorgio Chiellini will always be extremely difficult to break down.",
// 			"weaknesses": "Conte is not blessed with a huge amount of options up front, with the first-choice striker Graziano Pellè struggling to get in to the Southampton team at times this season.",
// 			"next match": "Belgium"
// 		}, {
// 			"Team": "Republic of Ireland",
// 			"FIFA ranking": "31",
// 			"Group": "E",
// 			"Byline": "<a href=\"https://twitter.com/DaveHytner?lang=en-gb\">David Hytner</a>",
// 			"Coach": "Martin O'Neill",
// 			"Bio": "Martin O'Neill's side are more positive than they were towards the end of Giovanni Trapattoni's reign, and the new coach has used the attacking Robbie Brady as a left-back in a 4-2-3-1 formation.",
// 			"strengths": "This is an extremely hard-working side (think Jon Walters) and Shane Long's speed and aerial power up front will trouble most defences. ",
// 			"weaknesses": "O'Neill's biggest problem is in central defence, where Richard Keogh is a definite starter but Ciaran Clarke, John O'Shea and Marc Wilson have all had difficult seasons.",
// 			"next match": "Sweden"
// 		}, {
// 			"Team": "Sweden",
// 			"FIFA ranking": "36",
// 			"Group": "E",
// 			"Byline": "<a href=\"https://twitter.com/m_christenson\">Marcus Christenson</a>",
// 			"Coach": "Erik Hamren",
// 			"Bio": "Erik Hamren promised more attacking football when he took over in 2009 but recently he seems to have reverted to a more solid 4-4-2 formation. ",
// 			"strengths": "Zlatan Ibrahimovic is still one of the best players in the world and absolutely crucial to Sweden's chances. Scored 11 of 19 goals in qualifying.",
// 			"weaknesses": "The lack of speed in defence is a concern as Andreas Granqvist is not the quickest of centre-backs but he could play alongside the more mobile 21-year-old Victor Nilsson Lindelof.",
// 			"next match": "Republic of Ireland"
// 		}, {
// 			"Team": "Austria",
// 			"FIFA ranking": "11",
// 			"Group": "F",
// 			"Byline": "<a href=\"https://twitter.com/Florian_Vetter\">Florian Vetter</a> and <a href=\"https://twitter.com/AndHagen\">Andreas Hagenauer</a>",
// 			"Coach": "Marcel Koller",
// 			"Bio": "The Swiss Marcel Koller introduced a 4-2-3-1 system, flexible enough to become 4-3-3, at all age-group levels when he was appointed in 2011.",
// 			"strengths": "David Alaba is the star name but the whole midfield deserves praise, with the more defence-minded Julian Baumgartlinger and the dynamic Zlatko Junuzovic equally important.",
// 			"weaknesses": "The back four is sometimes exposed if Baumgartlinger and Alaba wander too far upfield – which happens quite often – and they may struggle if key players get injured.",
// 			"next match": "Hungary"
// 		}, {
// 			"Team": "Hungary",
// 			"FIFA ranking": "18",
// 			"Group": "F",
// 			"Byline": "<a href=\"https://twitter.com/mettszeli?lang=en-gb\">Mátyás Szeli</a> and Bence Babják",
// 			"Coach": "Bernd Storck",
// 			"Bio": "The German coach, Bernd Storck, prefers the 4-2-3-1 formation and has been keen to increase the team's possession stats in order to take some heat off the defence. ",
// 			"strengths": "Set pieces. Out of the 14 goals scored in qualifying, five came from corners, one direct from a free-kick and two after a free-kick was not cleared properly by the defence",
// 			"weaknesses": "Hungary can, at times, be a bit predictable, with a lack of speed in the final third, but the 22-year-old attacking midfielder Laszlo Kleinheisler could change all that. ",
// 			"next match": "Austria"
// 		}, {
// 			"Team": "Iceland",
// 			"FIFA ranking": "35",
// 			"Group": "F",
// 			"Byline": "<a href=\"https://twitter.com/vidirsig\">Vidir Sigurdsson</a>",
// 			"Coach": "Lars Lagerbäck",
// 			"Bio": "The former Sweden coach Lars Lagerback has brought all his experience to Iceland and his 4-4-2 is an optimal mix of attack and defence.",
// 			"strengths": "The midfield area is key, with Aron Gunnarsson and Gylfi Sigurdsson complementing each other exceptionally well, the latter allowed a fairly free role going forward.",
// 			"weaknesses": "The team's main striker, Kolbeinn Sigthorsson, who averages nearly a goal every other game in international football, has had an injury-interrupted season with Nantes.",
// 			"next match": "Portugal"
// 		}, {
// 			"Team": "Portugal",
// 			"FIFA ranking": "8",
// 			"Group": "F",
// 			"Byline": "<a href=\"https://twitter.com/valvarenga\">Vítor Hugo Alvarenga</a>",
// 			"Coach": "Fernando Santos",
// 			"Bio": "Portugal are expected to swap their traditional 4-3-3 for a flexible 4-4-2. That would feature Nani in support of Ronaldo up front but with licence to drift to the right. ",
// 			"strengths": "Cristiano Ronaldo stands out – of course he does – but this team are now a good blend of young and old, with players such as Renato Sanches an option from the bench.",
// 			"weaknesses": "Goals, as always with Portugal, and the key midfielder, João Moutinho, has struggled with injuries this spring.",
// 			"next match": "Iceland"
// 		}]
// 	}
// }
