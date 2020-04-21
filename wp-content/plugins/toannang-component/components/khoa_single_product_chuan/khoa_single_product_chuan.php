<?php
/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */
if (!class_exists('TNCP_khoa_single_product_chuan')) {

    class TNCP_khoa_single_product_chuan extends TNCP_ToanNang {

        protected $options = [
        ];

        function __construct() {

            parent::__construct(__FILE__);

            parent::setOptions($this->options);
        }

        /* Add html to Render */

        public function render() {
            ?>

            <div id="khoa_single_product_chuan">
                <div class="breadCrumbs-silge-khoa wow bounceInRight center">
                    <div class="container wow flipInX center" style="animation-delay: 1s;">
                        <?php
                        if (function_exists('az_box_breadCrumbs_khoa')) {
                            az_box_breadCrumbs_khoa();
                        }
                        ?> 
                    </div>
                </div>
                <div class="container">
                    <?php wc_get_template_part('content', 'single-product'); ?>
                </div>
            </div>

            <?php
        }

    }

}







