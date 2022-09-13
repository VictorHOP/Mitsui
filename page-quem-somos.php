<?php get_header();
$equipe = get_post_meta(get_the_ID(), 'quemsomos_equipe', true);
$downloads = get_post_meta($post->ID, 'quemsomos_downloads', true);
?>


<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <img class="banner-produtos" src="<?php bloginfo('template_url'); ?>/assets/images/quem-somos-banner.png" alt="banner trem">
    <div class="h-100 efeito-banner"></div>
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


<?php get_footer(); ?>