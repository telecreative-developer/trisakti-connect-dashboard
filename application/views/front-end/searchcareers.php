<style type="text/css">
	input.jobs::placeholder {
	  color: #ccc !important;
	}
	.career p{
		line-height: 21px;
		font-size: 13px;
	}
	p.location{
		margin-top: 0px;
		font-size: 13px;
	}
	p.salary{
		color:#00569b;
		font-size: 13px;
	}
	p.company{
		color:#00569b;
		font-size: 13px;
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
	a.title_careers{
		color:#000;
	}

</style>
<div class="main-wrapper">
	<div class="padding-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<form method="POST" action="<?php echo base_url();?>searchcareers">
						<input type="text" name="searchcareers" class="jobs form-control" placeholder="Search job and companies">
					</form>	

				<?php 
				if(is_array($searchcareers)):
					foreach ($searchcareers as $careers) {
				?>
					<div class="row" id="wrapper-careers">
						<div class="col-xs-4 col-lg-2">
							<?php 
								$thumbnail = $careers->avatar;
								if($thumbnail == ''){
								?>
									<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" alt="img" class="career-image" width="100%" >
								<?php 
								}else{
								?>
									<img src="<?php echo $careers->avatar?>" alt="img" class="career-image" width="100%">		
							<?php 
								}
							?>
						</div>
						<div class="col-xs-8 col-md-10"><br>
							<div class="career">
								
								<a href="<?php echo base_url() . "overviews/" . $careers->id_career; ?>" class="title_careers">
									<p class="title_careers" span style="font-size: 16px; font-weight: bold;"> 
											<?php echo $careers->job_title;?> 
										<span style="color:#00569b">
											-
											<?php echo $careers->company;?> 
										</span>
									</p>
								</a>
								
								<p class="location"><?php echo $careers->work_location;?></p>
								<p class="salary"> IDR <?php echo $careers->salary;?> </p>

								<p><?php echo $careers->name;?> - <?php echo $careers->date;?></p>
							</div>
						</div>
					</div>
				<?php 
					}
					endif;
				?>
				</div>
				<div class="col-lg-1"></div>
			</div>

		</div>
	</div>
</div>