<?php


if (!class_exists('TNCP_rin_fonlica_footer')) {
    class TNCP_rin_fonlica_footer extends TNCP_ToanNang
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
            $section_data = get_field("rin_fonlica_footer","option");
            $logo = @$section_data["logo"];
            $shortdesc = @$section_data["shortdesc"];
            $address = @$section_data["address"];
            $phone = @$section_data["phone"];
            $mail = @$section_data["email"];
            $website = @$section_data["website"];
            $fanpage = @$section_data["fanpage"];
            ?>
<section id="rin_nuochoacharme_footer" style="">

    <div class="ftbackground">
    <div class="container">
        <div class="border">
        <div class="row">
            <div class="col-md-12">
                <div class="logowheretobuy">
                    <div class="background-i">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <div class="title-buy">
                        điểm bán
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="item">
                    <div class="col-md-12">
                        <div class="title">bài viết mới nhất</div>
                    </div>
                    <div class="col-md-12">
                        <div class="line"></div>
                    </div>
                    <div class="col-md-12">
                        <?php $newpost = get_posts(array(

                                'post_type' => 'post',

                                'posts_per_page' => 5,

                                'orderby' => 'date',

                            )
                        );?>
                        <ul class="news">
                        <?php foreach ($newpost as $npost){?>
                            <li><a href="<?php the_permalink($npost->ID) ?>" ><?php echo $npost->post_title; ?></a> </li>
                        <?}?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="item">
                    <div class="col-md-12">
                        <div class="title">menu</div>
                    </div>
                    <div class="col-md-12">
                        <div class="line"></div>
                    </div>
                    <div class="col-md-12">
                        <?php $menu = $this->getOption("menu_home") ?>
                        <?php
                        wp_nav_menu(array(
                            'menu' => $menu,
                            'container' => false,
                            'menu_class' => 'news',
                        ));
                        ?>
                        <!--<ul class="news">
                            <li><a href="#">Tiền sản giật khi mang thai </a> </li>
                            <li><a href="#">Tiền sản giật khi mang thai </a> </li>
                            <li><a href="#">Tiền sản giật khi mang thai </a> </li>
                            <li><a href="#">Tiền sản giật khi mang thai </a> </li>
                            <li><a href="#">Tiền sản giật khi mang thai </a> </li>
                        </ul>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="item">
                        <div class="col-md-12">
                            <div class="title">Thông tin công ty</div>
                        </div>
                        <div class="col-md-12">
                            <div class="line"></div>
                        </div>
                        <div class="col-md-12">
                            <img src="<?php echo $logo["url"]; ?>">
                            <div class="quickline">
                                <?php echo $shortdesc?>
                                <!--<p>
                                Sản phẩm chất lượng thuộc<br>
                                <strong>CÔNG TY TNHH UNITED SPOT MEDICAL</strong></p>
                                <p>
                                Phân Phối Và Tiếp Thị Bởi :<br>
                                <strong>CÔNG TY CỔ PHẦN DƯỢC PHẨM AN ĐÔNG</strong></p>-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="desc">
                                <!--<i class="fa fa-home" aria-hidden="true"></i>-->
                                <h6> Địa chỉ: <?php echo $address;?></h6></div>
                        </div>
                        <div class="col-md-12"><div class="desc">
                                <!--<i class="fa fa-phone" aria-hidden="true"></i>--><h6>Điện thoại: <strong><?php echo $phone;?></strong></h6> </div></div>
                        <div class="col-md-12"><div class="desc">
                                <!--<i class="fa fa-envelope" aria-hidden="true"></i>--><h6>Email: <?php echo $mail;?></h6></div></div>
                        <div class="col-md-12"><div class="desc">
                                <!--<i class="fa fa-phone" aria-hidden="true"></i>--><h6>Website: <?php echo $website;?></h6> </div></div>

                    </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="item">
                    <div class="col-md-12">
                        <div class="title">Thông tin công ty</div>
                    </div>
                    <div class="col-md-12">
                        <div class="line"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="fb-page" data-href="<?php echo $fanpage?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $fanpage?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $fanpage?>">Fonlica</a></blockquote></div>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>

    </div>
</section>
<section id="trademark">
        <div class="info">
            Copyright © 2018 - All right Reserved Fonlica Designed by Toan Nang
        </div>
    </section>
<div class="mess-wrapper">
    <div class="backtotop"><button class="scrolltop"><i class="fa fa-chevron-up"></i> </button></div>
    <div class="formsubmit">
        <a class="leavemess" id="showForm" href="#">Tư vấn sức khỏe trực tuyến <i class="fas fa-minus"></i><i class="fas fa-plus"></i></a>
        <div id="addForm">
            <!-- <div class="gf_browser_chrome gform_wrapper" id="gform_wrapper_5"><form method="post" enctype="multipart/form-data" id="gform_5" action="/">
                    <div class="gform_heading">
                        <h3 class="gform_title">Vui lòng đặt câu hỏi, các chuyên gia sẽ tư vấn sớm nhất cho bạn!</h3>
                        <span class="gform_description"></span>
                    </div>
                    <div class="gform_body"><ul id="gform_fields_5" class="gform_fields top_label form_sublabel_below description_below"><li id="field_5_1" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_5_1">Giới thiệu về bản thân<span class="gfield_required">*</span></label><div class="ginput_container ginput_container_text"><input name="input_1" id="input_5_1" type="text" value="" class="medium" placeholder="Tên, Email" aria-required="true" aria-invalid="false"></div></li><li id="field_5_2" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_5_2">Số điện thoại<span class="gfield_required">*</span></label><div class="ginput_container ginput_container_text"><input name="input_2" id="input_5_2" type="text" value="" class="medium" aria-required="true" aria-invalid="false"></div></li><li id="field_5_3" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_5_3">Tin nhắn<span class="gfield_required">*</span></label><div class="ginput_container ginput_container_textarea"><textarea name="input_3" id="input_5_3" class="textarea medium" aria-required="true" aria-invalid="false" rows="10" cols="50"></textarea></div></li>
                        </ul></div>
                    <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_5" class="gform_button button" value="Gửi tin nhắn" onclick="if(window[&quot;gf_submitting_5&quot;]){return false;}  window[&quot;gf_submitting_5&quot;]=true;  " onkeypress="if( event.keyCode == 13 ){ if(window[&quot;gf_submitting_5&quot;]){return false;} window[&quot;gf_submitting_5&quot;]=true;  jQuery(&quot;#gform_5&quot;).trigger(&quot;submit&quot;,[true]); }">
                        <input type="hidden" class="gform_hidden" name="is_submit_5" value="1">
                        <input type="hidden" class="gform_hidden" name="gform_submit" value="5">

                        <input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
                        <input type="hidden" class="gform_hidden" name="state_5" value="WyJbXSIsIjZkZjMwZjk3NzdiZTEwMTcxZjk3YWU1YjNkMThjNDM2Il0=">
                        <input type="hidden" class="gform_hidden" name="gform_target_page_number_5" id="gform_target_page_number_5" value="0">
                        <input type="hidden" class="gform_hidden" name="gform_source_page_number_5" id="gform_source_page_number_5" value="1">
                        <input type="hidden" name="gform_field_values" value="">

                    </div>
                </form>
            </div> -->
            <?php $form=$this->getOption("formmess");echo $form;?>
        </div>
    </div>

</div>
            <?php
        }
    }
}