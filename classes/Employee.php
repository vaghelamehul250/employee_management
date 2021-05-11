<?php 
require_once "./config.php";
require_once ("Database.php");


/**
 * Class for Employee management 
 */
class Employee extends Database {
  public $db;
  function __construct() {
    $this->db = new Database();
  }

  function addEmployee($request_params) {
    $query = "INSERT INTO employees (fullName, emailId, phoneNumber, department, joiningDate) VALUES (?, ?, ?, ?, ?)";
    $insert = $this->db->query($query, $request_params);
    return $insert->lastInsertID();
  }
  
  function updateEmployee($column, $value, $Employee_id) {
    $query = "UPDATE employees SET ".$column." = ? WHERE id = ?";
    if ($column == 'joiningDate') {
      $value = date('Y-m-d', strtotime($value));
    }
    $paramValue = array(
      $value,
      $Employee_id
    );
    $update = $this->db->query($query, $paramValue);
    return $update->lastInsertID();
  }

  function getAllEmployee() {
    $sql = "SELECT * FROM employees";
    $result = $this->db->query($sql);
    return $result->fetchAll();
  }
}
?>