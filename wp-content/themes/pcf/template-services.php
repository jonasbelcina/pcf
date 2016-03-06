<?php
/**
 *
 * Template name: Services
 *
 */

get_header(); ?>

<section class="services-banner">
	<?php
	$banner_img = get_field('banner_image');
	$mobile_img = get_field('mobile_banner_image'); ?>

	<?php if($banner_img && $mobile_img) : ?>
		<section class="product-cat-banner">
			<img class="img-responsive" src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['alt'] ?>" />
			<img class="img-responsive" src="<?php echo $mobile_img['url']; ?>" alt="<?php echo $mobile_img['alt'] ?>" />
		</section>
	<?php endif; ?>
</section>

<section class="our-services about-us">
	<div class="container">
		<div class="row">
			<h2><?php the_field('services_heading'); ?></h2>
			<div class="col-lg-6 we-offer">
				<h3><?php the_field('what_we_offer_heading'); ?></h3>
				<?php if( have_rows('offers') ):
					echo '<ul>';
						while( have_rows('offers') ): the_row(); ?>
							<li>
								<?php if(get_sub_field('offer_heading')) : ?>
									<h4><?php the_sub_field('offer_heading'); ?></h4>
								<?php endif; ?>

								<?php if(get_sub_field('offer_content')) : ?>
									<p><?php the_sub_field('offer_content'); ?></p>
								<?php endif; ?>
							</li>
						<?php endwhile;
					echo '</ul>';
				endif; ?>
			</div>

			<div class="col-lg-6">
				<div class="catalogue">
					<h3>Find out the best solutions to fit your dreams</h3>
					<?php echo do_shortcode('[contact-form-7 id="425" title="What We Offer"]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="design-testimonials about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6 corporate-brochure">
				<h2><?php the_field('design_heading'); ?></h2>
				<?php $innovate_img = get_field('design_image'); ?>
				<div class="innovate">
					<?php if($innovate_img) : ?>
						<img class="img-responsive" src="<?php echo $innovate_img['url']; ?>" alt="<?php echo $innovate_img['alt']; ?>" />
					<?php endif; ?>
					<div class="overlay">
						<?php if(get_field('design_content')) : ?>
							<p><?php the_field('design_content'); ?></p>
						<?php endif; ?>
						<?php $file = get_field('brochure'); ?>
						<a href="<?php echo $file['url']; ?>" target="_blank">Download Brochure</a>
					</div>
				</div>
			</div>

			<div class="col-md-6 about-testimonials">
				<h2><?php the_field('testimonials_heading'); ?></h2>
				<div class="testimonial-items">
					<?php if( have_rows('services_testimonials') ):
						while( have_rows('services_testimonials') ): the_row(); ?>
							<div class="testimonial-item">
								<div class="testimonial-content">
									<h3><?php the_sub_field('featured_text'); ?></h3>
									<p><?php the_sub_field('content'); ?></p>
								</div>
								<div class="testimonial-by">
									<?php the_sub_field('from'); ?>
								</div>
							</div>

						<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
