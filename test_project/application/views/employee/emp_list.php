<?php //print_r($employeeList); ?>
<html>
	<body>
		<table class="table">
			<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Address</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 
				foreach($employeeList as $row) { ?>
				<tr>
				<td><?php echo $row['emp_name']; ?></td>
				<td><?php echo $row['emp_email']; ?></td>
				<td><?php echo $row['emp_gender']; ?></td>
				<td><?php echo $row['emp_address']; ?></td>
				<td><a href="<?php echo base_url('index.php/Employee/edit_employee/'.$row['emp_id'].''); ?>">Edit</a></td>
				<td><a href="<?php echo base_url('index.php/Employee/delete_employee/'.$row['emp_id'].''); ?>">Delete</a></td>
				
				</tr>
				<?php } ?>
				
			</tbody>
		</table>
	</body>
</html>
