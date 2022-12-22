<?php
add_theme_support('menus');

register_nav_menus(
    array(
        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),
    )
);

add_action('admin_menu','menu_eklemesi2');
function menu_eklemesi2(){
    add_menu_page('Yönetim Paneli','Yönetim Paneli','manage_options','admin_eklenti','yonetim_paneli');
   }