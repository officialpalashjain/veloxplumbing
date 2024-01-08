<?php
/**
* Template Name: Contact
*
*/
?>
<?php get_header(); ?>
<?php 
	$banner_image = CFS()->get('banner_image');
	$banner_heading = CFS()->get('banner_heading');
	$contact_form_top_text = CFS()->get('contact_form_top_text');
	$contact_form = CFS()->get('contact_form');
	$contact_form_bottom_text = CFS()->get('contact_form_bottom_text');
	$section_1_image = CFS()->get('section_1_image');
	$section_1_heading = CFS()->get('section_1_heading');
	$section_1_content = CFS()->get('section_1_content');
	$map = CFS()->get('map');
?>

	<div class="home_banner_mainsec contact_banner_mainsec" style="background-image:url('<?php echo $banner_image; ?>');">
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
						<div class="contnt_mainsec">
							<p><?php echo $contact_form_top_text; ?></p>
						</div>
						<?php echo do_shortcode($contact_form); ?>
						<div class="contnt_mainsec">
							<p><?php echo $contact_form_bottom_text; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="contact_solutions_contnt">
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
	
	<div class="map_mainsec">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="map_box">
						<?php echo $map; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>