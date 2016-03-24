<div class="col-sm-3 woo-sidebar">
	<h2>Our Brands</h2>
	<ul>
		<?php
		$args = array(
					'post_type' 		=> 'brands',
					'post_status' 		=> 'publish',
					// 'orderby'			=> 'name',
					'order'				=> 'ASC',
				  	'posts_per_page' 	=> -1,
				);

		$brands_query = new WP_Query($args);

		if($brands_query->have_posts()) :
			while( $brands_query->have_posts() ) : $brands_query->the_post(); ?>
				<li class="top-parent">
					<a class="smooth" href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a>
				</li>
			<?php endwhile;
		endif;
		?>
	</ul>
</div>