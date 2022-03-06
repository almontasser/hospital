<?php

// Load DotEnv variables
require 'DotEnv.php';
(new DotEnv(__DIR__ . '/.env'))->load();

$con = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'), getenv('DB_PORT'));

// Check connection
if ($con->connect_errno) {
  echo "Failed to connect to MySQL: " . $con->connect_error;
  exit();
}

$con->set_charset("utf8");

// Utility functions
function _esc($val)
{
  global $con;
  return mysqli_real_escape_string($con, stripslashes($val));
}
