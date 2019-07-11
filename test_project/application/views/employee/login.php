
<h2>Login</h2>
<div class="container">
<form method="post" action="<?php echo base_url('index.php/Employee/listing_page'); ?>">
	<div>
		<!--Employee Id: <input type="text" class="form-control" id="emp_id"  name="emp_id" value=""></br>-->
		
		Email: <input type="text" class="form-control" id="emp_email"  name="emp_email" value=""></br>
		Password: <input type="password" class="form-control" id="pwd"  name="pwd" value=""></br>
		
		<input name="submit" type="submit" id="doSubmit" value="Save" class="btn btn-info btn-pretty ">
	</div>
</form>
</div>