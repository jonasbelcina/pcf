<?php 

/*
* Template Name: Contact
*/

get_header(); ?>

<div class="container">
	<nav class="breadcrumbs contact-breadcrumbs">
		<a href="<?=home_url()?>">Home</a>
		<span>Contact Us</span>
	</nav>

	<div class="contact-us">
		<div class="col-md-6">
			<h2>Our Location</h2>
			<div class="map-container">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d115710.16161941792!2d55.086565!3d25.002068000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8dfba9f28eae0a2e!2sPalmon+Group!5e0!3m2!1sen!2sae!4v1456668576541" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

		<div class="col-md-6">
			<h2>Contact Us</h2>
			<?php echo do_shortcode('[contact-form-7 id="113" title="Contact Us Popup"]')?>
		</div>
	</div>
</div>

<?php get_footer(); ?>