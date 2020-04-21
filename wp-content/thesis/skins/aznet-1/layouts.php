<?php



global $post, $page_info, $page_location;



$page_info = get_field('page_info', 'option');

$page_location = get_field('main_location', 'option');



/**

 * HOOK: HEADER

 */

add_action('tnc_theme_header', function () use ($page_info) {

    $terms = $args = $menu_items = array();

    $menu_items = tn_get_menu('main-menu-');
    $args = array(
        'fonlica_header'=> get_field("rin_fonlica_header","option"),
        'header_title' => get_field("header_title","option"),
        'ft_hotline' => get_field("ft_hotline","option"),
        'ft_dia_chi' => get_field("ft_dia_chi","option"),
        'categories' => $terms,
        'menu_home' => 'menu-main-desktop',
        'menu' => $menu_items,

        'hotline_ban_hang' => get_field('hotline','option'),
        'fonlica-facebook' => get_field('fanpage_link','option'),

        'fonlica-facebook' => get_field('ft_map','option'),

        'fonlica-youtube' => get_field('youtube_link','option'),

        'fonlica-google' => get_field('google_link','option'),
        'fonlica-linkedin' => get_field('linkedin_link','option'),
        'fonlica-twitter' => get_field('twitter_link','option'),
        'fonlica-instagram' => get_field('instagram_link','option'),
        'fonlica-github' => get_field('github_link','option'),

    );

    TNCP_ToanNang::renderComponent('tncp_rin_fonlica_header',$args);



});





/**

 * HOOK: HOME PAGE -----------------------------------------------------------------------------------------------------

 */



add_action('tnc_theme_home', function () {

    $slider = do_shortcode('[metaslider id="94"]');

    $featured = get_posts( array(

        'post_type'           => 'product',

        'post_status'         => 'publish',

        'posts_per_page'      => 4,

        'tax_query'           => array(

            'field'    => 'name',

            'terms'    => 'featured',

            'operator' => 'IN',

        )

    ) );

    wp_reset_postdata();

    $menu_product = tn_get_menu('menu-product');

    $danhmuc = get_terms( 'product_cat', array() );
    $formorder = do_shortcode('[gravityform id="5" title="true" description="true"]');


    $args = array(
'formorder' => $formorder,
        'chuyenmuc' => get_field("chuyen_muc","option"),
        'slider'              => $slider,

        'list-images' => get_field('banners','option'),

        'products-featured' => $featured,

        'products-cat' => $danhmuc,

        'phuckhang-news'  => get_field('danh_sach_tin','option'),
        'menu-product'=>$menu_product,
        'services'=> get_field("dich_vu","option")

    );

    TNCP_ToanNang::renderComponent('tncp_rin_fonlica_home',$args);
TNCP_ToanNang::renderComponent('tncp_rin_fonlica_archive',$args);




});



/**

 * HOOK: PAGE ----------------------------------------------------------------------------------------------------------

 */



add_action('tnc_theme_page', function () use ($post, $page_location) {

    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $args = [];

    TNCP_ToanNang::renderComponent('tncp_cy_thuocgada_post',$args);

});



/**

 * HOOK: ARCHIVE -------------------------------------------------------------------------------------------------------

 */



add_action('tnc_theme_archive', function () {

    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $args = [];

    TNCP_ToanNang::renderComponent('tncp_lam_minhloc_blog',$args);

});



add_action('tnc_theme_archive_product', function () {

    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $danhmuc = get_terms( 'product_cat', array() );

    $args = ['products-cat' => $danhmuc];

    TNCP_ToanNang::renderComponent('tncp_qv_thuocgada_archive_product_search',$args);

});



/**

 * HOOK: SINGLE --------------------------------------------------------------------------------------------------------

 */



add_action('tnc_theme_single', function () use ($post, $page_info) {



    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $args = [];

    TNCP_ToanNang::renderComponent('tncp_cy_thuocgada_post',$args);



});



add_action('tnc_theme_single_product', function(){



    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $args = [];

    TNCP_ToanNang::renderComponent('tncp_khoa_single_product_chuan',$args);



});



/**

 * HOOK: SEARCH --------------------------------------------------------------------------------------------------------

 */

add_action('tnc_theme_search', function(){



    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $args = [];

    TNCP_ToanNang::renderComponent('TNCP_hc_vape_archive_1',$args);



});



/**

 * HOOK: FULL PAGE -----------------------------------------------------------------------------------------------------

 */



add_action('tnc_theme_page_full', function () use ($post, $page_location) {

    TNCP_ToanNang::renderComponent('TNCP_hc_khangphuc_breadcrumb', array('khangphuc-breadcrumb-banner'=> get_field('banner_breadcrumbs','option')));

    $args = [];

    TNCP_ToanNang::renderComponent('tncp_cy_thuocgada_post',$args);

});



/**

 * HOOK: FOOTER

 */

add_action('tnc_theme_footer', function () {

    $form_mess = do_shortcode('[gravityform id="4" title="true" description="true"]');

    $args = array(

        'fonlica_footer'=>get_field("rin_fonlica_footer","option"),
        'formmess'=>$form_mess,

        'fonlica-ft-logo' => get_field('footer_logo','option'),

        'namlong-ft-name' => get_field('ft_name','option'),
        'fonlica-shortdesc' => get_field('short_desc','option'),

        'fonlica-hotline' => get_field('ft_hotline','option'),

        'fonlica-address' => get_field('ft_dia_chi','option'),

        'fonlica-email' => get_field('ft_email','option'),

        'fonlica-website' => get_field('ft_website','option'),

        'fonlica-fanpage' => get_field('fanpage_link','option'),

        'namlong-ft-map' => get_field('ft_map','option'),

        'namlong-ft-youtube' => get_field('youtube_link','option'),

        'namlong-ft-google' => get_field('google_link','option'),
        'namlong-ft-linkedin' => get_field('linkedin_link','option'),
        'namlong-ft-twitter' => get_field('twitter_link','option'),
        'namlong-ft-instagram' => get_field('instagram_link','option'),
        'namlong-ft-github' => get_field('github_link','option'),
        'menu_home' => 'menu-main-desktop',
    );

    TNCP_ToanNang::renderComponent('tncp_rin_fonlica_footer',$args);



});



/**

 * HOOK: PAGE 404

 */

add_action('container_page_404', function () {



    $args = array();

    TNCP_ToanNang::renderComponent('tncp_hc_404_page',$args);



});