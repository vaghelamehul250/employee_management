<?php 
require './common/header.php';
?>
<section class="section add_employee_section">
	<div class="add_employee_form_div">
	  <form action="<?php echo BASE_URL.'employeeInsert.php'; ?>" method="post">
	    <label for="fullName">Full Name</label>
	    <input type="text" id="fullName" name="fullName" placeholder="Your Full Name .." required>

	    <label for="emailId">Email Id</label>
	    <input type="email" id="emailId" name="emailId" placeholder="Your Email.." required>

	    <label for="phoneNumber">Phone Number</label>
	    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Your Phone Number.." required title="It is numeric, It will be max of 10 chars, First digit is not zero" pattern="[1-9]{1}[0-9]{9}">

	    <label for="department">Department</label>
	    <select id="department" name="department" required>
	      <option>Select Department</option>
	      <option value="webDeveloper">Web Developer</option>
	      <option value="webDesigner">Web Designer</option>
	      <option value="androidDeveloper">Android Developer</option>
	    </select>

	    <label for="joiningDate">Joining Date</label>
	    <input type="date" id="joiningDate" name="joiningDate" placeholder="Your Joining Date.." required>

	    <input type="submit" value="Submit" name="submit">
	  </form>
	</div>
</section>