<?php
/**
 * Home starter content.
 */

// @codingStandardsIgnoreStart WordPressVIPMinimum.Security.Mustache.OutputNotation -- Required for starter content.
$responsive_default_home_content = '
<!-- wp:cover {"minHeight":90,"minHeightUnit":"vh","customGradient":"linear-gradient(180.04deg, #2D2C52 4.77%, #7C29C4 119.73%)","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light" style="min-height:90vh">
  <span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(180.04deg, #2D2C52 4.77%, #7C29C4 119.73%)"></span>
  <div class="wp-block-cover__inner-container">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group alignwide">
      <!-- wp:media-text {"mediaPosition":"right","mediaId":118,"mediaLink":"","mediaType":"image","mediaWidth":43,"verticalAlignment":"center"} -->
      <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:auto 43%">
        <div class="wp-block-media-text__content">
          <!-- wp:heading {"textAlign":"left","level":1,"textColor":"white","typography":{"textAlign":"left"}} -->
          <h1 class="has-text-align-left has-text-color has-white-color" style="text-align:left;">Build Your Website</h1>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"typography":{"fontFamily":"Libre Franklin","fontSize":"24px","fontWeight":"400","lineHeight":"41px","textAlign":"left"}} -->
          <p class="has-text-align-left has-text-color" style="font-family:Libre Franklin;font-size:24px;font-weight:400;line-height:41px;text-align:left;">Imagine clicking a few buttons, and voila! You’ve got yourself a stunning website that even a tech whiz would envy.</p>
          <!-- /wp:paragraph -->

          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"style":{"width":"236px","height":"67px","padding":"25px 44px","borderRadius":"13px","borderColor":"#FFC300","borderWidth":"1px","borderStyle":"solid", "background":"#FFC300"}} -->
            <div class="wp-block-button">
              <a class="wp-block-button__link wp-element-button" href="#" style="width:236px;height:67px;padding:25px 44px;border-radius:13px;border:1px solid #FFC300;background: #FFC300;">Build Your Website</a>
            </div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <figure class="wp-block-media-text__media">
          <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/hero.png" alt="" class="wp-image-118 size-full" width="700" height="740"/>
        </figure>
      </div>
      <!-- /wp:media-text -->
    </div>
    <!-- /wp:group -->
  </div>
</div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"0px","top":"144px"}}},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull" id="services" style="padding-top:144px;padding-bottom:0px;background-color:#ffffff;">
  <!-- wp:heading -->
  <h2 style="text-align:center;">Our Services</h2>
  <!-- /wp:heading -->

  <!-- wp:columns {"style":{"spacing":{"margin":{"top":"50px"}}}} -->
  <div class="wp-block-columns" style="background-color:#ffffff;">
    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column">
      <!-- wp:image {"id":230,"sizeSlug":"full","linkDestination":"none"} -->
      <figure class="wp-block-image size-full">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/webdesign.png" alt="" class="wp-image-230" style="max-width:320px;max-height:320px;width:100%;height:100%;"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
      <h3 style="text-align:center;">Web Design</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:28px;text-align:center">Creating and maintaining websites, combining design, coding, and functionality for online experiences.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column">
      <!-- wp:image {"id":232,"sizeSlug":"full","linkDestination":"none"} -->
      <figure class="wp-block-image size-full">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/webdevelopment.png" alt="" class="wp-image-232" style="max-width:320px;max-height:320px;width:100%;height:100%;"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
      <h3 style="text-align:center;">Web Development</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:28px;text-align:center">Building and designing WordPress websites, combining creativity, coding, and functionality for online success.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column">
      <!-- wp:image {"id":231,"sizeSlug":"full","linkDestination":"none"} -->
      <figure class="wp-block-image size-full">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/marketingservices.png" alt="" class="wp-image-231" style="max-width:320px;max-height:320px;width:100%;height:100%;"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
      <h3 style="text-align:center;">Marketing Services</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:28px;text-align:center">Promoting businesses with strategies to boost visibility, engagement, and drive successful outcomes.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"143px","bottom":"144px"}}},"backgroundColor":"ast-global-color-5","layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull has-ast-global-color-5-background-color has-background" id="about" style="padding-top:143px;padding-bottom:144px;background-color:#ffffff;">
  <!-- wp:media-text {"align":"","mediaPosition":"right","mediaId":237,"mediaLink":"","mediaType":"image","verticalAlignment":"center"} -->
  <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center">
    <div class="wp-block-media-text__content">
      <!-- wp:group {"style":{"spacing":{"padding":{"right":"80px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
      <div class="wp-block-group" style="padding-right:80px">
        <!-- wp:heading {"style":{"spacing":{"padding":{"right":"40px"}}}} -->
        <h2 style="text-align:left;">Building the Future, One Website at a Time</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:18px;font-weight:300;line-height:30px;text-align:left;">At the heart of innovation lies the ability to create digital experiences that inspire and connect. With every website crafted, we aim to shape the future of online interaction—combining cutting-edge technology, thoughtful design, and user-focused functionality.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:18px;font-weight:300;line-height:30px;text-align:left;">Every website we build is a step toward a more connected and dynamic future. By blending innovation, design, and functionality, we create digital spaces that empower businesses and individuals to thrive.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <figure class="wp-block-media-text__media">
      <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/start-template-about-us.png" alt="" class="wp-image-237 size-full" style="max-width:450px;max-height:670px;width:100%;height:100%;"/>
    </figure>
  </div>
  <!-- /wp:media-text -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull" id="whyus" style="padding-top:60px;padding-bottom:60px;background: #D0A0FB33;">
  <!-- wp:columns {"style":{"spacing":{"blockGap":"80px","margin":{"top":"60px"}}}} -->
  <div class="wp-block-columns">
    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column">
      <!-- wp:image {"id":162,"sizeSlug":"large","linkDestination":"none"} -->
      <figure class="wp-block-image size-large">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/passionate.png" alt="" class="wp-image-162" style="max-width:80px;max-height:80px;width:100%;height:100%;"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
      <h3 style="text-align:center;margin-top:16px;">Passionate</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:26px;text-align:center;">Driven by enthusiasm and dedication to deliver excellence in every endeavor.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column">
      <!-- wp:image {"id":163,"sizeSlug":"large","linkDestination":"none"} -->
      <figure class="wp-block-image size-large">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/professional.png" alt="" class="wp-image-163" style="max-width:120px;max-height:80px;width:100%;height:100%;"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
      <h3 style="text-align:center;margin-top:16px;">Professional</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:26px;text-align:center;">Committed to delivering quality, reliability, and expertise in every project undertaken.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column">
      <!-- wp:image {"id":164,"sizeSlug":"large","linkDestination":"none"} -->
      <figure class="wp-block-image size-large">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/support.png" alt="" class="wp-image-164" style="max-width:85px;max-height:80px;width:100%;height:100%;"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
      <h3 style="text-align:center;margin-top:16px;">Support</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:26px;text-align:center;">Providing reliable assistance and solutions to ensure your success at every step.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
<div class="wp-block-group alignfull" id="testimonials" style="padding-top:60px;padding-bottom:60px;background-color:#ffffff;">
  <div style="max-width:1024px;width:100%;margin:auto;">
  	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"24px","lineHeight":"47px"}}} -->
  	<p class="has-text-align-center" style="font-size:24px;line-height:47px;font-weight:300;text-align:center;">“I use this theme pretty often, as it gives me what I need and a lot more. Super-flexible for many purposes and not least, it is responsive. 🙂”</p>
  	<!-- /wp:paragraph -->
	
  	<!-- wp:paragraph {"align":"center"} -->
  	<p class="has-text-align-center" style="font-size:24px;line-height:47px;font-weight:600;text-align:center;"><strong>-Responsive Theme User</strong></p>
  	<!-- /wp:paragraph -->
  </div>
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"gradient":"linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%)"},"spacing":{"padding":{"top":"104px","bottom":"104px"}}},"layout":{"inherit":false,"contentSize":"520px","type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" id="contact" style="background:linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%);padding-top:104px;padding-bottom:104px">
  <!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} -->
  <h2 class="has-text-align-center has-white-text-color has-text-color" style="text-align:center">Turn Your Website Ideas into Reality, Today!</h2>
  <!-- /wp:heading -->

  <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"margin":{"top":"50px"}}}} -->
  <div class="wp-block-buttons alignwide" style="margin-top:50px">
    <!-- wp:button -->
    <div class="wp-block-button">
      <a class="wp-block-button__link wp-element-button" style="width:236px;height:67px;padding:25px 44px;border-radius:13px;border:1px solid #FFC300;background: #FFC300;">Build Your Website</a>
    </div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
';
// @codingStandardsIgnoreEnd WordPressVIPMinimum.Security.Mustache.OutputNotation -- Required for starter content.
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'responsive' ),
	'post_content' => $responsive_default_home_content,
	'template'     => 'gutenberg-fullwidth.php', // Set the custom template here
);
