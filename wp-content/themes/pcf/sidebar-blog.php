<div class="col-md-4 sidebar-blog">
	<div class="side-box posts-filter">
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
						<?php if (!is_single()) : ?>
							<button data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
						<?php else: ?>
							<a href="<?=home_url()?>/news#<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
						<?php endif; ?>
					<?php 
					endif;
				}
			?>
		</div>
	</div>

	<div class="side-box">
		<h2>Get Social with us<span>@Palmonade</span></h2>
		<ul class="side-social">
			<a href="<?php the_field('facebook', 'options'); ?>" target="_blank"></a>
			<a href="<?php the_field('twitter', 'options'); ?>" target="_blank"></a>
			<a href="<?php the_field('youtube', 'options'); ?>" target="_blank"></a>
		</ul>
		<div class="stay-connected">
			<h3>Stay connnected with us</h3>
			<!-- <form>
				<input type="submit" value="Subscribe" />
			</form> -->
			<a class="smooth" href="#footer-newsletter">Subscribe</a>
		</div>
	</div>
</div>

