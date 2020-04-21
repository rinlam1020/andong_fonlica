<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 8/3/2018
 * Time: 6:20 PM
 */

if(!function_exists('my_search_filter')){
    function my_search_filter($query) {
        if ( !is_admin() && $query->is_main_query() ) {
            if (is_search()) {
                $query->set( 'post_type','product');

            }
            return $query;
        }
        return $query;
    }
    add_action('pre_get_posts','my_search_filter');
}
