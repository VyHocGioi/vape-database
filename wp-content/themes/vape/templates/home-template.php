<?php
/*
 Template Name: Home template
 */
?>
<?php get_header(); ?>


<section class="section-intro">
  <div class="container">
    <?php if (have_rows('section_1')) : ?>
      <?php while (have_rows('section_1')) : the_row();
      ?>
        <div class="row flex-row-reverse">
          <div class="col-sm-6 col-12 d-flex justify-content-sm-end justify-content-center align-items-center">
            <div class="block__vape__image">
              <img src="<?php the_sub_field('productimage') ?>" alt="" />

            </div>
          </div>
          <div class="col-sm-6 col-12">
            <div class="block__intro">
              <h1 class="block__greeting">
                <?php the_sub_field('title'); ?>
              </h1>
              <div class="block__paragraph py-4">
                <?php the_sub_field('description') ?>
              </div>
              <div class="block__feature">
                <div class="row gy-5">
                  <?php if (have_rows('feature')) : ?>
                    <?php while (have_rows('feature')) : the_row(); ?>
                      <div class="col-6">
                        <div class="block__intro__item d-flex align-items-center">
                          <div class="row d-flex align-items-center">
                            <div class="col">
                              <div class="block__intro__item__image bg-white">
                                <img src="<?php the_sub_field('image') ?>" alt="" />
                              </div>
                            </div>
                            <div class="col px-0"><span><?php the_sub_field('text') ?></span></div>
                          </div>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

          </div>
        </div>
  </div>
</section>
<section class="section-2">
  <div class="container">
    <?php if (have_rows('section_2')) : ?>
      <?php while (have_rows('section_2')) : the_row();
      ?>
        <div class="block__download">
          <div class="block__download__background">
            <div class="block__download__content p-md-5 p-4">
              <div class="block__download__content__information text-white">
                <?php the_sub_field('description') ?>
              </div>
              <div class="group__button d-flex flex-row">
                <div class="download__button p-1">
                  <a href="<?php the_sub_field('linkgoogleplay') ?>">
                    <img src="<?php echo THEME; ?>/images/downloadButton/artwork.png" alt="" class="" /></a>
                </div>
                <div class="download__button p-1">
                  <a href="<?php the_sub_field('linkappstore') ?>">
                    <img src="<?php echo THEME; ?>/images/downloadButton/App Store Badge.png" alt="" class="" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>


  </div>
</section>
<section class="section-3">
  <div class="container">
    <?php if (have_rows('section_3')) : ?>
      <?php while (have_rows('section_3')) : the_row();
      ?>
        <div class="text-center d-flex justify-content-center">
          <div class="block__quote fs-2 w-75 lh-base">
            <?php the_sub_field('quote') ?>
          </div>
        </div>
        <div class="row my-md-5 my-3">
          <h3 class="block__heading"><?php the_sub_field('heading') ?></h3>
          <div class="col-sm-6 col-12 block__title">
            <h2 class="fw-bold lh-base">
              <?php the_sub_field('title') ?>
            </h2>
          </div>
          <div class="col-sm-6 col-12">
            <div class="block__information lh-base float-end text-black-50 w-75">
              <?php the_sub_field('description') ?>
            </div>
          </div>
        </div>
        <div class="block__services mb-md-5 mb-3">
          <div class="row">
            <?php if (have_rows('features')) : ?>
              <?php while (have_rows('features')) : the_row(); ?>
                <div class="col-6 col-lg-3 mb-3">
                  <div class="card">
                    <div class="card-top">
                      <div class="card-bg d-flex justify-content-center align-items-center">
                        <div class="card-top-blur d-flex justify-content-center align-items-center">
                          <div class="card-img-bg bg-light d-flex justify-content-center align-items-center">
                            <img src="<?php the_sub_field('image') ?>" alt="" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <div class="card-title fw-bold"><?php the_sub_field('title') ?></div>
                      <div class="card-text text-black-50">
                        <?php the_sub_field('description') ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="text-center">
          <a href="#">
            <button class="btn btn-light button__seemore">
              See more
              <span><img src="<?php echo THEME; ?>/images/ArrowRight.svg" alt="" /></span>
            </button>
          </a>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</section>
<section class="section-4">
  <div class="container">
    <?php if (have_rows('section_4')) : ?>
      <?php while (have_rows('section_4')) : the_row();
      ?>
        <div class="block__features p-lg-5 px-3 py-4">
          <div class="block__news-top  d-flex justify-content-md-center p-lg-5 p-1">
            <div class="block__inner w-75">
              <h3 class="block__features__title"><?php the_sub_field('heading') ?></h3>
              <h2 class="fw-bold"><?php the_sub_field('title') ?></h2>
              <div class="content">
                <?php the_sub_field('description') ?>
              </div>
            </div>
          </div>

          <div class="row">
            <?php if (have_rows('features')) : ?>
              <?php while (have_rows('features')) : the_row(); ?>
                <div class="col-md-6 col-12 mb-5">
                  <div class="block__feature__item">
                    <div class="feature__item d-flex align-items-center">
                      <div class="feature__item__blur">
                        <div class="feature__item__blur__bg">
                          <img src="<?php the_sub_field('image') ?>
              " alt="" />
                        </div>
                      </div>
                      <div class="block__feature__content p-md-3">
                        <span class="fw-bold block__feature__item__title"><?php the_sub_field('title') ?></span>
                        <div class="block__feature__item__content">
                          <?php the_sub_field('description') ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>

<section class="section-5">
  <div class="container">
    <div class="block__title">
      <h2 class="fw-bold mb-md-5 mb-3">News</h2>
    </div>
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
    );
    $_posts = new WP_Query($args);
    ?>
    <?php if ($_posts->have_posts()) : ?>
      <div class="row justify-content-between mb-md-5 mb-3 gx-5">

        <?php while ($_posts->have_posts()) : $_posts->the_post(); ?>
          <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), "full");  ?>
          <div class="col-12 col-md-6 col-lg-3 mb-3">
            <div class="block__news__item">
              <div class="d-md-block d-flex">
                <div class="block__news__image">
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $featured_img_url ?> " alt="" class="img-fluid" />
                  </a>
                </div>

                <div class="block__news__content text-black-50 mt-0 mt-md-2 px-1 px-md-0">
                  <?php the_title(); ?>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <div class="text-center">
      <a href="<?php echo get_permalink(34) ?>">
        <button class="bg-light text-dark border-0 button__readnews">
          Read our news
          <span><img src="<?php echo THEME; ?>/images/ArrowRight.svg" alt="" /></span>
        </button>
      </a>
    </div>
  </div>
</section>

<section class="section-6">
  <div class="container">
    <?php if (have_rows('section_6')) : ?>
      <?php while (have_rows('section_6')) : the_row();
      ?>
        <div class="row align-items-center">
          <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
            <img src="<?php the_sub_field('image') ?>" alt="" class="phone-mockup" />
          </div>
          <div class="col-12 col-md-6">
            <div class="block__inner p-lg-5 p-2">
              <h2 class="fw-bold"><?php the_sub_field('title') ?></h2>
              <div class="block__content py-lg-5 mb-3">
                <?php the_sub_field('description') ?>
              </div>
              <button class="btn button__learnmore">
                <a href="<?php echo get_permalink(36) ?>" class="text-primary text-decoration-none">
                  Learn more
                  <span><img src="<?php echo THEME; ?>/images/arrow.svg" alt="" /></span>
                </a>
              </button>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>