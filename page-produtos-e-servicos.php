<?php get_header();
    $oque_fazemos = get_post_meta($post->ID, 'produtoseservicos_oque_fazemos', true);
    $produtos_servicos = get_post_meta($post->ID, 'produtoseservicos_produtos_servicos', true);
    $servicos_diferenciados = get_post_meta($post->ID, 'produtoseservicos_servicos_diferenciados', true);
    $locomotiva = get_post_meta($post->ID, 'produtoseservicos_locomotiva', true);
    $terminal = get_post_meta($post->ID, 'produtoseservicos_terminal', true);
    $swiper_produtos = get_post_meta($post->ID, 'produtoseservicos_swiper', true);
?>


<div class="position-relative banner-pagina mt-5 container-fluid p-0" id="topo">
    <?php the_post_thumbnail('', array('class' => 'banner-produtos')); ?>
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
</div>

<section class="container mrcla-te-ajuda">
    <div class="row my-5 flex-md-row flex-column">

        <div class="d-flex flex-column col-12 col-md-6 pb-4 pb-md-0">
            <h2 class="fw300 pb-4 azul-escuro">O QUE <fw900> FAZEMOS </fw900>
            </h2>
            <p class="cinza fw400 init-hidden" style="white-space: pre-wrap;"><?php echo $oque_fazemos[0]; ?></p>
            <img src="<?php echo wp_get_attachment_url($oque_fazemos[2]); ?>" alt="">
        </div>
        <div class="d-flex flex-md-column flex-column-reverse col-12 col-md-6">
            <img src="<?php echo wp_get_attachment_url($oque_fazemos[3]); ?>" alt="">

            <p class="cinza fw400 pt-4 init-hidden" style="white-space: pre-wrap;"><?php echo $oque_fazemos[1]; ?></p>
        </div>
    </div>
</section>
<section class=" bg-azul-roxo">
    <div class="container">

        <div class="row text-white py-6 justify-content-between flex-column flex-md-row">

            <div class="col-11 col-md-5 d-flex align-items-center">
                <h2 class="fw300 m-0">A MRCLA TE AJUDA
                    A POTENCIALIZAR <fw900> SEU PODER DE ESCOLHA! </fw900>
                </h2>
            </div>

            <div class="col-10 col-md-6">
                <ul class="lista-produtos ps-0 ps-md-4 pt-5 pt-md-0">
                    <li>
                        <p>Alocar melhor seus recursos</p>
                    </li>
                    <li>
                        <p>Prazos de pagamento flexíveis</p>
                    </li>
                    <li>
                        <p>Aumentar a capacidade de transporte</p>
                    </li>
                    <li>
                        <p>Maior segurança no transporte de cargas</p>
                    </li>
                    <li>
                        <p>Melhorar a eficiência com ativos novos e modernos</p>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="section-servicos py-8">
    <div class="container">
        <div class="w-100 quebra-cabeca position-relative">
            <img class="d-xl-block d-none" src="<?php bloginfo('template_url'); ?>/assets/images/fundo-quebra-cabeca.png" alt="">

            <div class="row py-4">
                <div class="d-flex justify-content-between px-5 position-quebra-cabeca-cima flex-xl-row flex-column">
                    <div class="d-flex flex-column col-12 col-xl-5 p-sm-4 pt-4">
                        <h4 class="azul-escuro fs-24 "><?php echo $produtos_servicos[0]; ?></h4>
                        <p class="cinza"><?php echo $produtos_servicos[1]; ?></p>
                    </div>
                    <div class="d-flex flex-column col-12 col-xl-5 p-sm-4 pt-4">
                        <h4 class="azul-escuro fs-24"><?php echo $produtos_servicos[2]; ?></h4>
                        <p class="cinza"><?php echo $produtos_servicos[3]; ?></p>
                    </div>
                </div>
                <div class="d-flex justify-content-between px-5 position-quebra-cabeca-baixo flex-xl-row flex-column">
                    <div class="d-flex flex-column col-12 col-xl-6 p-sm-4 pt-4">
                        <h4 class="azul-escuro fs-24 "><?php echo $produtos_servicos[4]; ?></h4>
                        <p class="cinza"><?php echo $produtos_servicos[5]; ?></p>
                    </div>
                    <div class="d-flex flex-column col-12 col-xl-5 p-sm-4 pt-4">
                        <h4 class="azul-escuro fs-24"><?php echo $produtos_servicos[6]; ?></h4>
                        <p class="cinza"><?php echo $produtos_servicos[7]; ?></p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<section class="container-fluid section-conheca-locomotica">
    <div class="position-relative row justify-content-center">
        <img src="<?php echo $servicos_diferenciados[1]; ?>" alt="trem">
        <div class="efeito-secao"></div>
        <div class="position-servicos-diferenciados text-white col-12 text-sm-end ">
            <div class="text-white text-center text-md-start init-hidden">
                <h2 class="fw300 pb-4 fw900">
                    SERVIÇOS DIFERENCIADOS
                </h2>
                <p style="white-space: pre-line;"><?php echo $servicos_diferenciados[0]; ?>
                </p>
            </div>
        </div>
    </div>
    </div>
</section>


<section class="section-nossa-experiencia container py-8">
    <div class="pb-5">
        <h2 class="fw300 pb-4 azul-escuro">NOSSA <fw900> EXPERIÊNCIA </fw900>
        </h2>

        <p>Nossa expertise na área foi adquirida ao longo de 17 anos de atuação junto a grandes players logísticos. Participamos de 90% da implantação no setor ferroviário, visando contribuir para infraestrutura e desenvolvimento social do Brasil. <br> <br>

            Nossa equipe técnica, especializada e comprometida com seu negócio, prestará suporte para lidar com os complexos aspectos gerenciais na compra de material rodante para o transporte ferroviário. Pela nossa vasta experiência em projetos, podemos recomendar soluções de mobilidade integradas que levam a preços competitivos para sua empresa, independentemente do tamanho ou estrutura de suas operações.
        </p>
    </div>

    <div class="row nesses-17">

        <div class="d-flex flex-column flex-lg-row justify-content-center">
            <div class="d-flex flex-column azul-roxo align-items-end gap-lg-5 col-lg-3">
                <div class="d-flex align-items-center">
                    <p>Realizou <strong>26</strong> projetos</p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/projetos.png" alt="">
                </div>
                <div class="d-flex align-items-center pe-lg-5">
                    <p>Alugou <strong>9.712</strong> Vagões</p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/alugou-vagoes.png" alt="">
                </div>
                <div class="d-flex align-items-center">
                    <p>Alugou <strong>21</strong> Locomotivas</p>
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/alugou-locomotivas.png" alt="">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <img style="max-width: 100%;" src="<?php bloginfo('template_url'); ?>/assets/images/nesses-17-anos.svg" alt="">
            </div>

            <div class="d-flex flex-column azul-roxo align-items-start gap-lg-5 col-lg-4 ">
                <div class="d-flex align-items-center">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/construiu.png" alt="">
                    <p>Construiu <strong>1</strong> terminal de cargas</p>
                </div>
                <div class="d-flex align-items-center ps-lg-5">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/contribuiu.png" alt="">
                    <p>Contribuiu com <strong>14</strong> grandes players e diversos parceiros</p>
                </div>
                <div class="d-flex align-items-center">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/esta-presente.png" alt="">
                    <p>Está presente em toda malha da Ferrovia Norte-Sul e Centro-Atlântica</p>
                </div>
            </div>
        </div>
    </div>
</section>

<h2 class="fw300 pb-1 pt-5 azul-escuro container">NOSSOS <fw900> PRODUTOS </fw900>
</h2>
<section class="section-nossos-produtos py-4">
    <div class="d-flex flex-column align-items-center position-relative">

        <img class="container-fluid" src="<?php echo $locomotiva[1] ?>" alt=" fundo secao locomotiva">
        <div class="flex-column text-white mx-3">
            <div class="h-100 efeito-banner start-0 d-none d-md-block"></div>
            <div class="d-flex justify-content-center flex-column col-lg-7 col-md-8 position-locomotiva h-100 p-xxl-0 ps-8 init-hidden">
                <h2 class="fw900">LOCOMOTIVA</h2>
                <p class="fw400" style="white-space: pre-line;">
                    <?php echo $locomotiva[0] ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="tipos-de-vagoes container mt-5 position-relative">

    <div class="swiper vagoes">
        <h2 class="fw300 pt-3 pb-4 azul-escuro container">TIPOS DE <fw900> VAGÕES </fw900>
        </h2>
        <div class="swiper-wrapper">
            <?php $i = 0;
            if ($swiper_produtos) {
                foreach ($swiper_produtos as $row) {
            ?>
                    <div class="swiper-slide">
                        <div class="d-flex flex-column">
                            <img src="<?php echo wp_get_attachment_url($swiper_produtos[$i][2]); ?>" alt="foto vagao">
                            <h5 class="fw500 fs-25"><?php echo $swiper_produtos[$i][0] ?></h5>
                            <p class="cinza"><?php echo $swiper_produtos[$i][1] ?></p>
                        </div>
                    </div>

            <?php $i++;
                }
            } ?>

        </div>
        <div class="swiper-button-prev d-none d-sm-flex"></div>
        <div class="swiper-button-next d-none d-sm-flex"></div>

    </div>

</section>

<section class="section-terminal-de-cargas py-4">
    <div class="d-flex flex-column align-items-center position-relative">

        <img class="container-fluid p-0" src="<?php bloginfo('template_url'); ?>/assets/images/terminal-de-cargas.png" alt="">
        <div class="flex-column text-white mx-3">
            <div class="h-100 efeito-banner start-0 d-none d-md-block"></div>
            <div class="d-flex justify-content-center flex-column col-lg-7 col-md-8 position-locomotiva h-100 p-xxl-0 ps-8 init-hidden">
                <h2 class="fw900">TERMINAL DE CARGAS</h2>
                <p>Está situado na cidade de Paranaguá, no Paraná e faz parte da malha ferroviária Norte-Sul e Centro-Atlântica. <br><br>

                    Esse terminal é de uso exclusivo da RUMO, e tem o intuito de dinamizar as atividades operacionais da empresa na região. <br><br>

                    Com capacidade de receber cerca de 1,5 mil toneladas de grãos por hora e de três diferentes tipos de produtos. <br><br>

                    A potência de armazenagem diária do terminal é de 100 mil toneladas para transporte ferroviário e 20 mil toneladas no rodoviário e, em tempos de safra, o fluxo diário é de 480 vagões graneleiros.
                </p>
            </div>
        </div>
    </div>
</section>





<?php get_footer(); ?>