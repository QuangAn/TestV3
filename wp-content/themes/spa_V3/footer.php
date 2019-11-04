        <footer id="footer">
			<div class="section7">
				<section class="sec-form">	
					<h2 class="title-V3">Vui lòng để lại thông tin để được tư vấn thêm</h2>
					<?php 
						if ( is_active_sidebar('footer-sidebar') ) {
								dynamic_sidebar( 'footer-sidebar' );
						} else {
								_e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'quangan');
						}
					?>
				</section>
			</div>
        </footer>
        </div> 
        <?php wp_footer(); ?>
</body> 
</html> 