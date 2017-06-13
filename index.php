<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Michael's TD Budgeter</title>

	<link rel="stylesheet" href="includes/css/bootstrap.min.css">
	<script src="includes/js/jquery.min.js"></script>
	<script src="includes/js/bootstrap.min.js"></script>
	<script src="includes/js/chartjs/Chart.js"></script>
	<script src="includes/js/generateGraphs.js"></script>
	<script src="includes/js/moment.js"></script>
</head>
<body>
	<div id="container">
		<div class="col-md-10">
			<h1>Michael's TD Budgeter</h1>
			<h3>Select a csv file:</h3>
			<input type="file" id="fileInput">
			<div class="row">
				<div class="col-md-12">
					<input id="item_input" class="input"></input>
					<select id="category_select">
						<option>Food</option>
						<option>Transportation</option>
						<option>Health/Insurance</option>
						<option>Entertainment</option>
					</select>
					<button type="button" class="btn" id="submit_btn" onclick="submit()">Submit</button>
				</div>
			</div>
			<div class="row">
				<div id="canvas-holder" class="col-md-4">
					<canvas id="chart-area"/>
				</div>
				<div class="col-md-6">
					<pre id="fileDisplayArea"></pre>
				</div>
			</div>
		</div>

	</div>
	<?php require 'includes/parseFileSetup.php'; ?>
	<script src="includes/js/parsefile.js"></script>


	<script>
		function submit() {
			var new_item = $('#item_input').val();
			if (new_item.length > 3) {
				$('#item_input').val("");
				$.ajax({
						type: "POST",
						url: "includes/submit.php",
						data: {itemname: new_item.toUpperCase(),
							   categoryname: $('#category_select').val()},
						cache: false,
						success: function(html) {
						alert('Added.');

					}
				});
			}
		}
	</script>

</body>
</html>
