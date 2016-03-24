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
									<div class="brand-desc">
										<?php the_content(); ?>
									</div>
									<?php if( have_rows('brochures') ):
										$count = 0;
										$last = count(get_field('brochures'));
										while( have_rows('brochures') ): the_row(); 
											$count++;
											if($count % 6 == 1) { ?>
												<div class="brochure-wrap <?php if($count == 1) echo 'loaded'; ?>"> 
											<?php } ?>
													<div class="product col-md-4 col-sm-4 col-xs-6">
														<a class="download-brand" href="" data-toggle="modal" data-target="#download-brochure">

															<?php $brochure = get_sub_field('brochure'); ?>
															<?php $thumb = get_sub_field('thumbnail'); ?>
															<img src="<?php echo $thumb['url']; ?>" alt="<?php echo $thumb['alt']; ?>" />
															<h3><?php echo $brochure['title']; ?></h3>
														</a>
														<a class="db-holder" href="<?php echo $brochure['url']; ?>" dataFilename="<?php echo $brochure['title']; ?>" style="display: none;"></a>
													</div>
										<?php if($count % 6 == 0 || $count == $last) { echo '</div>'; } 
										endwhile;

										if($last > 6) {
											echo '<div class="more-brands"><button class="brands-btn">Load More</button></div>';
										}
									endif; ?>
									<div class="clearfix"></div>
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
