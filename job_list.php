<?php
include 'db.php';
include 'helper.php';

file_put_contents('request_data.txt', print_r($_REQUEST, true));

if (isset($_REQUEST["action"]) && $_REQUEST['action'] == 'get_job_lists') {
    $total_sql = "SELECT * FROM jobs";
    $total_result = mysqli_query($connection, $total_sql);
    $no_of_rows = mysqli_num_rows($total_result);
    $start_value = ceil($no_of_rows / 10);

    $page = trim($_REQUEST['page']);
    $start = 10 * $page;
    $end = 10 + $start;
    $sql = "SELECT j.*, case when c.name is null then '' else c.name end as company from jobs j LEFT JOIN company c on j.company_id = c.id order by j.id desc limit {$start}, {$end} ";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $return['response_data'] = [];
        while ($row = mysqli_fetch_assoc($res)) {
            array_push($return['response_data'], $row);
        }
        $return["errorCode"] = 0;
        $return["message"] = '';
    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'No job found.';
        $return["response_data"] = [];
    }
} else if (isset($_REQUEST["action"]) && $_REQUEST['action'] == 'get_job_details') {
    $jobId = trim($_REQUEST['JobId']);
    $sql = "SELECT j.*, case when c.name is null then '' else c.name end as company from jobs j LEFT JOIN company c on j.company_id = c.id where j.id ={$jobId} ";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $obj = mysqli_fetch_object($res);
        $return["response_data"] = json_encode($obj);

        $return["errorCode"] = 0;
        $return["message"] = '';
    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'No job found.';
        $return["response_data"] = [];
    }
} else if (isset($_REQUEST["action"]) && $_REQUEST['action'] == 'my_posted_jobs_list') {
    $companyId = trim($_REQUEST['companyId']);
    $total_sql = "SELECT j.*, case when c.name is null then '' else c.name end as company from jobs j LEFT JOIN company c on j.company_id = c.id where j.company_id = {$companyId}";
    $total_result = mysqli_query($connection, $total_sql);
    $no_of_rows = mysqli_num_rows($total_result);
    $start_value = ceil($no_of_rows / 10);

    $page = trim($_REQUEST['page']);
    $start = 10 * $page;
    $end = 10 + $start;
    $sql = "SELECT j.*, case when c.name is null then '' else c.name end as company from jobs j LEFT JOIN company c on j.company_id = c.id where j.company_id = {$companyId} order by j.id desc limit {$start}, {$end} ";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $return['response_data'] = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $row['format_dateline'] = date("D,jS M Y", strtotime($row['deadline']));
            array_push($return['response_data'], $row);
        }
        $return["errorCode"] = 0;
        $return["message"] = '';
    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'No job found.';
        $return["response_data"] = [];
    }
} else if (isset($_REQUEST["action"]) && $_REQUEST['action'] == 'get_job_applied_lists') {
    $jobId = trim($_REQUEST['jobId']);
    $total_sql = "SELECT j.id from jobs_applied ja LEFT join jobs j on ja.job_id = j.id LEFT join users u on ja.uid = u.uid where ja.job_id = {$jobId}";
    $total_result = mysqli_query($connection, $total_sql);
    $no_of_rows = mysqli_num_rows($total_result);
    $start_value = ceil($no_of_rows / 10);

    $page = trim($_REQUEST['page']);
    $start = 10 * $page;
    $end = 10 + $start;
    $jobId = trim($_REQUEST['jobId']);
    $sql = "SELECT j.position,j.deadline, u.name, u.email from jobs_applied ja LEFT join jobs j on ja.job_id = j.id LEFT join users u on ja.uid = u.uid where ja.job_id = {$jobId} order by j.id desc limit {$start}, {$end} ";
    $res = mysqli_query($connection, $sql);
    if (mysqli_num_rows($res) > 0) {
        $return['response_data'] = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $row['format_dateline'] = date("D,jS M Y", strtotime($row['deadline']));
            array_push($return['response_data'], $row);
        }
        $return["errorCode"] = 0;
        $return["message"] = '';
    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'No job found.';
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
