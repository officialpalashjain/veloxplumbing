<?php
/**
* Template Name: Blog
*
*/
?>
<?php get_header(); ?>
<?php 
	$banner_image = CFS()->get('banner_image');
	$banner_heading = CFS()->get('banner_heading');
	$banner_sub_heading = CFS()->get('banner_sub_heading');

	$initialNumberPosts = 6;
	if (isset($_GET['num_posts'])) {
		$numberPosts = intval($_GET['num_posts']);
	} else {
		$numberPosts = $initialNumberPosts;
	}
	$arr = array(
		'post_type'	=> 'post',
		'numberposts'	=> $numberPosts,
		'orderby'          => 'date',
        'order'            => 'DESC'
	);
	$blogs = get_posts($arr);
	?>
	<div class="home_banner_mainsec blog_banner_mainsec" style="background-image:url('<?php echo $banner_image; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="banner_contnt">
						<h1><?php echo $banner_heading; ?></h1>
						<p><?php echo $banner_sub_heading; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="blog_mainsec">
		<div class="container">
			<div class="row">
				<?php
					if(!empty($blogs))
					{
						foreach($blogs as $sngl)
						{
							$blog_id = $sngl->ID;
							$permalink = get_permalink($blog_id);
							$blog_title = $sngl->post_title;
							$blog_title = substr($blog_title, 0, 100);
							$feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
							$excerpt = wp_trim_words( $sngl->post_content, 35, '' );
							$excerpt = substr($excerpt, 0, 150);
						?>
						<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
							<div class="blog_boxsec">
								<div class="img_sec">
									<img src="<?php echo $feature_image; ?>"   alt="<?php echo get_image_alt_by_url($feature_image); ?>"/>
								</div>
								
								<div class="contnt_mainsec">
									<h3><a href="<?php echo $permalink; ?>"><?php echo $blog_title;?>...</a></h3>
									
									<p><?php echo $excerpt; ?>...</p>
									
									<div class="btn_mainsec">
										<a class="btn_style" href="<?php echo $permalink; ?>">Read More</a>
									</div>
								</div>
							</div>
						</div>
				<?php } } ?>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 blog_append">
					<div class="btn_mainsec text-center">
						<a class="btn_style loadmore_blog" href="javascript:void(0)">Load More</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
<script type="text/javascript">
var page = 2;
jQuery(document).on('click' , '.loadmore_blog' , function(){
  jQuery('.ajax-loder').show();
  jQuery.ajax({
    type:'POST',
    url: '<?php echo admin_url('admin-ajax.php'); ?>',
    data: {
      action: 'load_blog_ajax',
      'page' : page,
      
    },
    success: function(results){
      if(results.trim() == 'no_post'){
        jQuery('.blog_append').before('<h2 class="sorry_message">Sorry blog not found.</h2>'); 
        jQuery('.loadmore_blog').hide();
        jQuery('.ajax-loder').hide();
      }else{
        jQuery('.ajax-loder').hide();
        jQuery('.blog_append').before(results);
        page++;
      }

    },
    error: function(results) {
      alert('error');
    }
  });
});
</script>