<script>
	function change_state(val)
	{
		$.ajax({
		 type: 'post',
		 url: '<?php echo base_url('index.php/Employee/state_list'); ?>',
		 data: {
		   cntry_id:val
		 },
		 success: function (response) {
			//alert(response);
			$('#changestatebyAjax').html(response);
		 }
	   });
	}
</script>
<div class="container">
<form method="post" action="<?php echo base_url('index.php/Employee/register'); ?>" enctype="multipart/form-data">
	<div>
		<!--Employee Id: <input type="text" class="form-control" id="emp_id"  name="emp_id" value=""></br>-->
		Name: <input type="text" class="form-control" id="emp_name"  name="emp_name" value=""></br>
		Email: <input type="text" class="form-control" id="emp_email"  name="emp_email" value=""></br>
		Password: <input type="password" class="form-control" id="pwd"  name="pwd" value=""></br>
		Gender: <input type="radio" class="" id="emp_gender"  name="emp_gender" value="Male">Male
		<input type="radio" class="" id="emp_gender"  name="emp_gender" value="Female">Female</br>
		Address: <input type="text" class="form-control" id="emp_address"  name="emp_address" value=""></br>
		Country:
		<select class="form-control" id="country"  name="country" onchange="change_state(this.value);">
			<option value="">---Select Country---</option>
			<?php foreach($countryList as $res) { echo "name"+ $res['country_name'];?>
			
				<option value="<?php echo $res['country_id']; ?>"><?php echo $res['country_name']; ?></option>
			<?php } ?>
		</select>
		State:
		<select class="form-control" name="state" id="changestatebyAjax">
			<option value="" id="stateid">---Select State---</option>
		</select>
		Upload Image: <input type="file" class="form-control" id="emp_image"  name="emp_image" value=""></br>
		<input name="submit" type="submit" id="doSubmit" value="Save" class="btn btn-info btn-pretty ">
		
	</div>
</form>
</div>