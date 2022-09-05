<?php get_header();
$equipe = get_post_meta(get_the_ID(), 'quemsomos_equipe', true);
$downloads = get_post_meta($post->ID, 'quemsomos_downloads', true);
?>


<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <img src="<?php bloginfo('template_url'); ?>/assets/images/quem-somos-banner.png" alt="banner trem">
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
</div>

<section class="section-sobre-mrcla row d-flex container-fluid justify-content-center mx-0 my-3">
    <div class="position-relative">

        <img src="<?php bloginfo('template_url'); ?>/assets/images/foto-quem-somos.png" alt="">
        <div class="sobre-mrcla azul-escuro d-none d-sm-flex flex-column justify-content-center p-5">
            <h2 class="fw300 pb-4">SOBRE A <fw900> MRCLA E NEGÓCIOS </fw900>
            </h2>

            <p>
                <?= $sobre_mrcla = get_post_meta($post->ID, 'quemsomos_sobre_mrcla', true); ?>
            </p>
        </div>
    </div>
    <div class="d-flex d-sm-none flex-column text-white py-4">
        <h2 class="fw300 py-4">SOBRE A <fw900> MRCLA E NEGÓCIOS </fw900>
        </h2>

        <p>
            A MRCLA é pioneira no setor de locação de vagões, locomotivas e terminais de cargas na América Latina, tendo participado da maioria das implantações no setor ferroviário brasileiro. <br><br>

            Há mais de 17 anos, promovemos soluções financeiras personalizadas para logística de material rodante, garantindo maior capacidade de carga aos clientes.
        </p>
    </div>
</section>
<section class="section-mmv azul-escuro container py-10">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="fw300 pb-5 text-center">MISSÃO, VISÃO E <fw900>VALORES</fw900>
        </h2>
        <div class="row d-flex justify-content-center align-items-center align-items-md-start flex-column flex-md-row">
            <div class="d-flex flex-column align-items-center col-10 col-sm-7 col-md-4">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/missao.png" alt="foto trem">
                <p class="fs-28 fw400 pt-4">Missão</p>
                <p class="fw-400 text-center"><?= get_post_meta(get_the_ID(), 'quemsomos_missao', true); ?></p>
            </div>

            <div class="d-flex flex-column align-items-center col-10 col-sm-7 col-md-4 py-5 py-md-0">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/visao.png" alt=" foto trilho">
                <p class="fs-28 fw400 pt-4">Visão</p>
                <p class="fw-400 text-center"><?= get_post_meta(get_the_ID(), 'quemsomos_visao', true); ?></p>
            </div>

            <div class="d-flex flex-column align-items-center col-10 col-sm-7 col-md-4">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/valores.png" alt=" foto aperto de mão">
                <p class="fs-28 fw400 pt-4">Valores</p>
                <p class="fw-400 text-center"><?= get_post_meta(get_the_ID(), 'quemsomos_valores', true); ?></p>
            </div>
        </div>
    </div>
</section>
<section class="section-nossa-equipe container">
    <h2 class="fw300 pb-4 azul-escuro text-center">NOSSA <fw900>EQUIPE</fw900>
    </h2>
    <div class="row text-white justify-content-between flex-column flex-lg-row">
        <?php $i = 0;
        if ($equipe) {
            foreach ($equipe as $row) {
        ?>
                <div class="d-flex flex-column align-items-center col-12 col-sm-11 col-lg-6">
                    <div class="bg-azul-escuro w-100 rad-100 d-flex justify-content-center justify-content-sm-start align-items-center  py-2 mb-3">
                        <img src="<?php echo wp_get_attachment_url($equipe[$i][2]); ?>" alt="foto colaborador">
                        <div class="d-none d-sm-flex flex-column ps-4">
                            <p class="fw600 fs-25 m-0"><?php echo $equipe[$i][0] ?></p>
                            <p class="fw400 fs-20 m-0"><?php echo $equipe[$i][1] ?></p>
                            <p class="fw400 fs-20 m-0"></p>
                        </div>
                    </div>
                    <div class="d-flex d-sm-none flex-column align-items-center pb-3 azul-escuro">
                        <p class="fw600 fs-25 m-0"><?php echo $equipe[$i][0] ?></p>
                        <p class="fw400 fs-20 m-0"><?php echo $equipe[$i][1] ?></p>
                    </div>
                </div>
        <?php
                $i++;
            }
        } ?>
    </div>
</section>

<section class="section-grupo-mitsui container-fluid d-flex justify-content-center">
    <div class="position-relative pb-4">
        <img class="img-grupo-mitsui" src="<?php bloginfo('template_url'); ?>/assets/images/foto-grupo-mitsui.png" alt="fundo grupo mitsui">
        <div class="grupo-mitsui text-white d-flex flex-column justify-content-center text-end">
            <h2 class="fw300 pb-4">GRUPO <fw900> MITSUI </fw900>
            </h2>

            <p class="fs-16 fw-400">
                A Mitsui Rail Capital Participações Ltda. (MRCLA) é subsidiária da Mitsui & Co., Ltd., um dos maiores conglomerados japoneses, presente em 66 países. O Grupo Mitsui é uma das empresas de trade, investimento e serviços abrangentes mais diversificados do mundo. <br><br>

                Com objetivo de expandir os serviços oferecidos, a Mitsui ingressou no mercado de material rodante ao estabelecer a MRC nos EUA, Brasil e Rússia, e há décadas está envolvida em projetos logísticos como transporte de pessoas e cargas. <br><br>

                O conglomerado Mitsui continuará a empenhar esforços para melhorar o valor corporativo da MRCLA, mediante a expansão da escala de negócios e melhoria do portfólio de vagões. Consequentemente, contribuirá no desenvolvimento e maior eficiência da plataforma de logística ferroviária do Brasil.
            </p>
            <div class="d-flex justify-content-end pt-4">
                <a href="" class="text-white w-fit bg-laranja d-flex py-3 px-4 botao"><img class="pe-3 d-none d-sm-block" src="<?php bloginfo('template_url'); ?>/assets/images/seta-branca-comprida.png" alt="seta branca"> Conheça o GRUPO MITSUI</a>
            </div>
        </div>
    </div>
</section>

<!-- REDES SOCIAIS LATERAL -->
<div class="redes-fixed d-flex flex-column">
    <a href=""><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.7847 19.7905V19.7895H19.7899V12.5319C19.7899 8.98167 19.0256 6.24622 14.8745 6.24622C12.8791 6.24622 11.5402 7.34133 10.9934 8.37923H10.9357V6.57758H7V19.7895H11.098V13.2477C11.098 11.5254 11.4248 9.85982 13.5578 9.85982C15.6599 9.85982 15.6908 11.8254 15.6908 13.3585V19.7905H19.7847Z" fill="#353597" />
            <path d="M4.42984 6.57721H0.32666V19.7891H4.42984V6.57721Z" fill="#353597" />
            <path d="M2.37626 0C1.0647 0 0 1.0647 0 2.37626C0 3.68782 1.0647 4.77468 2.37626 4.77468C3.68782 4.77468 4.75252 3.68782 4.75252 2.37626C4.752 1.0647 3.6873 0 2.37626 0Z" fill="#353597" />
        </svg></a>
    <a href=""><svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.7896 6.53125H7.03955V4.15625C7.03955 3.5009 7.59971 2.96875 8.28955 2.96875H9.53955V0H7.03955C4.96846 0 3.28955 1.59496 3.28955 3.5625V6.53125H0.789551V9.5H3.28955V19H7.03955V9.5H9.53955L10.7896 6.53125Z" fill="#353597" />
        </svg></a>
    <a href=""><svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.2084 1H7.34356C3.72452 1 0.789551 4.02694 0.789551 7.75938V15.8706C0.789551 19.6031 3.72452 22.63 7.34356 22.63H15.2084C18.8274 22.63 21.7624 19.6031 21.7624 15.8706V7.75938C21.7624 4.02694 18.8274 1 15.2084 1ZM19.7962 15.8706C19.7962 18.4798 17.7382 20.6022 15.2084 20.6022H7.34356C4.81371 20.6022 2.75575 18.4798 2.75575 15.8706V7.75938C2.75575 5.15026 4.81371 3.02782 7.34356 3.02782H15.2084C17.7382 3.02782 19.7962 5.15026 19.7962 7.75938V15.8706Z" fill="#353597" />
            <path d="M11.2766 6.4077C8.38096 6.4077 6.0334 8.82882 6.0334 11.8152C6.0334 14.8016 8.38096 17.2227 11.2766 17.2227C14.1722 17.2227 16.5198 14.8016 16.5198 11.8152C16.5198 8.82882 14.1722 6.4077 11.2766 6.4077ZM11.2766 15.1949C9.47016 15.1949 7.9996 13.6783 7.9996 11.8152C7.9996 9.95088 9.47016 8.43551 11.2766 8.43551C13.0831 8.43551 14.5536 9.95088 14.5536 11.8152C14.5536 13.6783 13.0831 15.1949 11.2766 15.1949Z" fill="#353597" />
            <path d="M17.0435 6.40818C17.3331 6.40818 17.5679 6.16608 17.5679 5.86742C17.5679 5.56877 17.3331 5.32667 17.0435 5.32667C16.7539 5.32667 16.5192 5.56877 16.5192 5.86742C16.5192 6.16608 16.7539 6.40818 17.0435 6.40818Z" fill="#353597" />
            <path d="M15.2084 1H7.34356C3.72452 1 0.789551 4.02694 0.789551 7.75938V15.8706C0.789551 19.6031 3.72452 22.63 7.34356 22.63H15.2084C18.8274 22.63 21.7624 19.6031 21.7624 15.8706V7.75938C21.7624 4.02694 18.8274 1 15.2084 1ZM19.7962 15.8706C19.7962 18.4798 17.7382 20.6022 15.2084 20.6022H7.34356C4.81371 20.6022 2.75575 18.4798 2.75575 15.8706V7.75938C2.75575 5.15026 4.81371 3.02782 7.34356 3.02782H15.2084C17.7382 3.02782 19.7962 5.15026 19.7962 7.75938V15.8706Z" stroke="#353597" stroke-width="0.5" />
            <path d="M11.2766 6.4077C8.38096 6.4077 6.0334 8.82882 6.0334 11.8152C6.0334 14.8016 8.38096 17.2227 11.2766 17.2227C14.1722 17.2227 16.5198 14.8016 16.5198 11.8152C16.5198 8.82882 14.1722 6.4077 11.2766 6.4077ZM11.2766 15.1949C9.47016 15.1949 7.9996 13.6783 7.9996 11.8152C7.9996 9.95088 9.47016 8.43551 11.2766 8.43551C13.0831 8.43551 14.5536 9.95088 14.5536 11.8152C14.5536 13.6783 13.0831 15.1949 11.2766 15.1949Z" stroke="#353597" stroke-width="0.5" />
            <path d="M17.0435 6.40818C17.3331 6.40818 17.5679 6.16608 17.5679 5.86742C17.5679 5.56877 17.3331 5.32667 17.0435 5.32667C16.7539 5.32667 16.5192 5.56877 16.5192 5.86742C16.5192 6.16608 16.7539 6.40818 17.0435 6.40818Z" stroke="#353597" stroke-width="0.5" />
        </svg></a>
</div>

<?php get_footer(); ?>