<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

	 global $wp_query;
	 $cat = $wp_query->get_queried_object();
	 // var_dump($cat);
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' ); ?>

	<section class="details-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 pull-right">
					<div class="product-title">
						<h2><?php the_title(); ?></h2>
					</div>

					<div class="kitchen-details-banner">
						<!-- <div class="container"> -->
							<?php if(get_field('video')) : ?>
								<div class="videoWrapper">
									<iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php the_field('video'); ?>?rel=0&amp;showinfo=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
								</div>
							<?php else : ?>
								<?php
									$images = get_field('gallery');

									if( $images ): 
										$ctr = 1; ?>
									    <div class="kitchen-details-gallery">
									        <?php foreach( $images as $image ):
									        	$words = explode("-", $cat->post_name);
									        	$prefix = '';

									        	foreach ($words as $w) {
									        	  $prefix .= $w[0];
									        	} ?>

						                    	<div class="image-holder">
						                    		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						                    		<?php
						                    			$string = $image['title'];
						                    			$brand = substr($string, 0, strpos($string, '_'));
						                    			$prod_name = substr($string, strpos($string, "_") + 1); 
						                    		?>
						                    		<span><?php echo $brand; ?> - <?php echo $prod_name; ?></span>
						                    		<!-- <span><?php echo strtoupper($prefix) . $ctr; ?></span> -->
					                    		</div>

									        <?php $ctr++;
									        endforeach; ?>
									    </div>
									<?php endif;

								?>
								
							<?php endif; ?>

							<?php if(get_field('banner_text')) : ?>
								<div class="banner-caption">
									<div class="container">
										<?php the_field('banner_text'); ?>
									</div>
								</div>
							<?php endif; ?>
						<!-- </div> -->
					</div>
				</div>

				<?php do_action( 'woocommerce_sidebar' ); ?>
			</div>
		</div>
	</section>
	
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// do_action( 'woocommerce_after_single_product_summary' );
	?>

	<section class="consultants">
		<div class="overlay">
			<div class="container">
				<h2>Talk To Our Consultants</h2>
				<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
				<a href="" data-toggle="modal" data-target="#contact_popup">Contact Us</a>
			</div>
		</div>
	</section>

	<section class="contact-icons">
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

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<!-- Product Enquiry Modal -->
<div class="modal fade" id="kitchen_enquiry" tabindex="-1" role="dialog" aria-labelledby="KitchenEnquiry">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Kitchen Enquiry</h4>
      		</div>

      		<div class="modal-body">
      			<h3><?php the_title(); ?></h3>
    			<?php echo do_shortcode('[contact-form-7 id="114" title="Kitchen Enquiry"]'); ?>
     	 	</div>
    	</div>
  	</div>
</div>

<!-- Contact Modal -->
<div class="modal fade" id="contact_popup" tabindex="-1" role="dialog" aria-labelledby="ContactPopup">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Contact Us</h4>
      		</div>

      		<div class="modal-body">
    			<?php echo do_shortcode('[contact-form-7 id="113" title="Contact Us Popup"]'); ?>
     	 	</div>
    	</div>
  	</div>
</div>


<?php do_action( 'woocommerce_after_single_product' ); ?>
