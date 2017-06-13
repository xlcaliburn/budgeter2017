<?php
	include('conn.php');

	// foreach(preg_split("/((\r?\n)|(\r\n?))/", $_POST['fileContents']) as $line){
	// 	if ($line != NULL) {
	// 		$split = explode(",",$line);
	//
	// 		$date = date("Y-m-d",strtotime($split[0]));
	// 		if ($split[2] == ''){$debit = 0;} else {$debit = $split[2];}
	// 		if ($split[3] == ''){$credit = 0;} else {$credit = $split[3];}
	//
	// 		$sql = "INSERT INTO budgeter (userid, date, description, debit, credit)
	// 				VALUES (1, '".$date."', '".$split[1]."', $debit, $credit)";
	// 		if ($conn->query($sql) === FALSE) {
	// 			echo "Error: " . $sql . "<br>" . $conn->error;
	// 		}
	// 	}
	// }
		$sql = "INSERT INTO budgeter_category (item, category)
				VALUES ('".$_POST['itemname']."', '".$_POST['categoryname']."')";
		if ($conn->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
?>
