<?php
include 'db.php';
include 'helper.php';

#file_put_contents('request_data.txt', print_r($_POST, true));

if (isset($_POST["phone"]) && isset($_POST["password"]) && $_POST['action'] == 'register_profile') {
    //checking if there is POST data
    $name = formatAndCleanInput($connection, $_POST["name"]);
    $password = formatAndCleanInput($connection, $_POST["password"]);
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $phone = formatAndCleanInput($connection, $_POST["phone"]);

    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    //building SQL query
    $res = mysqli_query($connection, $sql);
    $numrows = mysqli_num_rows($res);
    //check if there is any row
    if ($numrows <= 0) {
        $sql = "INSERT INTO users (name, phone, password, created)
VALUES ('" . $name . "','" . $phone . "' , '" . $hash_pass . "', NOW())";
        $res = mysqli_query($connection, $sql);

        $return["errorCode"] = 0;
        $return["message"] = "Registration process is completed.";
        $return["response_data"] = [];

    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'Already phone no found.';
        $return["response_data"] = [];
    }
} else if (isset($_POST["uid"]) && $_POST['action'] == 'get_profile') {

    $uid = formatAndCleanInput($connection, $_POST["uid"]);

    $sql = "SELECT * FROM users WHERE uid = '$uid'";
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
        $return["message"] = 'No username found.';
        $return["response_data"] = [];
    }
} else if (isset($_POST["uid"]) && $_POST['action'] == 'update_profile') {
    //checking if there is POST data
    $uid = formatAndCleanInput($connection, $_POST["uid"]);
    $name = formatAndCleanInput($connection, $_POST["name"]);
    $phone = formatAndCleanInput($connection, $_POST["phone"]);
    $email = formatAndCleanInput($connection, $_POST["email"]);
    $address = formatAndCleanInput($connection, $_POST["address"]);

    $sql = "SELECT * FROM users WHERE phone = '$phone' and uid != $uid";
    //building SQL query
    $res = mysqli_query($connection, $sql);
    $numrows = mysqli_num_rows($res);
    //check if there is any row
    if ($numrows <= 0) {
        $sql = "UPDATE users set name = '" . $name . "', phone = '" . $phone . "' , email = '" . $email . "' , address = '" . $address . "' WHERE uid = '" . $uid . "' ";
        $res = mysqli_query($connection, $sql);

        $return["errorCode"] = 0;
        $return["message"] = "Update process is completed.";
        $return["response_data"] = [];

    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'Already phone no. found.';
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
