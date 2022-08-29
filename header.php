<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>


    <title>MITSUI</title>
</head>

<body <?php body_class(); ?>>

    <header class="position-relative z-index-2000">

        <nav class="navbar navbar-expand-xl py-xl-0 py-2" id="navbar">
            <div class="d-flex flex-row container-fluid align-items-center justify-content-between">
                <button class="navbar-toggler m-0 d-flex justify-content-center align-items-center d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                    <svg class="fechado" width="40" height="21" viewBox="0 0 40 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="40" y="21" width="40" height="3" transform="rotate(-180 40 21)" fill="#353597" />
                        <rect x="40" y="12" width="40" height="3" transform="rotate(-180 40 12)" fill="#353597" />
                        <rect x="40" y="3" width="40" height="3" transform="rotate(-180 40 3)" fill="#353597" />
                    </svg>
                    <!-- <svg class="aberto" width="24" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="21.3345" y="23.3345" width="30" height="3" transform="rotate(-135 21.3345 23.3345)" fill="#353597" />
                        <rect x="23.3345" y="2.33447" width="30" height="3" transform="rotate(135 23.3345 2.33447)" fill="#353597" />
                    </svg> -->
                    <span class="ps-2 mt-1" style="color:#353597">MENU</span>
                </button>
                <a class="navbar-brand" href="#"><img src="<?php bloginfo('template_url'); ?>/assets/images/logo-mitsui.png" alt="logo brasscom"></a>

                <div class="offcanvas offcanvas-top justify-content-center" data-bs-hideresize="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenu">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="21.3345" y="23.3345" width="30" height="3" transform="rotate(-135 21.3345 23.3345)" fill="#DDFF15" />
                                <rect x="23.3345" y="2.33447" width="30" height="3" transform="rotate(135 23.3345 2.33447)" fill="#DDFF15" />
                            </svg>
                        </button>
                    </div>
                    <div class="offcanvas-body justify-content-center">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'fallback_cb' => false,
                                'menu_class' => 'menu navbar-nav flex-column flex-xl-row mb-0 align-items-center',
                                'add_li_class'  => 'nav-item'
                            ));
                        }
                        ?>
                    </div>
                </div>
                <div class="d-sm-flex d-none align-items-center">
                    <img class="px-4" src="<?php bloginfo('template_url'); ?>/assets/images/lupa.png" alt="lupa">
                    <img class="px-4" src="<?php bloginfo('template_url'); ?>/assets/images/pt-br.png" alt="lupa">
                </div>
            </div>
        </nav>

    </header>