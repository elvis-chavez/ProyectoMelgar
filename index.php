<?php
error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set('error_log', 'php_error.log');

error_log("Hello, errors!");

require 'vendor/autoload.php';
require 'src/lib/routes.php';