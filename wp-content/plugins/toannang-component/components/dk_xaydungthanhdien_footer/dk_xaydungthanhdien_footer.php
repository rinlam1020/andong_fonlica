<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_footer')){

class TNCP_dk_xaydungthanhdien_footer extends TNCP_ToanNang{



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
    <section class="footer-xd-thanhdien">
        <div class="khungmo-panner"></div>
        <div class="container">
        	<div class="row">
        		<div class="footer-1 col-md-4 col-sm-4">
                    <div class="tt-footer">
                        <span>THÔNG TIN CÔNG TY</span>
                        <div class="thanhngang-footer"></div>
                    </div>
                    <div class="nd-footer">
                        <p><i class="fas fa-home"></i><?php echo get_field('ft_dia_chi','option'); ?></p>
                        <p><i class="fas fa-phone"></i><?php echo get_field('ft_hotline','option'); ?></p>
                        <p><i class="fas fa-envelope"></i><?php echo get_field('ft_email','option'); ?></p>
                        <p><i class="fas fa-globe"></i><?php echo get_field('ft_website','option'); ?></p>
                    </div>
                </div>
                <div class="footer-2 col-md-4 col-sm-4">
                    <div class="google_maps_footer">
                        <div id="bando" class="acf-map col-md-12 active_bando">
                             <?php $bando = get_field('google_maps', 'option'); ?>
                            <div class="marker" data-lat="<?php echo $bando['lat']; ?>" data-lng="<?php echo $bando['lng']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="lkw-xd-ft">
                        <span>Mạng xã hội: </span>
                        <?php $lkw = get_field('lkw_mxh','option') ?>
                        <?php foreach ($lkw as $lkweb) {?>
                        <a href="<?php echo $lkweb['link'] ?>"><img class="hvr-grow" src="<?php echo $lkweb['hinh']['sizes']['thumbnail'] ?>" alt="<?php echo $lkweb['ten'] ?>" title="<?php echo $lkweb['ten'] ?>"></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="footer-3 col-md-4 col-sm-4">
                    <div class="tt-footer">
                        <span>ĐĂNG KÝ NHẬN TIN</span>
                        <div class="thanhngang-footer"></div>
                    </div>
                    <div class="form_dknhantin">
                        <?php echo do_shortcode('[gravityform id="3" title="true" description="true"]'); ?>   
                    </div>
                    <div class="tt-footer">
                        <span>THỐNG KÊ TRUY CẬP</span>
                        <div class="thanhngang-footer"></div>
                    </div>
                    <div class="tktruyecap-nd">
                        <p class="w50"><span>Đang online: <?php echo wp_statistics_useronline() ?></span></p>
                        <p class="w50"><span>Truy cập tháng: <?php echo wp_statistics_visit('month'); ?></span></p>
                        <p class="w50"><span>Truy cập ngày: <?php echo wp_statistics_visit('today'); ?></span></p>
                        <p class="w50"><span>Tổng truy cập: <?php echo wp_statistics_visit('total'); ?></span></p>
                    </div>
                </div>
        	</div>
        </div>
    </section>
    <section class="coppyright">
        <?php echo get_field('coppyright','option') ?>
    </section>

<?php }

}

}

