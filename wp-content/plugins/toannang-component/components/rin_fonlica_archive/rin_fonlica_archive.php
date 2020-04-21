<?php


if (!class_exists('TNCP_rin_fonlica_archive')) {
    class TNCP_rin_fonlica_archive extends TNCP_ToanNang
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
<section id="rin_fonlica_archive">
    <div class="breadcumb">
        <a class="breadcumb_link" href="#">Trang chủ >> Cẩm nang Mang thai >> Khi mang thai</a>
    </div>
	<div class="container">
        <div class="marginbottom10">
		    <div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-9 pregnant">
						<div class="title">
                            <div class="background-left"><h2>khi mang thai</h2></div>
						</div>
                        <div class="content">
                            <div class="padding">
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                                <div class="item-post-archive">
                                    <div class="imgs">
                                        <a href="#" ><img src="<?php echo $this->getPath()?>/images/news1.png"></a>
                                    </div>
                                    <div class="desc">
                                        <span><a href="#"> Song thai – Những điều cần biết để sinh con an toàn</a></span>
                                        <p>
                                            Song thai ẩn tiềm ẩn nhiều nguy cơ cao hơn 2 – 3 lần so với trường hợp thai nghén bình thường như chuyển dạ khó,  sinh non, nhiễm độc thai nghén, hội chứng thai đôi truyền máu cho nhau, tiền sản giật và tăng huyết áp… Bài viết dưới đây sẽ cung cấp cho các bà mẹ đang mang song thai những kiến thức cần biết để theo dõi và chăm sóc song thai được tốt nhất.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="col-md-3 newsfeed">
                        <div class="title">
                            <div class="background-right"><h2>thông tin đặt hàng</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <div class="item-post-archive-order">
                                        <div class="imgs-order">
                                            <img src="<?php echo $this->getPath()?>/images/order.png">
                                        </div>
                                    <div class="form">
                                        <?php $form = $this->getOption('formorder');echo $form?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <div class="background-right"><h2>Bài viết mới nhất</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="title">
                                <div class="background-right"><h2>Tư vấn sức khỏe</h2></div>
                                <div class="content" style="background-image: url('/rin_nuochoacharme_partner/images/banner-right1.png')">
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
                            <div class="background-right"><h2>Câu hỏi thường gặp</h2></div>
                            <div class="content">
                                <div class="padding">
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
                                        </div>
                                    </div>
                                    <div class="item-post-archive">
                                        <div class="imgs">
                                            <img src="<?php echo $this->getPath()?>/images/news1.png">
                                        </div>
                                        <div class="desc">
                                            <span>Thực phẩm cần tránh khi chuẩn bị có thai?</span>
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
       
	</div>

</section>
</div>

            <?php
        }
    }
}
