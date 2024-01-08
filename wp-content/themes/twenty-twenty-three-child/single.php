<?php get_header();?>
<?php
	global $post;
	$sngl = '';
	$post_id = $post->ID;
	$post_title = $post->post_title;
	$feature_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	$post_content = $post->post_content;
?>
	<div class="home_banner_mainsec blog_banner_mainsec blog_details_banner"  style="background-image:url('<?php echo $feature_image; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="banner_contnt">
						<h1><?php echo $post_title;?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="blog_content_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="breadcrum_mainsec">
						<ul>
							<li><a href="<?php echo home_url();?>">Home</a></li>
							<li><a href="<?php echo site_url('blog');?>">Blog</a></li>
							<li class="active"><?php echo $post_title;?></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="blog_details_mainsec">
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="blogdetail_contnt_mainsec">
									<div class="point_content"><?php echo $post_content; ?></div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="tag_share_mainsec">
									<ul>
										<li>
											<div class="title_txt"><p>Categories:</p></div>
											<div class="contnt_txt">
												<p>
													<?php
														$cat_slug = '';
														$cats = get_the_category(get_the_ID());
														if($cats) {
															$cat_slug = $cats[0]->slug;
															foreach ($cats as $k => $v) {
																if($k) {
																	echo ',';
																}
																echo '<a href="'.get_category_link($v->term_id).'">'.$v->name.'</a>';
															}
														}
													?>
												</p>
											</div>
										</li>
										
										<li>
											<div class="title_txt"><p>Share :</p></div>
											<div class="social_mainsec">
												<ul>
													<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook-icon0001.png"></a></li>
													<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram-icon0001.png"></a></li>
													<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter-icon0001.png"></a></li>
													<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin-icon0001.png"></a></li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="leave_comment_mainsec">
									<div class="title_mainsec">
										<h3>Leave a Reply</h3>
									</div>
									
									<div class="form_mainsec">
										<?php comment_form(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="blog_mainsec related_blogs_mainsec">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="title_mainsec">
						<h3>Related Blogs</h3>
					</div>
				</div>
			</div>
			
			<div class="row">
				<?php 
					$arr = array(
						'post_type'	=> 'post',
						'numberposts'	=> 3,
						'orderby'          => 'date',
				        'order'            => 'DESC',
				        'category_name' => $cat_slug
					);
					$blogs = get_posts($arr);

					if(!empty($blogs))
					{
						foreach($blogs as $sngl)
						{
							$blog_id = $sngl->ID;
							$permalink = get_permalink($blog_id);
							$blog_title = $sngl->post_title;
							$feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
							$excerpt  = custom_excerpt($sngl->post_content);
						?>
						<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
							<div class="blog_boxsec">
								<div class="img_sec">
									<img src="<?php echo $feature_image; ?>"   alt="<?php echo get_image_alt_by_url($feature_image); ?>"/>
								</div>
								
								<div class="contnt_mainsec">
									<h3><a href="<?php echo $permalink; ?>"><?php echo $blog_title;?></a></h3>
									
									<p><?php echo $excerpt; ?></p>
									
									<div class="btn_mainsec">
										<a class="btn_style" href="<?php echo $permalink; ?>">Learn More</a>
									</div>
								</div>
							</div>
						</div>
				<?php } } ?>
			</div>
		</div>
	</div>

<?php get_footer();?>