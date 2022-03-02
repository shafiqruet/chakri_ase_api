<?php
include 'db.php';
include 'helper.php';

$return["error"] = false;
$return["message"] = "";
$return["success"] = false;

#file_put_contents('login.txt', print_r($_POST, true));

if (isset($_POST["phone"]) && isset($_POST["password"])) {

    $phone = formatAndCleanInput($connection, $_POST["phone"]);
    $password = formatAndCleanInput($connection, $_POST["password"]);

    $phone = mysqli_real_escape_string($connection, $phone);

    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    // building SQL query
    $res = mysqli_query($connection, $sql);
    $countRow = mysqli_num_rows($res);
    // check if there is any row
    if ($countRow > 0) {
        // is there is any data with that username
        $obj = mysqli_fetch_object($res);
        if (password_verify($password, $obj->password)) {
            $return["success"] = true;
            $return["uid"] = $obj->uid;
            $return["name"] = $obj->name;
            $return["address"] = $obj->address;
        } else {
            $return["error"] = true;
            $return["message"] = "Your Password is Incorrect.";
        }
    } else {
        $return["error"] = true;
        $return["message"] = 'No username found.';
    }
} else {
    $return["error"] = true;
    $return["message"] = 'Send all parameters.';
}

mysqli_close($connection);

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string
