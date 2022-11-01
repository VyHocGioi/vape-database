<?php

/**
 * Displays footer
 *
 * @package WordPress
 * @subpackage Common
 * @since 1.0
 * @version 1.0
 */
$gp_options = get_option('gp_options'); ?>
<footer>
    <div class="container">
        <div class="block__footer__item text-white">
            <div class="row mb-md-5 mb-3">
                <div class="col-6 col-md-4">
                    <div class="block__footer__title mb-4">
                        <a href="" class="text-white">Miracle</a>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_1',
                        'menu' => "Menu Footer 1",
                        'container' => 'ul',
                        'menu_class'     => '',
                        'add_a_class'     => 'text-white',
                        'add_li_class' => 'mb-2',

                    ));
                    ?>
                </div>
                <div class="col-6 col-md-4">
                    <div class="block__footer__title text-white mb-4">
                        <a href="#" class="text-white">Legal</a>
                    </div>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu_2',
                        'menu' => "Menu Footer 2",
                        'container' => 'ul',
                        'menu_class'     => '',
                        'add_a_class'     => 'text-white',
                        'add_li_class' => 'mb-2',


                    ));
                    ?>
                </div>
                <div class="col-12 col-md-4 d-md-block d-flex justify-content-center">
                    <div class="footer__download float-end">
                        <div class="text-md-end text-center text__install">
                            Install app
                        </div>

                        <div class="download__button py-2">
                            <a href="<?php the_sub_field('linkgoogleplay') ?>" class="w-100">
                                <img src="<?php echo THEME; ?>/images/downloadButton/artwork.png" alt="" class="img-fluid" /></a>
                        </div>
                        <div class="download__button py-2">
                            <a href="<?php the_sub_field('linkappstore') ?>" class="w-100">
                                <img src="<?php echo THEME; ?>/images/downloadButton/App Store Badge.png" alt="" class="img-fluid" /></a>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row align-items-center d-flex flex-row-reverse justify-content-between">
                <div class="col-md-6 col-12">
                    <div class="block__social">
                        <?php global $vape_options; ?>
                        <div class="block__social__bg">
                            <div class="block__social-icon">
                                <a href="<?php echo $vape_options['link-social-1'] ?>">
                                    <img src="<?php echo $vape_options['opt-icon-1']['url'];  ?>" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="block__social__bg">
                            <div class="block__social-icon">
                                <a href="<?php echo $vape_options['link-social-2'] ?>">
                                    <img src="<?php echo $vape_options['opt-icon-2']['url'] ?>" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="block__social__bg">
                            <div class="block__social-icon">
                                <a href="<?php echo $vape_options['link-social-3'] ?>">
                                    <img src="<?php echo $vape_options['opt-icon-3']['url'] ?>" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="block__social__bg">
                            <div class="block__social-icon">
                                <a href="<?php echo $vape_options['link-social-4'] ?>">
                                    <img src="<?php echo $vape_options['opt-icon-4']['url'] ?>" alt="" />
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="block__copyright">
                        © 2022 Exnodes. All rights reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<?php wp_footer(); ?>


</html>