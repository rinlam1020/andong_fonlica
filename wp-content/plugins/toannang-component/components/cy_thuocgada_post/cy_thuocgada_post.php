<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/8/2018
 * Time: 9:21 AM
 */

if (!class_exists('TNCP_cy_thuocgada_post')){
	class TNCP_cy_thuocgada_post extends TNCP_ToanNang{

		protected $options = [

		];
		function __construct()
		{
		    parent::__construct(__FILE__);
		    parent::setOptions($this->options);
		}

		/*Add html to Render*/
		public function render(){ ?>
			<section class="cy_thuocgada_post">
				<div class="breadscrumb-wrapper" style="background-image: url('<?= $this->getPath() ?>images/bg-single.jpg')">
					<div class="container" >
						<h1 class="page-title"><?php the_title()?></h1>
						<?php az_box_breadCrumbs();?>
					</div>
				</div>
				<div class="container">
					<div class="post-content">

						<div class="detail">
							<?php the_content()?>
						</div>
						<div class="entry-footer clearfix">
							<div class="entry-footer-social clearfix">
								<div class="entry-footer-left">
									<div class="tags-wrap">
										<span class="tags-title"> Tags: </span>
                                        <?php $tags = wp_get_post_tags();?>
                                        <?php if(!empty($tags)) : ?>
										<span class="tags">
                                            <?php foreach ($tags as $tag) :?>
											<a href="<?php echo get_tag_link($tag->term_id);?>" rel="tag"><?php echo $tag->name ?></a>,
											<?php endforeach;?>
										</span>
                                        <?php endif; ?>
									</div>
								</div>
								<div class="entry-footer-right">
									<div class="social share-links clearfix">
										<div class="count-share">
											<ul class="social-icons list-unstyled list-inline">
												<li class="social-item facebook">
													<a href="http://www.facebook.com/sharer.php?u=<?= get_permalink() ?>" title="facebook" class="post_share_facebook facebook" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">
														<i class="fab fa-facebook"></i>
														facebook 
													</a>
												</li>
												<li class="social-item twitter">
													<a href="https://twitter.com/share?url=<?= get_permalink() ?>" title="twitter" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter twitter">
														<i class="fab fa-twitter"></i>
														twitter 
													</a>
												</li>
												<li class="social-item google">
													<a href="https://plus.google.com/share?url=<?= get_permalink() ?>" class="googleplus" title="google +" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
														<i class="fab fa-google-plus"></i>
														google+ 
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <?php
                        $cats  = wp_get_post_categories(get_the_ID());

                        $relateds = get_posts(
                                array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 4,
                                        'tax_query' => array(
                                                array(
                                                        'taxonomy' => 'category',
                                                        'field' => 'term_id',
                                                        'terms' => $cats,
                                                )
                                        ),
                                        'exclude' => get_the_ID()
                                )
                        );

                    ?>
                    <?php if(!empty($relateds)) :?>
					<div class="post-related">
						<h4 class="section-title">
							 Tin tức liên quan		
						</h4>
						<div class="row content">
                            <?php foreach ($relateds as $related) :?>

                                <div class="item col-xs-6 col-md-4">
                                    <div class="img-box">
                                        <div class="box">
                                            <a href="<?php echo get_permalink($related->ID)?>" class="hidden-xs overlay" title="<?php echo get_the_title($related->ID)?>"></a>
                                            <a href="<?php echo get_permalink($related->ID)?>" title="<?php echo get_the_title($related->ID)?>">
                                                <img src="<?php echo get_the_post_thumbnail_url($related->ID,'medium')?>" class="img-responsive" alt="<?php echo get_the_title($related->ID)?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="info-box">
                                        <p class="title">
                                            <a href="<?php echo get_permalink($related->ID)?>" title="<?php echo get_the_title()?>">
                                                <?php echo get_the_title($related->ID)?>
                                            </a>
                                        </p>
                                        <p class="date">
                                            <span class="far fa-clock"></span>
                                            <?php echo get_the_date('d/m/Y');?>
                                        </p>
                                        <p class="desc">
                                            <?php echo az_subtring(get_the_content($related->ID),20)?>
                                        </p>
                                        <a href="<?php echo get_permalink($related->ID)?>" title="Xem thêm" class="btn-view">
                                            Xem thêm <span class="fa fa-angle-double-right"></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
						</div>
					</div>
                    <?php endif; ?>
				</div>
			</section>
<?php
		}
	}
}