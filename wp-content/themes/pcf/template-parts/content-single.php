<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="news-item-title">
	<?php the_title(); ?>
	<span><?php the_date('j M Y'); ?></span>
</div>

<div class="news-item news-item2">
	<?php
		$category = get_the_category();
		$top_parent_cat = get_top_parent_cat( $category[0]->cat_ID );
		$categories = get_category( $top_parent_cat );
		$thumb = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
	?>

	<div class="news-item-img">
		<?php if(get_field('video')) : ?>
			<div class="videobox">
				<iframe src="https://www.youtube.com/embed/<?php the_field('video'); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php else : ?>
			<img src="<?php echo $thumb; ?>" alt="post image" />
		<?php endif; ?>
	</div>

	<div class="news-cat"><?php if($top_parent_cat){ echo $categories->name; } else { echo $category[0]->name;} ?></div>

	<div class="news-content">
		<?php echo wpautop(get_the_content()); ?>
	</div>
</div>

<div class="news-author">
	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			// get_template_part( 'author-bio' );
		endif;
	?>

	<div class="blog-share">
		<h2>Love this post</h2>
		<div class="blog-share-icons">
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600");return false;'></a>
			<a target="_blank" href="https://twitter.com/home?status=<?php echo shortenText(get_the_title(), 100); ?> <?php the_permalink(); ?>" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600");return false;'></a>
			<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"  onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'></a>
		</div>
	</div>
</div>

<div class="blog-comments">
	<?php disqus_embed('palmonade'); ?>
</div>

