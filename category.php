<?php
/**
 * 
 * Template Name: Blog
 * 
 */
 get_header(); ?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <img class="banner-produtos" src="<?php bloginfo('template_url'); ?>/assets/images/banner-blog.png" alt="banner blog">
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1">BLOG</h1>
</div>

<section class="container pt-5">

<?php
    if (has_nav_menu('categorias blog')) {
        wp_nav_menu(array(
            'theme_location' => 'categorias blog',
            'container' => false,
            'fallback_cb' => false,
            'menu_class' => 'menu-categoria gap-3 d-flex flex-wrap',
        ));
    }
    ?>

    <div class="row">
        <?php query_posts(array(
            'post_type' => 'post',
            'cat' => get_the_category( )[0]->term_id,
            'paged' => $paged
        ));

        if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="d-flex flex-column col-lg-4 col-md-6 col-12 post-blog">
                    <a href="<?php the_permalink(); ?>" class="d-flex flex-column">
                        <?php the_post_thumbnail(); ?>
                        <p class="fs-20 cinza fw500"><?php the_title(); ?></p>
                        <p class="laranja fw500 fs-20">Leia mais</p>
                    </a>
                </div>
            <?php endwhile; ?>
            <!-- VVV Paginação VVV -->
            <div class="paginacao gap-4 d-flex justify-content-center align-items-center">

                <?php
                global $wp_query;
                echo paginate_links(array(
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'next_text' => '>',
                    'prev_text' => '<'
                )); ?>
            </div>
        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>