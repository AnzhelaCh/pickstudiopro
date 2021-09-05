<?php
$getPostID= get_post();

$args = array(

    'no_found_rows'       => true,
    'orderby'             => '',
    'order'               => 'DESC',
    'post_id'             => $getPostID->ID,
    'status'              => 'all',
    'date_query'          => null,
    'hierarchical'        => false,
    'update_comment_meta_cache'  => true,
    'update_comment_post_cache'  => false,
);


$commentList= get_comments( $args );

$count_comment = count($commentList);
$list=wp_get_nav_menu_items('Main');
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
            <div class="row blog__container">

                <div class="col-12 dateMessage">
                    <div class="col-3  dateInfo">
                        <div class="dateInfo__wrapper">

                            <p class="timeStamp dateCorrect"><?php the_time('d');?></p>
                            <p class="timeStamp"><?php the_time('F');?></p>
                            <p class="timeStamp"><?php the_time('Y');?></p>
                        </div>
                    </div>
                    <h2 class="h2__news"><?php the_title(); ?></h2>
                    <div class="news__pictures">
                        <img src="<?php echo bloginfo('template_url');?>/assets/images/40.png">
                        <span class="news__style">Администратор</span>
                        <img src="<?php echo bloginfo('template_url');?>/assets/images/39.png">
                        <span class="news__style"><?= $count_comment; ?></span>
                        <span class="news__style">Комментариев</span>
                    </div>

                    <div class="subtitle fullSubtitle">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php
                                the_content(
                                    sprintf(
                                        wp_kses(

                                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pickstudio' ),
                                            array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                            )
                                        ),
                                        get_the_title()
                                    )
                                );

                                wp_link_pages(
                                    array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'pickstudio' ),
                                        'after'  => '</div>',
                                    )
                                );
                                ?>
                            </div>


                        </article><!-- #post-<?php the_ID(); ?> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2 ourService__title">
                    <p class="ourServiceData">
                        Автор
                    </p>
                </div>
                <div class="col-10 ourService__decor">
                    <img src="<?php echo bloginfo('template_url');?>/assets/images/3.png" alt="" class="lines">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row authorAdmin">
                <div class="col-md-2  authorPhoto">
                    <img class="picWriter" src="<?php echo bloginfo('template_url');?>/assets/images/42.png">
                </div>
                <div class="col-md-5 authorMotto">
                    <h5 class="admin__title"><?= the_field('view_name',173);?></h5>
                    <p class="author__subtitle">
                        Администратор
                    </p>
                    <p class="admin__info"><?= the_field('view_help',173);?></p>
                </div>
                <div class="col-md-1 authorLinks">
                    <div class="findUs__list admin__list">
                        <a class="social__admin" href="#" >
                            <img class="admin__links " src="<?php echo bloginfo('template_url');?>/assets/images/25.png">
                        </a>
                        <a class="social__admin" href="#" >
                            <img class="admin__links" src="<?php echo bloginfo('template_url');?>/assets/images/26.png">
                        </a>
                        <a class="social__admin" href="#" >
                            <img class="admin__links" src="<?php echo bloginfo('template_url');?>/assets/images/27.png">
                        </a>

                    </div>
                </div>
                <div class="col-md-4 companyMotto">
                    <div class="points"></div>
                    <p class="admin__info _links"><?= the_field('view_social',173);?></p>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 ourService__title">

                    <p class="ourServiceData">
                        Комментарии <span>(<?= $count_comment; ?>)</span>
                    </p> </div>
                    <div class="col-md-6 ourService__decor">
                        <img src="<?php echo bloginfo('template_url');?>/assets/images/3.png" alt="" class="lines">
                    </div>
            </div>
            <div class="row">
            <?php

?>
            <div class="feedbackWrapper">
                <?php

                foreach ($commentList as $keyComment=>$valueComment){
                    $dateCorrect= $valueComment->comment_date;
                    $dateDisp=substr("$dateCorrect",0,10 );
                    $dataArray = explode('-', $dateDisp);

            ?>
                    <br>
                <div class='comment_head_style'><p class='infoComments_name'><?php echo $valueComment->comment_author; ?></p>
                    <p class='infoComments_date'><?php echo $dataArray[2].'.'.$dataArray[1].'.'.$dataArray[0]; ?> </p></div>
                    <p class='infoComments_data'><?php echo $valueComment->comment_content; ?></p>
                    <?php
                                    }
                ?>
            </div>
                <?php

            $defaults = [
                'fields' => [
                    'author' => '<div class="f__list"><p class="comment-form-author">
			<label for="author">' . __('Name') . ($req ? ' <span class="required">*</span>' : '') . '</label>
			<input id="author" name="author" class="feed_List fAuthor" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' />
		</p>',
                    'email' => '<p class="comment-form-email">
			<label for="email">' . __('Email') . ($req ? ' <span class="required">*</span>' : '') . '</label> 
			<input id="email" class="feed_List fEmail" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' />
		</p></div>
		
		</div><button onclick="checkFeedBack()" type="button" class="check_info button" >Далее</button> 
		<div class="infoMessage"></div>
		'
                ],
                'comment_field' => '<div class="f_wrapper"><div class="f__add__data"><p class="comment-form-comment">
		<label class="l__comment" for="comment">' . _x('Comment', 'noun') . '</label>
		<textarea id="comment" class="feed_List fComment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
	</p></div>',

                'comment_notes_after' => '',
                'id_form' => 'commentform',
                'id_submit' => 'submit',
                'class_form' => 'comment-form',
                'class_submit' => 'submit',
                'name_submit' => 'submit',
                'title_reply' => __('Leave a Reply'),
                'title_reply_to' => __('Leave a Reply to %s'),
                'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
                'title_reply_after' => '</h3>',
                'cancel_reply_before' => ' <small>',
                'cancel_reply_after' => '</small>',
                'cancel_reply_link' => __('Cancel reply'),
                'label_submit' => __('Post Comment'),
                'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
                'submit_field' => '<p class="form-submit">%1$s %2$s</p>',
                'format' => 'xhtml',
            ];

            comment_form($defaults);

            ?>

            </div>
        </div>

    </div>

</main>
<?php
get_template_part('template-parts/checkform');
?>