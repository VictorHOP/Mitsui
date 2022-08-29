<?php
//Include
require get_template_directory(). '/include/setup.php';

//Hoocks
add_action( 'wp_enqueue_scripts', 'va_theme_styles' );
add_action ('after_setup_theme', 'va_after_setup');
add_action('widgets_init', 'va_widgets');

add_filter('use_block_editor_for_post', '__return_false', 10);
function removeEditorWidgets() {
  remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'removeEditorWidgets');

// parametro para adicionar classe li no menu
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

require_once get_template_directory().'/app/cpt-products.php';

//Mostra o var_dump mais organizado
function dd($q, $vdump = false) {
  echo '<pre>';
  if ($vdump) {
    var_dump($q);
  } else {
    print_r($q);
  }
  echo '</pre>';
}