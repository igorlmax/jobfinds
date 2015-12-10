<!-- Banner
================================================== -->
<div id="banner" style="background: url(img/banner-home-01.jpg)">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="search-container">

				<!-- Form -->
				<form method="post" action="<?php echo $this->webroot; ?>jobs/browse">
				<h2>Find job</h2>
					<input name="keywords" id="keywords" type="text" class="ico-01" placeholder="job title, keywords or company name" value=""/>
					<input type="text" class="ico-02" placeholder="city, province or region" value=""/>
					<button type="submit"><i class="fa fa-search"></i>Submit</button>
				</form>

				<!-- Browse Jobs -->
				<div class="browse-jobs">
					Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a>
				</div>
				
				<!-- Announce -->
				<div class="announce">
					We have over <strong>15 000</strong> job offers for you!
				</div>

			</div>

		</div>
	</div>
</div>