<?php
  /* Add the media uploader script */
  function my_media_lib_uploader_enqueue() {
    wp_enqueue_media();
    wp_register_script( 'media-lib-uploader-js', plugins_url( 'media.js' , __FILE__ ), array('jquery') );
    wp_enqueue_script( 'media-lib-uploader-js' );
  }
  add_action('admin_enqueue_scripts', 'my_media_lib_uploader_enqueue');
?>

<?php
function yonetim_paneli() //eklenti ekranında gözüken form kodları
{ $gelen_veri2 = unserialize(get_option("site_ayarlari2")); ?>
    <h1>
  <a href="<?php echo home_url(); ?>"><?php bloginfo($gelen_veri2["site_baslik2"]); ?></a>
    </h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<div class="container"> 
    <div class="card text-white text-center bg-dark mb-3" style="max-width: 100%; font-size: 20px;"> 
        <div class="card-header">Yönetim Paneli</div>
        
   </div>
   <form method="post">
      <div class="col-md-3">
      <?php $gelen_veri2 = unserialize(get_option("site_ayarlari2")); ?>
          <label>Site Başlık:</label>
        <input type="text" class="form-control" name="website_baslik2" value="<?php echo $gelen_veri2["site_baslik2"]; ?>"><br>
        <label>Site Slogan:</label>
        <input type="text" class="form-control" name="website_slogan2" value="<?php echo $gelen_veri2["site_slogan2"]; ?>"><br>
        <label>Site Logo:</label>
        <input  type="text" id="input_1" size="36" name="upload-button" class="regular-text" value="<?php echo $gelen_veri2["site_logo"]; ?>" />
        <input type="button" class="upload-button" data-target="input_1" value="Upload button 1" />
        <label>Site favicon:</label>
        <input  type="text" id="input_2"  size="36" name="upload-button2" class="regular-text" value="<?php echo $gelen_veri2["site_favicon"]; ?>" /> 
        <input type="button" class="upload-button" data-target="input_2" value="Upload button 2" />
    </div>
    <br> <input type="submit" class="btn btn-danger">
    </form>
</div>

<?php
    ob_start();
    veri_islem3();
}       
    //urlyi veritabanına kaydetme
    global $wpdb;

    if (!empty($_POST['image'])) {
      $image_url = $_POST['image'];
      $wpdb->insert('images', array('image_url' => $image_url), array('%s'));
    }
    //phpmyadmin
    function veri_islem3()
    {
        if ($_POST) {

            $gelen_veri2 = array(
                "site_baslik2" => $_POST["website_baslik2"],
                "site_slogan2" => $_POST["website_slogan2"],
                "site_logo" => $_POST["upload-button"],
                "site_favicon" => $_POST["upload-button2"],
                
            );
            
            $depola2 = serialize($gelen_veri2);
            
            update_option("site_ayarlari2", "$depola2", "", "yes");
        }
        //print_r(unserialize(get_option("site_ayarlari2")));
    }
