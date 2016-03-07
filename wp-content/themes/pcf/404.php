<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found about-us">
				<div class="container">
					<h2><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h2>
				</div>
			</section><!-- .error-404 -->

		</main><!-- .site-main -->

	</div><!-- .content-area -->

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

<?php get_footer(); ?>
