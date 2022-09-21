<?php get_header(); ?>

<div class="position-relative banner-pagina mt-5 container-fluid p-0">
    <?php the_post_thumbnail('', array('class' => 'banner-produtos')); ?>
    <div class="h-100 efeito-banner"></div>
    <h1 class="text-uppercase text-white position-h1"><?php the_title(); ?></h1>
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
            'paged' => $paged,
            'posts_per_page' => 6
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