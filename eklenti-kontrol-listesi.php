<?php
// Eklenti kontrol sayfası için özel işlevi tanımlayın
function custom_plugin_control_page() {
    // Eklenti kontrol sayfası içeriğini oluşturun
    echo '<div class="wrap">';
    echo '<h1>Eklenti Kontrol Sayfası</h1>';

    // Eklentilerin listesini alın
    $plugins = get_plugins();

    // Eklentileri tablo şeklinde gösterin
    echo '<table class="widefat">';
    echo '<thead><tr><th>Eklenti Adı</th><th>Aktif Durumu</th></tr></thead>';
    echo '<tbody>';

    foreach ($plugins as $plugin_path => $plugin_info) {
        $plugin_name = $plugin_info['Name'];
        $is_active = is_plugin_active($plugin_path) ? 'Aktif' : 'Aktif Değil';

        echo '<tr>';
        echo '<td>' . $plugin_name . '</td>';
        echo '<td>' . $is_active . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

// WordPress menüsüne eklenti kontrol sayfasını eklemek için işlevi tanımlayın
function add_custom_plugin_control_page() {
    add_menu_page(
        'Eklenti Kontrol',
        'Eklenti Kontrol',
        'manage_options',
        'custom-plugin-control',
        'custom_plugin_control_page',
        'dashicons-admin-plugins',
        50
    );
}

// WordPress başlatıldığında eklenti kontrol sayfasını eklemek için işlevi çağırın
add_action('admin_menu', 'add_custom_plugin_control_page');
