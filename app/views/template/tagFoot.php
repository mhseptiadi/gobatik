		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
				
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="<?=SITE?>js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?=SITE?>js/bootstrap.min.js"></script>
		<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
		<script src="<?=SITE?>js/jquery.themepunch.plugins.min.js"></script>
		<script src="<?=SITE?>js/jquery.themepunch.revolution.min.js"></script> 
		<script src="<?=SITE?>js/owl.carousel.min.js"></script> 
		<script src="<?=SITE?>js/filter.js"></script> 
		<!-- Flex slider -->
		<script src="<?=SITE?>js/jquery.flexslider-min.js"></script> 
		<!-- Respond JS for IE8 -->
		<script src="<?=SITE?>js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="<?=SITE?>js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="<?=SITE?>js/custom.js"></script>
		<script>
			// Revolution Slider
			var revapi;
			jQuery(document).ready(function() {
				   revapi = jQuery('.tp-banner').revolution(
					{
						delay: 9000,
						startwidth: 1170,
						startheight: 450,
						hideThumbs: 200,
						shadow: 0,
						navigationType: "none",
						hideThumbsOnMobile: "on",
						hideArrowsOnMobile: "on",
						hideThumbsUnderResoluition: 0,
						touchenabled: "on",
						fullWidth: "off"
					});
			});	
		</script>
	</body>	
</html>
