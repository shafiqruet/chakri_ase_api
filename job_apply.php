<?php
include 'db.php';
include 'helper.php';

file_put_contents('request_data.txt', print_r($_REQUEST, true));

if ($_REQUEST['action'] == 'job_apply') {

    $uid = formatAndCleanInput($connection, $_REQUEST["uid"]);
    $job_id = formatAndCleanInput($connection, $_REQUEST["jobId"]);

        // checking if there is POST data
    $sql = "SELECT * FROM jobs_applied WHERE uid = '$uid' and job_id = '$job_id'";
        // building SQL query
    $res = mysqli_query($connection, $sql);
    $numrows = mysqli_num_rows($res);
        // check if there is any row
    if ($numrows == 0) {
        $sql = "INSERT INTO jobs_applied (uid, job_id, created)
        VALUES ('" . $uid . "','" . $job_id . "' , NOW())";
         $res = mysqli_query($connection, $sql);

         $return["errorCode"] = 0;
         $return["message"] = "Job Applied process is completed.";
         $return["response_data"] = [];
     } else {
        $return["errorCode"] = - 1;
        $return["message"] = 'Already Applied ';
        $return["response_data"] = [];
    }
} else {
    $return["errorCode"] = - 1;
    $return["message"] = 'Send all parameters.';
    $return["response_data"] = [];
}

mysqli_close($connection);

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string
