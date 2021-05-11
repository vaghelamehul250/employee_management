<?php 
require ('./common/header.php');
require_once ('./classes/Employee.php');

$employee = new Employee();
$getEmployees = $employee->getAllEmployee();

?>
<div class="infobar">
	<?php
	if (!empty($_SESSION['success'])) {
		echo '<label class="success">'.$_SESSION['success'].'</label>';
	} else if (!empty($_SESSION['error'])) {
		echo '<label class="error">'.$_SESSION['error'].'</label>';
	}
	session_destroy();
	?>
</div>
<div class="action_button">
	<a class="button" href="<?php echo BASE_URL.'employeeAdd.php'; ?>">Add New Employee</a>
	<a class="button" href="<?php echo BASE_URL.'csv/employees.csv'; ?>" download>Download CSV</a>
</div>
<section class="section userlist_section">
	<div class="employee_list_div">
		<table id="employees">
		  <tr>
		  	<th>Sr. No</th>
		    <th>Full Name</th>
		    <th>Email</th>
		    <th>Phone Number</th>
		    <th>Department</th>
		    <th>Joining Date</th>
		  </tr>
		  <?php if (count($getEmployees) > 0) {
		  	foreach ($getEmployees as $key => $employee) { ?>
		  		<tr>
		  			<td><?php echo $key+1; ?></td>
				    <td contenteditable="true" data-old_value="<?php echo $employee['fullName']; ?>" onBlur="saveInlineEdit(this,'fullName','<?php echo $employee['id']; ?>')" class="content" required title="Edit Full Name"><?php echo $employee['fullName']; ?></td>
				    <td contenteditable="true" data-old_value="<?php echo $employee['emailId']; ?>" onBlur="saveInlineEdit(this,'emailId','<?php echo $employee['id']; ?>')" class="content" required title="Edit Email"><?php echo $employee['emailId']; ?></td>
				    <td contenteditable="true" data-old_value="<?php echo $employee['phoneNumber']; ?>" onBlur="saveInlineEdit(this,'phoneNumber','<?php echo $employee['id']; ?>')" class="content" required title="Edit Phone Number"><?php echo $employee['phoneNumber']; ?></td>
				    <td contenteditable="true" data-old_value="<?php echo $employee['department']; ?>" onBlur="saveInlineEdit(this,'department','<?php echo $employee['id']; ?>')" class="content" required title="Edit Department"><?php echo $employee['department']; ?></td>
				    <td contenteditable="true" data-old_value="<?php echo $employee['joiningDate']; ?>" onBlur="saveInlineEdit(this,'joiningDate','<?php echo $employee['id']; ?>')" class="content" required title="Edit joiningDate"><?php echo date('d-m-Y', strtotime($employee['joiningDate'])); ?></td>
				</tr>
		  	<?php }
		  } else { ?>
	  		<tr>
			    <td colspan="6">No data found</td>
			  </tr>
		  <?php } ?>
		</table>
	</div>
</section>
<?php require ('./common/footer.php'); ?>

<script type="text/javascript">
	const selectors = document.querySelectorAll('td[contenteditable="true"][required]');
	for (let selector of selectors) {
	  selector.addEventListener('input', () => {
	    if (selector.innerHTML === '') {
	      selector.style.border = '2px solid red';
	      selector.classList.add('content-invalid');
	    }
	    else {
	      selector.style.border = 0;
	      selector.classList.remove('content-invalid');
	    }
	  })
	}

	function saveInlineEdit(editableObj,column,id) {
		if($(editableObj).attr('data-old_value') === editableObj.innerHTML){
			return false;
		}

		$.ajax({
			url: "<?php echo BASE_URL.'employeeEdit.php'; ?>",
			type: "POST",
			dataType: "json",
			data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id,
			success: function(response) {
				$(editableObj).attr('data-old_value',editableObj.innerHTML);
				$(editableObj).css("background","#FDFDFD");
			},
			error: function () {
				console.log("errr");
			}
		});
	}
</script>
