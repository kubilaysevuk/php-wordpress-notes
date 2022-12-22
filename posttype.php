<?php 
add_action('init','projeler_posttype');
function projeler_posttype(){
    $labels = array(
        'name' => _x('Projeler','Projeler'),
        'singular_name' => _x('Proje','Projee'),
        'manu_name' => _x('Projeler','Projelerr'),
        'name_admin_bar' => _x('Projeler','projelerr'),
        'add_new' => _x('Proje Ekle','proje ekle'),
        'add_new_item' => __('Yeni Proje Ekle'),
        'new_item' => __('Yeni Proje'),
        'edit_item' => __('Proje Düzenle'),
        'view_item' => __('Proje Görüntüleme'),
        'all_items' => __('Bütün Projeler'),
        'search_items' => __('Proje Ara'),
        'not_found' => __('Proje Yorumu Bulunamadı'),
        'not_found_in_trash' => __('Proje Yorumu Çöp Kutusunda Bulunamadı'),
    );

    $args = array(
        'labels'=> $labels,
        'description' => __('Projeler Post Type'),
        'public' => true,
        'publicly_archive' =>true,
        'publicly_querable' =>true,
        'show_ui' =>true,
        'show_in_menu' =>true,
        'query_var' =>true,
        'rewrite' =>array(
            'slug' =>'projeler',
            'with_front' =>true,
            'hierarchical' =>true,
            'query_var' =>true,
        ),
        'capability_type' =>'post',
        'hierarchical' =>true,
        'show_in_nav_menus' =>true,
        'menu_position' =>5,
        'menu_icon' =>'dashions-admin-users',
        'supports' => array('title','editor','thumbnail','category'),
    );
    register_taxonomy('projeler_kategori','projeler',array(
        'hierarchical' =>true,
        'label' => __('Proje Kategorileri'),
        'singular_name' => __('Proje Kategorisi'),
        'rewrite' =>true,
        'query_var' =>true,
    ));


    }
?>