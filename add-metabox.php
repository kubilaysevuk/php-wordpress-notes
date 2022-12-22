<?php
//metaboxlar
function metaboxlar(){

    //Referans Bilgileri
    add_meta_box(
        'kisi_bilgileri_id',
        'Kisi Bilgileri',
        'kisi_bilgileri',
        'projeler-posttype'
    );
    }
    add_action('add_meta_boxes','metaboxlar');
    function kisi_bilgileri(){
        global $post;
        ?>
<div class="row">
    <div class="label">Makam Bilgisi</div>
    <div class="fields">
        <input type="text" name="_diwp_reading_time" value="<?php echo get_post_meta($post->ID, 'post_reading_time', true)?>"/>
    </div>
</div>
<?php
    }
    function diwp_save_custom_metabox(){
 
        global $post;
     
        if(isset($_POST["_diwp_reading_time"])):
             
            update_post_meta($post->ID, 'post_reading_time', $_POST["_diwp_reading_time"]);
         
        endif;
    }
     
    add_action('save_post', 'diwp_save_custom_metabox');