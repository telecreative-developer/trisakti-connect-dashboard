<div class="main-wrapper">
	<div class="padding-80">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php foreach($agreenews as $news){?>
				
						<div class="post-wrapper" style="margin-bottom: 20px; box-shadow: 0 0 10px #ccc">
					
								<?php 
								$thumbnail = $news->thumbnail;
								if($thumbnail == ''){
								?>
									<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" alt="img" class="img-responsive" width="100%;">
								<?php 
								}else{
								?>
									<img src="<?php echo $news->thumbnail?>" alt="img" class="img-responsive" width="100%;">

								<?php 
									}
								?>
								<div>
								<br>
									
						</div>

							<div class="post-title" id="span_title">
								<h3>
									<a span style="font-size:20px; color:#00569b; font-family:Lato;">
									<?php echo $news->title;?>
										
									</a>
								</h3>

								<span style="font-size:13px;"><i class="fa fa-tags"></i> <?php echo $news->category;?></a></span>
								<span style="font-size:13px;"><i class="fa fa-calendar"></i> <?php echo $news->date;?></span>
								<span style="font-size:13px;"><i class="fa fa-user"></i> <?php echo $news->name;?></span>
								<br><br>
							</div>
							<div class="post-entry">
								<p span style="font-size: 13px;" class="paragraph_article">
									<?php echo $news->content;?>
								</p>

							</div>
						</div>

					<?php }?>	
					
					<div class="count" span style="padding:10px; background:#fff; height:50px; box-shadow: 0 0 10px #ccc;">
						<?php 
							$id = $news->id_news;
							$sql = $this->db->query("SELECT COUNT(*) as total FROM comments WHERE id_news = '$id'");
							$row = $sql->row();
						?>
						<p span style="font-size:15px; float:left;"><i class="fa fa-comments-o"> <?php echo $row->total;?> Comments </i></p>

						<div class="claps">
							<p span style="font-size:15px; float:right; background:#00569b; height:30px; color:#fff; padding-top:5px; padding-left:10px; padding-right:10px; border-radius: 50px; font-family:Lato;">
								<i class="fa fa-hand-paper-o"> 
									<?php echo $news->claps;?>
								</i>
							</p>
						</div>


					</div>
					
					<br><br>
					<?php 
						foreach ($comments as $com) {
					?>
					<div class="row" span style=" margin-bottom:10px; margin-left: 0px; margin-right:0px; box-shadow:0 0 10px #ccc; padding-right:10px;">
						<div class="col-xs-4 col-lg-2">

							<?php 
								$ava = $com->avatar;
								if($ava == ''){
								?>
									<img src="http://tinhocthoidai.vn/images/avatar/avatar-none.jpg" alt="img" width="100%" class="img-circle" span style="padding:10px; margin-top: 5px;">
								<?php 
								}else{
								?>
									<img src="<?php echo $ava->avatar?>" alt="img" class="img-circle" width="100%;" span style="padding:10px; margin-top: 5px;">

							<?php 
								}
							?>

						</div>
						<div class="col-xs-8 col-lg-10" span style="padding:10px; margin-top: 15px;">
							<p span style="float:left; color:#000"> <?php echo $com->name;?> </p>
							<p span style="float:right; color:#000; font-size: 12px;"><?php echo $com->date;?></p>
							<br><br>
							<p span style="font-size:12px;"> 
								<?php 
									echo $com->comment;
								?>
							</p>
						</div>
					</div>	
					<?php 
					}
					?>

				</div>

				<div class="col-md-4">
					<div class="sidebar">
						
						<div class="widget widget_tags last">
							<div class="widget-title">
								<h5>CATEGORIES</h5>
								<br>
								<ul>
									<?php foreach($categories as $cat){
									?>	
										<li><a href="<?php echo base_url() . "Trisakti/category/" . $cat->category; ?>"><?php echo $cat->category?></a></li>
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

	