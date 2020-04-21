<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/8/2018
 * Time: 9:21 AM
 */

if (!class_exists('TNCP_qv_thuocgada_archive_product_search')){
	class TNCP_qv_thuocgada_archive_product_search extends TNCP_ToanNang{

		protected $options = [

		];
		function __construct()
		{
		    parent::__construct(__FILE__);
		    parent::setOptions($this->options);
		}

		/*Add html to Render*/
		public function render(){ ?>

			<div id="qv_thuocgada_archive_product" class="qv_thuocgada_pd">
            <?php if(have_posts()) :?>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="qv_thuocgada_pd_tittle">
                                <span><h1><?php echo the_archive_title(); ?></h1></span>
							</div>
							<div class="row">
                                <?php while (have_posts()): the_post() ?>
                                    <?php $_product = wc_get_product(get_the_ID());?>
								    <div class="col-md-3 col-sm-6 col-xs-12">
									<div class="qv_thuocgada_pd_item">
										<a href="<?php echo get_permalink()?>">
											<div class="qv_thuocgada_pd_img">
                                                <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium') ?>" alt="<?= get_the_title()?>">
											</div>
                                            <div class="qv_thuocgada_pd_deatails">
                                                <span><?= get_the_title()?></span>
                                            </div>
                                            <div class="qv_thuocgada_pd_price">
                                                <?php echo wc_price($_product->get_price())?>
                                            </div>
										</a>
									</div>
								</div>
								<?php endwhile; ?>

							</div>
						</div>
					</div>
				</div>
            <?php else: ?>
            <div class="container">
            <div class="row">
                <h1 class="col-md-12">Không tìm thấy kết quả cho chuỗi: "<?php echo $_GET['s']?>"</h1>
            </div>
            </div>
            <?php endif ?>
			</div>

<?php
}
}
}