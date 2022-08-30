<footer class="container-fluid p-0">

	<!-- VVV FALE CONOSCO VVV -->
	<section class="section-fale-conosco py-8">
		<div class="row mx-4">
			<h2 class="text-white text-center fs-sm-35">FALE <fw900>CONOSCO</fw900>
			</h2>
			<p class="text-white fs-24 col-12 col-sm-10 m-auto py-3 text-center fs-sm-16">Entre em contato com um de nossos especialistas e saiba o que a MRCLA pode fazer para te ajudar a melhorar a logística de ativos ferroviários da sua empresa!</p>
			<div class="d-flex justify-content-center">
				<a href="" class="text-white bg-laranja d-flex py-3 px-4 botao"><img class="pe-3 d-none d-sm-block" src="<?php bloginfo('template_url'); ?>/assets/images/seta-branca-comprida.png" alt="seta branca"> Entre em contato</a>
			</div>
		</div>
	</section>


	<!-- VVV SECTION MENU FOOTER VVV -->
	<section class="bg-azul-escuro py-5 pb-4 container-fluid">
		<div class="row container-fluid d-flex flex-column flex-lg-row justify-content-center">
			<?php
			if (has_nav_menu('footer institucional')) {
				wp_nav_menu(array(
					'theme_location' => 'footer institucional',
					'container' => false,
					'fallback_cb' => false,
					'menu_class' => 'menu navbar-nav flex-xl-row mb-0 gap-5 col-3 justify-content-xl-center flex-wrap accordion',
					'add_li_class'  => 'sub-item flex-column justify-content-start ps-3'
				));
			}
			if (has_nav_menu('footer produtos')) {
				wp_nav_menu(array(
					'theme_location' => 'footer produtos',
					'container' => false,
					'fallback_cb' => false,
					'menu_class' => 'menu navbar-nav flex-xl-row mb-0 gap-5 col-3 justify-content-xl-center flex-wrap accordion',
					'add_li_class'  => 'sub-item flex-column justify-content-start ps-3'
				));
			}
			if (has_nav_menu('footer segmentos')) {
				wp_nav_menu(array(
					'theme_location' => 'footer segmentos',
					'container' => false,
					'fallback_cb' => false,
					'menu_class' => 'menu navbar-nav flex-xl-row mb-0 gap-5 col-3 justify-content-xl-center flex-wrap accordion',
					'add_li_class'  => 'sub-item flex-column justify-content-start ps-3'
				));
			}
			?>
			<div class="w-fit pt-3 novidades-blog d-flex flex-column">
				<a href="" class="fs-18 fw700">NOVIDADES DO BLOG</a>
				<a href="" class="fs-18 fw700">FALE CONOSCO</a>
			</div>
		</div>
		<div class="d-flex align-items-center justify-content-between container py-3">
			<div class="d-flex redes-footer gap-4">
				<a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/icone-linkedin-svg.svg" alt="icone linkedin"></a>
				<a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/icone-facebook-svg.svg" alt="icone facebook"></a>
				<a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/icone-instagram-svg.svg" alt="icone instagram"></a>
			</div>
			<img src="<?php bloginfo('template_url'); ?>/assets/images/logo-mitsui.png" alt="logo mitsui">
		</div>
		<div class="w-100 borda-azul"></div>
		<div class="d-flex flex-column flex-md-row justify-content-between container pt-4">
			<p class="text-white fs-15 m-0 pb-3 pb-md-0">Politica de cookies  |  Politica de privacidade</p>
			<p class="text-white fs-15 m-0">Todos os direitos reservados &#xA9; 2021 - MITSUI RAIL CAPITAL</p>

		</div>
	</section>


</footer>


<?php wp_footer(); ?>

<!-- CONFG. ACCORDION BUTTON MENU HEADER -->
<script>
	jQuery(document).ready(function() {
		jQuery(function() {
			jQuery('.navbar-toggler').on('click', function() {
				jQuery('.aberto').toggle();
				jQuery('.fechado').toggle();

			});
		});
	});
</script>

<!-- CONFG. ACCORDION FOOTER -->
<script>
	jQuery(document).ready(function() {
		jQuery(function() {
			jQuery('.accordion .menu-item').on('click', function() {
				if (window.innerWidth <= 990) {
				jQuery(this).parent().find('.sub-menu').stop().slideToggle();
				jQuery(this).toggleClass('active');
				}
			});
		});
	});
</script>


</body>

</html>