<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 footer-col">
						<div class="row">
							<h2>Address</h2>
							<?php the_field('address' , 'options'); ?>

							<div class="footer-contact">
								<div>
									<h2>E-mail</h2>
									<a href="mailto:<?php the_field('email' , 'options'); ?>"><?php the_field('email' , 'options'); ?></a>
								</div>

								<div>
									<h2>Phone</h2>
									<?php the_field('phone' , 'options'); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 footer-col">
						<div class="google-maps">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d115710.16161941792!2d55.086565!3d25.002068000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8dfba9f28eae0a2e!2sPalmon+Group!5e0!3m2!1sen!2sae!4v1456668576541" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>

					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 footer-col">
						<h2 class="footer-drop">Quick Links <span class="glyphicon glyphicon-menu-down"></span></h2>
						<!-- <ul>
							<li><a href="<?php echo home_url(); ?>">Home</a></li>
							<li><a href="<?php echo home_url(); ?>">About us</a></li>
							<li><a href="<?php echo home_url(); ?>/product-category/kitchens">Kitchens</a></li>
							<li><a href="<?php echo home_url(); ?>">Our Solutions</a></li>
							<li><a href="<?php echo home_url(); ?>/contact-us">Contact</a></li>
						</ul> -->
						<?php wp_nav_menu( array( 'theme_location' => 'quick-links' ) ); ?>
					</div>

					<div id="footer-newsletter" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 footer-col">
						<h2 class="footer-drop">Newsletter <span class="glyphicon glyphicon-menu-down"></span></h2>
						<?php echo do_shortcode('[mc4wp_form id="124"]'); ?>

						<div class="footer-social">
							<h2>Follow Us</h2>
							<a href="<?php the_field('facebook' , 'options'); ?>" target="_blank"></a>
							<a href="<?php the_field('twitter' , 'options'); ?>" target="_blank"></a>
							<a href="<?php the_field('instagram' , 'options'); ?>" target="_blank"></a>
							<a href="<?php the_field('youtube' , 'options'); ?>" target="_blank"></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<span class="copyright">
						Palmonade copyright 2016
					</span>

					<span class="heych">
						Powered by: <a href="http://heych.com/" target="_blank">Heych</a>
					</span>
				</div>
			</div>
		</div>
	</footer>

	<!-- Thank You Modal -->
	<div class="modal fade" id="thankyou_popup" tabindex="-1" role="dialog" aria-labelledby="ThankYouPopup">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	   		 		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title">Thank you</h4>
	      		</div>

	      		<div class="modal-body">
	    			<p>Thank you for contacting Palmonade Kitchens.</p>
	    			<p>One of our customer service executives will contact you soon.</p>
	    			<a class="site-continue" href="">Continue to site</a>
	     	 	</div>
	    	</div>
	  	</div>
	</div>


<?php wp_footer(); ?>
</body>
</html>
