<?php 
$query = new WP_Query(array(
        'post_type' => 'projeler',
        'post_status' => 'publish',
        'order_by' => 'date',//date yaz tarihe göre çek
        'order' => 'ASC',    //asc yaz tersine çevir
    ));
while ($query->have_posts()) {
    $query->the_post();
    $post_id = get_the_ID();
    $term = get_the_terms($post_id, 'projeler_kategori');
?>


<?php } wp_reset_query(); ?>
