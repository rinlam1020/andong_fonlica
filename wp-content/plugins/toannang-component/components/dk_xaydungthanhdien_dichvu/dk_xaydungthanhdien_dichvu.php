<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_dichvu')){

class TNCP_dk_xaydungthanhdien_dichvu extends TNCP_ToanNang{



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
    <section class="dichvu-xd-thanhdien">
        <div class="khungmo-panner"></div>
        <div class="container">
        	<div class="row">
        		<div id="gioithieu-xd-home-title" class="col-md-12 col-sm-12">
        			<div class="title-xd-gioithieu">
        				<div class="thanhngang-gioithieu"></div>
        				<span>DỊCH VỤ</span>
        			</div>
        		</div>
                <div id="noidung-dichvu" class="col-md-12 col-sm-12">
                    <?php  $iddmdichvu = get_field('dichvu_trangchu','option'); ?>
                    <?php
                        $args = array(
                            'type'      => 'post',
                            'child_of'  => 0,
                            'number' => 4,
                            'parent'    => $iddmdichvu,
                        );
                        $categories = get_categories( $args );
                        foreach ( $categories as $category ) { ?>
                             
                        <div class="col-md-3 col-sm-6 dichvu-sp-tru">
                            <img src="<?php echo $this->getPath() ?>images/cottruxd.png" alt="">
                            <div class="tt-tru-dichvu"><a href="<?php echo get_term_link($category->term_id); ?>"><?php echo $category->name ; ?></a></div>
                        </div>
                    <?php } ?>
                </div>
        	</div>
        </div>
    </section>

<?php }

}

}

