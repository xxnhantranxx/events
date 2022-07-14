<?php
/**
* The template for displaying the footer.
*
* @package flatsome
*/
global $flatsome_opt;
?>
</main><!-- #main -->
<footer id="footer" class="footer-wrapper">
	<?php do_action('flatsome_footer'); ?>
</footer><!-- .footer-wrapper -->
	</div><!-- #wrapper -->
	<div class="call_pluss_desktop">
		<div class="block-contact-fixed">
			<a href="tel:0382256262" class="fixed-item tell_des">
				<div class="icon-showdesktop"></div>
				<div class="show-descfixed"><strong>Hotline: </strong><span>0342797865</span></div>
			</a>
			<a target="_blank" href="https://www.facebook.com/messages/t/100048914635932/" class="fixed-item chatmess-fixed">
				<div class="icon-showdesktop"></div>
				<div class="show-descfixed">Messenger facebook</div>
			   </a>
			<a target="_blank" href="mailto:contact@stywin.vn" class="fixed-item email-fixed">
				<div class="icon-showdesktop"></div>
				<div class="show-descfixed"><span>leeking@gmail.com.vn</span></div>
        	</a>
			<!-- <a target="_blank" href="https://stywin.com/profile/" class="fixed-item download-fixed">
				<div class="icon-showdesktop"></div>
				<div class="show-descfixed"><span>Download profile</span></div>
        	</a> -->
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>