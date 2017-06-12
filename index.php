<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Budgeter</title>

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
			<h1>Michael's Budgeter</h1>
			<h3>Select a csv file:</h3>
			<input type="file" id="fileInput">
			<div class="row">
				<div class="col-md-12">
					<input id="new_filter" class="input"></input>
					<select>
						<option>Food</option>
					</select>
					<button class="btn">Create</button>
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

</body>
</html>
