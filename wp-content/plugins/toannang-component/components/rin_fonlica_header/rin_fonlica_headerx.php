<?php


if (!class_exists('TNCP_rin_fonlica_header')) {
    class TNCP_rin_fonlica_headers extends TNCP_ToanNang
    {
        protected $options = [
            'excerpt_more' => '...',
            'excerpt_length' => 45
        ];

        function __construct()
        {
            parent::__construct(__FILE__);
            parent::setOptions($this->options);
        }

        private function apply_settings()
        {
            /*
             * Tùy biến text xem thêm
             */
            add_filter('excerpt_more', function () {
                return $this->getOption('excerpt_more');
            });
            /*
             * Tùy biến độ dài excerpt
             */
            add_filter('excerpt_length', function () {
                return $this->getOption('excerpt_length');
            });
        }

        public function render()
        {

            $this->apply_settings();

            $section_data = get_field("rin_fonlica_header","option");

            $hotline = @$section_data["hotline"];
            $social = @$section_data["social"]["social_link"];

            ?>
<section id="rin_fonlica_header">
	<div class="content-above">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12 hidden-sm hidden-xs">
					<div class="hotln">
                        <i class="fa fa-phone-volume"></i><span><?= $hotline ?></span>
                    </div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="logo">
                        <?php  if(strlen(az_box_logo_primary())>0){
                            echo  az_box_logo_primary();
                        }else{  ?>
                            <a href="/">
                                <img src="<?php echo $this->getPath()?>images/logo.png">
                            </a>
                        <?php  } ?>
                    </div>
				</div>
				<div class="col-md-5 col-sm-8 col-xs-12 hidden-sm hidden-xs">
                    <ul class="social">
                        <?php
                            foreach ($social as $so){
                                ?>
                                <li>
                                    <a href="<?php echo $so["lien_ket"];?>">
                                        <?php echo $so["hinh"]?>
                                    </a>
                                </li>
                                <?
                            }
                        ?>
                    </ul>
				</div>
				
			</div>
		</div>
	</div>
   
</section>
<section id="menu-nav">
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 header-toogle hidden-lg hidden-md">
                <a href="#main-menu"><i class="fas fa-bars"></i></a>
            </div>
            <?php $menu = $this->getOption("menu_home") ?>
            <?php
                        wp_nav_menu(array(
                            'menu' => $menu,
                            'container' => 'nav',
                            'menu_class' => 'hidden-sm hidden-xs',
                            'container_id' => 'main-menu',
                        ));
                    ?>
            <!--<nav id="main-menu" class="hidden-sm hidden-xs">
                <ul class="hidden-sm hidden-xs">
                    <li><a href="#">Cẩm nang của mẹ</a>
                        <ul>
                            <li><a href="#">Cẩm nang của mẹ</a>
                                <ul>
                                    <li><a href="#">Cẩm nang của mẹ</a></li>
                                    <li><a href="#">Cẩm nang của mẹ</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Cẩm nang của mẹ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Góc của bố</a></li>
                    <li><a href="#">Trải nghiệm Fonlica</a></li>
                    <li><a href="#">Hỏi đáp chuyên gia</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Điểm bán</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>-->
        </div>
	</div>
</section>
            <?php
        }
    }
}