<?php
include 'db.php';
include 'helper.php';

$return["error"] = false;
$return["message"] = "";
$return["success"] = false;

file_put_contents('request_data.txt', print_r($_POST, true));

if ($_REQUEST['action'] == 'view_resume' && !empty($_REQUEST["uid"])) {
	//checking if there is POST data
	$uid = formatAndCleanInput($connection, $_REQUEST["uid"]);
	$sql = "SELECT * from job_skills js left join job_experience je on js.uid = je.uid LEFT JOIN personal_info pi2 on je.uid = pi2 .uid  WHERE js.uid = '$uid'";
	$res = mysqli_query($connection, $sql);
	$countRow = mysqli_num_rows($res);
	// check if there is any row
	if ($countRow > 0) {
		/*$return['response_data'] = [];
		while ($row = mysqli_fetch_assoc($res)) {
			array_push($return['response_data'], $row);
		}*/
		$obj = mysqli_fetch_object($res);
		$return["response_data"] = json_encode($obj);
		$return["errorCode"] = 0;
		$return["message"] = '';
	} else {
		$return["errorCode"] = -1;
		$return["message"] = 'No data found.';
		$return["response_data"] = [];
	}

} else {

	$return["errorCode"] = -1;
	$return["message"] = 'Send all parameters.';
	$return["response_data"] = [];
}

mysqli_close($connection);

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string