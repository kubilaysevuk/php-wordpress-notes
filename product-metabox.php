<?php
add_action( 'init', 'create_urun_posttype' );
function create_urun_posttype() {
    $labels = array(
        'name' => __( 'Ürün Yönetimi' ),
        'singular_name' => __( 'Ürün Yönetimi'),
        'add_new' => __( 'Yeni Ürün' ),
        'add_new_item' => __( 'Yeni Ürün Ekle'),
        'edit_item' => __( 'Ürün Düzenle'),
        'new_item' => __( 'Yeni Ürün'),
        'view_item' => __( 'Ürün Görüntüle'),
        'search_items' => __( 'Ürün Ara'),
        'not_found' =>  __( 'Ürün Bulunamadı' ),
        'not_found_in_trash' => __( 'Çöp içinde Ürün bulunamadı' ),
    );
    $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'menu_icon' => 'dashicons-admin-post',
    'capability_type' => 'page',
    'rewrite' => array( 'urun-loc', 'post_tag' ),
    'label'  => 'Ürün Yönetimi',
    'supports' => array( 'title', 'thumbnail'),
    'taxonomies' => array('category'),
    'show_in_rest' => true,
    'meta_key' => 'urun_aciklama'
    );
    register_post_type( 'urun', $args );
}


    // ADD METABOX FIELD KEY 
    // Metabox alanını tanımlama
function custom_metabox() {
    add_meta_box(
        'custom_metabox',           // Metabox ID'si
        'Ürün Bilgileri',           // Metabox Başlığı
        'render_custom_metabox',    // Metabox içeriğini render eden işlev
        'urun',                     // Metabox'ın ekleneceği post türü (örneğin, 'post', 'page', 'your_custom_post_type')
        'normal',                   // Metabox'ın yerleştirileceği konum (normal, side, advanced)
        'default'                   // Metabox'ın önceliği (high, core, default, low)
    );
}

// Metabox içeriğini render eden işlev
function render_custom_metabox($post) {
    // Metabox içeriği burada oluşturulur
    // Metabox'ta kullanılacak input, select veya diğer alanları ekleyebilirsiniz
    // Alanların değerlerini kaydetmek için bir field key kullanmalısınız

    // Örnek bir metabox alanı oluşturma
    $field_value1 = get_post_meta($post->ID, 'custom_metabox_field1', true); // Mevcut değeri almak için
    $field_value2 = get_post_meta($post->ID, 'custom_metabox_field2', true); // Mevcut değeri almak için
    $field_value3 = get_post_meta($post->ID, 'custom_metabox_field3', true); // Mevcut değeri almak için
    $field_value4 = get_post_meta($post->ID, 'custom_metabox_field4', true); // Mevcut değeri almak için
    $field_value5 = get_post_meta($post->ID, 'custom_metabox_field5', true); // Mevcut değeri almak için


    echo '<label for="custom_metabox_field">Kısa Açıklama:</label>';
    echo '<input type="text" id="custom_metabox_field1" name="custom_metabox_field1" value="' . esc_attr($field_value1) . '" />';
    echo '<label for="custom_metabox_field2">Barkod:</label>';
    echo '<input type="text" id="custom_metabox_field2" name="custom_metabox_field2" value="' . esc_attr($field_value2) . '" />';
    echo '<label for="custom_metabox_field3">Stok Kodu:</label>';
    echo '<input type="text" id="custom_metabox_field3" name="custom_metabox_field3" value="' . esc_attr($field_value3) . '" />';
    echo '<label for="custom_metabox_field4">Marka:</label>';
    echo '<input type="text" id="custom_metabox_field4" name="custom_metabox_field4" value="' . esc_attr($field_value4) . '" />';
    echo '<label for="custom_metabox_field5">Fiyat:</label>';
    echo '<input type="text" id="custom_metabox_field5" name="custom_metabox_field5" value="' . esc_attr($field_value5) . '" />'; 
}

// Metabox alanının kaydedilmesi
function save_custom_metabox($post_id) {
    if (isset($_POST['custom_metabox_field1'])) {
        $field_value1 = sanitize_text_field($_POST['custom_metabox_field1']);
        update_post_meta($post_id, 'custom_metabox_field1', $field_value1);
    }
    if (isset($_POST['custom_metabox_field2'])) {
        $field_value1 = sanitize_text_field($_POST['custom_metabox_field2']);
        update_post_meta($post_id, 'custom_metabox_field2', $field_value1);
    }
    if (isset($_POST['custom_metabox_field3'])) {
        $field_value1 = sanitize_text_field($_POST['custom_metabox_field3']);
        update_post_meta($post_id, 'custom_metabox_field3', $field_value1);
    }
    if (isset($_POST['custom_metabox_field4'])) {
        $field_value1 = sanitize_text_field($_POST['custom_metabox_field4']);
        update_post_meta($post_id, 'custom_metabox_field4', $field_value1);
    }
    if (isset($_POST['custom_metabox_field5'])) {
        $field_value1 = sanitize_text_field($_POST['custom_metabox_field5']);
        update_post_meta($post_id, 'custom_metabox_field5', $field_value1);
    }
}

// Metabox'ı etkinleştirme
add_action('add_meta_boxes', 'custom_metabox');
add_action('save_post', 'save_custom_metabox');
