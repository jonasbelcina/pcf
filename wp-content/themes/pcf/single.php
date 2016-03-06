<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
	$thumb = wp_get_attachment_url(get_post_thumbnail_id(get_option( 'page_for_posts' )));
?>

<section class="banner news-banner" <?php if($thumb){ ?>style="background: url('<?php echo $thumb; ?>') center top / cover no-repeat;"<?php } ?>>
	<div class="container">
		<div class="banner-text">
			<h2><?php the_field('banner_text', 58); ?></h2>
		</div>
	</div>
</section>
	
<section class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8 main-blog">
				<nav class="breadcrumbs">
					<a href="<?=home_url()?>">Home</a>
					<a href="<?=home_url()?>/news">News and Events</a>
				</nav>

				<div class="side-box posts-filter mobile-post-filter">
					<h2>Categories <span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-minus"></span></h2>
					<div class="button-group">
						<?php if (!is_single()) : ?>
							<button data-filter="*" class="post-filter-active">All</button>
						<?php else: ?>
							<a href="<?=home_url()?>/blog">All</a>
						<?php endif; ?>
						<?php
							$args = array(
										'type'			=> 'post',
										'hide_empty'	=> 0
									);
							$categories = get_categories($args);
							foreach ($categories as $category) { 
								if ($category->name != 'Uncategorized' && $category->category_parent == 0) : ?>
									<a href="<?=home_url()?>/blog#<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
								<?php 
								endif;
							}
						?>
					</div>
				</div>

				<div class="single-blog-posts">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the single post content template.
						get_template_part( 'template-parts/content', 'single' );

						// End of the loop.
					endwhile;
					?>
				</div>

			</div>

			<?php get_sidebar('blog'); ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
