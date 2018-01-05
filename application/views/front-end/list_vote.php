<?php 
	$id_polls = $this->uri->segment(2);
	$pic = $this->db->query("SELECT * FROM polls WHERE id_poll = '$id_polls'");
	$row = $pic->row();

	$url = base_url();
	$pic = $row->thumbnail_poll;
	$title = $row->title_poll;
	$content = $row->content_poll;
	$slash = "images/";
	$full =  $url . $slash. $pic;
	error_reporting(0);
?>	

  <header class="container">
    <section class="content">
    
		<div class="row">
	      	<div class="col-lg-2"></div>
		      	<div class="col-lg-8">
		      		<div id="box-voted">
		      		<h2><center><?php echo $title;?></center></h2><br>
		      		<img src="<?php echo base_url();?><?php echo $pic;?>" width="100%;">
		      		<p span style="font-size: 12px;"><?php echo $content;?></p>

		      		<div class="row">
	      				<?php				
							foreach($list_vote as $list_candidate){
							?>
							<div class="col-xs-6 col-sm-3">
								<article span style="margin-top: 20px; box-shadow:0 0 10px #ccc; padding:10px; margin-bottom: 10px;">
									
									<div class="post">
										<?php 
											$avatar = $list_candidate->avatar;
											$ava = substr($avatar,10);
											
											if($ava == ''){
											?>
												<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Flag_of_None.svg/2000px-Flag_of_None.svg.png" alt="img" class="img-responsive" width="100%;"></a>
											<?php 
											}else{
											?>
												<img src="<?php echo $list_candidate->avatar?>" alt="img" class="img-responsive" width="100%;"></a>
											
											<?php 
												}
											?>
										<div class="post">
											<div class="name">
												<p span style="font-size: 12px;"><?php echo $list_candidate->candidate;?></p>
												
												<?php 
													$id = $this->uri->segment(2);
													$candidate = $list_candidate->candidate;
													$x = $list_candidate->id_polls_choice;

													$sql = $this->db->query("SELECT COUNT(*) as total FROM pollsanswers,pollschoice WHERE pollsanswers.id_polls = '$id' AND pollschoice.idpoll_choice = '$x' AND pollsanswers.idpoll_choice = '$x' GROUP BY pollsanswers.idpoll_choice = '$x' ");
													$row = $sql->row();
													$voted = $row->total;
												?>

												<small span style="font-family: Lato; margin-top: 10px;"> 
													<?php 
														if ($voted == NULL) {
															echo "0 Voted";
														}else{
															echo $voted." Voted";
														}
													?>
												</small>
											</div>
											<?php 
												$id_polls = $this->uri->segment(2); 
												$id = $id_polls;
											?>
											<div class="blog-footer-content blog-btn" span style="margin-left: 10px;">
												
												<!--<a onclick="javascript:return confirm('Are you sure ?')" span style="font-size: 10px; border-radius:0px !important;" href="<?php echo base_url() . "votenow/" .$id."/" . $list_candidate->id_polls_choice; ?>" class="read-more-btn">Vote Now</a>
												-->
												
											</div>

											<br><br>
										</div>
									</div>
							</article>
						</div>

						<?php }?>

						<div id="calculationvoting" style="min-width: 100%; height: 400px; margin-top:270px;">
							<?php				
								
								foreach($list_vote as $list){
							
							?>	
							<?php }?>
						</div>
						

		      		</div>
		      	</div>
		      </div>
	      	<div class="col-lg-2"></div>
	      </div>
   
    </section>
  </header>

<script type="text/javascript">
<?php 
	if ($list->candidate == "") {
		echo "der";
	}else{
?>
Highcharts.chart('calculationvoting', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Voting'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Voting'
        }

    },
    legend: {
        enabled: false
    },

    series: [{
        
        colorByPoint: true,
        data: [
        <?php  foreach($list_vote as $list){ 
        	$id = $this->uri->segment(2);
			$candidate = $list_candidate->candidate;
			$x = $list->id_polls_choice;

			$sql = $this->db->query("SELECT COUNT(*) as total FROM pollsanswers,pollschoices WHERE pollsanswers.id_poll = '$id' AND pollschoices.idpoll_choice = '$x' AND pollsanswers.idpoll_choice = '$x' GROUP BY pollsanswers.idpoll_choice = '$x' ");
			$row = $sql->row();
			$voted = $row->total;

        	?>
            {
        	name: '<?php echo $list->candidate;?>',
            y:<?php if($voted == ""){
            	echo "0";
            }else{
            	echo $voted;
            }
        	?>
        	
        },
         <?php }?>
       
        ]
    

    }],
    
});
<?php 
} 
?>
</script>

	