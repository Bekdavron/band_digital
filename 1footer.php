<!--  FOOTER AREA START  -->
<section id="footer" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-sm-8 col-md-8">
        <?php if ( is_active_sidebar('footer_text') ) : ?>
        <?php dynamic_sidebar('footer_text'); ?>
        <?php endif; ?>

        <!-- <div class="footer-widget footer-link">
          <h4>Мы заботимся о том, чтобы вы <br />быстро развивали свой бизнес</h4>
          <p>
            Маркетинговое и диджитал агентство полного цикла: мы решаем задачи по продвижению и рекламе, делаем
            сайты и презентации, чтобы это не пришлось делать вам.
          </p>
        </div> -->

      </div>

      <div class="col-lg-2 col-sm-4 col-md-4">
        <div class="footer-widget footer-link">
          <h4>Информация</h4>
          <?php
          wp_nav_menu([
            'theme_location' => 'footer_1',
            'container'      => false, // <div> avtomatik chiqmasin
            'menu_class'     => '',    // <ul> uchun class qo‘shmaymiz
            'depth'          => 1,     // Faqat 1-darajali menyu
            'items_wrap'     => '<ul>%3$s</ul>', // Faqat <ul><li>...</li></ul>
          ]);
          ?>
        </div>
      </div>

      <div class="col-lg-2 col-sm-6 col-md-6">
        <div class="footer-widget footer-link">
          <h4>Сылки</h4>
          <?php
          wp_nav_menu([
            'theme_location' => 'footer_2',
            'container'      => false, // <div> avtomatik chiqmasin
            'menu_class'     => '',    // <ul> uchun class qo‘shmaymiz
            'depth'          => 1,     // Faqat 1-darajali menyu
            'items_wrap'     => '<ul>%3$s</ul>', // Faqat <ul><li>...</li></ul>
          ]);
          ?>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-md-6">
        <?php if ( is_active_sidebar('footer_contacts') ) : ?>
        <?php dynamic_sidebar('footer_contacts'); ?>
        <?php endif; ?>
      </div>
    </div>
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