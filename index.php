<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>File API</title>

	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="includes/chartjs/Chart.js"></script>
	<script src="includes/generateGraphs.js"></script>
</head>
<body>
	<div id="page-wrapper">

		<h1>Text File Reader</h1>
		<div>
			Select a text file: 
			<input type="file" id="fileInput">
			<button type="button" id="submit" onclick="submit()">Submit</button>
		</div>

		<br>
		<pre id="fileDisplayArea"></pre>
				<div id="canvas-holder">
			<canvas id="chart-area" width="500" height="500"/>
		</div>

	</div>
	<?php require 'includes/parseFileSetup.php'; ?>
	<script src="includes/parsefile.js"></script>
	<script>
		function submit() {
			// AJAX code to submit form.
			console.log(description);
			$.ajax({
					type: "POST",
					url: "includes/submit.php",
					data: {fileContents: fileContents},
					cache: false,
					success: function(html) {
					alert('Successfully added.');
				}
			});
		
			return false;
		}
	</script>

</body>
</html>