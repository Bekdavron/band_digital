<?php get_header(); ?>
<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner"
  style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
  >
  <div class="overlay dark-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="banner-content content-padding">
          <h1 class="text-white"><?php the_title();?></h1>
          <p><?php the_excerpt()?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--MAIN HEADER AREA END -->
<?php echo "This is single page"; ?>
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_title( '<h2>', '</h2>' );
        the_content();
    }
} else {
    echo '<p>No content found</p>';
}