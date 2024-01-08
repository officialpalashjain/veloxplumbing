<?php get_header();?>
<?php
	global $post;
	$sngl = '';
	$post_id = $post->ID;
	$post_title = $post->post_title;
	$post_content = $post->post_content;
	$banner_image = CFS()->get('banner_image');
	$banner_heading = CFS()->get('banner_heading');
	$request_a_quote_form = CFS()->get('request_a_quote_form');
	$section_1_image = CFS()->get('section_1_image');
	$section_1_heading = CFS()->get('section_1_heading');
	$section_1_content = CFS()->get('section_1_content');
	$bottom_section_heading = CFS()->get('bottom_section_heading');
	$bottom_section_content = CFS()->get('bottom_section_content');
	$bottom_section_buttun_text = CFS()->get('bottom_section_buttun_text');
	$bottom_section_button_link = CFS()->get('bottom_section_button_link');

	$services_box_heading = CFS()->get('services_box_heading');
	$services_box_content = CFS()->get('services_box_content');

	$services_list_heading = CFS()->get('services_list_heading');
	$services_list_section_content = CFS()->get('services_list_section_content');

	$services_faq_heading = CFS()->get('services_faq_heading');
	$services_faq_section = CFS()->get('services_faq_section');
?>
	<div class="home_banner_mainsec services_banner_mainsec" style="background-image:url('<?php echo $banner_image; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="banner_contnt">
						<h1><?php echo $banner_heading; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="home_contct_form contact_page_form">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="form_sec">
						<div class="title_mainsec">
							<h2>Request a quote</h2>
						</div>
						<?php echo do_shortcode($request_a_quote_form); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="services_emergency_infosec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div class="img_sec">
						<img src="<?php echo $section_1_image; ?>" alt="<?php echo get_image_alt_by_url($section_1_image); ?>">
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div class="contnt_mainsec">
						<h2><?php echo $section_1_heading; ?></h2>
						<p><?php echo $section_1_content; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	if($services_box_content) { ?>
		<div class="why_choose_mainsec emergency_services">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="top_contnt_sec">
							<h2>How Do You Know that You Need Emergency<br/> Plumbing Services in Chicago</h2>
						</div>
					</div>
				</div>
			
			<div class="row why_choose_infosec">
		<?php
			foreach ($services_box_content as $k => $v) { ?>
				<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
					<div class="why_choose_boxsec">
						<div class="contnt_sec">
							<h3>Burst Pipes</h3>
							<p>Frankly, burst pipes will easily wreak havoc in your home. Whether it’s the pipes that transport water or waste, once they burst, you need to call for help immediately. Otherwise, they will cause serious water damage to your property and disrupt the water supply. In case this happens, Velox Plumbing is just a way to fix water line repair or leak repair.</p>
						</div>
					</div>
				</div>
		<?php } ?>
			</div> </div> </div>
	<?php } ?>

	<?php
	if($services_list_section_content) { ?>
		<div class="about_trusted_plumbing servives_points_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="contnt_mainsec">
							<h2><?php echo $services_list_heading; ?></h2>
							
							<ul>
								<?php 
								if($services_list_section_content) {
									foreach ($services_list_section_content as $k => $v) {
										echo '<li>'.$v['content'].'</li>';
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php
	if($services_faq_section) { ?>
	<div class="faq_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="main_titlesec">
						<h2><?php echo $services_faq_heading; ?></h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="accordion" id="accordionExample">
						<?php
						if($services_faq_section) {
							foreach ($services_faq_section as $k => $v) { ?>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne_<?php echo $k; ?>">
										<button class="accordion-button <?php if($k) { echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne__<?php echo $k; ?>" aria-expanded="<?php if($k) { echo false; } else { echo true; } ?>" aria-controls="collapseOne__<?php echo $k; ?>">
											<?php echo $v['titile']; ?>
										</button>
									</h2>
									<div id="collapseOne__<?php echo $k; ?>" class="accordion-collapse collapse <?php if(!$k) { echo 'show'; } ?>" aria-labelledby="headingOne_<?php echo $k; ?>" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?php echo $v['content']; ?>
										</div>
									</div>
								</div>
					  	<?php } } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="about_get_started services_contact_sec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="contnt_mainsec">
						<h2><?php echo $bottom_section_heading; ?></h2>
						<p><?php echo $bottom_section_content; ?></p>
						
						<div class="btn_mainsec">
							<a class="btn_style" href="<?php echo $bottom_section_button_link; ?>"><?php echo $bottom_section_buttun_text; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>