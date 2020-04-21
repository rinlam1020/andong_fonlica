<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_gioithieu')){

class TNCP_dk_xaydungthanhdien_gioithieu extends TNCP_ToanNang{



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
    <section class="gioithieu-xd-thanhdien">
        <div class="container">
        	<div class="row">
                <?php $gthome = get_field('gioithieu_home','option'); ?>
        		<div id="gioithieu-xd-home-title" class="col-md-12 col-sm-12">
        			<div class="title-xd-gioithieu">
        				<div class="thanhngang-gioithieu"></div>
        				<span><?php echo $gthome['ten']; ?></span>
        			</div>
        		</div>
        		<div id="gioithieu-xd-home-noidung" class="col-md-12 col-sm-12">
        			<div class="col-md-6 col-sm-6 gioithieu-xd-home-noidung-1">
        				<?php echo wpautop($gthome['noidung']); ?>
                        <div class="btn-xemthem-xd">
                            <a href="<?php echo $gthome['link']; ?>">XEM THÊM <i class="fas fa-chevron-right"></i></a>
                        </div>
        			</div>
        			<div class="col-sm-6 col-md-6 gioithieu-xd-home-noidung-2">
        				<div class="img-gioithieu">
                            <?php $imggt = $gthome['img_gt_home'];?>
        					<div class="img-gt-1 img-gt-xd">
        						<img class="hvr-grow" src="<?php echo $imggt['hinh_1']['sizes']['medium'] ?>" alt="<?php echo $gthome['ten']; ?>">
        					</div>
        					<div class="img-gt-2 img-gt-xd">
        						<img class="hvr-grow" src="<?php echo $imggt['hinh_1']['sizes']['medium'] ?>" alt="<?php echo $gthome['ten']; ?>">
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </section>

<?php }

}

}

