	<?php
	    $header_logo = get_option("header_logo");
	    $logo_alt = get_image_alt_by_url($header_logo);
	    $footer_copyright = get_option("footer_copyright");
	  ?>
	<footer>
		<div class="footer_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<div class="logo_sec">
							<a class="navbar-brand" href="<?php echo site_url();?>">
				                	<img src="<?php echo $header_logo;?>" alt="<?php echo $logo_alt;?>"/>
				              	</a>
							
							<div class="contnt_sec">
								<?php dynamic_sidebar( 'footer-section-1' ); ?>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<div class="menu_sec">
							<?php dynamic_sidebar( 'footer-section-2' ); ?>
						</div>
					</div>
					
					<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
						<div class="contact_sec">
							<?php dynamic_sidebar( 'footer-section-3' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="copyright_mainsec">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="inner_txt">
							<p><?php echo $footer_copyright;?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<div class="call_bottom_sec">
		<div class="icon_sec">
			<a href="tel:630-362-2313"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone-call.png" /></a>
		</div>
	</div>
	<?php wp_footer(); ?>	
  </body>
</html>