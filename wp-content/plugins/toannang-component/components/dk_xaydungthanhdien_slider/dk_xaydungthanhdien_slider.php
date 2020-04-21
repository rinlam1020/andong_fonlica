<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_slider')){

class TNCP_dk_xaydungthanhdien_slider extends TNCP_ToanNang{



protected $options = [

    'categories' => array(),

    'hotline_ban_hang' => '',

    'menu' => '',

];

function __construct()

{

    parent::__construct(__FILE__);

    parent::setOptions($this->options);

}



/*Add html to Render*/

public function render(){ ?>
    <section class="slider-xd-thanhdien">
        <?php echo do_shortcode('[metaslider id="94"]'); ?>
    </section>

<?php }

}

}

