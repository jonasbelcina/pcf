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
									<div class="product col-md-4 col-sm-4 col-xs-6">
										
									</div>
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

<?php get_footer(); ?>
