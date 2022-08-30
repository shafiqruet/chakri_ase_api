<?php
include 'db.php';
include 'helper.php';

file_put_contents('request_data.txt', print_r($_POST, true));

if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST['action'] == 'register_profile') {
    //checking if there is POST data
    $email = formatAndCleanInput($connection, $_POST["email"]);
    $password = formatAndCleanInput($connection, $_POST["password"]);
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $phone = formatAndCleanInput($connection, $_POST["phone"]);

    $sql = "SELECT * FROM company WHERE email = '$email'";
    //building SQL query
    $res = mysqli_query($connection, $sql);
    $numrows = mysqli_num_rows($res);
    //check if there is any row
    if ($numrows <= 0) {
        $sql = "INSERT INTO company (email, phone, password, created)
VALUES ('" . $email . "','" . $phone . "' , '" . $hash_pass . "', NOW())";
        $res = mysqli_query($connection, $sql);

        $return["errorCode"] = 0;
        $return["message"] = "Registration process is completed.";
        $return["response_data"] = [];

    } else {
        $return["errorCode"] = -1;
        $return["message"] = 'Already phone no found.';
        $return["response_data"] = [];
    }
} else if (isset($_POST["email"]) && $_POST['action'] == 'login') {

    $email = formatAndCleanInput($connection, $_POST["email"]);
    $password = formatAndCleanInput($connection, $_POST["password"]);

    $phone = mysqli_real_escape_string($connection, $phone);

    $sql = "SELECT * FROM company WHERE email = '$email'";
    // building SQL query
    $res = mysqli_query($connection, $sql);
    $countRow = mysqli_num_rows($res);
    // check if there is any row
    if ($countRow > 0) {
        // is there is any data with that username
        $obj = mysqli_fetch_object($res);
        if ($obj->status != 1) {
            $return["errorCode"] = -1;
            $return["message"] = "Your Account is not active. Please Contact with Support.";
        } else if (password_verify($password, $obj->password)) {
            $return["errorCode"] = 0;
            $return["uid"] = $obj->id;
            $return["name"] = $obj->name;
            $return["address"] = $obj->address;
        } else {
            $return["errorCode"] = -1;
            $return["message"] = "Your Password is Incorrect.";
        }
    } else {
        $return["error"] = true;
        $return["message"] = 'No username found.';
    }
} else if (isset($_POST["uid"]) && $_POST['action'] == 'get_profile') {

    $uid = formatAndCleanInput($connection, $_POST["uid"]);

    $sql = "SELECT * FROM company WHERE id = '$uid'";
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

    $sql = "SELECT * FROM company WHERE email = '$email' and id != $uid";
    //building SQL query
    $res = mysqli_query($connection, $sql);
    $numrows = mysqli_num_rows($res);
    //check if there is any row
    if ($numrows <= 0) {
        $sql = "UPDATE company set name = '" . $name . "', phone = '" . $phone . "' , email = '" . $email . "' , address = '" . $address . "' WHERE id = '" . $uid . "' ";
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
