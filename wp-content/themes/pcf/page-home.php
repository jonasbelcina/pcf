<?php
/**
 * The template for displaying home page
 *
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="banner">
	<div class="home-banner">
		<?php if( have_rows('slides') ):
			while( have_rows('slides') ): the_row(); 
				$image = get_sub_field('image'); 
				$mob_img = get_sub_field('mobile_image'); ?>

				<div class="banner-item">
					<a href="<?php the_sub_field('call_to_action_link'); ?>">
						<img class="desktop-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						<img class="mobile-img" src="<?php echo $mob_img['url']; ?>" alt="<?php echo $mob_img['alt']; ?>">
						<div class="banner-caption">
							<div class="container">
								<div class="row">
									<h2><?php echo the_sub_field('text_line_1'); ?></h2>
									<h3><?php echo the_sub_field('text_line_2'); ?> <!--<a href="<?php the_sub_field('call_to_action_link'); ?>"><?php the_sub_field('call_to_action_text'); ?> &rsaquo;</a>--></h3>
								</div>
							</div>
						</div>
					</a>
				</div>

			<?php endwhile;
		endif; ?>
	</div>
</section>

<section class="home-about">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="home-contact">
					<?php $contact_box_image = get_field('contact_box_background_image'); ?>
					<img class="img-responsive" src="<?php echo $contact_box_image['url']; ?>" alt="<?php echo $contact_box_image['alt']; ?>" />
					<div class="home-contact-content">
						<div>
							<?php if(get_field('contact_box_title')) : ?>
								<h3><?php the_field('contact_box_title'); ?></h3>
							<?php endif; ?>
							<?php if(get_field('contact_box_subtitle')) : ?>
								<h4><?php the_field('contact_box_subtitle'); ?></h4>
							<?php endif; ?>
						</div>
						<p><?php the_field('contact_box_content'); ?></p>
						<a href="<?php the_field('contact_box_button_link'); ?>" data-toggle="modal" data-target="#contact_popup"><?php the_field('contact_box_button_text'); ?></a>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
					<?php if (have_posts()) :
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
					endif; ?>
					<a class="home-read-more" href="<?php the_field('main_content_call_to_action_link'); ?>"><?php the_field('main_content_call_to_action_text'); ?> &rsaquo;</a>
			</div>
		</div>
	</div>
</section>

<?php $services_bg = get_field('services_background_image'); ?>
<section class="home-services" style="background: url(<?php echo $services_bg['url']; ?>) center top no-repeat; background-size: cover;">
	<div class="container">
		<div class="row">
			<h2><?php the_field('services_heading'); ?></h2>
			<a href="<?php the_field('services_button_link'); ?>"><?php the_field('services_button_text'); ?></a>
		</div>
	</div>
</section>

<section class="home-certificates">
	<div class="container">
		<div class="row">
			<div class="desktop-certificates">
				<div class="col-md-3 certificates-header">
					<h2><?php the_field('certificates_heading'); ?></h2>
				</div>

				<?php
					$cert_images = get_field('certificates_gallery');
					if($cert_images) :
						foreach($cert_images as $cert_image) : ?>
							<div class="col-md-3">
								<img src="<?php echo $cert_image['url']; ?>" alt="<?php $cert_image['alt']; ?>" />
							</div>
						<?php endforeach;
					endif;
				?>
			</div>

			<div class="mobile-certificates">
				<div class="col-sm-4 certificates-header">
					<h2><?php the_field('certificates_heading'); ?></h2>
				</div>

				<div class="col-sm-8">
					<?php
					$cert_images = get_field('certificates_gallery');
					if($cert_images) :
						echo '<div class="cert-slider">';
							foreach($cert_images as $cert_image) : ?>
								<img src="<?php echo $cert_image['url']; ?>" alt="<?php $cert_image['alt']; ?>" />
							<?php endforeach;
						echo '</div>';
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-news">
	<div class="container">
		<div class="row">
			<div class="home-news-content">
				<div class="news-articles col-lg-8 col-md-12">
					<h2><?php the_field('home_news_heading'); ?></h2>
					<?php
						$args = array(
							'posts_per_page'      => 2,
							'post__in'            => get_option( 'sticky_posts' ),
							'ignore_sticky_posts' => 1,
						);
						$query = new WP_Query($args);

						if( $query->have_posts() ): 
							while( $query->have_posts() ) : $query->the_post(); ?>
								<div class="col-lg-6 col-md-6 col-sm-6 home-news-article">
									<h2><?php the_title(); ?></h2>
									<span class="news-date"><?php the_time('d.m.Y'); ?></span>
									<?php the_post_thumbnail('full');?>
									<p><?php echo shortenText(get_the_excerpt(), 128); ?></p>
									<a href="<?php the_permalink(); ?>">Read more</a>
								</div>
							<?php 
							endwhile;
						endif;

						wp_reset_query();
					?>
				</div>

				<h2 class="mobile-articles-title"><?php the_field('home_news_heading'); ?></h2>
				<div class="mobile-articles col-lg-8 col-md-12">
					<?php
						$args = array(
							'posts_per_page'      => 2,
							'post__in'            => get_option( 'sticky_posts' ),
							'ignore_sticky_posts' => 1,
						);
						$mobile_query = new WP_Query($args);

						if( $mobile_query->have_posts() ): 
							while( $mobile_query->have_posts() ) : $mobile_query->the_post(); ?>
								<div class="col-lg-6 col-md-6 col-sm-6 home-news-article">
									<h2><?php the_title(); ?></h2>
									<span class="news-date"><?php the_time('d.m.Y'); ?></span>
									<?php the_post_thumbnail('full');?>
									<p><?php echo shortenText(get_the_excerpt(), 128); ?></p>
									<a href="<?php the_permalink(); ?>">Read more</a>
								</div>
							<?php 
							endwhile;
						endif;

						wp_reset_query();
					?>
				</div>

				<div class="col-lg-4 col-md-12 home-testimonial">
					<h2><?php the_field('testimonial_title'); ?></h2>
					<div class="testimonial-items">
						<?php if( have_rows('testimonial') ):
							while( have_rows('testimonial') ): the_row(); ?>
								<div class="testimonial-item">
									<div class="testimonial-content">
										<p><?php the_sub_field('testimonial_content'); ?></p>
									</div>
									<div class="testimonial-by">
										<?php the_sub_field('testimonial_author'); ?>
									</div>
								</div>

							<?php endwhile;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="home-brands">
	<div class="container">
		<div class="row">
			<h2>Our Brands</h2>
			<?php 
				$images = get_field('brands');
				if( $images ): ?>
					<div class="brand-items">
						<?php foreach( $images as $image ): ?>
							<div class="brand-item">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</div>
						<?php endforeach; ?>
					</div>
			<?php endif; ?>
		</div>
	</div>
</section>

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

<?php get_footer(); ?>
