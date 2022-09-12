<?php get_header(); ?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <img class="banner-produtos" src="<?php bloginfo('template_url'); ?>/assets/images/banner-fale-conosco.png" alt="banner trem">
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
</div>

<section class="py-6 container">
    <div class="row">
        <p class="cinza fw400">A MRCLA é referência em logística de ativos ferroviários, locação de vagões, locomotivas e terminais de cargas. Para saber tudo que podemos fazer pelo seu negócio, entre em contato com um de nossos especialistas!
        </p>
        

        <h5 class="fs-25 fw500" style="color:#161616;">Dúvidas de como a MRCLA pode te ajudar? Entre em contato!</h5>

        <div class="form-contato">
            <?php echo apply_filters('the_content', '[contact-form-7 id="136" title="Fale Conosco"]') ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>