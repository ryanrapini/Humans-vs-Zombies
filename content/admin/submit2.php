<?php
if(isset($_POST[firstname])) {

	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	function genRandomString() {
		$length = 6;
		$characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$string = "";    

		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}
		return $string;
	}


	$firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST[firstname] );
	$lastname = ereg_replace("[^A-Za-z0-9]", "", $_POST[lastname] );
	$killcode = genRandomString();
	$netid = ereg_replace("[^A-Za-z0-9]", "", $_POST[netid] );
	$phone = str_replace(array("-", "(", ")"), "", $_POST[phone]);
	$gender = $_POST[gender];
	if ($gender != "female"){
	$gender = "male";
	}
	$year = ereg_replace("[^A-Za-z0-9]", "", $_POST[year] );


	mysql_select_db("hvz", $con);

	$sql="INSERT INTO users (firstname, lastname, killcode, netid, phone, gender, year)
	VALUES
	('$firstname','$lastname','$killcode','$netid','$phone','$gender','$year')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	echo "1 record added";

	mysql_close($con);
}
else{
echo "Failed. No records added.";
}
?> 

