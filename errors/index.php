<?php
include '../api/functions.php';
$errId = '';
$msg = '';
if (isset($_GET['id']) && !empty($_GET['id'])) {
	/*
	ErrorDocument 400 /errors/?id=badrequest
	ErrorDocument 401 /errors/?id=authrequired
	ErrorDocument 403 /errors/?id=forbid
	ErrorDocument 404 /errors/?id=notfound
	ErrorDocument 500 /errors/?id=servererr
	*/
	$check = $_GET['id'];
	if ($check == "badrequest") {
		$errId = '400';
		$msg = 'Bad request';
	} else if ($check == "authrequired") {
		$errId = '401';
		$msg = 'Authentication is required';
	} else if ($check == "forbid") {
		$errId = '403';
		$msg = 'Access is denied';
	} else if ($check == "notfound") {
		$errId = '404';
		$msg = 'Item not found';
	} else if ($check == "servererr") {
		$errId = '500';
		$msg = 'Internal Server Error';
	} else {
		header("location: http://www.thunderbots.tk/errors/?id='notfound'");
	}
} else {
	$errId = '403';
	$msg = 'Access is denied';
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
createHeaders("Error " . $errId,
	"Error",
	"", 1);
?>
<body>
<?php
	echo "An error has occured.<br /><br />";
	echo "Error: " . $errId . " " . $msg . "<br /><br />";
	echo "Click <a href='../'>here</a> to continue.";
?>
</body>
</html>