
<!-- do here -->
<!-- ================= TOP INFO BAR ================= -->
<div class="top-info-bar">
  <div class="container top-info">

    <!-- Location -->
    <div class="info-item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer/loc.svg" alt="">
      <span>Nkrankwanta, Bono.</span>
    </div>

    <!-- Email -->
    <div class="info-item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer/mail.svg" alt="">
      <span>info@nkrankwantaarearuralbank.com</span>
    </div>

    <!-- Phone -->
    <div class="info-item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer/call.svg" alt="">
      <span>0242-702-627 / 0241-085-910</span>
    </div>

    <!-- Login Button -->
    <a href="#" class="details-btn">Agent Login</a>
  </div>
</div>


<!-- ================= FOOTER SECTION ================= -->
<footer>
    <div class="container">
      <div class="footer-blk">
    
        <!-- Brand Column -->
        <div class="brand">
          <div class="logo-area">
            <img src="<?php echo get_template_directory_uri(); ?>/images/header/header-logo.svg" alt="Bank Logo" />
          </div>
    
          <p class="desc">
            Nkranbankplc was established to aid farmers, small and medium-scale
            businesses and petty traders to grow, and also to inculcate the habit
            of savings into the rural folks which was incorporated on 29th March 2011.
          </p>
    
          <div class="social">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/fb.svg" alt=""></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/linkedin.svg" alt=""></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/insta.svg" alt=""></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/x.svg" alt=""></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer/yt.svg" alt=""></a>
          </div>
        </div>
    
        <!-- Quick Links -->
        <div class="footer-col margin-left">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About NARB</a></li>
            <li><a href="#">Board Of Directors</a></li>
            <li><a href="#">Management Team</a></li>
            <li><a href="#">Branches</a></li>
          </ul>
        </div>
    
        <!-- Useful Links -->
        <div class="footer-col">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">News</a></li>
            <li><a href="#">Product & Services</a></li>
            <li><a href="#">Media</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Downloads</a></li>
          </ul>
        </div>
    
        <!-- Work Hours -->
        <div class="footer-col work-hours">
          <h4>Work Hours</h4>
    
          <div class="icon">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer/time.svg" alt="Time Icon" />
            <div>
              <p>8:00 AM - 5:00 AM</p>
              <p>Monday - Friday</p>
            </div>
          </div>
    
    
            <div class="download-btn">
              <a href="#">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer/download.svg" alt="Download" />
                Download brochure
              </a>
            </div>
          </div>
    
      </div>
    
      <!-- Bottom Section -->
        <div class="footer-bottom">
          <p>Copyright © 2025. All rights reserved.</p>
    
          <div class="payment-icons">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/mastercard.svg" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/at.svg" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/telecel.svg" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/visa.svg" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/mtn.svg" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/gtbank.svg" alt="">
          </div>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>

<?php if (get_field('custom_javascripts', 'option') != '') {



	echo get_field('custom_javascripts', 'option');
} ?>

</body>

</html>