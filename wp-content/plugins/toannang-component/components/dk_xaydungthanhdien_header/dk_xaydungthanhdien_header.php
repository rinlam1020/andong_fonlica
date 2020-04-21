<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 7/8/2018

 * Time: 9:21 AM

 */



if (!class_exists('TNCP_dk_xaydungthanhdien_header')){

class TNCP_dk_xaydungthanhdien_header extends TNCP_ToanNang{



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
    <section class="header-xd-thanhdien">
        <div class="container">
        	<div class="row">
        		<div class="col-md-3 col-sm-3 logo-xd-h">
        			<?php  if(strlen(az_box_logo_primary())>0){
                        echo  az_box_logo_primary();
                    }else{  ?>
                        <a href="#">
                            <img src="<?php echo $this->getPath()?>images/logo.png">
                        </a>
                    <?php  } ?>
        		</div>
        		<div class="col-md-6 col-sm-6 search-xd-h">
        			<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
        		</div>
        		<div class="col-md-3 col-sm-3 call-xd-h">
                    <div class="call-xd-h-trong">
                        <div class="call-xd-trong">
                            <img src="<?php echo $this->getPath()?>images/iconcal.png" alt="">
                            <div class="sdt-lh-home">
                                <a href="/lien-he"><?php echo get_field('hotline','option'); ?></a>
                            </div>
                        </div>            
                    </div>
        	   </div>

        		<div class="col-md-12 col-sm-12 menu-xd-h">
                    <div class="menu-desktop-xd">
                        <?php
                            wp_nav_menu(array(
                                'menu' => 'main-menu',
                                'container' => false,
                                'menu_class' => 'menu-xaydung-home',
                            ))
                        ?>
                    </div>
                    <div class="menu-mobi-xd">
                        <div class="mnu-mobi-a">
                            <a href="#menu"><i class="fas fa-bars"></i></a>
                        </div>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'main-menu',
                            'container' => 'nav',
                            'menu_class' => 'menu-xaydung-mobie',
                            'container_id' => 'menu',
                        ))
                    ?>
                    </div>
        			
        		</div>
        	</div>
        </div>
    </section>

<?php }

}

}

