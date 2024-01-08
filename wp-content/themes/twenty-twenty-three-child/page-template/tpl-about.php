<?php
/**
* Template Name: About
*
*/
?>
<?php get_header(); ?>
<?php 
	$banner_image = CFS()->get('banner_image');
	$banner_heading = CFS()->get('banner_heading');
	$section_1_image = CFS()->get('section_1_image');
	$section_1_heading = CFS()->get('section_1_heading');
	$section_1_content = CFS()->get('section_1_content');
	$section_2_heading = CFS()->get('section_2_heading');
	$section_2_content = CFS()->get('section_2_content');
	$section_3_heading = CFS()->get('section_3_heading');
	$section_3_content = CFS()->get('section_3_content');
	$section_3_button_text = CFS()->get('section_3_button_text');
	$section_3_button_link = CFS()->get('section_3_button_link');
?>
	<div class="home_banner_mainsec about_banner_mainsec" style="background-image:url('<?php echo $banner_image; ?>');">
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
	
	<div class="about_plumbing_services">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<div class="img_sec">
						<img src="<?php echo $section_1_image; ?>" alt="<?php echo get_image_alt_by_url($section_1_image); ?>"/>
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
	
	<div class="about_trusted_plumbing">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="contnt_mainsec">
						<h2><?php echo $section_2_heading; ?></h2>
						<ul>
							<?php
							if($section_2_content) {
								foreach ($section_2_content as $k => $v) {
									echo '<li>'.$v["text"].'</li>';		
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="about_get_started">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="contnt_mainsec">
						<h2><?php echo $section_3_heading; ?></h2>
						
						<p><?php echo $section_3_content; ?></p>
						
						<div class="btn_mainsec">
							<a class="btn_style" href="<?php echo $section_3_button_link; ?>"><?php echo $section_3_button_text; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>