<style type="text/css">
	#form{
		box-shadow: 3px solid #fff;
		margin-top: 100px;
		padding-left:15px;
		padding-right: 15px;
		padding-bottom:15px;
	}
	#form img{
		padding: 10px;
	}
	body{
		background: #2366ab;
	}
	input[type='submit']{
		background: #d35c72;
	}
	input[type='submit']:hover{
		background: #d35c72;
	}
	input::placeholder{
		color:#ccc !important;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4" id="form">

			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6"><br><br>
					<img src="<?php echo base_url()?>images/logo-white.png" width="100%">
				</div>
				<div class="col-lg-3"></div>
			</div><br>
			<br>
			<form method="POST" action="login_valid">
				<input type="text" name="username" placeholder="Username" class="form-control"><br>
				<input type="password" name="password" placeholder="*********" class="form-control">
				<br>
				<input type="submit" name="submit" value="Login" class="form-control btn btn-primary" style="float:right">
				<br><br><br><br>
			</form>

		</div>
		<div class="col-lg-4"></div>
	</div>
</div>