<?php
if(have_comments(  )){
    foreach ($comments as $comment) {
        ?>
        <div class="d-flex align-items-center pb-4">
            <?php echo get_avatar($comment, 78); ?>
            <div class="d-flex flex-column ps-3">
                <p class="fs-20 text-black fw500 m-0"><?php comment_author(); ?></p>
                <p class="fs-18 fw400 text-muted"><?php comment_text(); ?></p>
            </div>
        </div>

        <?php
    }
}
?>