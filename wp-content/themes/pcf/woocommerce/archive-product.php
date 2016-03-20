<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

global $wp_query;
$cat = $wp_query->get_queried_object();
// var_dump($cat);
?>

<?php
	/**
	 * woocommerce_before_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	do_action( 'woocommerce_before_main_content' );
?>

	<?php
		/**
		 * woocommerce_archive_description hook.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		// do_action( 'woocommerce_archive_description' );
	?>

	<?php
	$shop_id = woocommerce_get_page_id( 'shop' );
	$banner_img = get_field('banner_image', $shop_id);
	$mobile_img = get_field('mobile_banner_image', $shop_id); ?>

	<?php if($banner_img && $mobile_img) : ?>
		<section class="product-cat-banner">
			<img class="img-responsive" src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt'] ?>" />
			<img class="img-responsive" src="<?php echo $mobile_img['url']; ?>" alt="<?php echo $mobile_img['alt'] ?>" />
		</section>
	<?php endif; ?>

	<div class="product-listing">
		<div class="container">
			<div class="row">
			
				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>

				<?php if ( have_posts() ) : ?>

					<?php
						/**
						 * woocommerce_before_shop_loop hook.
						 *
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );
					?>

					<?php woocommerce_product_loop_start(); ?>

						<?php woocommerce_product_subcategories(); ?>

						<?php
							$cat_args = array(
											'taxonomy'	=> 'product_cat',
											'parent' 	=> $cat->term_id,
											// 'hide_empty' => 0
										);

							$cat = get_categories($cat_args);

							if($cat) :
								foreach($cat as $c) :
									// var_dump($c);

									echo '<div class="prod-cat-group" id="' . $c->slug . '">';
										echo '<h2>' . $c->name  . '</h2>';

										if($c->count > 0) :
											$args = array(
														'post_type'		=> 'product',
														'product_cat'	=> $c->slug,
														'order'			=> 'ASC',
														'posts_per_page' => -1
													);

											$wp_query = new WP_Query($args);

											if($wp_query->have_posts()) :
												while( $wp_query->have_posts() ) : $wp_query->the_post();
													wc_get_template_part( 'content', 'product' );
												endwhile;
											endif;

											 wp_reset_postdata();

											// echo do_shortcode('[ajax_load_more post_type="product" taxonomy="product_cat" taxonomy_terms="' . $c->slug . '" taxonomy_operator="IN" posts_per_page="6" scroll="false" button_label="Load More"]');
										endif;
										echo '<div class="clearfix"></div>';
									echo '</div>';
								endforeach;
							endif;
						?>

					<?php woocommerce_product_loop_end(); ?>

					<?php
						/**
						 * woocommerce_after_shop_loop hook.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .product-listing -->

	<section class="consultants about-us">
		<div class="overlay">
			<div class="container">
				<h2>Talk To Our Consultants</h2>
				<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
				<a href="" data-toggle="modal" data-target="#contact_popup">Contact Us</a>
			</div>
		</div>
	</section>

	<section class="contact-icons about-us">
		<div class="container">
			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>Office</h2>
					<h3>Bldg 7, Street N606, JAFZA Dubai</h3>
				</div>
			</div>

			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>Phone</h2>
					<h3><?php the_field('phone' , 'options'); ?></h3>
				</div>
			</div>

			<div class="col-sm-4 contact-icon-col">
				<div class="contact-icon-wrap">
					<h2>E-mail</h2>
					<h3><a href="mailto:<?php the_field('email' , 'options'); ?>"><?php the_field('email' , 'options'); ?></a></h3>
				</div>
			</div>
		</div>
	</section>

<?php
	/**
	 * woocommerce_after_main_content hook.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
?>

<?php get_footer( 'shop' ); ?>
