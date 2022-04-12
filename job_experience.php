<?php
include 'db.php';
include 'helper.php';

#file_put_contents('request_data.txt', print_r($_REQUEST, true));

if ($_REQUEST['action'] == 'register_experience' || $_REQUEST['action'] == 'update_experience') {

    $uid = formatAndCleanInput($connection, $_REQUEST["uid"]);
    $experience1 = formatAndCleanInput($connection, $_REQUEST["experience1"]);
    $experience2 = formatAndCleanInput($connection, $_REQUEST["experience2"]);
    $experience3 = formatAndCleanInput($connection, $_REQUEST["experience3"]);
    $position = formatAndCleanInput($connection, $_REQUEST["position"]);
    $job_type = formatAndCleanInput($connection, $_REQUEST["job_type"]);

    if (isset($_REQUEST["uid"]) && $_REQUEST['action'] == 'register_experience') {
        // checking if there is POST data
        $sql = "SELECT * FROM users WHERE uid = '$uid'";
        // building SQL query
        $res = mysqli_query($connection, $sql);
        $numrows = mysqli_num_rows($res);
        // check if there is any row
        if ($numrows > 0) {
            $sql = "INSERT INTO job_experience (uid, experience1, experience2, experience3, position, job_type, created)
            VALUES ('" . $uid . "','" . $experience1 . "', '" . $experience2 . "', '" . $experience3 . "',
               '" . $position . "','" . $job_type . "', NOW())";
               $res = mysqli_query($connection, $sql);

               $return["errorCode"] = 0;
               $return["message"] = "Registration process is completed.";
               $return["response_data"] = [];
           } else {
            $return["errorCode"] = - 1;
            $return["message"] = 'User not found';
            $return["response_data"] = [];
        }
    } else if (isset($_REQUEST["uid"]) && $_REQUEST['action'] == 'update_experience') {

        $sql = "SELECT * FROM job_experience WHERE uid = '$uid'";
        // building SQL query
        $res = mysqli_query($connection, $sql);
        $numrows = mysqli_num_rows($res);
        // check if there is any row
        if ($numrows > 0) {
            $sql = "UPDATE job_experience SET experience1 = '" . $experience1 . "', experience2=  '" . $experience2 . "', experience3 = '" . $experience3 . "',
            position =  '" . $position . "', job_type = '" . $job_type . "'  WHERE uid = '" . $uid . "'";
            $res = mysqli_query($connection, $sql);

            $return["errorCode"] = 0;
            $return["message"] = "Update process is completed.";
            $return["response_data"] = [];
        } else {
            $return["errorCode"] = - 1;
            $return["message"] = 'User not found';
            $return["response_data"] = [];
        }
    } else {
        $return["errorCode"] = - 1;
        $return["message"] = 'Send all parameters.';
        $return["response_data"] = [];
    }
} elseif (isset($_REQUEST["uid"]) && $_REQUEST['action'] == 'get_experience') {
    $uid = formatAndCleanInput($connection, $_REQUEST["uid"]);
    $sql = "SELECT * FROM job_experience WHERE uid = '$uid'";
    $res = mysqli_query($connection, $sql);
    $countRow = mysqli_num_rows($res);
    // check if there is any row
    if ($countRow > 0) {
        // is there is any data with that username
        $obj = mysqli_fetch_object($res);
        $return["errorCode"] = 0;
        $return["message"] = '';
        $return["response_data"] = json_encode($obj);
    } else {
        $return["errorCode"] = - 1;
        $return["message"] = 'No job found.';
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
