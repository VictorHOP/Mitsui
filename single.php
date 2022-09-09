<?php

// blog page no breadcrumbs
function o2_add_breadcrumbs_blog($links)
{
    global $post;

    if (is_tax('category') || is_singular('post')) {
        $breadcrumb[] = array(
            'url' => get_permalink(get_page_by_path('blog')),
            'text' => __('Blog', 'nardi'),
        );

        array_splice($links, 1, -2, $breadcrumb);
    }

    return $links;
}

add_filter('wpseo_breadcrumb_links', 'o2_add_breadcrumbs_blog');

// config comentários
function o2_comment_form_text($fields)
{
    $fields['label_submit'] = __('Enviar comentário', 'nardi');
    $fields['title_reply'] = "";
    $fields['comment_notes_before'] = "";
    $fields['class_form'] = "form-row";
    $fields['class_submit'] = "botao";
    $fields['submit_field'] = '<div class="form-group order-last col-12 col-md-6 col-lg-5 form-submit">%1$s %2$s</div>';
    $fields['comment_field'] = '<div class="form-group order-3 col-12 comment-form-comment">'
        . '<textarea class="form-control" id="comment" name="comment" rows="8" maxlength="65525" required="required" tabindex="3" placeholder="' . __('Digite sua mensagem', 'nardi') . '"></textarea>'
        . '</div>';
    $fields['logged_in_as'] = '';
    return $fields;
}

add_filter('comment_form_defaults', 'o2_comment_form_text', 100);

function o2_comment_form_fields($fields)
{
    $fields['author'] = '<div class="form-group order-1 col-12 col-md-6 comment-form-author">' .
        '<input class="form-control" id="author" name="author" type="text" value="" maxlength="245" required="required" tabindex="1" placeholder="' . __('Digite seu nome', 'nardi') . '" />' .
        '</div>';
    $fields['email'] = '<div class="form-group order-2 col-12 col-md-6 comment-form-email">' .
        '<input class="form-control" id="email" name="email" type="email" value="" maxlength="100" aria-describedby="email-notes" required="required" tabindex="2" placeholder="' . __('Digite seu e-mail', 'nardi') . '" />' .
        '</div>';
    $fields['url'] = '';
    $fields['cookies'] = '';
    return $fields;
}

add_filter('comment_form_default_fields', 'o2_comment_form_fields', 100);?>

<?php get_header(); ?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0 ">
    <?php the_post_thumbnail('', array('class' => '')); ?>
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1-single fw300 h1-single col-md-9"><?php the_title(); ?></h1>
</div>

<section class="container">

    <div class="row">
        <div class="d-flex flex-column col-9">
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

            <div>
                
            </div>
            <?php if (comments_open()) { ?>
                    <div class="comentario-form mt-5">
                        <h6 class="fs-20 azul-escuro fw400">Deixe seu comentário</h6>
                        <?php comment_form(); ?>
                    </div>
                <?php } ?>
        </div>


        <div class="d-flex col-3 flex-column">
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
                                    <p class="laranja fw500 fs-16 ">Leia mais</p>
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


<?php get_footer(); ?>