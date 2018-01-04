<div class="main-wrapper">
	<div class="padding-80">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
							<?php 
							$x = count($searchnews);
							if($x > 0){
							
							foreach($searchnews as $news){?>
							<div class="col-xs-6 col-sm-6">
								<article style="margin-bottom: 20px; box-shadow: 0 0 10px #ccc">
									<div class="post-thumb ps-rel">
										<div class="post-thumb-slider owl-carousel owl-theme">
											<div class="item">
												<a href="<?php echo base_url() . "article/" . $news->id_news; ?>">

													<?php 
													$thumbnail = $news->thumbnail;
													if($thumbnail == ''){
													?>
														<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" alt="img" class="img-responsive"></a>
													<?php 
													}else{
													?>
														<img src="<?php echo $news->thumbnail?>" alt="img" class="img-responsive"></a>
													
													<?php 
														}
													?>
											</div>
										</div>
									</div>
									<div class="post-wrapper-skw ps-rel">
										<div class="post-wrapper">

											<div class="post-title">
												<h3>
													<a span style="font-size:20px; color:#00569b; font-family:Lato;" href="<?php echo base_url() . "article/" . $news->id_news; ?>">
													<?php echo substr($news->title,0,28);?>..
														
													</a>
												</h3>


												<div class="post-meta-data">
													
													<span span style="font-size:11px; font-style: normal;" class="post-catagory">
														<i class="fa fa-tags"></i> <?php echo $news->category;?>		
													</span>
													
													
													<span span style="font-size:11px; font-style: normal;" class="">
														<i class="fa fa-calendar-o"></i> <?php echo $news->date;?></span>

													<br>

													
													<span span style="font-size:11px; font-style: normal;" class="post-category">
													<i class="fa fa-user"></i> <?php echo $news->name;?> </span>
													
											</div>
											<br>

											</div>
											<div class="post-entry">
												<p span style="font-size:14px;">
													<?php echo substr($news->content, 0,150)?>.
												</p>

											</div>
											<div class="blog-footer-content blog-btn" span style="float:right">
												<a href="<?php echo base_url();?>article/<?php echo $news->id_news;?>" class="read-more-btn">Read More</a>
											</div>
											<br><br>
										</div><!-- /.post-wrapper -->
									</div>
							</article><!-- /.post-single -->
						</div><!-- /.masonary-item-two-column -->
						<?php }
						}else{
							?>	
							<div class="not_found" span style="margin-bottom: 20px; background: #fff; padding:20px;">
								<h2 span style="color:#03569b;"> Search Results</h2>
								<hr>
								<p>Your search did not match any article. Please make sure that all words are spelled correctly and that you've selected enough article.</p>
							</div>
						<?php 
						}
						?>


					</div>
				</div><!-- /.col-md-8 -->
				<div class="col-md-4">
					<div class="sidebar">
						
						<div class="widget widget_tags last">
							<div class="widget-title">
								<h5>CATEGORIES</h5>
								<br>
								<ul>
									<?php foreach($categories as $cat){
									?>	
										<li><a href="<?php echo base_url();?>Trisakti/category/<?php echo $cat->category;?>"><?php echo $cat->category?></a></li>
									<?php
									}
									?>
								</ul>
								<br>
							</div>
						</div>
					</div>
				</div><!-- /.col-md-4 -->
			</div><!-- /.row -->
		</div>
	</div>
</div>

