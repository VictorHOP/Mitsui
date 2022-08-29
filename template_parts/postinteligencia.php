<div class="inteligencia-post d-flex row justify-content-between">
    <h4 class="text-white active py-3 ps-3 col-4 fit-content" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample"><?php the_title(); ?></h4>
    <div id="collapseExample2" class="d-flex col-6 position-relative justify-content-between collapse">
        <div class="img-inteligencia">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="d-flex flex-column justify-content-center col-6">
            <h4><?php the_title(); ?></h4>
            <p><?php the_content(); ?></p>

        </div>
    </div>
</div>