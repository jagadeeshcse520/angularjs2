<h2>Edit Details</h2>
<?php foreach($employee_edit as $row) { ?>
<div class="container">
<form method="post" action="<?php echo base_url('index.php/Employee/update_employee'); ?>" enctype="multipart/form-data">
	<div>
		Employee Id: <input type="hidden" class="form-control" id="emp_id"  name="emp_id" value="<?php echo $row['emp_id']; ?>" ></br>
		Name: <input type="text" class="form-control" id="emp_name"  name="emp_name" value="<?php echo $row['emp_name']; ?>"></br>
		Email: <input type="text" class="form-control" id="emp_email"  name="emp_email" value="<?php echo $row['emp_email']; ?>"></br>
		Gender: <input type="radio" class="" id="emp_gender"  name="emp_gender" value="Male">Male
		<input type="radio" class="" id="emp_gender"  name="emp_gender" value="Female">Female</br>
		Address: <input type="text" class="form-control" id="emp_address"  name="emp_address" value="<?php echo $row['emp_address']; ?>"></br>
		Upload Image: <input type="file" class="form-control" id="emp_image"  name="emp_image" value=""></br>
		<input name="submit" type="submit" id="doSubmit" value="Save" class="btn btn-info btn-pretty ">
	</div>
</form>
</div>
<?php } ?>