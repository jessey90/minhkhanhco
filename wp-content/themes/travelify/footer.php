<?php
/**
 * Displays the footer section of the theme.
 *
 */
?>
	   </div><!-- #main -->

	   <?php
	      /** 
	       * travelify_after_main hook
	       */
	      do_action( 'travelify_after_main' );
	   ?>

	   <?php 
	   	/**
	   	 * travelify_before_footer hook
	   	 */
	   	do_action( 'travelify_before_footer' );
	   ?>

<footer id="footerarea" class="clearfix">
    <div class="topic-html-content-body">
        <div class="active" style="border-bottom: 1px solid #977349;"><a href="#" style="text-transform: uppercase;color: #0000fe;">Khách hàng tiêu biểu</a></div>
        <div id="doitac_container">
            <?php echo do_shortcode("[metaslider id=169]"); ?>
        </div>
        <ul style="padding: 0 10px 10px 0;text-align: left;float: left;border-right: 1px solid #977349;">
            <li class="active" style="border-bottom: 1px solid #977349;"><a href="#" style="text-transform: uppercase;color: #0000fe;">Liên hệ</a></li>
            <li><span style="font-size: small;"><span style="display: inline-block; width: 280px !important;"> CÔNG TY TNHH TM SX XD MINH KHÁNH</span>
            <li><span style="font-size: small;"><span style="display: inline-block; width: 45px !important;">Đ/C</span>:</span><span style="font-size: small;"> 157/68 Dương Bá Trạc, Phường 1, Quận 8,  Hồ Chí Minh</span></li>
            <li><span style="font-size: small;"><span style="display: inline-block; width: 45px !important;">Xưởng</span>:</span><span style="font-size: small;"> D11/319 Trịnh Quang Nghị, Xã Phong Phú, H. Bình Chánh</span></li>
            <li><span style="font-size: small;"><span style="display: inline-block; width: 45px !important;">ĐT &nbsp;&nbsp;</span>:</span><span style="font-size: small;"> (+84.8) 38 513 118</span></li>
            <li><span style="font-size: small;"><span style="display: inline-block; width: 45px !important;">Fax &nbsp;</span>: (+84.8) 38 568 119</span></li>
            <li><span style="font-size: small;"><span style="display: inline-block; width: 45px !important;">Email</span>: sale@minhkhanhco.com</span></li>
        </ul>
        <ul style="float: left;color: #fff;font-style: italic;margin-left: 15px;border-bottom: 1px solid #977349;">
            <img src="http://minhkhanhco.com/wp-content/uploads/quote3.png" alt="quote" style="width: 35px;height: auto;float: left">
            <p style="margin-top: 22px;float: left;">
                Most people agree...the first impression is the most lasting
            </p>
            <img src="http://minhkhanhco.com/wp-content/uploads/quote4.png" alt="quote" style="width: 35px;height: auto;margin-top: 30px;">
        </ul>
        <ul style="float: left;width: 300px;height: 100px;position: relative;padding: 10px;">
            <p style="float: left;position: absolute;bottom: 5px;">
                &copy; 2013 MinhKhanhCo. All right reserved
            </p>
        </ul>
        <ul style="float: right;">
            <!-- Histats.com  START  (standard)-->
            <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
            <a href="http://www.histats.com" target="_blank" title="free website hit counter" ><script  type="text/javascript" >
                try {Histats.start(1,2535948,4,26,190,115,"00011111");
                    Histats.track_hits();} catch(err){};
            </script></a>
            <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2535948&101" alt="free website hit counter" border="0"></a></noscript>
            <!-- Histats.com  END  -->
        </ul>
    </div>
    <?php
    /**
     * travelify_footer hook
     *
     * HOOKED_FUNCTION_NAME PRIORITY
     *
     * travelify_footer_widget_area 10
     * travelify_open_sitegenerator_div 20
     * travelify_socialnetworks 25
     * travelify_footer_info 30
     * travelify_close_sitegenerator_div 35
     * travelify_backtotop_html 40
     */
    //do_action( 'travelify_footer' );

    ?>
</footer>
	   
		<?php 
	   	/**
	   	 * travelify_after_footer hook
	   	 */
	   	do_action( 'travelify_after_footer' );
	   ?>	

	</div><!-- .wrapper -->

	<?php
		/** 
		 * travelify_after hook
		 */
		do_action( 'travelify_after' );
	?> 

<?php wp_footer(); ?>

</body>
</html>