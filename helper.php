<?php

function formatAndCleanInput($db_connection, $input) {
			return mysqli_real_escape_string($db_connection, $input);
}
