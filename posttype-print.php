 <!-- Süper Projeler-->
<div class="projects-list gallery">
<?php 
$query = new WP_Query(array(
        'post_type' => 'projeler',
        'post_status' => 'publish',
        'order_by' => 'ID',
        'order' => 'DESC',

        ));
        while($query->have_posts()){
            $query->the_post();
            $post_id = get_the_ID();
            $term = get_the_terms($post_id,'projeler_kategori');
?>
<div class="item brand  <?php foreach($term as $key) echo $key->slug.' '; ?>">

      <a href="<?php the_permalink(); ?>" class="effect-ajax" data-dsn-ajax="work"
       data-dsn-grid="move-up">
    <img class="has-top-bottom" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0]; ?>" alt="" />
    <div class="item-border"></div>
    <div class="item-info">
     <h5 class="cat"><?php the_content() ?>
     </h5>
     <h4><?php the_title() ?>
    </h4>
    <span><span>Projeyi AÇ</span></span>
</div>
                            
</a>
</div>
<?php } wp_reset_query(); ?>
</div>
