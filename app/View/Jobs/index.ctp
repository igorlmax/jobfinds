<!-- foreach act as a "for loop" -->

	<div class="eleven columns">
		<div class="padding-right">
			<h3 class="margin-bottom-25">Recent Jobs</h3>
			<ul class="job-list">
				
				<!-- class highlighted is missing -->
				
				<?php foreach ($jobs as $job) : ?>
				<li><a href="job-page.html">
					<img src="<?php echo $this->webroot; ?>img/job-list-logo-03.png" alt="">
					<div class="job-list-content">
						<h4><p><?php echo $job['Job']['title']?></p> <span style="background:<?php echo $job['Type']['color']; ?>;float:right; position:relative;"><?php echo $job['Type']['name']?></span></h4>
						<div class="job-icons">
							<span><i class="fa fa-briefcase"></i> <?php echo $job['Job']['company_name']?></span>
							<span><i class="fa fa-map-marker"></i> <?php echo $job['Job']['city']?></span>
							<span><i class="fa fa-money"></i> <?php echo $job['Job']['sallary_hour']?> / hour</span>
							<span><i class="fa fa-clock-o"></i> <?php echo $this->Time->format('F jS',$job['Job']['created']); ?></span>
						</div>
					</div>
					</a>
					<div class="clearfix"></div>
				</li>
			<?php endforeach; ?>
			</ul>
			
			<a href="browse-jobs.html" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
			<div class="margin-bottom-55"></div>
		</div>
	</div>
