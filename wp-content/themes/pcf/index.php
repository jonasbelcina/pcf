<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<?php
		$thumb = wp_get_attachment_url(get_post_thumbnail_id(get_option( 'page_for_posts' )));
	?>

	<section class="banner news-banner" <?php if($thumb){ ?>style="background: url('<?php echo $thumb; ?>') center bottom / cover no-repeat;"<?php } ?>>
		<div class="overlay">
			<div class="container">
				<div class="banner-text">
					<h2><?php the_field('banner_text', 58); ?></h2>
				</div>
			</div>
		</div>
	</section>

	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 main-blog">
					<nav class="breadcrumbs">
						<a href="<?=home_url()?>">Home</a>
						<span>News and Events</span>
					</nav>

					<div class="side-box posts-filter mobile-post-filter">
						<h2>Categories <span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-minus"></span></h2>
						<div class="button-group">
							<?php if (!is_single()) : ?>
								<button data-filter="*" class="post-filter-active">All</button>
							<?php else: ?>
								<a href="<?=home_url()?>/news">All</a>
							<?php endif; ?>
							<?php
								$args = array(
											'type'			=> 'post',
											'hide_empty'	=> 0
										);
								$categories = get_categories($args);
								foreach ($categories as $category) { 
									if ($category->name != 'Uncategorized' && $category->category_parent == 0) : ?>
										<button data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
									<?php 
									endif;
								}
							?>
						</div>
					</div>


					<div class="blog-posts">
						<?php if ( have_posts() ) : ?>

							<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'twentysixteen' ),
								'next_text'          => __( 'Next page', 'twentysixteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
					</div>
				</div>

				<?php get_sidebar('blog'); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
