<?php


if (!class_exists('TNCP_lam_minhloc_blog')) {
    class TNCP_lam_minhloc_blog extends TNCP_ToanNang
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
            <section class="cy_minhloc_blog">
                <div class="container">
                    <h1 class="page-title">
                        <span><?= the_archive_title() ?></span>
                    </h1>
                    <div class="row">
                        <?php if (have_posts()): ?>
                            <div class="post-list d-flex">
                                <?php while (have_posts()): the_post() ?>
                                    <div class="item col-xs-6">
                                        <div class="wrapper">
                                            <div class="img-box">
                                                <a href="<?php echo get_permalink()?>" title="<?php echo get_the_title()?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>"
                                                         class="img-responsive"
                                                         alt="<?= the_title() ?>">
                                                </a>
                                            </div>
                                            <div class="info-box">
                                                <div class="title">
                                                    <a href="<?php echo get_permalink()?>" title="<?php echo get_the_title()?>">
                                                        <?= the_title() ?>
                                                    </a>
                                                </div>
                                                <div class="desc">
                                                    <?= the_excerpt() ?>
                                                </div>
                                                <div class="text-right">
                                                    <a href="<?= get_permalink() ?>" title="<?= get_the_title() ?>"
                                                       class="btn-view"><?php _e('Xem thêm', 'tn_component') ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="col-xs-12 text-center">
                                <?= function_exists('wp_pagenavi') ? wp_pagenavi() : '' ?>
                            </div>
                        <?php else: ?>
                            <div class="col-xs-12">
                                <div class="alert alert-warning"><?php _e('Đang cập nhật...', 'tn_component') ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}