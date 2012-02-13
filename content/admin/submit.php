<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>...</title>
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
die('<meta http-equiv="REFRESH" content="3;url=/admin/"></HEAD>
<BODY>Go away!');
}


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("hvz", $con);

if ($_POST["kill"]){
	$id = $_POST["kill"];
	echo "<meta http-equiv='REFRESH' content='3;url=/admin/'></HEAD>
<BODY>killing user with id:", $id, " <br /><br /> ";
	$sql = "UPDATE `users` SET `zombie` = '1'
	WHERE `id` = $id LIMIT 1 ;";

	$kill = mysql_query($sql);
	if ($kill == 1){
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO log ( victim, action, author, ip)
		VALUES
		('$victimid','killed','Admin', '$ip');";

		$kill = mysql_query($sql);
		if ($kill == 1) { echo "Wrote log.";} else { echo "Log failed :[";}
	}
	else{
	echo "Something broke...";
	}
	echo "<br /><br />This page will selfdestruct in 3 seconds...";
}
elseif ($_POST["revive"]){
	$id = $_POST["revive"];
	echo "<meta http-equiv='REFRESH' content='3;url=/admin/'></HEAD>
<BODY>reviving user with id:", $id, " - ";
	$sql = "UPDATE `users` SET `zombie` = '0'
	WHERE `id` = $id LIMIT 1 ;";

	$kill = mysql_query($sql);
	if ($kill == 1){
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO log ( victim, action, author, ip)
		VALUES
		('$victimid','revived','Admin', '$ip');";

		$kill = mysql_query($sql);
		if ($kill == 1) { echo "Wrote log.";} else { echo "Log failed :[";}
	}
	else{
	echo "Something broke...";
	}
	echo "<br /><br />This page will selfdestruct in 3 seconds...";
}
elseif ($_POST["delete"]){ 
$id = $_POST["delete"];
echo <<<END
Warning: Are you sure you want to delete the user with id $id? There is no undo!
<form name='confirm' action='submit.php' method='post'>
<button name='confirmdelete' value='$id'>Yes</button><button>No</button>
</form>
END;
}
elseif ($_POST["confirmdelete"]){
	$id = $_POST["confirmdelete"];
	echo "<meta http-equiv='REFRESH' content='3;url=/admin/'></HEAD>
<BODY>Delete user with id:", $id, " - ";
	
	$sql = "DELETE FROM `users` WHERE `id` = $id LIMIT 1";

	$kill = mysql_query($sql);
	if ($kill == 1){
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO log ( victim, action, author, ip)
		VALUES
		('$victimid','deleted','Admin', '$ip');";

		$kill = mysql_query($sql);
		if ($kill == 1) { echo "Wrote log.";} else { echo "Log failed :[";}
	}
	else{
	echo "Something broke...";
	}
	echo "<br /><br />This page will selfdestruct in 3 seconds...";
}
else{
die ("<meta http-equiv='REFRESH' content='3;url=/admin/'></HEAD>
<BODY>Did nothing.<br /><br />This page will selfdestruct in 3 seconds...");
}

mysql_close($con)
?> 

