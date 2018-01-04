<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- title -->
		<title>Trisakti Connect</title>
		
		<!-- meta Data -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Trisakti Connect">
		<meta name="author" content="Telecreative">
		<link rel="shortcut icon" href="<?php echo base_url()?>images/logo-small-blue.png">
		
		<!-- stylesheet -->
		<link href="<?php echo base_url();?>assets_front/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/gap-icons.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/owl.theme.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/owl.transitions.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/magnific-popup.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets_front/css/animate.css" rel="stylesheet">
		
		<!-- custom Stylesheet -->
		<link href="<?php echo base_url();?>assets_front/css/main.css" rel="stylesheet">
		
		<!-- responsive -->
		<link href="<?php echo base_url();?>assets_front/css/responsive.css" rel="stylesheet">
		
		<!-- google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Rufina%7cfamily=Lato' rel='stylesheet' type='text/css'>

		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets_front/js/html5shiv.min.js"></script>
		<script src="assets_front/js/respond.min.js"></script>
		<![endif]-->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>

	</head>
	<body>
		<style type="text/css">
			.pagination ul li a{
				padding:10px;
			}
			.pagination ul li{
				display: inline-block;
			}
			.pagination li.active a{
				color:#00569b;
			}
			#social a:hover{
				color:#00569b;
			}
			#list_polls{
				background: #00569b;
			}
			#list_polls h3{
				padding-top:10px;
				padding-left:10px;
				color:#fff;
				font-family: Lato;
			}
		</style>

		<!-- header start -->
		
		<header id="home">
			<div class="navbar-default navbar-fixed-top">
				<!-- Main-nav -->
				<nav class="navbar navbar-home">
					<div class="container">
						<!-- Navbar Brand -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#matblog-navbar-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="matblog-navbar-1"">
							<ul class="nav navbar-nav">
								<li class="has-sub-menu">
									<a href="<?php echo base_url() . ""; ?>"> <i class="fa fa-home"></i> HOME </a>
								</li>
								
								<li class="has-sub-menu">
									<a href="<?php echo base_url() . "vote"; ?>"> <i class="fa fa-bar-chart "></i> VOTE </a>
								</li>

								<li class="active has-sub-menu">
									<a href="<?php echo base_url() . "careers"; ?>"> <i class="fa fa-user "></i> CAREERS </a>
								</li>
								
								
							</ul>
							
							<form action="<?php echo base_url();?>search" method="POST" class="navbar-form navbar-right">
								<input type="text" name="search" class="form-control" placeholder="Enter Keywords" required="ON">
								<button type="submit" class="btn-default"><i class="fa fa-search" span style="color:#fff" aria-hidden="true"></i></button>
							</form>
							
						</div><!-- /.navbar-collapse -->
						<div class="nav-logo-default">
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo-white.png" alt="Trisakti Connect" class="img-responsive" span style="margin-left:65px;margin-top: 38px;" width="45px;"></a>
						</div><!-- /.nav-logo-default -->
						<div class="nav-logo-default-small">
							<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo-white.png" alt="Trisakti Connect" class="img-responsive" width="45px;"></a>
						</div><!-- /.nav-logo-default-small --> 
					</div><!-- /.container-fluid -->
				</nav><!-- /.main-nav -->
			</div>
		</header>
		
		<!-- slider end -->