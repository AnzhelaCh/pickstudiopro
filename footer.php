
<?php
get_template_part('template-parts/marquee');
?>

<footer class="container footer main__style">
    <?php
        get_template_part('template-parts/section_feedback_news');
    ?>

    <div class=" container ourService ">

        <div class="row ourService__title main__decorate">
            <div class="col-8">
                <p class="ourServiceData">
                    Дополнительная информация
                </p>
            </div>
            <div class="col-4 ourService__decor">
                <img src="<?php echo bloginfo('template_url');?>/assets/images/3.png" alt="" class="lines">
            </div>
        </div>
        <div class="privacy__data container" >
            <div class="footer__editionData">
                <?php
                $args = array(
                    'child_of'     => 356,
                    'title_li'     => __(' '),
                );
                wp_list_pages( $args );
                ?>


            </div>
        </div>
    </div>
    <?php

    $footerData = get_field('footer_data',2);
    ?>
    <div class="container findUs">
        <p class="findUs__subtitle">
            <?= $footerData['clogan']; ?>
    </p>
    <p class="findUs__subtitle">
        <?= $footerData['prisoedinyajtes']; ?>
    </p>
    <div class="findUs__list">
        <?php
foreach ($footerData as $keySocial=>$valueSocial){
    if(is_array($valueSocial)){
       ?>
        <a href="<?php
        if(!empty($valueSocial['link'])){
           echo $valueSocial['link'];
        }
        ?>">
                <img class="findUs__facebook" src="<?php
                if(!empty($valueSocial['picture'])){
                   echo $valueSocial['picture'];
                }
                ?>">
            </a>
            <?php
    }
}
    ?>

        </div>


</footer>

<?php
get_template_part('template-parts/rights');
?>

<?php
wp_footer();
?>
</body>
</html>
<?php

?>

