<?php
require ('./classes/Employee.php');

if (!empty($_POST)) {
	$employee = new Employee();
	$addEmployee = $employee->updateEmployee($_POST['column'], $_POST['value'], $_POST['id']);
	if (isset($addEmployee)) {
		$_SESSION['success'] = 'Employee Added.';
		header('location:'.BASE_URL);
	}	
} ?>