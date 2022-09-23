<?php


// config comentários


function o2_comment_form_fields($fields)
{
    $fields['author'] = '<div class="form-group order-1 col-12 col-md-6 comment-form-author">' . '<label for="">Nome Completo*</label>' .
        '<input class="form-control" id="author" name="author" type="text" value="" maxlength="245" required="required" tabindex="1" placeholder="' . __('Digite seu nome', 'mitsui') . '" />' .
        '</div>';
    $fields['email'] = '<div class="form-group order-2 col-12 col-md-6 comment-form-email">' . '<label for="">E-mail*</label>' .
        '<input class="form-control" id="email" name="email" type="email" value="" maxlength="100" aria-describedby="email-notes" required="required" tabindex="2" placeholder="' . __('Digite seu e-mail', 'mitsui') . '" />' .
        '</div>';
    $fields['url'] = '';
    $fields['cookies'] = '';
    return $fields;
}

add_filter('comment_form_default_fields', 'o2_comment_form_fields', 100); ?>

<?php function o2_comment_form_text($fields)
{
    $fields['label_submit'] = __('Enviar', 'mitsui');
    $fields['title_reply'] = "";
    $fields['comment_notes_before'] = "";
    $fields['class_form'] = "row";
    $fields['class_submit'] = "botao";
    $fields['submit_field'] = '<div class="form-group order-last col-12 col-md-6 col-lg-5 form-submit">%1$s %2$s</div>';
    $fields['comment_field'] = '<div class="form-group order-3 col-12 pt-3 comment-form-comment">' . '<label for="">Mensagem*</label>'
        . '<textarea class="form-control mb-3" id="comment" name="comment" rows="8" maxlength="65525" required="required" tabindex="3" placeholder="' . __('Digite sua mensagem', 'mitsui') . '"></textarea>'
        .  '<input type="checkbox" id="politica" name="politica">' . '<label class="ps-1 cinza fs-14 fw500" for="scales">Li e concordo com a Política de Privacidade. concedento  concedendo o uso dos meus dados.</label>' . '</div>';
    $fields['logged_in_as'] = '';
    return $fields;
}

add_filter('comment_form_defaults', 'o2_comment_form_text', 100); ?>

<?php get_header(); ?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0 ">
    <?php the_post_thumbnail('', array('class' => '')); ?>
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1-single fw300 h1-single col-md-9"><?php the_title(); ?></h1>
</div>

<section class="container">

    <div class="row justify-content-center">
        <div class="d-flex flex-column col-12 col-sm-10 col-lg-9">
            <h5 class="fs-25 text-black fw500"><?php the_title(); ?></h5>
            <p style="white-space: pre-wrap;"><?php the_content(); ?></p>

            <div class="d-flex flex-column py-8">
                <h6 class="fs-20 azul-escuro fw400">Compartilhe nas redes</h6>
                <hr>
                <div class="d-flex redes-single gap-3 ">
                    <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/pinterest.png" alt="logo pinterest"></a>
                    <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/twitter.png" alt="logo twitter"></a>
                    <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/facebook.png" alt="logo facebook"></a>
                    <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/linkedin.png" alt="logo linkedin"></a>

                </div>
            </div>

            <div class="row pb-6">

                <?php if (comments_open()) { ?>
                    <div class="comentario-form mt-5">
                        <h3 class="title azul-escuro fw400"><?php _e('Deixe seu comentário', 'mitsui'); ?></h3>
                        <?php comment_form(); ?>
                    </div>
                <?php } ?>
                <?php
                $comentarios = get_comments(array(
                    'post_id' => get_the_ID(),
                    'status' => 'approve'
                ));
                if ($comentarios) {
                ?>
                    <div class="comentarios mt-5">
                        <h3 class="title azul-escuro fw400 pb-4"><?php _e('Comentários', 'mitsui'); ?></h3>
                        <div class="comentarios-list">
                            <?php
                            foreach ($comentarios as $comentario) {
                            ?>
                                <div class="comentario d-flex align-items-center media mb-4">
                                    <?php echo get_avatar($comentario->comment_author_email, 78, '', '', array('class' => 'mr-3 rounded-circle')); ?>
                                    <div class="media-body ps-3 cinza">
                                        <div class="autor fs-24"><?php echo $comentario->comment_author; ?></div>
                                        <div class="texto"><?php echo $comentario->comment_content; ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


        <div class="d-flex col-12 col-sm-10 col-lg-3 pt-5 pt-lg-0 flex-column">
            <div class="d-flex flex-column pb-5">

                <h6 class="fs-20 azul-escuro fw400 pb-3">Assuntos</h6>
                <?php
                if (has_nav_menu('categorias blog')) {
                    wp_nav_menu(array(
                        'theme_location' => 'categorias blog',
                        'container' => false,
                        'fallback_cb' => false,
                        'menu_class' => 'menu-categoria gap-1 d-flex flex-wrap p-0',
                    ));
                }
                ?>
            </div>
            <div class="d-flex flex-column pb-5">

                <h6 class="fs-20 azul-escuro fw400 pb-3">Posts recentes</h6>

                <div class="d-flex flex-column">
                    <?php query_posts(array(
                        'post_type' => 'post',
                        'posts_per_page' => '3'
                    ));

                    if (have_posts()) : ?>
                        <?php while (have_posts()) : ?>
                            <?php the_post(); ?>
                            <div class="d-flex flex-column post-blog">
                                <a href="<?php the_permalink(); ?>" class="d-flex flex-column">
                                    <p class="fs-16 cinza fw500"><?php echo get_the_date('d|m|Y') ?></p>
                                    <p class="fs-16 cinza fw500"><?php the_title(); ?></p>
                                    <p class="laranja fw500 fs-16 leia">Leia mais</p>
                                    <hr>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

</section>

<section class="bg-azul-roxo container-fluid py-6">
    <div class="container">
        <h2 class="text-white fs-sm-35">RECEBA NOVIDADES <fw900>POR E-MAIL</fw900>
        </h2>
        <div class="form-contato">
            <?php echo apply_filters('the_content', '[contact-form-7 id="5" title="Novidades por e-mail"]') ?>
        </div>

    </div>
</section>

<section class="container py-6">
    <h2 class="azul-roxo text-center fs-sm-35 pb-4">LEIA <fw900>TAMBÉM</fw900>
    </h2>

    <div class="row justify-content-center align-items-center">
        <?php query_posts(array(
            'post_type' => 'post',
            'posts_per_page' => '3'
        ));

        if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="d-flex flex-column post-blog col-12 col-sm-6 col-lg-4">
                    <a href="<?php the_permalink(); ?>" class="d-flex flex-column">
                        <?php the_post_thumbnail('', array('class' => '')); ?>
                        <p class="fs-16 cinza fw500"><?php the_title(); ?></p>
                        <p class="laranja fw500 fs-16 ">Leia o artigo</p>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>