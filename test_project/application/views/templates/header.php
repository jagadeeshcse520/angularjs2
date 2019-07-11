<html lang="en">
<?php $current_filename = $this->router->method; ?>
<head>
  <title>Employess data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Employee Data</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($current_filename == 'profile') { ?> class="active" <?php } ?>><a href="<?php echo base_url('index.php/Employee/profile'); ?>">Profile<span class="sr-only">(current)</span></a></li>
        <li <?php if($current_filename == 'employeelist') { ?> class="active" <?php } ?>><a href="<?php echo base_url('index.php/Employee/employeelist'); ?>">Employees list</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#">Edit Profile</a></li>-->
        <li class="dropdown">
			<?php if($this->session->userdata('user_name')!="") { ?> 
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('user_name'); ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url('index.php/Employee/edit_employee/'.$this->session->userdata('user_id').''); ?>">Edit profile</a></li>
					<li><a href="<?php echo base_url('index.php/Employee/logout'); ?>">Logout</a></li>
				</ul>
			<?php } else { ?>
				<div class="row">
					<a href="<?php echo base_url('index.php/Employee/index'); ?>">Login</a>/
					<a href="<?php echo base_url('index.php/Employee/signup'); ?>" >SignUp</a>
				</div>
			<?php } ?>
				
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</html>