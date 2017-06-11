var date, city, description, debit, credit, category;
var fileContents;

window.onload = function() {

	var fileInput = document.getElementById('fileInput');
	var fileDisplayArea = document.getElementById('fileDisplayArea');

	var modifiedCategoryList = categoryList;

	for (var i=0; i<categoryList.length; i++) {
		if (categoryList[i].item.indexOf("\'") > -1) {
			modifiedCategoryList[i].item = modifiedCategoryList[i].item.replace("\'", "_");
		}
	}

	fileInput.addEventListener('change', function(e) {
		var file = fileInput.files[0];
		var reader = new FileReader();

		reader.onload = function(e) {
			//fileDisplayArea.innerText = reader.result;
			fileContents = reader.result;
			var lines = fileContents.split('\n');
			
			var table = '<table border="1" cellspacing="1" cellpadding="5"><tr>\
							<td>Date</td>\
							<td>Description</td>\
							<td>City</td>\
							<td>Debit</td>\
							<td>Credit</td>\
							<td>Category</td>\
						</tr>';

			var food = 0;
			var transportation = 1;
			var entertainment = 0;
			var groceries = 0;
			var electronics = 0;
			var other = 0;


			for(var i = 0;i < lines.length;i++) {
				if (!!lines[i] && lines[i].indexOf("PAYMENT")== -1 ) {
					var col = lines[i].split(',');
					
					date = Date.parse(col[0]);
					//var date = parseDate.getDate();
					description = parseDescription(col[1]);
					debit = parseFloat(col[2]) || 0; 
					credit = parseFloat(col[3]) || 0;
					category = parseCategory(col[1], modifiedCategoryList);

					var color = "#FFFFFF";

					if (category === 'Food') {
						color = "#0066FF";
						food += debit;
					}
					else if (category === 'Transportation') {
						color = "#FFFF00";
						transportation += debit;
					}
					else if (category === 'Entertainment') {
						color = "#FF99FF";
						entertainment += debit;
					}
					else if (category === "Groceries") {
						color = "#33CC33";
						groceries += debit;
					}
					else if (category === "Electronics") {
						color = "#FF0066"
						electronics += debit;
					}
					else if (category === "Other") {
						color = "#CCCCCC"
						other += debit;
					}

					table += '<tr id=\"displayRow'+i+'\"+>\
								<td>'+date+'</td>\
								<td>'+description+'</td>\
								<td>'+city+'</td>\
								<td>'+debit+'</td>\
								<td>'+credit+'</td>\
								<td bgcolor = "'+color+'"">'+category+'</td>\
							</tr>';
				}
			}

			table += '</table>';
			fileDisplayArea.innerHTML = table;

			generateGraphs(food, transportation, entertainment, groceries, electronics, other); 
		}	

		reader.readAsText(file);	



	});
}

function parseDescription(description) {
	city = parseCity(description);
	if (city) {
		citySubstr = description.slice(-10);
		index = -10 + citySubstr.indexOf(city);

		description = description.slice(0, index);
	}

	return description;
}

function parseCategory(description, modifiedCategoryList) {
	var category = 'Other'
	var modifiedDescription = description.replace("\'", "_");

	for (var i=0; i<categoryList.length; i++) {

		if (modifiedDescription.indexOf(modifiedCategoryList[i].item) > -1) {
			category = categoryList[i].category;
			break;
		}
	}	
	return category;

}

function parseCity(description) {
	var city = ''
	var citySubstr = description.slice(-9);
	for (var i=0; i<cityList.length; i++) {
		if (citySubstr.indexOf(cityList[i].city) > -1) {
			city = cityList[i].city;
		}

	}
	return city;
}