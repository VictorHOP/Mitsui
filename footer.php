<footer class="container-fluid p-0">

	<!-- VVV FALE CONOSCO VVV -->
	<section class="section-fale-conosco py-8">
		<div class="row">
			<h2 class="text-white text-center">FALE <fw900>CONOSCO</fw900>
			</h2>
			<p class="text-white fs-24 col-10 m-auto py-3">Entre em contato com um de nossos especialistas e saiba o que a MRCLA pode fazer para te ajudar a melhorar a logística de ativos ferroviários da sua empresa!</p>
			<div class="d-flex justify-content-center">
				<a href="" class="text-white bg-laranja py-3 px-4 botao"><img class="pe-3" src="<?php bloginfo('template_url'); ?>/assets/images/seta-branca-comprida.png" alt="seta branca"> Entre em contato</a>
			</div>
		</div>
	</section>


	<!-- VVV SECTION MENU FOOTER VVV -->
	<section class="bg-azul-escuro py-5 container-fluid">
		<div class="row d-flex justify-content-center">
			<?php
			if (has_nav_menu('footer')) {
				wp_nav_menu(array(
					'theme_location' => 'footer',
					'container' => false,
					'fallback_cb' => false,
					'menu_class' => 'menu navbar-nav flex-xl-row mb-0 gap-5 col-7 flex-wrap',
					'add_li_class'  => 'sub-item flex-column justify-content-start'
				));
			}
			?>
			<div class="w-fit pt-3 novidades-blog d-flex flex-column">
				<a href="" class="fs-18 fw700">NOVIDADES DO BLOG</a>
				<a href="" class="fs-18 fw700">FALE CONOSCO</a>
			</div>
		</div>
	</section>


</footer>


<?php wp_footer(); ?>


</body>

</html>