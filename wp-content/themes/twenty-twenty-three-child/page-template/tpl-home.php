<?php
/**
* Template Name: Home
*
*/
?>
<?php get_header(); ?>
<?php 
	$home_banner_image = CFS()->get('home_banner_image');
	$home_banner_heading = CFS()->get('home_banner_heading');
	$home_banner_sub_heading = CFS()->get('home_banner_sub_heading');
	$request_a_quote_form = CFS()->get('request_a_quote_form');
	$home_section_1_image = CFS()->get('home_section_1_image');
	$home_section_1_heading = CFS()->get('home_section_1_heading');
	$home_section_1_content = CFS()->get('home_section_1_content');
	$home_section_2_heading = CFS()->get('home_section_2_heading');
	$home_section_2_content = CFS()->get('home_section_2_content');
	$why_choose_our_chicago_plumber_heading = CFS()->get('why_choose_our_chicago_plumber_heading');
	$why_choose_our_chicago_plumber = CFS()->get('why_choose_our_chicago_plumber');
	$faq_heading = CFS()->get('faq_heading');
	$faqs = CFS()->get('faqs');
	$call_your_local_plumbing_experts_heading = CFS()->get('call_your_local_plumbing_experts_heading');
	$call_your_local_plumbing_experts_content = CFS()->get('call_your_local_plumbing_experts_content');
	$call_your_local_plumbing_experts_form = CFS()->get('call_your_local_plumbing_experts_form');
?>
	<div class="home_banner_mainsec" style="background-image:url('<?php echo $home_banner_image; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="banner_contnt">
						<h1><?php echo $home_banner_heading; ?></h1>
						<p><?php echo $home_banner_sub_heading; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="home_contct_form">
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
	
	<div class="our_toprated_plumbers">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div class="img_sec">
						<img src="<?php echo $home_section_1_image; ?>" alt="<?php echo get_image_alt_by_url($home_section_1_image); ?>"/>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div class="contnt_sec">
						<h2><?php echo $home_section_1_heading; ?></h2>
						<p><?php echo $home_section_1_content; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="repair_services_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="top_contnt_sec">
						<h2><?php echo $home_section_2_heading; ?></h2>
						<p><?php echo $home_section_2_content; ?></p>
					</div>
				</div>
			</div>
			
			<div class="row repair_services_sec">
				<?php
				$arr = array(
					'post_type'	=> 'services',
					'numberposts'	=> -1,
					'orderby'          => 'date',
					'order'            => 'ASC'
				);
				$services = get_posts($arr);
				if($services) {
					foreach ($services as $k1 => $v1) {
					$feature_image = wp_get_attachment_url( get_post_thumbnail_id($v1->ID) ); ?>
						<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
							<div class="repair_boxsec">
								<div class="img_sec">
									<img src="<?php echo $feature_image; ?>" alt="<?php echo get_image_alt_by_url($feature_image); ?>"/>
								</div>
								
								<div class="contnt_sec">
									<h3><?php echo $v1->post_title; ?></h3>
									<p><?php echo $v1->post_content; ?></p>
								</div>
							</div>
						</div>
				<?php } } ?>
			</div>
		</div>
	</div>
	
	<div class="why_choose_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="top_contnt_sec">
						<h2><?php echo $why_choose_our_chicago_plumber_heading; ?></h2>
					</div>
				</div>
			</div>
			
			<div class="row why_choose_infosec">
				<?php
				if($why_choose_our_chicago_plumber) {
					foreach ($why_choose_our_chicago_plumber as $k => $v) { ?>
						<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
							<div class="why_choose_boxsec">
								<div class="contnt_sec">
									<h3><?php echo $v['heading']; ?></h3>
									<p><?php echo $v['content']; ?></p>
								</div>
							</div>
						</div>
				<?php } } ?>
			</div>
		</div>
	</div>
	
	<div class="faq_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="main_titlesec">
						<h2><?php echo $faq_heading; ?></h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="accordion" id="accordionExample">
						<?php
						if($why_choose_our_chicago_plumber) {
							foreach ($why_choose_our_chicago_plumber as $k => $v) { ?>
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne_<?php echo $k; ?>">
										<button class="accordion-button <?php if($k) { echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne__<?php echo $k; ?>" aria-expanded="<?php if($k) { echo false; } else { echo true; } ?>" aria-controls="collapseOne__<?php echo $k; ?>">
											<?php echo $v['heading']; ?>
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
	
	<div class="request_quote_form">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="form_sec">
						<div class="title_mainsec">
							<h2><?php echo $call_your_local_plumbing_experts_heading; ?></h2>
							<p><?php echo $call_your_local_plumbing_experts_content; ?></p>
						</div>
						<?php echo do_shortcode($call_your_local_plumbing_experts_form); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>