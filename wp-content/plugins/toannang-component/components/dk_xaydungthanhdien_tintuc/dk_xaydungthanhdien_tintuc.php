<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_tintuc')){

class TNCP_dk_xaydungthanhdien_tintuc extends TNCP_ToanNang{



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
    <section class="tt-ct-dt-xd-thanhdien">
        <div class="container">
        	<div class="row">
                <div class="col-md-6 tt-xd-home padding-0">
                    <div class="thanhdung-xd-tt"></div>
                    <div id="gioithieu-xd-home-title">
                        <div class="title-xd-gioithieu">
                            <div class="thanhngang-gioithieu"></div>
                            <span>TIN TỨC</span>
                        </div>
                    </div>
                    <div class="tt-nd-home">
                        <?php $idtintuc = get_field('tintuc_trangchu','option'); ?>
                        <?php
                            $posts = get_posts(array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'orderby' => 'ID',
                                'order' => 'DESC',
                                'category' => $idtintuc,
                                'meta_query' => array(
                                    array(
                                        'key' => 'noibat_baiviet',
                                        'value' => 1,
                                        'compare' => '=',
                                    ),
                                )
                            ));
                        ?>
                        <?php foreach ($posts as $post) { ?>
                        <div class="col-md-6 tt-nb-home padding-5">
                            <div class="tt-nb-trong">
                                <div class="img-ttnb">
                                    <a href="<?php the_permalink($post->ID) ?>"><img class="hvr-grow" src="<?php echo get_the_post_thumbnail_url($post->ID,'medium'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>"></a>
                                </div>
                                <div class="title-nd-tt-xd">
                                    <h3><a href="<?php the_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a></h3>
                                    <h5><i class="fas fa-calendar-alt"></i><span><?php echo get_the_date('d/m/Y',$post->ID) ?></span></h5>
                                    <h4><?php echo get_field('tomtatbaiviet',$post->ID) ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="col-md-6 padding-5 tt-new-home">
                            <?php
                             $posts2 = get_posts(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'orderby' => 'ID',
                                    'order' => 'DESC',
                                    'category' => $idtintuc,
                                ));
                            ?>
                            <?php foreach ($posts2 as $post) { ?>
                            <div class="tt-new-trong col-md-12 padding-0">
                                <div class="tt-new-sp-trong col-md-12 padding-0">
                                     <div class="img-ttnew col-md-5 padding-0">
                                         <a href="<?php the_permalink($post->ID) ?>"><img class="hvr-grow" src="<?php echo get_the_post_thumbnail_url($post->ID,'medium'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>"></a>
                                    </div>
                                    <div class="title-nd-new-tt col-md-7 padding-5">
                                        <h3><a href="<?php the_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a></h3>
                                        <h5><i class="fas fa-calendar-alt"></i><span><?php echo get_the_date('d/m/Y',$post->ID) ?></span></h5>
                                        <h4><?php echo get_field('tomtatbaiviet',$post->ID) ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 tt-ct-home padding-0">
                    <div id="gioithieu-xd-home-title">
                        <div class="title-xd-gioithieu">
                            <div class="thanhngang-gioithieu"></div>
                            <span>CÔNG TRÌNH</span>
                        </div>
                    </div>
                    <div class="nd-ct-home-xd">
                        <div class="slick-ct-xd">
                            <?php $iddichvu = get_field('dichvu_trangchu','option'); ?>
                            <?php
                                $posts = get_posts(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 8,
                                    'orderby' => 'ID',
                                    'order' => 'DESC',
                                    'category' => $iddichvu,
                                ));
                            ?>
                            <?php foreach ($posts as $post) { ?>
                                <div class="ct-sp-xd">
                                    <div class="ct-sp-xd-trong">
                                        <div class="img-sp-ct">
                                            <a href="<?php the_permalink($post->ID) ?>"><img class="hvr-grow" src="<?php echo get_the_post_thumbnail_url($post->ID,'medium'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>"></a>
                                        </div>
                                        <div class="nd-sp-ct">
                                            <h3><a href="<?php the_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a></h3>
                                        <h4><?php echo get_field('tomtatbaiviet',$post->ID) ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 tt-xd-home">
                    <div id="gioithieu-xd-home-title">
                        <div class="title-xd-gioithieu">
                            <div class="thanhngang-gioithieu"></div>
                            <span>ĐỐI TÁC</span>
                        </div>
                    </div>
                    <div class="slick-doitac">
                        <?php $doitac = get_field('doitac_home','option')?>
                        <?php foreach ($doitac as $dt) {?>
                        <div class="sp-doitac-home">
                            <a href="<?php echo $dt['link'] ?>"><img class="hvr-grow" src="<?php echo $dt['img']['sizes']['thumbnail'] ?>" alt="<?php echo $dt['ten'] ?>" title="<?php echo $dt['ten'] ?>"></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
        		
        	</div>
        </div>
    </section>

<?php }

}

}

