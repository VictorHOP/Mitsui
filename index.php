<?php get_header();
$banner = get_post_meta($post->ID, 'banner', true);
$quem_somos = get_post_meta($post->ID, 'quem_somos', true);
$segmentos_swiper = get_post_meta(get_page_by_path('segmentos-e-setores')->ID, 'segmentos_swiper', true);
$produtos_home = get_post_meta($post->ID, 'produtos_home', true);
$produtos_conteudo = get_post_meta($post->ID, 'produtos_conteudo', true);
// dd(get_page_by_path('segmentos-e-setores')->ID)
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
                <div class="swiper-pagination junin swiper-pagination-vertical d-flex flex-md-column justify-content-around align-items-around"></div>
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
            <?php echo $quem_somos ;?>
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
            <p class="cinza fw400" style="white-space: pre-line;"><?php echo $produtos_conteudo ;?></p>
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
                    <?php $i = 0;
                    if ($produtos_home) {
                        foreach ($produtos_home as $row) {
                    ?>
                            <div class="swiper-slide">
                                <div class="pointer">
                                    <img src="<?php echo wp_get_attachment_url($produtos_home[$i][0]); ?>" alt="">
                                    <div class="efeito-img"></div>
                                    <p class="fw600 fs-20 text-white texto m-0"><?php echo $produtos_home[$i][1] ?></p>
                                </div>
                            </div>
                    <?php $i++;
                        }
                    } ?>
                </div>
                <div class="d-flex justify-content-sm-end justify-content-center w-100 mt-5 button-produtos">
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
<div class="py-sm-5"></div>
<section class="container section-segmentos py-sm-8">
    <h2 class="fw300 fs-40 azul-escuro pt-4 pt-sm-0 pb-2">SEGMENTOS E <fw900> SETORES </fw900>
    </h2>
    <p class="cinza mt-sm-5">Sua empresa poderá aumentar a quantidade de ativos logísticos disponíveis por meio da locação de vagões e locomotivas, assim é possível garantir maior capacidade no transporte de cargas e alavancar seu negócio.</p>

    <div class="swiper swiperSegmentos py-6 mt-3">
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
            <div class="position-conteudo text-white col-12 text-sm-end ">
                <p class="fs-20 text-wrap pt-4 pt-sm-0">Conheça a locomotiva diesel-elétrica produzida pela GE, modelo de sustentabilidade com participação da MRCLA!</p>
                <a href="" class="text-white bg-laranja d-flex align-items-center justify-content-center py-3 px-5 botao"><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                        <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                    </svg>
                    <p class="m-0"> Veja nossa locomotiva!</p>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="container py-6">
    <h2 class="azul-roxo fs-sm-35 fs-44 pb-4">NOVIDADES DO <fw900>BLOG</fw900>
    </h2>

    <div class="row justify-content-center align-items-center">
        <div class="swiper swiperNovidades">
            <div class="swiper-wrapper">
                <?php query_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => '6'
                ));

                if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <div class="swiper-slide">
                            <div class="d-flex flex-column post-blog">
                                <a href="<?php the_permalink(); ?>" class="d-flex flex-column">
                                    <?php the_post_thumbnail('', array('class' => '')); ?>
                                    <p class="fs-16 cinza fw500"><?php the_title(); ?></p>
                                    <p class="laranja fw500 fs-16 ">Leia o artigo</p>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-center justify-content-sm-start w-100 button-novidades">
                <a href="<?php echo home_url('blog'); ?>" class="text-white bg-laranja d-flex align-items-center justify-content-center py-3 px-5 botao "><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                        <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                    </svg>
                    <p class="m-0"> Acesse outros artigos</p>
                </a>
                
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>