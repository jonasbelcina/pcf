<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
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
global $wp_query;
$top_parent = '';
$cat = $wp_query->get_queried_object();

// var_dump($cat);
?>

<div class="col-sm-3 woo-sidebar <?php if(is_single()) { ?>single-sidebar<?php } ?>">
	<h2>Our Offerings</h2>
	<ul>
		<?php
		$args = array(
					'hide_empty'	=> 0,
					'parent' 		=> 0,
				);

		$top_parent = get_terms('product_cat', $args);

		if($top_parent) :
			foreach ($top_parent as $parent) { ?>
				<?php
					// var_dump($parent);
					if($parent->count > 0) {
						if($cat->term_id == $parent->term_id) :
							$this_parent_class = '<span class="glyphicon glyphicon-minus expand" title="Toggle"></span>';
						else :
							$this_parent_class = '<span class="glyphicon glyphicon-plus expand" title="Toggle"></span>';
						endif;
					}
					else {
						$this_parent_class = '';
					}

				?>
				<li class="top-parent <?php //if($parent->count > 0) { echo 'expand'; } ?> <?php if($cat->term_id == $parent->term_id) { echo 'current-cat cat-active'; } ?>"><a class="smooth" href="<?php if(is_single()) { echo get_permalink( woocommerce_get_page_id( 'shop' ) ); } echo '#' . $parent->slug; ?>"><?php echo $parent->name; ?></a><?php echo $this_parent_class; ?></li>
					<?php 
					if($parent->count > 0) :
						$products_args = array(
											'post_type' 	=> 'product',
											'product_cat'	=> $parent->slug,
											'posts_per_page' => -1,
											// 'orderby'		=> 'name',
											'order'			=> 'ASC'
										);

						$products = new WP_Query($products_args);

						if($products->have_posts()) :
							echo '<ul>';
								while ( $products->have_posts() ) : $products->the_post();
									echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
								endwhile;
							echo "</ul>";
						endif;
					endif;
					?>
			<?php }
		endif;
		?>
	</ul>
</div>
