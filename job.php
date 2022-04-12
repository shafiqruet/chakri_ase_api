<?php
include 'db.php';
include 'helper.php';

file_put_contents('request_data.txt', print_r($_REQUEST, true));

if ($_REQUEST['action'] == 'register_job') {

    $uid = formatAndCleanInput($connection, $_POST["uid"]);
    $responsibilities = formatAndCleanInput($connection, $_POST["responsibilities"]);
    $jobPosition = formatAndCleanInput($connection, $_POST["jobPosition"]);
    $company = formatAndCleanInput($connection, $_POST["company"]);
    $vacancy = formatAndCleanInput($connection, $_POST["vacancy"]);
    $jobType = formatAndCleanInput($connection, $_POST["jobType"]);
    $educationalRequirements = formatAndCleanInput($connection, $_POST["educationalRequirements"]);
    $experience = formatAndCleanInput($connection, $_POST["experience"]);
    $additionalRequirements = formatAndCleanInput($connection, $_POST["additionalRequirements"]);

    $location = formatAndCleanInput($connection, $_POST["location"]);
    $salary = formatAndCleanInput($connection, $_POST["salary"]);
    $benefits = formatAndCleanInput($connection, $_POST["benefits"]);
    $age = formatAndCleanInput($connection, $_POST["age"]);
    $gender = formatAndCleanInput($connection, $_POST["gender"]);
    $deadline = formatAndCleanInput($connection, $_POST["deadline"]);
    $deadline_format = date("Y-m-d", strtotime($deadline));

    $sql = "INSERT INTO jobs (position,company,responsibilities,vacancy,employment_status,educational_requirements,experience_requirements,additional_requirements,location,salary,benefits,age,gender,deadline,created)
        VALUES ('" . $jobPosition . "','" . $company . "' ,'" . $responsibilities . "' ,'" . $vacancy . "' ,'" . $jobType . "' ,'" . $educationalRequirements . "' ,'" . $experience . "' ,'" . $additionalRequirements . "' ,'" . $location . "' ,'" . $salary . "' ,'" . $benefits . "' ,'" . $age . "' ,'" . $gender . "' ,'" . $deadline_format . "' , NOW())";
    $res = mysqli_query($connection, $sql);

    $return["errorCode"] = 0;
    $return["message"] = "Your job created process is completed.";
    $return["response_data"] = [];

    // checking if there is POST data
} else {
    $return["errorCode"] = -1;
    $return["message"] = 'Send  parameters.';
    $return["response_data"] = [];
}

mysqli_close($connection);

header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string
