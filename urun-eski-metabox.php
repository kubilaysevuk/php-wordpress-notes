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

//metaboxlar 
 function urun_metaboxlar(){
    //Referans Bilgileri
    add_meta_box(
        'urun_bilgileri_id',
        'Ürün Bilgileri',
        'urun_bilgileri',
        'urun'
    );
    }
    add_action('add_meta_boxes','urun_metaboxlar');
    function urun_bilgileri(){
        global $post;
        ?>
<div class="row">
    <div class="label">Kısa Açıklama</div>
    <div class="fields">
        <input type="text" name="_urun_aciklama_n" value="<?php echo get_post_meta($post->ID, 'urun_aciklama', true)?>"/>
    </div>

    <div class="label">Barkod</div>
    <div class="fields">
        <input type="text" name="urun_barkod_n" value="<?php echo get_post_meta($post->ID, 'urun_barkod', true)?>"/>
    </div>

    <div class="label">Stok Kodu</div>
    <div class="fields">
        <input type="text" name="_urun_stokkodu_n" value="<?php echo get_post_meta($post->ID, 'urun_stokkodu', true)?>"/>
    </div>

    <div class="label">Marka</div>
    <div class="fields">
        <input type="text" name="_urun_marka_n" value="<?php echo get_post_meta($post->ID, 'urun_marka', true)?>"/>
    </div>

    <div class="label">Fiyat</div>
    <div class="fields">
        <input type="text" name="_urun_fiyat_n" value="<?php echo get_post_meta($post->ID, 'urun_fiyat', true)?>"/>
    </div>
</div>
<?php
    }
    function urun_save_custom_metabox(){
        global $post;
        if(isset($_POST["_urun_aciklama_n"])):
            update_post_meta($post->ID, 'urun_aciklama', $_POST["_urun_aciklama_n"]);
        endif;

        if(isset($_POST["urun_barkod_n"])):
            update_post_meta($post->ID, 'urun_barkod', $_POST["urun_barkod_n"]);
        endif;

        if(isset($_POST["_urun_stokkodu_n"])):
            update_post_meta($post->ID, 'urun_stokkodu', $_POST["_urun_stokkodu_n"]);
        endif;

        if(isset($_POST["_urun_marka_n"])):
            update_post_meta($post->ID, 'urun_marka', $_POST["_urun_marka_n"]);
        endif;

        if(isset($_POST["_urun_fiyat_n"])):
            update_post_meta($post->ID, 'urun_fiyat', $_POST["_urun_fiyat_n"]);
        endif;
    }
    
    add_action('save_post', 'urun_save_custom_metabox');

