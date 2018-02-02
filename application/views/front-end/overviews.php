<style type="text/css">
	input.jobs::placeholder {
	  color: #ccc !important;
	}
	.career p{
		line-height: 21px;
		font-size: 14px;
	}
	p.location{
		margin-top: 0px;
		font-size: 14px;
	}
	p.salary{
		color:#00569b;
		font-size: 14px;
	}
	p.company{
		color:#00569b;
		font-size: 14px;
	}
	img.career-image{
		margin-top: 10px;
	}
	#wrapper-careers{
		box-shadow: 0 0 10px #ccc;
		padding:10px;
		margin-bottom: 10px;
		margin-top: 20px;
		margin-left: 0px;
		margin-right: 0px;
	}
	p.title_careers{
		color:#000;
		font-size:20px;
	}
	.header_overview{
		color:#fff;
		background: #00569b;
		padding:10px;
		margin-top: -10px;
	}
	.header_overview p{
		font-size:14px;
		font-family: 'Lato', sans-serif;
	}
	p.overviews{
		padding:20px;
		color:#00569b;
	}
	p.title_over{
		font-size:16px;
		color:#000;
		margin-top: 10px;
		padding:20px 10px 0px 20px;
	}
	.overviews{
		margin-top: -10px;
	}
	.wrapper_overview{
		box-shadow: 0 0 10px #ccc;
	}
	footer{
		margin-top: 150px;
	}
</style>
<div class="main-wrapper">
	<div class="padding-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<?php 
						foreach ($jobs as $job) {
						
					?>
					<div class="row" id="wrapper-careers">
						<div class="col-xs-4 col-lg-2">
							

							<?php 
								$thumbnail = $job->avatar;
								if($thumbnail == ''){
								?>
									<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" alt="img" class="career-image" width="100%" >
								<?php 
								}else{
								?>
									<img src="<?php echo $thumbnail?>" alt="img" class="career-image" width="100%">		
							<?php 
								}
							?>

						</div>
						<div class="col-xs-8 col-md-10"><br>
							<div class="career">
								<p class="title_careers"> <?php echo $job->job_title;?> </p>
								<p class="company"> <?php echo $job->company;?> </p>
								<p class="location"><?php echo $job->work_location;?> </p>
								<p class="salary">IDR <?php echo $job->salary;?> </p>
								<p><?php echo $job->name?> - <?php echo $job->date;?></p>
							</div>
						</div>
					</div>	
					<div class="wrapper_overview">
						<div class="header_overview">
							<p><i class="fa fa-tags"></i> OVERVIEWS </p>
						</div>
						<div class="overviews">
							<p class="title_over"> Job Functional : <span style="color:#00569b;"><?php echo $job->job_function;?> </span></p>
							<p class="overviews"> 
								<?php echo $job->overview;?>
							</p>
						</div> 
					</div>
					<?php 
					}
					?>
				</div>
				<div class="col-lg-1"></div>
			</div>

		</div>
	</div>
</div>