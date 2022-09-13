<?php get_header(); 
    $perguntas = get_post_meta($post->ID, 'perguntas', true);
    $endereco = get_post_meta($post->ID, 'endereco', true);
?>

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
<section class="container py-6">
    <div class="py-5">
        <h2 class="azul-escuro">PERGUNTAS <fw900>FREQUENTES</fw900>
        </h2>
        <p class="cinza fw400">Tire suas dúvidas com algumas perguntas feitas frequentemente pelos clientes da MRCLA.</p>
    </div>
    <div class="d-flex flex-column gap-2 section-perguntas">
        <?php $i = 0;
        if ($perguntas) {
            foreach ($perguntas as $row) {
        ?>
            <div class="bg-f1 accordion-perguntas position-relative ps-6">
                <h5 class="fw600 fs-18 cinza pergunta "><?php echo $perguntas[$i][0] ?></h5>
                <p class="cinza fw400 resposta"><?php echo $perguntas[$i][1] ?></p>
            </div>
        <?php $i++;
            }
        } ?>

    </div>

</section>

<section class="section-info pt-6">
    <div class="container py-6">
        <div class="row flex-column flex-md-row align-items-center align-items-md-start gap-5 gap-md-0">
            <div class="d-flex flex-column align-items-center azul-escuro col-10 col-md-4 text-center">
                <div class="bg-azul-escuro d-flex justify-content-center align-items-center" style="height: 95px; width:95px;">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/icone-gps.png" alt="icone localização">
                </div>
                <p class="fw500 fs-22 pt-4"><?php echo $endereco[0]; ?></p>
                <p class="fw300 fs-18">CEP: <?php echo $endereco[4]; ?></p>
            </div>
            <div class="d-flex flex-column align-items-center azul-escuro col-10 col-md-4 text-center">
                <div class="bg-azul-escuro d-flex justify-content-center align-items-center" style="height: 95px; width:95px;">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/icone-telefone.png" alt="icone telefone">
                </div>
                <p class="fw500 fs-22 pt-4"><fw700><?php echo $endereco[1]; ?></fw700></p>
            </div>
            <div class="d-flex flex-column align-items-center azul-escuro col-10 col-md-4 text-center">
                <div class="bg-azul-escuro d-flex justify-content-center align-items-center" style="height: 95px; width:95px;">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/icone-email.png" alt="icone email">
                </div>
                <p class="fw500 fs-22 pt-4"><?php echo $endereco[2]; ?></p>
            </div>
        </div>
    </div>
    <div class="container-fluid container-xxl pt-5">
    <iframe src="<?php echo $endereco[3]; ?>" width="100%" height="450" style="border:0; max-width:2300px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<?php get_footer(); ?>