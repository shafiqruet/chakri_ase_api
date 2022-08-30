<?php

function formatAndCleanInput($db_connection, $input)
{
    return mysqli_real_escape_string($db_connection, $input);
}

function pr($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
