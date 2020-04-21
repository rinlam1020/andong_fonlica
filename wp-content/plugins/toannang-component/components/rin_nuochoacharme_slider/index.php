<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/12/2018
 * Time: 9:43 AM
 */

if (!isset($sum_code) || !$sum_code)
    require_once '../../header.php';
?>
<!-- Chen them thu vien css day neu can -->
<!-- css rieng cho component -->
<link rel="stylesheet" href="rin_nuochoacharme_slider/assets/style.css">
<link rel="stylesheet" href="rin_nuochoacharme_slider/assets/inc/fontawesome_animate/font-awesome-animation.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/include/slick/slick-theme.css">
<div class="wow flash">
<section id="slider">
	<div class="slicksl">
		  <div>
                 <img src="rin_nuochoacharme_slider/images/slider1.png" class="img-responsive">
            </div>
            <div>
                 <img src="rin_nuochoacharme_slider/images/slider1.png" class="img-responsive">
            </div>   
	</div>
</section>
</div>
<?php
/*chen them thu vien js day neu can*/
$custom_js .= '
<script src="rin_nuochoacharme_slider/assets/script.js"></script>
';
    /*js call function cho component*/
$custom_js .= '

';
if (!isset($sum_code) || !$sum_code)
    require_once '../../footer.php';
?>
