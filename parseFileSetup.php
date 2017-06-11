<?php
	require('conn.php');
?>

<script>
	var cityList = <?php
			$sql = "SELECT * FROM budgeter_citylist";
			$rows = array();

			$result=mysqli_query($conn,$sql);
			
			while ($r = mysqli_fetch_assoc($result)) {
				$rows[] = $r;
			}
			echo json_encode($rows);
		?>;

	var categoryList = <?php
			$sql = "SELECT * FROM budgeter_category";
			$rows = array();

			$result = mysqli_query($conn,$sql);

			while ($r = mysqli_fetch_assoc($result)) {
				$rows[] = $r;
			}
		
			echo json_encode($rows);
		?>;
</script>