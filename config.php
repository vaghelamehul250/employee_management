<?php 
if (!isset($_SESSION)) {
	session_start();
}
define('BASE_URL', 'http://localhost/practical/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS',  '');
define('DB_NAME', 'employees_db');
?>