<div class="arte365-sitemap">
	<h3 class="logo">ARTE [365]</h3>
	<div class="sitemap-links clearfix">
<!--
		<div class="primary-menu ">
			<div class="clearfix">
				<?php /*$walker = new Menu_With_Description;*/ ?>
				<?php /*wp_nav_menu( array( 'theme_location' => 'arte365-primary-menu', 'menu_class' => 'nav-menu', 'walker' => $walker ) );*/ ?>
			</div>
		</div>
		
		<div class="footer-menu ">
			<div class="clearfix">
				<div class="menu-header">
					아르떼365
					<span class="sub">일상 속의 문화예술교육을 실현하는 한국문화예술교육진흥원의 또 하나의 이름</span>
				</div>
				<div class="menu-body">
					<?php /*wp_nav_menu( array( 'theme_location' => 'arte365-footer-menu') );*/ ?>
				</div>
			</div>
		</div>
-->
	</div>
</div>


<script>

	(function($){
		function checkSitemapHeight() {

			if ($('body').hasClass('mobile')) return;
			
			var headerHeight = 0;
			var bodyHeight = 0;
			$('.sitemap-links .nav-menu > li').each(function(){
				var header = $(' > a', this);
				header.css('height', 'auto');
				var height = header.height();
				headerHeight = Math.max(height, headerHeight);

				var body = $(this);
				body.css('height', 'auto');
				var height = body.height();
				bodyHeight = Math.max(height, bodyHeight);
			});

			$('.sitemap-links .nav-menu > li > a').height(headerHeight);
			$('.sitemap-links .nav-menu > li').height(bodyHeight);
		}


		$(function(){
			
			$(window).on('resize', function(){
				checkSitemapHeight();
			}).trigger('resize');

			$(window).on('load', function(){
				checkSitemapHeight();
			});
		});

		checkSitemapHeight();
	})(jQuery);
</script>