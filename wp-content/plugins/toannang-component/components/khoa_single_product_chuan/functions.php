<?php
/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 6/16/2018

 * Time: 9:57 AM

 */
if (!function_exists('az_box_breadCrumbs_khoa')) {

    function az_box_breadCrumbs_khoa() {
        $delimiter = '<i class="fas fa-angle-right"></i>';
        $name = __('Trang Chủ', 'wplang');
        $currentBefore = '<span class="current">';
        $currentAfter = '</span>';

        if (!is_home() && !is_front_page() || is_paged()) {
            global $post;
            echo '<div class="breadcrumbs">';
            $home = get_bloginfo('url');
            echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

            if (is_tax()) {
                $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                echo $currentBefore . $term->name . $currentAfter;
            } elseif (is_category()) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0)
                    echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
                echo $currentBefore . '';
                single_cat_title();
                echo '' . $currentAfter;
            } elseif (is_day()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                echo $currentBefore . get_the_time('d') . $currentAfter;
            } elseif (is_month()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo $currentBefore . get_the_time('F') . $currentAfter;
            } elseif (is_year()) {
                echo $currentBefore . get_the_time('Y') . $currentAfter;
            } elseif (is_single()) {
                $postType = get_post_type();
                if ($postType == 'post') {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                } elseif ($postType == 'portfolio') {
                    $terms = get_the_term_list($post->ID, 'portfolio-category', '', '###', '');
                    $terms = explode('###', $terms);
                    echo $terms[0] . ' ' . $delimiter . ' ';
                }
                echo $currentBefore;
                the_title();
                echo $currentAfter;
            } elseif (is_page() && !$post->post_parent) {
                echo $currentBefore;
                the_title();
                echo $currentAfter;
            } elseif (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb)
                    echo $crumb . ' ' . $delimiter . ' ';
                echo $currentBefore;
                the_title();
                echo $currentAfter;
            } elseif (is_search()) {
                echo $currentBefore . __('Search Results for:', 'wpinsite') . ' &quot;' . get_search_query() . '&quot;' . $currentAfter;
            } elseif (is_tag()) {
                echo $currentBefore . __('Post Tagged with:', 'wpinsite') . ' &quot;';
                single_tag_title();
                echo '&quot;' . $currentAfter;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $currentBefore . __('Author Archive', 'wpinsite') . $currentAfter;
            } elseif (is_404()) {
                echo $currentBefore . __('Page Not Found', 'wpinsite') . $currentAfter;
            }
            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo ' (';
                echo ' ' . $delimiter . ' ' . __('Page') . ' ' . get_query_var('paged');
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                    echo ')';
            }
            echo '</div>';
        }
    }

}

if (!function_exists('myplugin_plugin_path')):

    function myplugin_plugin_path() {

        // gets the absolute path to this plugin directory

        return untrailingslashit(plugin_dir_path(__FILE__));
    }

endif;

if (!function_exists('myplugin_woocommerce_locate_template')):

    add_filter('woocommerce_locate_template', 'myplugin_woocommerce_locate_template', 10, 3);

    function myplugin_woocommerce_locate_template($template, $template_name, $template_path) {

        global $woocommerce;

        $_template = $template;

        if (!$template_path)
            $template_path = $woocommerce->template_url;

        $plugin_path = myplugin_plugin_path() . '/woocommerce/';

        // Look within passed path within the theme - this is priority

        $template = locate_template(
                array(
                    $template_path . $template_name,
                    $template_name
                )
        );

        // Modification: Get the template from this plugin, if it exists

        if (!$template && file_exists($plugin_path . $template_name))
            $template = $plugin_path . $template_name;

        // Use default template

        if (!$template)
            $template = $_template;

        // Return what we found

        return $template;
    }

endif;



if (!function_exists('az_custom_cart_button_text')):

// ĐẶT LẠI NÚT ADD CART

    add_filter('woocommerce_product_single_add_to_cart_text', 'az_custom_cart_button_text');

    add_filter('woocommerce_product_add_to_cart_text', 'az_custom_cart_button_text');

    function az_custom_cart_button_text() {

        return __('Thêm vào giỏ', 'tn_component');
    }

endif;



if (!function_exists('az_output_product_data_tabs')):

// đặt lại chi tiết sản phẩm

    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

    add_action('woocommerce_after_single_product', 'az_output_product_data_tabs', 10);

    function az_output_product_data_tabs() {

        global $product;
        ?>

        <div class="col-xs-12">

            <div class="row margin-6">

                <div class="col-md-12 padding-6">



                    <div class="page_chitiet_tab">

                        <ul class="nav nav-pills">

                            <li class="active"><a data-toggle="tab" href="#tab_details_1"><?php _e('Chi tiết sản phẩm', 'tn_component') ?></a></li>

                            <li><a data-toggle="tab" href="#tab_details_3"><?php _e('Đánh giá', 'tn_component') ?></a></li>

                        </ul>

                        <div class="tab-content">

                            <div id="tab_details_1" class="tab-pane fade in active">

                                <?php echo nl2br(get_the_content($product->get_id())) ?>

                            </div>

                            <div id="tab_details_2" class="tab-pane fade">

                                <?php echo get_field('huong_dan_bao_quan', $product->get_id()) ?>

                            </div>

                            <div id="tab_details_3" class="tab-pane fade">

                                <div id="reviews">

                                    <div id="comments">

                                        <span><?php
                                            if (get_option('woocommerce_enable_review_rating') === 'yes' && ( $count = $product->get_rating_count() ))
                                                printf(_n('%s đánh giá cho %s', '%s đánh giá cho %s', $count, 'woocommerce'), $count, get_the_title());
                                            else
                                                _e('Đánh giá', 'tn_component');
                                            ?></span>

                                        <?php
                                        $args = array('post_id' => $product->get_id());

                                        $comments = get_comments($args);
                                        ?>

                                        <?php if (!empty($comments)) : ?>



                                            <ol class="commentlist">

                                                <?php wp_list_comments(array('callback' => 'woocommerce_comments'), $comments); ?>

                                            </ol>



                                            <?php
                                            if (get_comment_pages_count() > 1 && get_option('page_comments')) :

                                                echo '<nav class="woocommerce-pagination">';

                                                paginate_comments_links(apply_filters('woocommerce_comment_pagination_args', array(
                                                    'prev_text' => '&larr;',
                                                    'next_text' => '&rarr;',
                                                    'type' => 'list',
                                                )));

                                                echo '</nav>';

                                            endif;
                                            ?>



                                        <?php else : ?>



                                            <p class="woocommerce-noreviews"><?php _e('There are no reviews yet.', 'tn_component'); ?></p>



                                        <?php endif; ?>

                                    </div>



                                    <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>



                                        <div id="review_form_wrapper">

                                            <div id="review_form">

                                                <?php
                                                $commenter = wp_get_current_commenter();



                                                $comment_form = array(
                                                    'title_reply' => __('Nếu thấy thích, hãy đánh giá cho sản phẩm này', 'tn_component'),
                                                    'title_reply_to' => __('Trả lời', 'tn_component'),
                                                    'comment_notes_before' => '',
                                                    'comment_notes_after' => '',
                                                    'fields' => array(
                                                        'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name', 'woocommerce') . ' <span class="required">*</span></label> ' .
                                                        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" /></p>',
                                                        'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'woocommerce') . ' <span class="required">*</span></label> ' .
                                                        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" /></p>',
                                                    ),
                                                    'label_submit' => __('Submit', 'woocommerce'),
                                                    'logged_in_as' => '',
                                                    'comment_field' => ''
                                                );



                                                if (get_option('woocommerce_enable_review_rating') === 'yes') {

                                                    $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __('Điểm đánh giá', 'tn_component') . '</label><select name="rating" id="rating">

                                                            <option value="">' . __('Rate&hellip;', 'woocommerce') . '</option>

                                                            <option value="5">' . __('Perfect', 'woocommerce') . '</option>

                                                            <option value="4">' . __('Good', 'woocommerce') . '</option>

                                                            <option value="3">' . __('Average', 'woocommerce') . '</option>

                                                            <option value="2">' . __('Not that bad', 'woocommerce') . '</option>

                                                            <option value="1">' . __('Very Poor', 'woocommerce') . '</option>

                                                        </select></p>';
                                                }



                                                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __('Nội dung', 'tn_component') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';



                                                comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                                                ?>

                                            </div>

                                        </div>



                                    <?php else : ?>



                                        <p class="woocommerce-verification-required"><?php _e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></p>



                                    <?php endif; ?>



                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="fb-comments" data-href="<?php get_permalink($product->get_id()) ?>" data-width="100%"></div>

                </div>



            </div>

        </div>

        <?php
    }

endif;



if (!function_exists('woocommerce_remove_related_products')):

// tạo lại sản phẩm liên quan, ưu tiên vị trí thứ 10

    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    add_action('woocommerce_after_single_product', 'woocommerce_remove_related_products', 11);

    function woocommerce_remove_related_products() {



        $cats = wp_get_post_terms(get_the_ID(), 'product_cat');



        if ($cats) {

            $related_posts = get_posts(array(
                'posts_per_page' => 12,
                'post_type' => 'product',
                'exclude' => get_the_ID(),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cats[0]->term_id
                    )
                ),
                'orderby' => 'rand'
            ));
        }
        ?>

        <?php if (!empty($related_posts)) : ?>

            <div class="col-xs-12">

                <div class="page_chitiet_tittle">

                    <span>Sản phẩm liên quan</span>

                </div>

                <div class="product_sw_group wow fadeInUp" data-wow-duration="1s">

                    <div class="row flex-sp slick-splq">

                        <?php foreach ($related_posts as $product) : ?>

                            <?php
                            $_product = wc_get_product($product->ID);

                            $imageids = $_product->get_gallery_image_ids();

                            if (!empty($imageids)) {

                                $image = wp_get_attachment_url($imageids[0]);
                            }
                            ?>

                            <div class="sanphamlq-sp">

                                <div class="wrapper">

                                    <div class="img-box">
                                        <?php if ($_product->is_on_sale()): ?>
                                        <span class="ribbon">
                                                <?php
                                                $sale = floatval(preg_replace('#[^\d.]#', '', $_product->get_sale_price()));

                                                $regular = floatval(preg_replace('#[^\d.]#', '', $_product->get_regular_price()));

                                                $result = (($regular - $sale) / $regular) * 100;
                                                ?>

                                                Sale <?php echo number_format($result, 0); ?>%
                                        </span>
                                        <?php endif ?>

                                        <a href="<?php echo get_permalink($product->ID) ?>" title="<?php echo get_the_title($product->ID) ?>">

                                            <img src="<?php echo get_the_post_thumbnail_url($product->ID, 'medium') ?>" class="img-responsive" alt="<?php echo get_the_title($product->ID) ?>">

                                        </a>

                                    </div>

                                    <div class="info-box text-center">

                                        <h4 class="prod-name">

                                            <a href="<?php echo get_permalink($product->ID) ?>"><?php echo get_the_title($product->ID) ?></a>

                                        </h4>



                                        <div class="product_sw_price">

                                            <?php if ($_product->is_on_sale()): ?><span class="regular-price"><?php echo wc_price($_product->get_regular_price()); ?></span>

                                                <span><?php echo wc_price($_product->get_sale_price()); ?></span>

                                            <?php endif; ?>

                                        </div>



                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

        <?php endif; ?>

        <?php
    }

endif;



if (!function_exists('add_sales_policy_after_cart_button')):

//thêm chính sách bán hàng sau nút MUA NGAY

    add_action('woocommerce_after_add_to_cart_form', 'add_sales_policy_after_cart_button');

    function add_sales_policy_after_cart_button() {
        ?>



        <?php
    }

endif;



if (!function_exists('mytheme_add_woocommerce_support')):

// bật tính năng theme woocommerce

    add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

    function mytheme_add_woocommerce_support() {

        add_theme_support('woocommerce');
    }

endif;



if (!function_exists('add_label_before_quantity_input')):

// chèn label 'số lượng' trước thẻ input số lượng

    add_action('woocommerce_before_add_to_cart_quantity', 'add_label_before_quantity_input');

    function add_label_before_quantity_input() {

        echo "<div class='dt3d_amount'><label>Số lượng: </label>";
    }

endif;



if (!function_exists('add_label_after_quantity_input')):

// chèn thẻ đóng 'div'

    remove_action('woocommerce_after_add_to_cart_quantity', 'add_label_after_quantity_input');

    function add_label_after_quantity_input() {

        echo "</div>";
        ?>

        <a class="btn-mua-ngay" href="<?php echo wc_get_checkout_url() ?>?add-to-cart=<?php echo get_the_ID() ?>">Mua ngay</a>

        <?php
    }

endif;



if (!function_exists('custom_override_checkout_fields')):

// xóa field thanh toán

    add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

    function custom_override_checkout_fields($fields) {

        unset($fields['billing']['billing_company']);

        unset($fields['billing']['billing_postcode']);

        unset($fields['billing']['billing_country']);

        unset($fields['shipping']['shipping_company']);

        unset($fields['shipping']['shipping_postcode']);

        unset($fields['shipping']['shipping_country']);

        return $fields;
    }

endif;



// xóa instock

add_filter('woocommerce_get_stock_html', '__return_empty_string');



// xóa rating gốc
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);


if (!function_exists('renderinput')) :

    function renderinput($field_id) {

        global $product;

        switch ($field_id) {

            case 12:

                $input = '<input type="hidden" name="input_' . $field_id . '" class="form-control item-quantity" readonly="readonly" value="' . get_the_title($product->ID) . '" />';

                break;

            case 13:

                $input = '<input type="hidden" name="input_' . $field_id . '" class="form-control item-quantity" readonly="readonly" value="' . get_the_ID() . '" />';

                break;
        }

        return $input;
    }

endif;



if (!function_exists('woo_remove_product_tabs')):

// Remove the additional information tab

    function woo_remove_product_tabs($tabs) {

        unset($tabs['additional_information']);

        return $tabs;
    }

    add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

endif;



if (!function_exists('woo_rename_tabs')):

    add_filter('woocommerce_product_tabs', 'woo_rename_tabs', 98);

    function woo_rename_tabs($tabs) {



        $tabs['description']['title'] = __('Thông tin chi tiết');  // Rename the description tab

        $tabs['reviews']['title'] = __('Bình luận');    // Rename the reviews tab



        return $tabs;
    }











endif;