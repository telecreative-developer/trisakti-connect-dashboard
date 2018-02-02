<?php 

error_reporting(0)

?>

<div class="main-wrapper">
		<div class="padding-80">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php 
							foreach($list_vote as $polls){?>
								<div class="col-xs-6 col-sm-4">
									<article class="post-single post-style-1">
										<div class="post">
											<div class="item">
												<a href="<?php echo base_url() . "list_vote/" . $polls->id_poll; ?>">

													<?php 
													$thumbnail = substr($polls->thumbnail_poll,10);
													if($thumbnail == ""){
													?>
														<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" width="100%" height="200px;"></a>
													<?php 
													}else{
													?>
														<img src="<?php echo $polls->thumbnail_poll?>" width="100%" height="200px;" ></a>
													
													<?php 
														}
													?>
											</div>
											<div class="body" span style="background: #385369; margin-bottom: 20px;">
												<a href="<?php echo base_url() . "list_vote/" . $polls->id_poll; ?>">
													<h3 span style="color:#fff;font-family:'Arial'; font-size:14px; padding:10px;">
														<i class="fa fa-tags"></i>  
														<?php echo $polls->title_poll;?>		
													</h3>
												</a>
											</div>
										</div>	
								</article><!-- /.post-single -->
							</div><!-- /.masonary-item-two-column -->
						<?php }?>

					</div>
				</div><!-- /.row -->
			</div>				
			<p><center><?php echo $links;?></center></p>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


		