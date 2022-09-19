<?php get_header();
$banner = get_post_meta($post->ID, 'banner', true);
$segmentos_swiper = get_post_meta($post->ID, 'segmentos_swiper', true);
?>
<section class="banner-home">
    <div class="position-relative banner-home mt-5 container-fluid p-0">
        <div class="swiper swiperBanner">
            <div class="swiper-wrapper">
                <?php $i = 0;
                if ($banner) {
                    foreach ($banner as $row) {
                ?>
                        <div class="swiper-slide">
                            <img class="banner-produtos" src="<?php echo wp_get_attachment_url($banner[$i][0]); ?>" alt="banner home">
                            <div class="position-conteudo-banner col-12">
                                <div class="container d-flex flex-column align-items-center align-items-md-start margin-banner">
                                    <h2 class="text-uppercase text-white fonte-titulo-banner fundo-h2 w-fit text-center p-2"><?php echo $banner[$i][1] ?> </h2>
                                    <h2 class="text-uppercase text-white fundo-h2 w-fit p-2">
                                        <fw900><?php echo $banner[$i][2] ?></fw900>
                                    </h2>
                                    <p class="fs-19 azul-escuro fundo-p fw500 text-center"><?php echo $banner[$i][3] ?></p>
                                    <div class="d-flex">
                                        <a href="" class="text-white bg-laranja d-flex align-items-center py-3 px-4 botao"><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                                                <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                                            </svg>
                                            <?php echo $banner[$i][4] ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php $i++;
                    }
                } ?>

            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="w-100 d-flex justify-content-center">

                <div class="swiper-pagination swiper-pagination-vertical d-flex flex-md-column justify-content-around align-items-around"></div>
            </div>
        </div>
    </div>
</section>

<section class="section-quemsomos-home container-fluid container-xxl mb-5">
    <div class="position-relative row justify-content-center">
        <div class="position-relative mt-sm-3">
            <img class="d-none d-sm-block" src="<?php bloginfo('template_url'); ?>/assets/images/trem-laranja.png" alt="">
            <div class="efeito-secao"></div>
        </div>
        <div class="position-conteudo col-md-8 col-sm-10 col-12">
            <h2 class="fw300 text-white pt-4 pt-sm-0 m-">QUEM <fw900> SOMOS </fw900>
            </h2>
            <p class="text-white text-start fw400" style="white-space: pre-line;">
                A Mitsui Rail Capital Latin America (MRCLA) está há mais de 17 anos no mercado, trazendo soluções inovadoras e integradas para mobilidade logística de material rodante em diversos setores.

                Como uma das principais empresas de locação de vagões, locomotivas e terminais no Brasil, oferecemos soluções que atendem as necessidades e demandas de nossos clientes.

                A MRCLA valoriza o relacionamento de longo prazo com seus clientes, e preza pela excelência no atendimento, segurança, qualidade e confiança.

            </p>
            <a href="" class="text-white bg-laranja d-flex align-items-center justify-content-center py-3 px-5 botao col-sm-10 col-lg-8 col-12"><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                    <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
                <p class="m-0 d-none d-sm-block">Conheça a história da MRCLA</p>
                <p class="m-0 d-block d-sm-none"> Saiba Mais</p>
            </a>
        </div>
    </div>
</section>

<section class="section-produtos-home container">
    <div class="row flex-column flex-lg-row">
        <div class="col-lg-4 pb-4">
            <h2 class="fw300 fs-40 azul-escuro pt-4 pt-sm-0">PRODUTOS E <fw900> SERVIÇOS </fw900>
            </h2>
            <p class="cinza fw400">Somos referência em soluções integradas para mobilidade logística ferroviária. Locamos locomotivas, vagões e terminais de carga para diversos segmentos de produtos, como agrícolas, minério, combustíveis, siderúrgicos e industrializados.</p>
            <p class="cinza fw600">Conte com a MRCLA para potencializar a gestão de ativos ferroviários da sua empresa! </p>
            <a href="" class="text-white bg-laranja d-lg-flex d-none align-items-center justify-content-center py-3 px-5 botao col-12"><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                    <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
                <p class="m-0"> Veja nossas soluçoes</p>
            </a>
        </div>
        <div class="col-lg-8">
            <div class="swiper swiperProdutosHome pb-lg-4">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="pointer">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/trem-laranja.png" alt="">
                            <div class="efeito-img"></div>
                            <p class="fw600 fs-20 text-white texto m-0">Vagões</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pointer">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/trem-laranja.png" alt="">
                            <div class="efeito-img"></div>
                            <p class="fw600 fs-20 text-white texto m-0">Vagões</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="pointer">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/trem-laranja.png" alt="">
                            <div class="efeito-img"></div>
                            <p class="fw600 fs-20 text-white texto m-0">Vagões</p>
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-end w-100 mt-5">
                    <a href="" class="text-white bg-laranja d-flex d-lg-none align-items-center justify-content-center py-3 px-5 botao "><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                            <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                        </svg>
                        <p class="m-0"> Veja nossas soluçoes</p>
                    </a>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
</section>

<section class="container section-segmentos pt-8">
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
<section class="container-fluid section-conheca-locomotica">
    <div class="position-relative row justify-content-center">
        <img src="<?php bloginfo('template_url'); ?>/assets/images/conheca-locomotiva.png" alt="trem">
        <div class="efeito-secao"></div>
        <div class="position-conteudo text-white col-12 text-sm-end">
            <p class="fs-20 text-wrap pt-4 pt-sm-0">Conheça a locomotiva diesel-elétrica produzida pela GE, modelo de sustentabilidade com participação da MRCLA!</p>
            <a href="" class="text-white bg-laranja d-flex align-items-center justify-content-center py-3 px-5 botao"><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                    <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
                <p class="m-0"> Veja nossa locomotiva!</p>
            </a>
        </div>
    </div>
</section>
<?php get_footer(); ?>