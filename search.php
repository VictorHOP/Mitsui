<?php get_header();
$s = get_search_query();
$order = filter_input(INPUT_GET, 'order', FILTER_DEFAULT);



$argsPosts = array(
    's' => $s,
    'post_type' => 'post',
    'orderby' => 'date',
    'posts_per_page' => -1,
    'order' => (!$order ? 'DESC' : $order)
);


$vCursos = get_posts($argsPosts);
?>
<section class="py-6 container">

    <h2 class="azul-escuro pb-3">RESULTADOS DA <fw900>BUSCA</fw900>
    </h2>
    <h3 class="fs-36 cinza fw600">Resultados da busca para a palavra “<?php echo $s; ?>”</h3>
    <p class="cinza fs-20">Foram encontrados <?php echo count($vCursos) ?> resultados</p>
    <div>

        <div class="row pt-8">


            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="d-flex col-4 flex-column post-blog" >
                        <a href="<?php the_permalink(); ?>" class="d-flex flex-column" style="height: 160px;">
                            <p class="fs-16 cinza fw500"><?php echo get_the_date('d|m|Y') ?></p>
                            <p class="fs-16 cinza fw500"><?php the_title(); ?></p>
                            <p class="laranja fw500 fs-16 leia">Ver assunto</p>
                        </a>
                        <hr>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>