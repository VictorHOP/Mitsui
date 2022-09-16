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

    <header class="fixed-top">

        <nav class="navbar navbar-expand-xl py-0" id="navbar">
            <div class="d-flex flex-row container-fluid align-items-center justify-content-between">
                <button class="navbar-toggler m-0 d-flex justify-content-center align-items-center d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                    <svg class="fechado" width="40" height="21" viewBox="0 0 40 21" fill="#353597" xmlns="http://www.w3.org/2000/svg">
                        <rect x="40" y="21" width="40" height="3" transform="rotate(-180 40 21)" fill="#353597" />
                        <rect x="40" y="12" width="40" height="3" transform="rotate(-180 40 12)" fill="#353597" />
                        <rect x="40" y="3" width="40" height="3" transform="rotate(-180 40 3)" fill="#353597" />
                    </svg>
                    <svg class="aberto" width="24" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="21.3345" y="23.3345" width="30" height="3" transform="rotate(-135 21.3345 23.3345)" fill="#353597" />
                        <rect x="23.3345" y="2.33447" width="30" height="3" transform="rotate(135 23.3345 2.33447)" fill="#353597" />
                    </svg>
                    <span class="ps-2" style="color:#353597">MENU</span>
                </button>
                <a class="navbar-brand m-0" href="index.php"><img src="<?php bloginfo('template_url'); ?>/assets/images/logo-mitsui.png" alt="logo mitsui"></a>

                <div class="offcanvas offcanvas-top justify-content-center" data-bs-hideresize="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenu">

                    <div class="offcanvas-body justify-content-center">
                        <div class="d-flex d-sm-none justify-content-center align-items-center py-3">

                            <!-- Button trigger modal -->
                            <img class="px-4 lupa pointer" src="<?php bloginfo('template_url'); ?>/assets/images/lupa.png" alt="lupa" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img class="px-4" src="<?php bloginfo('template_url'); ?>/assets/images/pt-br.png" alt="brasil">
                        </div>
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
                        <div class="d-flex justify-content-center redes-header d-xl-none">
                            <a href=""><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7847 19.7905V19.7895H19.7899V12.5319C19.7899 8.98167 19.0256 6.24622 14.8745 6.24622C12.8791 6.24622 11.5402 7.34133 10.9934 8.37923H10.9357V6.57758H7V19.7895H11.098V13.2477C11.098 11.5254 11.4248 9.85982 13.5578 9.85982C15.6599 9.85982 15.6908 11.8254 15.6908 13.3585V19.7905H19.7847Z" fill="#353597" />
                                    <path d="M4.42984 6.57721H0.32666V19.7891H4.42984V6.57721Z" fill="#353597" />
                                    <path d="M2.37626 0C1.0647 0 0 1.0647 0 2.37626C0 3.68782 1.0647 4.77468 2.37626 4.77468C3.68782 4.77468 4.75252 3.68782 4.75252 2.37626C4.752 1.0647 3.6873 0 2.37626 0Z" fill="#353597" />
                                </svg></a>
                            <a href=""><svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7896 6.53125H7.03955V4.15625C7.03955 3.5009 7.59971 2.96875 8.28955 2.96875H9.53955V0H7.03955C4.96846 0 3.28955 1.59496 3.28955 3.5625V6.53125H0.789551V9.5H3.28955V19H7.03955V9.5H9.53955L10.7896 6.53125Z" fill="#353597" />
                                </svg></a>
                            <a href=""><svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.2084 1H7.34356C3.72452 1 0.789551 4.02694 0.789551 7.75938V15.8706C0.789551 19.6031 3.72452 22.63 7.34356 22.63H15.2084C18.8274 22.63 21.7624 19.6031 21.7624 15.8706V7.75938C21.7624 4.02694 18.8274 1 15.2084 1ZM19.7962 15.8706C19.7962 18.4798 17.7382 20.6022 15.2084 20.6022H7.34356C4.81371 20.6022 2.75575 18.4798 2.75575 15.8706V7.75938C2.75575 5.15026 4.81371 3.02782 7.34356 3.02782H15.2084C17.7382 3.02782 19.7962 5.15026 19.7962 7.75938V15.8706Z" fill="#353597" />
                                    <path d="M11.2766 6.4077C8.38096 6.4077 6.0334 8.82882 6.0334 11.8152C6.0334 14.8016 8.38096 17.2227 11.2766 17.2227C14.1722 17.2227 16.5198 14.8016 16.5198 11.8152C16.5198 8.82882 14.1722 6.4077 11.2766 6.4077ZM11.2766 15.1949C9.47016 15.1949 7.9996 13.6783 7.9996 11.8152C7.9996 9.95088 9.47016 8.43551 11.2766 8.43551C13.0831 8.43551 14.5536 9.95088 14.5536 11.8152C14.5536 13.6783 13.0831 15.1949 11.2766 15.1949Z" fill="#353597" />
                                    <path d="M17.0435 6.40818C17.3331 6.40818 17.5679 6.16608 17.5679 5.86742C17.5679 5.56877 17.3331 5.32667 17.0435 5.32667C16.7539 5.32667 16.5192 5.56877 16.5192 5.86742C16.5192 6.16608 16.7539 6.40818 17.0435 6.40818Z" fill="#353597" />
                                    <path d="M15.2084 1H7.34356C3.72452 1 0.789551 4.02694 0.789551 7.75938V15.8706C0.789551 19.6031 3.72452 22.63 7.34356 22.63H15.2084C18.8274 22.63 21.7624 19.6031 21.7624 15.8706V7.75938C21.7624 4.02694 18.8274 1 15.2084 1ZM19.7962 15.8706C19.7962 18.4798 17.7382 20.6022 15.2084 20.6022H7.34356C4.81371 20.6022 2.75575 18.4798 2.75575 15.8706V7.75938C2.75575 5.15026 4.81371 3.02782 7.34356 3.02782H15.2084C17.7382 3.02782 19.7962 5.15026 19.7962 7.75938V15.8706Z" stroke="#353597" stroke-width="0.5" />
                                    <path d="M11.2766 6.4077C8.38096 6.4077 6.0334 8.82882 6.0334 11.8152C6.0334 14.8016 8.38096 17.2227 11.2766 17.2227C14.1722 17.2227 16.5198 14.8016 16.5198 11.8152C16.5198 8.82882 14.1722 6.4077 11.2766 6.4077ZM11.2766 15.1949C9.47016 15.1949 7.9996 13.6783 7.9996 11.8152C7.9996 9.95088 9.47016 8.43551 11.2766 8.43551C13.0831 8.43551 14.5536 9.95088 14.5536 11.8152C14.5536 13.6783 13.0831 15.1949 11.2766 15.1949Z" stroke="#353597" stroke-width="0.5" />
                                    <path d="M17.0435 6.40818C17.3331 6.40818 17.5679 6.16608 17.5679 5.86742C17.5679 5.56877 17.3331 5.32667 17.0435 5.32667C16.7539 5.32667 16.5192 5.56877 16.5192 5.86742C16.5192 6.16608 16.7539 6.40818 17.0435 6.40818Z" stroke="#353597" stroke-width="0.5" />
                                </svg></a>
                        </div>
                    </div>

                </div>
                <div class="d-sm-flex align-items-center d-none">
                    <!-- Button trigger modal -->
                    <img class="px-4 lupa pointer" src="<?php bloginfo('template_url'); ?>/assets/images/lupa.png" alt="lupa" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img class="px-4" src="<?php bloginfo('template_url'); ?>/assets/images/pt-br.png" alt="brasil">
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <div class="mt-header"></div>