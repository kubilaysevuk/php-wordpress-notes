<?php
function home_slider_by_category( $atts ) {
    $html = '';
    $duyurular = get_posts( array(
        'numberposts' => 4,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $atts['categoryslug'], 
                'operator'      => 'IN'
            )
        )
        
    ));
    $atts['type'] = isset($atts['type']) ? $atts['type'] : 'null';
    $html .= '<div class="slider-block">';
    if ($atts['type'] == "list") {
        $html .= '<ul>';
        foreach ( $duyurular as $post ) {
            $datetime1 = new DateTime( $post->post_date );
            $datetime2 = new DateTime(); // current date
            $interval = $datetime1->diff( $datetime2 );
            $html .= '<li>';
            $html .= '<a href="'.get_post_permalink($post).'">';
            $html .= '<h6>'.get_the_title($post);
            if ($interval->format( '%a' ) <= "5") {
                $html .= '<span class="badge-duyuru badge-success">Yeni!</span>';
            }
            $html .= '</h6>';
            $html .= '<span>'.get_the_date( 'd M Y', $post).'</span>';
            $html .= '</a>';
            $html .= '</li>';
            
        }
        $html .= '</ul>';
    }

    else{
        $html .= '<div class="owl-three owl-carousel owl-theme">';
        foreach ( $duyurular as $post ) {
            $datetime1 = new DateTime( $post->post_date );
            $datetime2 = new DateTime(); // current date
            $interval = $datetime1->diff( $datetime2 );
            $html .= '<div class="item">';
            $html .= '<a href="'.get_post_permalink($post).'">';
            $html .= '<div class="photo">'.get_the_post_thumbnail($post , "medium", array( "class" => "haberler-img" ));
            $html .= '<div class="date">';
            $html .= '<span>'.get_the_date( 'd M Y ', $post).'</span></div></div>';
            $html .= '<div class="text">';
            $html .= '<h6>'.get_the_title($post).'</h6>';
            if ($interval->format( '%a' ) <= "5") {
                $html .= '<span class="badge-haber badge-success">Yeni!</span>';
            }
            if ($atts['excerpt'] == "yes") {
                $html .= '<p>'.substr(get_the_excerpt($post), 0, 120).'</p>';
                $html .= '<span class="devamını-oku">Devamını oku<i class="fa fa-arrow-right"></i></span>';
            }
            $html .= '</a></div></div>';
        }
        $html .= '</div>';
    }
    $html .= '</div>';

    return $html;
}
add_shortcode( 'home_product_sliders1', 'home_slider_by_category' );
?>
