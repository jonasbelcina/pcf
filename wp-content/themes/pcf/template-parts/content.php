<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php
	$category = get_the_category(); 
	$top_parent_cat = get_top_parent_cat( $category[0]->cat_ID );
	$categories = get_category( $top_parent_cat ); 
?>

<div class="news-item <?php if($top_parent_cat){ echo $categories->slug; }else{ echo $category[0]->slug;} ?>" data-category="<?php if($top_parent_cat){ echo $categories->slug; }else{ echo $category[0]->slug;} ?>">
	<a href="<?php the_permalink(); ?>">
		<?php
			if (get_field('video')) :
				$video_thumb = get_field('video');
				$thumb = "http://img.youtube.com/vi/" . get_field('video') . "/maxresdefault.jpg";
				$max = get_headers($thumb);
				// var_dump($max);
				$max = substr($max[0], 9, 3);
				if ($max == '404') :
				    $thumb = "http://img.youtube.com/vi/" . get_field('video') . "/hqdefault.jpg"; 
				    // echo 'no maxres';
				endif;

			else :
				$thumb = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
			endif;
		?>
		<div class="news-item-img" <?php if($thumb){ ?>style="background: url('<?php echo $thumb; ?>') center top / cover no-repeat;"<?php } ?>>

		</div>

		<div class="news-item-title">
			<?php the_title(); ?>
		</div>

		<div class="news-cat">
			<?php echo $categories->name; ?>
		</div>
	</a>
</div>

