<?php


if (!class_exists('TNCP_rin_fonlica_home')) {
    class TNCP_rin_fonlica_home extends TNCP_ToanNang
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

            ?>
<section id="rin_nuochoacharme_partner">
	<div class="container">
		    <div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-9 col-sm-6 col-xs-12 pregnant">

                        <?php $cm=$this->getOption("chuyenmuc");?>
                        <?php foreach ($cm as $key => $c){ ?>
                            <?php $obj = $c["ten"]; ?>
                            <?php $posts1 = get_posts(array(

                                    'post_type' => 'post',

                                    'posts_per_page' => 5,

                                    'orderby' => 'ID',

                                    'order' => 'DESC',

                                    'tax_query' =>  array(

                                        array('taxonomy' => 'category',

                                            'field' => 'term_id',

                                            'terms' => $obj->term_id,
                                        )
                                    )
                                )
                            );?>


                            <div class="item">
                                <div class="title">
                                    <div class="background-left"><h2><?=$obj->name ?></h2></div>
                                </div>
                                <div class="content">

                                    <div class="padding">
                                        <?php foreach ($posts1 as $key => $post) {?>
                                            <?php if($key==0){ ?>

                                                <div class="item-post-big">
                                                    <div class="imgs">
                                                        <a href="<?php the_permalink($post->ID) ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID,'thumbnail'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>">
                                                        </a>
                                                    </div>
                                                    <div class="desc">
                                                        <span><a href="<?php the_permalink($post->ID) ?>" ><?php echo $post->post_title; ?></a></span>
                                                        <p>
                                                            <?=get_the_excerpt($post->ID) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php } else{?>
                                                <div class="item-post-small">
                                                    <div class="imgs">
                                                        <a href="<?php the_permalink($post->ID) ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID,'thumbnail'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>">
                                                        </a>
                                                    </div>
                                                    <div class="desc">
                                                        <span><a href="<?php the_permalink($post->ID) ?>" ><?php echo $post->post_title; ?></a></span>
                                                        <!--<p>
                                                            <?/*=get_the_excerpt($post->ID) */?>
                                                        </p>-->
                                                    </div>
                                                </div>
                                        <?php } ?>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        <div class="item col-sm-pull-6 ">
                            <div class="title pull-right">
                                <div class="background-left"><h2><?=$obj->name ?></h2>
                                    <ul class="slider-nav">
                                        <li><a id="prev" href="#"> <i class="fa fa-chevron-left"></i> </a></li>
                                        <li><a id="next" href="#"><i class="fa fa-chevron-right"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content pull-right">
                                <div class="padding sliderwatchmost">
                                    <?php foreach ($posts1 as $key => $post) {?>
                                            <div>
                                                <div class="item-post-big-watchmost">
                                                    <div class="imgs">
                                                        <a href="<?php the_permalink($post->ID) ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID,'thumbnail'); ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>">
                                                        </a>
                                                    </div>
                                                    <div class="desc">
                                                        <span><a href="<?php the_permalink($post->ID) ?>" ><?php echo $post->post_title; ?></a></span>
                                                        <p>
                                                            <?=get_the_excerpt($post->ID) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-12 newsfeed">
                        <div class="title">
                            <div class="background-right"><h2>Bài viết mới nhất</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <?php $newpost = get_posts(array(

                                            'post_type' => 'post',

                                            'posts_per_page' => 5,

                                            'orderby' => 'date',

                                        )
                                    );?>
                                    <?php foreach ($newpost as $npost){?>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <a href="<?php the_permalink($npost->ID) ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url($npost->ID,'thumbnail'); ?>" alt="<?php echo $npost->post_title; ?>" title="<?php echo $npost->post_title; ?>">
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <span><a href="<?php the_permalink($npost->ID) ?>" ><?php echo $npost->post_title; ?></a></span>

                                        </div>
                                    </div>
                                    <?}?>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <div class="background-right"><h2>Tư vấn sức khỏe</h2></div>
                            <div class="content" style="background-image: url('<?php echo $this->getPath()?>/images/banner-right1.png')">
                                <div class="padding">
                                    <div class="quizus">
                                        <span>Đặt câu hỏi cho chuyên gia tư vấn để được giải đáp thắc mắc của bạn</span>
                                    </div>
                                    <div class="butgo">
                                        <a class="btngo" href="#">Đặt câu hỏi</a>
                                    </div>
                                    <div class="callus">
                                        <span>Nhấc máy lên và gọi cho chúng tôi</span>
                                    </div>
                                    <div class="phone">
                                        <span>Điện Thoại: 028. 973 0686</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <div class="background-right"><h2>Video</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <iframe id="ytplayer" type="text/html"
                                            src="https://www.youtube.com/embed/V8sJ7U-r1GQ?autoplay=1&origin=http://example.com"
                                            frameborder="0"></iframe>
                                </div>
                                <div id="youtube-title">
                                    <i class="fas fa-video"></i> Tạp chí sức khỏe: Bổ sung Omega cho mẹ bầu
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <div class="background-right"><h2>Bài viết mới nhất</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buynow">
                            <img src="<?php echo $this->getPath()?>/images/bannerbuynow.png">
                            <a class="btnbuynow" href="#">mua ngay<i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> </a>
                        </div>
                        <div class="title">
                            <?php $posts1 = get_posts(array(

                                    'post_type' => 'post',

                                    'posts_per_page' => 5,

                                    'orderby' => 'ID',

                                    'order' => 'DESC',

                                    'tax_query' =>  array(

                                        array('taxonomy' => 'category',

                                            'field' => 'term_id',

                                            'terms' => $obj->term_id,
                                        )
                                    )
                                )
                            );?>
                            <div class="background-right"><h2>Bài viết mới nhất</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                    <div class="item-post-small">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span><a href="#"> Thực phẩm cần tránh khi chuẩn bị có thai?</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>


	</div>

</section>

            <?php
        }
    }
}