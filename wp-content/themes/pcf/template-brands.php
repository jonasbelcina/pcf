<?php
/**
 *
 * Template name: Brands
 *
 */

get_header(); ?>

<div class="product-listing">
	<div class="container">
		<div class="row">
			<?php get_sidebar('brands'); ?>

			<div class="col-sm-9">
				<div class="products">
					<?php
						$args = array(
									'post_type' 		=> 'brands',
									'post_status' 		=> 'publish',
									'orderby'			=> 'name',
									'order'				=> 'ASC',
								  	'posts_per_page' 	=> -1,
								);

						$brands_query = new WP_Query($args);

						if($brands_query->have_posts()) :
							while( $brands_query->have_posts() ) : $brands_query->the_post(); ?>
								<div class="prod-cat-group" id="<?php echo $post->post_name; ?>">
									<h2><?php the_title(); ?></h2>
									<?php if( have_rows('brochures') ): ?>
										<?php while( have_rows('brochures') ): the_row(); ?>
											<div class="product col-md-4 col-sm-4 col-xs-6">
												<a href="" data-toggle="modal" data-target="#download-brochure">
													<?php
														// //execute imageMagick's 'convert', setting the color space to RGB and size to 200px wide
													 //    exec("convert \"{$brochure['url']\" -colorspace RGB -geometry 200 $thumbDirectory$thumb");
														         
												  //   	//show the image
												  //   	echo "<p><a href=\"$brochure['url']\"><img src=\"pdfimage/$thumb\" alt=\"\" /></a></p>";
														$im = new imagick($brochure['url'][0]);
														$im->setImageFormat('jpg');
														header('Content-Type: image/jpeg');
														echo $im; 

													?>
													<?php $brochure = get_sub_field('brochure'); ?>
													<h3><?php echo $brochure['title']; ?></h3>
												</a>
												<a class="active-brochure" href="<?php echo $brochure['url']; ?>" dataFilename="<?php echo $brochure['title']; ?>" style="display: none;"></a>
											</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							<?php endwhile;
						endif;

					 	wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Download Brochure Modal -->
<div class="modal fade" id="download-brochure" tabindex="-1" role="dialog" aria-labelledby="Download Brochure">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Download Brochure</h4>
      		</div>

      		<div class="modal-body">
    			<?php echo do_shortcode('[contact-form-7 id="708" title="Download Brochure"]'); ?>
     	 	</div>
    	</div>
  	</div>
</div>

<?php get_footer(); ?>
