<?php

get_header();
?>
    <main class="main ">
        <div class="container  sliderSection scale-up-ver-center">
            <section class="slider ">
                <img class="slider__border" src="<?php echo bloginfo('template_url'); ?>/assets/images/10.webp">
                <div class="swiper-container s_c_slide">
                    <div class="swiper-wrapper">
                        <?php
                        $sliderList = get_field('main_swiper');
                        foreach ($sliderList as $slider) {
                            ?>
                            <div class="swiper-slide">
                                <img class="slider_picture"
                                     src="<?= $slider; ?>">
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="swiper-button-next s_b_next"></div>
                <div class="swiper-button-prev s_b_prev"></div>
            </section>

        </div>

        <div class="flagTitle">
            <div class="makeOrderMain ">
               
                    <button type="button" id="getOrderForm"
                           class="getOrderForm button"
                           onclick="getOrderForm()"
                            ><span>ЗАКАЗAТЬ</span> </button>


                <div id="orderForm">
                    <?php
                    get_template_part('template-parts/order');
                    ?>
                </div>

            </div>
            <?php the_field('logo_subtitle'); ?> - <span
                    class="logo_title"><?php the_field('main_motto'); ?></span> !
        </div>

        <div class="container flag">
            <div class="flagImg">
                <img src="<?php echo bloginfo('template_url'); ?>/assets/svg/5.svg" alt="Flag" class="flagPicture">
            </div>
            <div class="flagInfo">
                <?php
                $serviceList = get_field('main_serniceList');
                foreach ($serviceList as $service) {
                    ?>
                    <div class="flagSubtitle"> <?= $service; ?><br></div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class=" container ourService">
            <div class="ourService__title">
                <p class="ourServiceData">
                    Услуги
                </p>
            </div>

            <div class="ourService__decor">
                <img src="<?php echo bloginfo('template_url'); ?>/assets/images/3.png" alt="" class="lines">
            </div>
        </div>
        <?php

        ?>
        <div class="container serviceList">
            <div class="row service__item__list__wrapper">
                <?php
                $serviceLinkList = get_field('service_link');
                foreach ($serviceLinkList as $serviceLink) {
                    ?>

                    <div class="col-sm-6 col-md-3 col-10 positionImage" data-aos="new-animation" data-aos-duration="1000">
                        <a class="service__item__list" target="_blank" href="https://pick-studio.pro/uslugi/">
                            <img src="<?= $serviceLink['service_picture']; ?>" class="card-img-top imageList">
                            <p class="serviceList__title _first">
                                <?= $serviceLink['service_name']; ?>
                            </p>
                        </a>
                    </div>


                    <?php
                }
                ?>


            </div>

        </div>

    </main>

<?php

get_template_part('template-parts/section_calculator');
?>
<?php
get_footer();
?>
