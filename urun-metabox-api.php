<?php 
// functions

// REST API START
// API endpoint'ini tanımlama
function custom_api_endpoint() {
    register_rest_route('custom/v1', '/posts', array(
        'methods'  => 'GET',
        'callback' => 'get_custom_posts',
    ));
}

// API endpoint'ine verileri döndürme
function get_custom_posts($request) {
    // Post verilerini almak için gerekli sorguları yapın ve sonuçları döndürün
    $args = array(
        'post_type' => 'urun',
    );

    $posts = get_posts($args);

	$result = array();
	foreach ($posts as $post) {
        $post_data = array(
            'ID'         => $post->ID,
            'urun_adi'      => $post->post_title,
            //'content'    => $post->post_content,
            'kisa_aciklama' => get_post_meta($post->ID, 'custom_metabox_field1', true), 
			'barkod' => get_post_meta($post->ID, 'custom_metabox_field2', true), 
			'stok_kodu' => get_post_meta($post->ID, 'custom_metabox_field3', true), 
			'marka' => get_post_meta($post->ID, 'custom_metabox_field4', true), 
			'kategori' => get_the_category($post->ID) ,
			'fiyat' => get_post_meta($post->ID, 'custom_metabox_field5', true), 
        );

        $result[] = $post_data;
    }
    return $result;

}

// İşlevi etkinleştirme
add_action('rest_api_init', 'custom_api_endpoint');

//REST API END
