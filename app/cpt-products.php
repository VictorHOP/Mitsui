<?php
add_action('init', 'o2_produto');

function o2_produto()
{

  $labels = array(
    'name' => _x('Banners', 'post type general name'),
    'singular_name' => _x('Banner', 'post type singular name'),
    'all_items' => _x('Todos os Banners', 'post type singular name'),
    'add_new' => _x('Adicionar Banner', 'portfolio item'),
    'add_new_item' => __('Adicionar novo Banner'),
    'edit_item' => __('Editar Banner'),
    'new_item' => __('Novo Banner'),
    'view_item' => __('Ver Banner'),
    'search_items' => __('Buscar Banner'),
    'not_found' => __('Nenhum Banner encontrado'),
    'not_found_in_trash' => __('Nenhum Banner na lixeira'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => 5,
    'show_in_nav_menus' => true,
    'exclude_from_search' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  );

  register_post_type('banner', $args);

}



//CUSTOM FIELDS ABAIXO

