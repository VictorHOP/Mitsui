<?php get_header(); ?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0" id="topo">
    <img class="banner-produtos" src="<?php bloginfo('template_url'); ?>/assets/images/banner-politica.png" alt="banner trem">
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
</div>
<section class="container py-6">
    <div class="row">
        <div class="col-4">
            <ul class="lista-politica">
                <li><a href="#introducao">Introdução</a></li>
                <li class="active"><a href="#resumo">Resumo das nossas atividades de Tratamento</a></li>
                <li><a href="#coleta">Coleta e uso dos Dados Pessoais</a></li>
                <li><a href="#bases">Bases Legais para Tratamento de Dados Pessoais</a></li>
                <li><a href="#tomada">Tomada de Decisão Automatizada</a></li>
                <li><a href="#cookies">Cookies</a></li>
                <li><a href="#seguranca">Segurança</a></li>
                <li><a href="#retencao">Retenção de Dados Pessoais</a></li>
                <li><a href="#direitos">Direitos do Usuário</a></li>
                <li><a href="#contato">Contato</a></li>
                <li><a href="#vigencia">Vigência</a></li>
                <li><a href="#alteracoes">Alterações de Politica</a></li>
            </ul>
        </div>
        <div class="col-8 conteudo-politica">
            <?php the_content(); ?>
        </div>
        <a class="sub-politica" id=""></a>
    </div>
</section>
<?php get_footer(); ?>