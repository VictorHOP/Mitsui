<?php get_header();
$banner = get_post_meta($post->ID, 'banner', true);
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
            <div class="swiper-pagination swiper-pagination-vertical d-flex flex-md-column justify-content-around align-items-around"></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>