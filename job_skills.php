<?php
include 'db.php';
include 'helper.php';

$return["error"] = false;
$return["message"] = "";
$return["success"] = false;

#file_put_contents('request_data.txt', print_r($_POST, true));

if ($_POST['action'] == 'register_skills' || $_POST['action'] == 'update_skills') {
    //checking if there is POST data
    $uid = formatAndCleanInput($connection, $_POST["uid"]);
    $skill1 = formatAndCleanInput($connection, $_POST["skills1"]);
    $skill2 = formatAndCleanInput($connection, $_POST["skills2"]);
    $skill3 = formatAndCleanInput($connection, $_POST["skills3"]);
    $skill4 = formatAndCleanInput($connection, $_POST["skills4"]);
    $skill5 = formatAndCleanInput($connection, $_POST["skills5"]);
    $skill6 = formatAndCleanInput($connection, $_POST["skills6"]);
    $skill7 = formatAndCleanInput($connection, $_POST["skills7"]);
    $skill8 = formatAndCleanInput($connection, $_POST["skills8"]);
    $present_salary = formatAndCleanInput($connection, $_POST["present_salary"]);
    $expected_salary = formatAndCleanInput($connection, $_POST["expected_salary"]);

    if (isset($_POST["uid"]) && $_POST['action'] == 'register_skills') {
        $sql = "SELECT * FROM users WHERE uid = '$uid'";
        //building SQL query
        $res = mysqli_query($connection, $sql);
        $numrows = mysqli_num_rows($res);
        //check if there is any row
        if ($numrows > 0) {
            $sql = "INSERT INTO job_skills (uid, skills1, skills2, skills3, skills4, skills5, skills6, skills7, skills8, expected_salary, present_salary, created)
        VALUES ('" . $uid . "','" . $skill1 . "', '" . $skill2 . "', '" . $skill3 . "', '" . $skill4 . "','" . $skill5 . "',
        '" . $skill6 . "', '" . $skill7 . "', '" . $skill8 . "', '" . $present_salary . "','" . $expected_salary . "', NOW())";
            $res = mysqli_query($connection, $sql);

            $return["errorCode"] = 0;
            $return["message"] = "Registration process is completed.";
            $return["response_data"] = [];

        } else {
            $return["errorCode"] = -1;
            $return["message"] = 'User not found';
            $return["response_data"] = [];
        }
    } else if (isset($_POST["uid"]) && $_POST['action'] == 'update_skills') {

        $sql = "SELECT * FROM job_skills WHERE uid = '$uid'";
        //building SQL query
        $res = mysqli_query($connection, $sql);
        $numrows = mysqli_num_rows($res);
        //check if there is any row
        if ($numrows > 0) {
            $sql = "UPDATE job_skills SET skills1 = '" . $skill1 . "', skills2=  '" . $skill2 . "', skills3 = '" . $skill3 . "', skills4 =  '" . $skill4 . "',
         skills5 = '" . $skill5 . "', skills6 = '" . $skill6 . "', skills7=  '" . $skill7 . "', skills8 = '" . $skill8 . "', expected_salary =  '" . $expected_salary . "',
         present_salary = '" . $present_salary . "'  WHERE uid = '" . $uid . "'";
            $res = mysqli_query($connection, $sql);

            $return["errorCode"] = 0;
            $return["message"] = "Updated process is completed.";
            $return["response_data"] = [];

        } else {
            $return["errorCode"] = -1;
            $return["message"] = 'User not found';
            $return["response_data"] = [];
        }
    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'Send all parameters.';
        $return["response_data"] = [];
    }
} elseif (isset($_POST["uid"]) && $_POST['action'] == 'get_skills') {
    $uid = formatAndCleanInput($connection, $_POST["uid"]);

    $sql = "SELECT * FROM job_skills WHERE uid = '$uid'";
    //building SQL query
    $res = mysqli_query($connection, $sql);
    $countRow = mysqli_num_rows($res);
    //check if there is any row
    if ($countRow > 0) {
        //is there is any data with that username
        $obj = mysqli_fetch_object($res);
        $return["errorCode"] = 0;
        $return["message"] = '';
        $return["response_data"] = json_encode($obj);
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
