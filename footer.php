<!--  FOOTER AREA START  -->
<section id="footer" class="section-padding">
  <div class="container">
    <div class="row">
      <?php if ( is_active_sidebar('footer_text') ) : ?>
      <?php dynamic_sidebar('footer_text'); ?>
      <?php endif; ?>

      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="footer-copy">© 2018 Promodise inc. Все права защищены.</div>
        </div>
      </div>

    </div>
</section>
<!--  FOOTER AREA END  -->

<?php wp_footer(); ?>
</body>

</html>