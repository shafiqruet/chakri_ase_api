<?php

include 'db.php';
include 'helper.php';

#file_put_contents('request_data.txt', print_r($_REQUEST, true));

if (isset($_REQUEST["action"]) && $_REQUEST['action'] == 'get_job_lists') {
         $total_sql = "SELECT * FROM jobs";
    $total_result = mysqli_query($connection, $total_sql);
    $no_of_rows = mysqli_num_rows($total_result);
    $start_value = ceil($no_of_rows / 10);
   
    $page = trim($_REQUEST['page']);
    $start = 10 * $page;
    $end = 10 + $start;
    $sql = "SELECT * FROM jobs order by id desc limit {$start}, {$end} ";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $return['response_data'] = [];
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($return['response_data'], $row);
        }
        $return["errorCode"] = 0;
        $return["message"] = '';
    } else {
        $return["errorCode"] = - 1;
        $return["message"] = 'No job found.';
        $return["response_data"] = [];
    }
} else if (isset($_REQUEST["action"]) && $_REQUEST['action'] == 'get_job_details') {
    $jobId = trim($_REQUEST['JobId']);
    $sql = "SELECT * FROM jobs where id ={$jobId} ";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $obj = mysqli_fetch_object($res);
        $return["response_data"] = json_encode($obj);

        $return["errorCode"] = 0;
        $return["message"] = '';
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
