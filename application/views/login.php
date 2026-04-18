<!DOCTYPE html>
	<html>
		<head>
			<title>Menu Login</title>
			<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/css/menulogin.css">
			<script language="javascript" src="<?php base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
		</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark navbar-fixed-top">
			<div class="container">
		 	<ul class="nav navbar-nav">
		    	<li class="nav-item">
		    		<a href="<?php base_url(); ?>">
		      			<h2>E-Cashier</h2>
		      		</a>
		    	</li>
		 	</ul>
		 	</div>
		</nav>
		<div class="menu">
		<?= $this->session->flashdata('message') ?>
		<form id="formlogin" action="<?php base_url(); ?>ecashier" method="post">
			  	<div class="form-group">
			   		<label>Username</label>
			   		<input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>">
			   		<?= form_error('username', '<small class="form-text text-danger">', '</small>') ?>
			  	</div>
			  	<div class="form-group">
			    	<label>Password</label>
			    	<input type="password" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>">
			    	<?= form_error('password', '<small class="form-text text-danger">', '</small>') ?>
			  	</div> 	
			  	<button type="submit" id="submit" class="btn btn-primary btn-block">Login</button> 	
		</form>
		</div>
		<script type="text/javascript" src="<?php base_url(); ?>assets/js/bootstrap.min.js"></script>
	</body>
</html>