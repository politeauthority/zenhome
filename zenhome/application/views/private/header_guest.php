<!DOCTYPE html>
<html>
	<head>
		<title>ZenHome</title>
		<!-- Bootstrap -->
		<link href="<?php echo base_url(); ?>zenhome/public_html/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>zenhome/public_html/css/layout.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="<?php echo base_url(); ?>zenhome/public_html/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>zenhome/public_html/bootstrap/js/bootstrap-dropdown.js"></script>
	</head>
	<body>
	<div class="navbar">
		<div class="navbar-inner">
			<a class="brand" href="#">ZenHome</a>
			<ul class="nav">
				<li class="active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>outside/logout">Login</a></li>
			</ul>

		<? /*			
		<div class="dropdown">
		  <!-- Link or button to toggle dropdown -->
		  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		    <li><a tabindex="-1" href="#">Action</a></li>
		    <li><a tabindex="-1" href="#">Another action</a></li>
		    <li><a tabindex="-1" href="#">Something else here</a></li>
		    <li class="divider"></li>
		    <li><a tabindex="-1" href="#">Separated link</a></li>
		  </ul>
		</div>
		*/ ?>

		</div>
	</div>