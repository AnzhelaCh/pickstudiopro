<?php
/*
 Template Name: Новости
 */
?>
<?php
get_header();
$list=wp_get_nav_menu_items('Main');
$postsList=get_posts();
?>

    <main class="container main__style">
        <div class="decor "></div>
        <div class="row decor__content">
            <div class="col-7 decor__info">
                <p class="decor__title">Новости</p>
            </div>

            <div class="col-5 decor__links">
                <a href="https://pick-studio.pro/" class="home">Главная</a>
                <div class="about"><?= $list[3]->title; ?></div>

            </div>

            <div class="decor"></div>
            <div class="container">
                <div class="row blog__wrapper">
                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $posts = new WP_Query( array(
                        'paged' => $paged,
                        'posts_per_page' => 3,
                        'category'    => 'news__list',
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  =>'',
                        'post_type'   => 'post',
                        'suppress_filters' => true,

                    ) );



$itemInformation=$posts->posts;
                    

                   foreach( $itemInformation as $post ) {

                         
                         $newsName = $post->post_title;
                         ?>
                         <br>
                     <a class="view__news" href="<?php echo get_permalink(); ?>">
                         <div class="col-3 dateInfo">
                             <div class="dateInfo__wrapper">

                                 <p class="timeStamp dateCorrect"><?php the_time('d');?></p>
                                 <p class="timeStamp"><?php the_time('F');?></p>
                                 <p class="timeStamp"><?php the_time('Y');?></p>
                             </div>

                         </div>
                         <div class="col-md-12 col-12 dateMessage">

                             <h2 class="h2__news"><?= $newsName; ?></h2>

                             <div class="news__pictures">
                                 <img src="<?php echo bloginfo('template_url');?>/assets/images/40.png">
                                 <span class="news__style">Администратор</span>
                                 <img src="<?php echo bloginfo('template_url');?>/assets/images/39.png">
                                 <span class="news__style"><?php
                                     $idPost=get_the_ID();
                                     echo get_comments_number($idPost);?></span>
                                 <span class="news__style">Комментариев</span>

                             </div>

                             <p class="subtitle">
                                 <?= the_field('news_info'); ?>
                             </p>

                         </div></a>
                         <br><br>

                     <?php
                     }

                    ?>

                </div>
                <div class="pagination">
                    <div class="paginationwrapper">
                        <?php
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $posts->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'next_text'    => sprintf( '<i></i> %1$s', __( 'Вперед', 'text-domain' ) ),
                            'prev_text'    => sprintf( '%1$s <i></i>', __( 'Назад', 'text-domain' ) ),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                        ?>
                    </div>

                </div>
            </div>


    </main>
<?php

get_template_part('template-parts/section_footer');
?>



