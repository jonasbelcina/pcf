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
						<a href="" data-toggle="modal" data-target="#download-brochure">Download Brochure</a>
						<a class="active-brochure" href="http://pcf.heych.ae/wp-content/uploads//2016/02/Palmon-Contract-Furniture.pdf" dataFilename="Palmon Contract Furniture" style="display: none;"></a>
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

<section class="consultants about-us">
	<div class="container">
		<h2>Talk To Our Consultants</h2>
		<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
		<a href="" data-toggle="modal" data-target="#contact_popup">Contact Us</a>
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

<!-- Download Brochure Modal -->
<div class="modal fade" id="download-brochure" tabindex="-1" role="dialog" aria-labelledby="Download Brochure">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Download Brochure</h4>
      		</div>

      		<div class="modal-body">
    			<?php echo do_shortcode('[contact-form-7 id="708" title="Download Brochure"]'); ?>
     	 	</div>
    	</div>
  	</div>
</div>

<?php get_footer(); ?>
