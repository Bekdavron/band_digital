<?php
if ( ! function_exists( 'band_digital_setup' ) ) {
    function band_digital_setup() {
        // Tema sozlamalari
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', array(
            'height' => 100,
            'width'  => 400,
            'flex-height' => true,
            'flex-width'  => true,
            ) );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 730,480, true ); // asosiy post rasm o'lchami
        // quyidagi ai yordamida yozilgan. joylarga o'zingizga kerakli o'lchamlarni qo'shishingiz mumkin.lekin serverda yana ko'proq joy egallashi mumkin.
            // Sidebar uchun kichik rasm
         add_image_size( 'sidebar-thumb', 120, 90, true );
        // Post card uchun zamonaviy preview rasm
        //  add_image_size( 'post-card', 400, 250, true );
            // To‘liq kenglikdagi col-12 premium preview
        add_image_size( 'post-full', 730,480, true );

    }
    add_action( 'after_setup_theme', 'band_digital_setup' );
}

// Style va Scriptlarni ulash
function band_digital_enqueue_assets() {

    // faqat admin bo‘lmaganda
    if ( !is_admin() ) {

        // CSS fayllar
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css' );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css' );
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/plugins/animate-css/animate.css' );
        wp_enqueue_style( 'icofont', get_template_directory_uri() . '/plugins/icofont/icofont.css' );
        wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );

        // JS fayllar
        wp_enqueue_script( 'jquery' ); // WordPressning o‘z ichidagi jQuery
        wp_enqueue_script( 'popper', get_template_directory_uri() . '/plugins/bootstrap/js/popper.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/plugins/counterup/wow.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'easing', get_template_directory_uri() . '/plugins/counterup/jquery.easing.1.3.js', array('jquery'), false, true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/plugins/counterup/jquery.waypoints.js', array('jquery'), false, true );
        wp_enqueue_script( 'counterup', get_template_directory_uri() . '/plugins/counterup/jquery.counterup.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/plugins/google-map/gmap3.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap', array(), null, true );
        wp_enqueue_script( 'contact', get_template_directory_uri() . '/plugins/jquery/contact.js', array('jquery'), false, true );
        wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true );

    }
}
add_action( 'wp_enqueue_scripts', 'band_digital_enqueue_assets' );
// Navigatsiya menyusini ro'yxatdan o'tkazish

add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'header' => __('Primary Menu',"band_digital"),
		'footer_1' => __('Footer Menu - Информация',"band_digital"),
        'footer_2' => __('Footer Menu2 - ССылки',"band_digital"),
	] );
} );
require_once get_template_directory() . '/inc/class-bootstrap-navwalker.php';
// Katta retina o‘lchamlarni o‘chirish (xafsiz variant)
function remove_heavy_wp_image_sizes( $sizes ) {
    unset( $sizes['medium_large'] );  // 768px
    unset( $sizes['1536x1536'] );     // 2X retina
    unset( $sizes['2048x2048'] );     // 2X retina big
    return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_heavy_wp_image_sizes' );

// Убираем H2 из шаблона пагинации и оборачиваем в Bootstrap <ul class="pagination">
add_filter('navigation_markup_template', function( $template, $class ){
    return '
    <nav class="navigation %1$s" role="navigation" aria-label="Page navigation">
        <ul class="pagination">%3$s</ul>
    </nav>
    ';
}, 10, 2 );

/**
* Post excerptni harflar bo'yicha kesuvchi funksiya (current post uchun)
*
* @param int $char_limit Cheklash uzunligi (harflar)
* @return string Kesilgan excerpt
*/
function get_excerpt_by_char($char_limit = 50) {
// Current post excerptini olish
$excerpt = get_the_excerpt();

// HTML teglarini olib tashlash
$excerpt = strip_tags($excerpt);

// Harflar bo'yicha kesish
if (mb_strlen($excerpt) > $char_limit) {
$excerpt = mb_substr($excerpt, 0, $char_limit) . '...';
}

return $excerpt;
}
// sidebar widget maydonini ro'yxatdan o'tkazish
add_action( 'widgets_init', 'band_digital_widgets_init' );
function band_digital_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'band_digital' ),
        'id'            => 'sidebar-blog',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'band_digital' ),
        'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title mb-3">',
        'after_title'   => '</h5>',
    ) );
}