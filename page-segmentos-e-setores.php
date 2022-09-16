<?php get_header();
$segmentos_swiper = get_post_meta($post->ID, 'segmentos_swiper', true);
$cases_swiper = get_post_meta($post->ID, 'cases_swiper', true);
$sustentabilidade = get_post_meta($post->ID, 'sustentabilidade', true);
?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <img class="banner-produtos" src="<?php bloginfo('template_url'); ?>/assets/images/banner-segmentos-setores.png" alt="banner trem">
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
</div>

<section class="container section-segmentos">
    <p class="cinza my-5">Sua empresa poderá aumentar a quantidade de ativos logísticos disponíveis por meio da locação de vagões e locomotivas, assim é possível garantir maior capacidade no transporte de cargas e alavancar seu negócio.

        <strong>Confira os segmentos e setores que atuamos e contate um dos nossos especialistas para saber como obter vantagem competitiva na sua empresa com a MRCLA!</strong>
    </p>

    <div class="swiper swiperSegmentos py-5">
        <div class="swiper-wrapper">
            <?php $i = 0;
            if ($segmentos_swiper) {
                foreach ($segmentos_swiper as $row) {
            ?>
                    <div class="swiper-slide">
                        <div class="d-flex flex-column align-items-center">
                            <img src="<?php echo wp_get_attachment_url($segmentos_swiper[$i][1]); ?>" alt="foto segmento">
                            <h5 class="fw500 azul-escuro fs-28 pt-4"><?php echo $segmentos_swiper[$i][0] ?></h5>
                        </div>
                    </div>

            <?php $i++;
                }
            } ?>

        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
</section>

<section class="section-cases-sucesso container py-5">

    <h2 class="fw300 pb-4 azul-escuro container">CASES DE <fw900> SUCESSO </fw900>
    </h2>
    <p class="cinza mb-4">Conheça alguns cases de quem confia nos serviços da MRCLA e melhoraram sua logística de escoamento de mercadorias e ativos ferroviários, obtendo resultados financeiros de destaque.</p>

    <div class="swiper swiperCases py-5">
        <div class="swiper-wrapper">

            <?php $i = 0;
            if ($cases_swiper) {
                foreach ($cases_swiper as $row) {
            ?>
                    <div class="swiper-slide azul-escuro ">
                        <div class="row align-items-center">
                            <img class="col-lg-7 col-12" src="<?php echo wp_get_attachment_url($cases_swiper[$i][1]); ?>" alt="foto case">
                            <div class="d-flex flex-column col-lg-5 col-12 pb-5">
                                <h5 class="fw500 azul-escuro fs-25 py-4">Parceria com a <?php echo $cases_swiper[$i][2] ?></h5>
                                <p class="text-uppercase">
                                    <fw700>CLIENTE: </fw700><?php echo $cases_swiper[$i][3] ?>
                                </p>
                                <p class="text-uppercase">
                                    <fw700>MATERIAL RODANTE: </fw700><?php echo $cases_swiper[$i][4] ?>
                                </p>
                                <p class="text-uppercase">
                                    <fw700>FABRICANTE: </fw700><?php echo $cases_swiper[$i][5] ?>
                                </p>
                                <p class="text-uppercase">
                                    <fw700>PRODUTO: </fw700><?php echo $cases_swiper[$i][6] ?>
                                </p>
                                <p>
                                    <fw700>OBJETIVO: </fw700><?php echo $cases_swiper[$i][7] ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php $i++;
                }
            } ?>

        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>

</section>

<section class="section-modelo-sustentabilidade bg-azul-escuro py-10">
    <h2 class="fw300 pb-4 text-white container text-center">MODELO DE <fw900> SUSTENTABILIDADE </fw900>
    </h2>
    <div class="container d-flex flex-column">
        <div class="d-flex align-items-center py-5 flex-column flex-md-row">
            <img class="pe-md-5" src="<?php echo ($sustentabilidade[1]); ?>" alt="">
            <p class="text-white pt-4 pt-md-0"><?php echo $sustentabilidade[0]; ?>
            </p>
        </div>

        <div class="d-flex align-items-center py-5 flex-column flex-md-row-reverse">
            <img class="ps-md-5" src="<?php echo ($sustentabilidade[3]); ?>" alt="">
            <p class="text-white pt-4 pt-md-0"><?php echo $sustentabilidade[2]; ?>
            </p>
        </div>

        <div class="d-flex align-items-center py-5 flex-column flex-md-row">
            <img class="pe-md-5" src="<?php echo ($sustentabilidade[5]); ?>" alt="">
            <p class="text-white pt-4 pt-md-0"><?php echo $sustentabilidade[4]; ?>
            </p>
        </div>
    </div>
</section>



<?php get_footer(); ?>