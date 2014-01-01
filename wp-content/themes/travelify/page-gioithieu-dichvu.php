<?php
/**
 * Displays the page section of the theme.
 *
 */
?>

<?php get_header(); ?>

<?php
	/** 
	 * travelify_before_main_container hook
	 */
	do_action( 'travelify_before_main_container' );
?>

<div id="container">
    <div id="noi_bat" style="background: #fff;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
margin-top: 50px;padding: 10px;">
        <div class="title white_box"><h3>Dự án nổi bật</h3></div>
        <div class="hr"></div>
        <div class="container_dichvu">
            <?php echo do_shortcode("[metaslider id=167]"); ?>
        </div>
    </div>
    <div id="gioi_thieu" style="background: #fff;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
margin-top: 50px;">
        <div class="title white_box"><h3>Giới thiệu</h3></div>
        <div class="container_gioithieu"><a href="#"><img
                src="http://minhkhanhco.com/wp-content/uploads/gia-tri-cot-loi-CVI2.jpg" style="width: 150px;height: 150;"
                alt=""></a>

            <div class="sapo">
                <p>
                    Công ty Minh Khánh được thành lập nhằm cung cấp dịch vụ thi công nội ngoại thất hoàn thiện cho các công trình dân dụng và công nghiệp, cung cấp các giải pháp điều khiển thông minh cho các căn hộ tòa nhà thân thiện với môi trường theo tiêu chí “Xanh, Tiết Kiệm Năng Lượng”

                </p>
            </div>
            <div>
                <a href="http://minhkhanhco.com/gioi-thieu-cong-ty">Xem chi tiết</a>
            </div>
        </div>
    </div>
    <div id="dich_vu" style="margin-left:10px;background: #fff;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
margin-top: 50px;height: 209px;float: right;">
        <div class="title white_box"><h3>Dịch vụ</h3>

            <div class="hr"></div>
        </div>
        <div class="container_dichvu">
            <div class="item"><img src="http://minhkhanhco.com/wp-content/uploads/Blue_Star.png"
                                   style="width: 15px;height: 15px;" alt="">

                <h3 style="width: 250px;">Thiết kế, thi công nội thất </h3></div>
            <div class="item"><img src="http://minhkhanhco.com/wp-content/uploads/Blue_Star.png"
                                   style="width: 15px;height: 15px;" alt="">

                <h3 style="width: 200px;">Thi công ngoại thất</h3></div>

            <div class="item"><img src="http://minhkhanhco.com/wp-content/uploads/Blue_Star.png"
                                   style="width: 15px;height: 15px;" alt="">

                <h3 style="width: 307px;">Thi công nội thất Inox</h3></div>

            <div class="item"><img src="http://minhkhanhco.com/wp-content/uploads/Blue_Star.png"
                                   style="width: 15px;height: 15px;" alt="">

                <h3 style="width: 315px;">Thiết kế, thi công nhà thông minh</h3></div>


        </div>
    </div>

    <!--<div id="doi_tac">
        <div class="title white_box"><h3>Đối tác</h3></div>
        <div class="hr"></div>
        <div class="container_dichvu">
            <?php /*echo do_shortcode("[metaslider id=169]"); */?>
        </div>
    </div>-->
</div><!-- #container -->

<?php
	/** 
	 * travelify_after_main_container hook
	 */
	do_action( 'travelify_after_main_container' );
?>

<?php get_footer(); ?>