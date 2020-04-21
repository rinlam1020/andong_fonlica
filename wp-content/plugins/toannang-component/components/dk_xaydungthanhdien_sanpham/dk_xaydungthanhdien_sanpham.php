<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_sanpham')){

class TNCP_dk_xaydungthanhdien_sanpham extends TNCP_ToanNang{



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
    <section class="sanpham-xd-thanhdien">
        <div class="container">
        	<div class="row">
        		<div id="gioithieu-xd-home-title" class="col-md-12 col-sm-12">
        			<div class="title-xd-gioithieu">
        				<div class="thanhngang-gioithieu"></div>
        				<span>SẢN PHẨM</span>
        			</div>
        		</div>
                <div id="sanpham-nd-xd-home" class="col-md-12 col-sm-12">
                    <?php
                        $posts = get_posts(array(
                            'post_type' => 'product',
                            'posts_per_page' => 8,
                            'orderby' => 'ID',
                            'order' => 'DESC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field'  => 'name',
                                    'terms' => 'featured',
                                    'operator' => 'IN'
                                ),
                            ),
                        ));
                    ?>
                    <?php foreach ($posts as $post) { ?>
                    <div class="col-md-3 col-sm-4 col-xs-6 sp-xd-home">
                        <div class="sp-xd-trong">
                            <div class="img-sp-xd">
                                <a href="<?php the_permalink($post->ID) ?>"><img class="hvr-grow" src="<?php echo get_the_post_thumbnail_url($post->ID,'medium'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>"></a>
                            </div>
                            <div class="nd-trong-sp-xd">
                                <a href="<?php the_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
        	</div>
        </div>
    </section>

<?php }

}

}

