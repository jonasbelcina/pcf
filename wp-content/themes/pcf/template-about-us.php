<?php
/**
 *
 * Template name: About us
 *
 */

get_header(); ?>

<section class="company about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				endif; ?>
			</div>

			<div class="col-md-6 director-col">
				<h2><?php the_field('director_heading'); ?></h2>
				<?php $director_img = get_field('director_image'); ?>
				<div class="director-img">
					<img class="img-responsive" src="<?php echo $director_img['url']; ?>" alt="<?php echo $director_img['alt']; ?>">
					<span><?php the_field('director_position_name'); ?></span>
				</div>

				<div class="director-msg">
					<?php the_field('director_message'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="key-competencies about-us">
	<div class="container">
		<div class="row">
			<h2><?php the_field('kc_heading'); ?></h2>
			<div class="col-md-8 kc-col">
				<?php if( have_rows('key_competencies') ): ?>
					<?php while( have_rows('key_competencies') ): the_row(); ?>
						<div class="col-sm-6 kc">
							<h3><?php the_sub_field('heading'); ?></h3>
							<p><?php the_sub_field('content'); ?></p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<div class="col-md-4">
				<div class="kc-box">
					<?php $image = get_field('kc_box_image'); ?>
					<img class="img-responsive" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
					<div class="overlay">
						<p><?php the_field('kc_box_text'); ?></p>
						<a href="" data-toggle="modal" data-target="#contact_popup"><?php the_field('box_link_text'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $timeline_bg = get_field('timeline_bg_image'); ?>
<section class="timeline about-us" <?php if($timeline_bg) { ?>style="background: url(<?php echo $timeline_bg['url']; ?>) center no-repeat; background-size: cover;"<?php } ?>>
	<div class="overlay">
		<div class="container">
			<div class="row">
				<h2><?php the_field('timeline_heading'); ?></h2>

				<?php if( have_rows('timeline') ): ?>
					<ul>
					<?php while( have_rows('timeline') ): the_row(); ?>
						<li>
							<div class="timeline-bubble">
								<h3><?php the_sub_field('heading'); ?></h3>
								<p><?php the_sub_field('content'); ?></p>
								<span><?php the_sub_field('year'); ?></span>
							</div>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- <section class="our-team about-us">
	<div class="container">
		<div class="row">
			<h2><?php the_field('team_heading'); ?></h2>
			<div class="col-md-6">
				<?php $team_img = get_field('team_image'); ?>
				<img class="img-responsive" src="<?php echo $team_img['url']; ?>" alt="<?php echo $team_img['alt']; ?>" />
			</div>

			<div class="col-md-6">
				<?php the_field('team_content'); ?>
			</div>
		</div>
	</div>
</section> -->

<section class="why-us about-us">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 why-us-content">
				<h2><?php the_field('why_us_heading'); ?></h2>
				<p><?php the_field('why_us_text'); ?></p>

				<?php if( have_rows('why_us_list') ): ?>
					<ul>
					<?php while( have_rows('why_us_list') ): the_row(); ?>
						<li>
							<h3><?php the_sub_field('heading_text'); ?></h3>
							<p><?php the_sub_field('content'); ?></p>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="col-lg-6 why-us-contact">
				<div class="home-contact">
					<?php $contact_box_image = get_field('box_image_background'); ?>
					<img class="img-responsive" src="<?php echo $contact_box_image['url']; ?>" alt="<?php echo $contact_box_image['alt']; ?>" />
					<div class="home-contact-content">
						<div class="overlay">
							<div>
								<h3><?php the_field('box_heading'); ?></h3>
							</div>
							<p><?php the_field('box_content'); ?></p>
							<a href="<?php the_field('box_button_link'); ?>"><?php the_field('box_button_text'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="our-clients about-us">
	<div class="container">
		<div class="row">
			<h2><?php the_field('clients_heading', 5); ?></h2>
			<?php 
				$images = get_field('client', 5);
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

<section class="consultants about-us">
	<div class="overlay">
		<div class="container">
			<h2>Talk To Our Consultants</h2>
			<p>Our experts have vast industry experience to understand and suggest the best solutions for you</p>
			<a href="" data-toggle="modal" data-target="#contact_popup">Contact Us</a>
		</div>
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

<?php get_footer(); ?>
