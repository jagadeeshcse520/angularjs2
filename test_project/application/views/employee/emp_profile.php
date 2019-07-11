<html>
	<body>
		<?php foreach($emp_profile as $row) { ?>
			<div class="container">
				<table class="table">
					<tr><td><b>Name</b></td> <td><?php echo $row['emp_name']; ?></td>
					<tr><td><b>Email</b></td> <td><?php echo $row['emp_email']; ?></td>
					<tr><td><b>Gender</b></td> <td><?php echo $row['emp_gender']; ?></td>
					<tr><td><b>Address</b></td> <td><?php echo $row['emp_address']; ?></td>
					
				</table>
			</div>
		
		<?php } ?>
	</body>
</html>
