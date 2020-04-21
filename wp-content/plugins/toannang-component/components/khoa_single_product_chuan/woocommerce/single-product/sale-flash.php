<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

    <?php
//        $sale = floatval( preg_replace( '#[^\d.]#', '', $product->get_sale_price() ) );
//$regular = floatval( preg_replace( '#[^\d.]#', '', $product->get_regular_price() ) );
//$percent = (1 - ( $sale / $regular )) * 100;
    ?>
	<?php // echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">GIẢM ' .number_format($percent,0)  . '%</span>', $post, $product ); ?>
        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
<?php endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */