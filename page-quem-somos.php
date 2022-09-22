<?php get_header();
$equipe = get_post_meta(get_the_ID(), 'quemsomos_equipe', true);
$grupo_mitsui = get_post_meta($post->ID, 'quemsomos_grupo_mitsui', true);
$sobre_mrcla = get_post_meta($post->ID, 'quemsomos_sobre_mrcla', true);
$missao = get_post_meta($post->ID, 'quemsomos_missao', true);
$visao = get_post_meta($post->ID, 'quemsomos_visao', true);
$valores = get_post_meta($post->ID, 'quemsomos_valores', true);
?>


<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <?php the_post_thumbnail('', array('class' => 'banner-produtos')); ?>
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
</div>

<section class="section-sobre-mrcla row d-flex container-fluid justify-content-center mx-0 my-3">
    <div class="position-relative">

        <img src="<?php echo $sobre_mrcla[1]; ?> " alt="">
        <div class="sobre-mrcla azul-escuro d-none d-sm-flex flex-column justify-content-center p-5">
            <h2 class="fw300 pb-4">SOBRE A <fw900> MRCLA E NEGÓCIOS </fw900>
            </h2>

            <p style="white-space: pre-line;">
                <?php echo $sobre_mrcla[0]; ?>
            </p>
        </div>
    </div>
    <div class="d-flex d-sm-none flex-column text-white py-4">
        <h2 class="fw300 py-4">SOBRE A <fw900> MRCLA E NEGÓCIOS </fw900>
        </h2>
        <p style="white-space: pre-line;">
            <?php echo $sobre_mrcla[0]; ?>
        </p>
    </div>
</section>
<section class="section-mmv azul-escuro container py-10">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="fw300 pb-5 text-center">MISSÃO, VISÃO E <fw900>VALORES</fw900>
        </h2>
        <div class="row d-flex justify-content-center align-items-center align-items-md-start flex-column flex-md-row foto-mmv">
            <div class="d-flex flex-column align-items-center col-10 col-sm-7 col-md-4">
                <img src="<?php echo $missao[1]; ?>" alt="foto missao">
                <p class="fs-28 fw400 pt-4">Missão</p>
                <p class="fw-400 text-center"><?php echo $missao[0]; ?></p>
            </div>

            <div class="d-flex flex-column align-items-center col-10 col-sm-7 col-md-4 py-5 py-md-0">
                <img src="<?php echo $visao[1]; ?>" alt=" foto visao">
                <p class="fs-28 fw400 pt-4">Visão</p>
                <p class="fw-400 text-center"><?php echo $visao[0]; ?></p>
            </div>

            <div class="d-flex flex-column align-items-center col-10 col-sm-7 col-md-4">
                <img src="<?php echo $valores[1]; ?>" alt=" foto valores">
                <p class="fs-28 fw400 pt-4">Valores</p>
                <p class="fw-400 text-center"><?php echo $valores[0]; ?></p>
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


<section class="container-fluid section-grupo-mitsui">
    <div class="position-relative row justify-content-center">
        <img class="img-grupo-mitsui" src="<?php echo $grupo_mitsui[1]; ?>" alt="fundo grupo mitsui">
        <div class="efeito-secao"></div>
        <div class="position-conteudo text-white col-12 text-sm-end ">
            <h2 class="fw300 pb-4 pt-4">GRUPO <fw900> MITSUI </fw900>
            </h2>
            <p class="fs-16 fw-400" style="white-space: pre-line;"><?php echo $grupo_mitsui[0]; ?></p>
            <a href="" class="text-white bg-laranja d-flex align-items-center justify-content-center py-3 px-5 botao"><svg width="65" class="pe-3 d-none d-sm-block" height="18" viewBox="0 0 65 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63 9H1" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                    <path d="M56 1L64 9L56 17" stroke="white" stroke-linecap="square" stroke-linejoin="round" />
                </svg>
                <p class="m-0"> Conheça o GRUPO MITSUI</p>
            </a>
        </div>
    </div>
    </div>
</section>

<?php get_footer(); ?>