<?php 
require ('./classes/Employee.php');
require ('./classes/Csv.php');

if (isset($_POST['submit'])) {
	$param = array(
		'fullName' => $_POST['fullName'],
	    'emailId' => $_POST['emailId'],
	    'phoneNumber' => $_POST['phoneNumber'],
	    'department' => $_POST['department'],
	    'joiningDate' => $_POST['joiningDate'],
	);

	$filename = dirname(__FILE__).'/csv/employees.csv';
	$file = new Csv($filename, 'a');
	$csv_add = $file->addLine($param);
	if ($csv_add == 'added') {
		$employee = new Employee();
		$addEmployee = $employee->addEmployee($param);
		if (isset($addEmployee)) {
			$_SESSION['success'] = 'Employee Added.';
			header('location:'.BASE_URL);
		}
	}
}
