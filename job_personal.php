<?php
include 'db.php';
include 'helper.php';

#file_put_contents('request_data.txt', print_r($_POST, true));

if ($_POST['action'] == 'register_personal' || $_POST['action'] == 'update_personal') {

    // checking if there is POST data
    $uid = formatAndCleanInput($connection, $_POST["uid"]);
    $father_name = formatAndCleanInput($connection, $_POST["father_name"]);
    $mother_name = formatAndCleanInput($connection, $_POST["mother_name"]);
    $birthday = formatAndCleanInput($connection, $_POST["birthday"]);
    $gender = formatAndCleanInput($connection, $_POST["gender"]);
    $marital_status = formatAndCleanInput($connection, $_POST["marital_status"]);
    $permanent_address = formatAndCleanInput($connection, $_POST["permanent_address"]);
    $education = formatAndCleanInput($connection, $_POST["education"]);
    $present_address = formatAndCleanInput($connection, $_POST["present_address"]);
    $permanent_address = formatAndCleanInput($connection, $_POST["permanent_address"]);

    if ($_POST['action'] == 'register_personal' && isset($_POST['uid'])) {
        $sql = "SELECT * FROM users WHERE uid = '$uid'";
        // building SQL query
        $res = mysqli_query($connection, $sql);
        $numrows = mysqli_num_rows($res);
        // check if there is any row
        if ($numrows > 0) {
            $sql = "INSERT INTO personal_info (uid, father_name, mother_name, birthday, gender, marital_status, education, permanent_address, present_address, created)
VALUES ('" . $uid . "','" . $father_name . "', '" . $mother_name . "', '" . $birthday . "', '" . $gender . "', '" . $marital_status . "','" . $education . "',
 '" . $present_address . "','" . $permanent_address . "', NOW())";

            $res = mysqli_query($connection, $sql);

            $return["errorCode"] = 0;
            $return["message"] = "Registration process is completed.";
            $return["response_data"] = [];
        } else {
            $return["errorCode"] = - 1;
            $return["message"] = 'User not found';
            $return["response_data"] = [];
        }
    } else if (isset($_POST["uid"]) && $_POST['action'] == 'update_personal') {

        $sql = "SELECT * FROM personal_info WHERE uid = '$uid'";
        // building SQL query
        $res = mysqli_query($connection, $sql);
        $numrows = mysqli_num_rows($res);
        // check if there is any row
        if ($numrows > 0) {
            $sql = "UPDATE personal_info SET father_name = '" . $father_name . "', mother_name = '" . $mother_name . "', birthday = '" . $birthday . "',
             gender = '" . $gender . "', marital_status = '" . $marital_status . "', education = '" . $education . "',
         permanent_address =  '" . $present_address . "', present_address = '" . $permanent_address . "', updated = NOW() WHERE uid = '" . $uid . "'";
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
} elseif (isset($_POST["uid"]) && $_POST['action'] == 'get_personal') {
    $uid = formatAndCleanInput($connection, $_POST["uid"]);
    $sql = "SELECT * FROM personal_info WHERE uid = '$uid'";
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
