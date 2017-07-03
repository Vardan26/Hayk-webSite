<?php
/**
 * Template Name: Home
 */

get_header();
global $post;
global $cfs;
$ID = $post->ID;
?>

<section class="intro">
    <div class="intro__banner">

        <div class="intro__banner__video">
            <video width="auto" height="100%" autoplay>
                <source src="<?php
                $content_post = get_post();
                $content = $content_post->post_content;
                echo $content;

                ?>">
            </video>
            <div class="video__content">
                <div class="video__txt">
                    <h3 class="video__title"><?php echo the_title(); ?></h3>
                    <p class="video__txt__min">
                        <?php echo the_excerpt(); ?>
                    </p>
                </div>
            </div>

        </div>


    </div>
    <section class="container intro__videos">
        <?php
        $args = array(
            'post_type' => 'players',
            'posts_per_page' => -1,
            'order' => 'DESC',
            'post_status' => 'publish',
            'suppress_filters' => 0
        );

        $posts = get_posts($args);
        foreach ($posts as $key => $post) {

            ?>
            <?php

        };
        wp_reset_query();


        ?>
        <div class="intro__videos__big">


            <!--                <img src="--><?php //echo $client_name;?><!--"-->

            <a target="_blank" class="intro__videos__img"
               href="<?php
               if ($cfs->get('big_player_link', $ID)) {
                   $big_player_link = $cfs->get('big_player_link', $ID);
                   echo $big_player_link;
               } ?>">

                <?php
                if ($cfs->get('big_player_image', $ID)) {
                    $big_player_image = $cfs->get('big_player_image', $ID);
                    echo $big_player_image; ?>

                    <img src="<?php echo $big_player_image; ?>">
                    <?php
                }
                ?>
            </a>

            <div class="video__content">
                <div class="video__txt">
                    <h3 class="video__title">
                        <?php
                        if ($cfs->get('big_player_title', $ID)) {
                            $big_player_title = $cfs->get('big_player_title', $ID);
                            echo $big_player_title;
                        } ?>
                    </h3>
                    <p class="video__txt__min">
                        <?php
                        if ($cfs->get('big_player_short_description', $ID)) {
                            $big_player_short_description = $cfs->get('big_player_short_description', $ID);
                            echo $big_player_short_description;
                        } ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="intro__videos__small">
            <div class="intro__videos__small__item">
                <a target="_blank" class="intro__videos__img"
                   href="<?php
                   if ($cfs->get('medium_top_player_link', $ID)) {
                       $medium_top_player_link = $cfs->get('medium_top_player_link', $ID);
                       echo $medium_top_player_link;
                   } ?>">
                    <img src="<?php
                    if ($cfs->get('medium_top_player_image', $ID)) {
                        $medium_top_player_image = $cfs->get('medium_top_player_image', $ID);
                        echo $medium_top_player_image;
                    } ?>">
                </a>
                <div class="video__content">
                    <div class="video__txt">
                        <h3 class="video__title">
                            <?php
                            if ($cfs->get('medium_top_player_title', $ID)) {
                                $medium_top_player_title = $cfs->get('medium_top_player_title', $ID);
                                echo $medium_top_player_title;
                            } ?>

                        </h3>
                        <p class="video__txt__min">
                            <?php
                            if ($cfs->get('medium_top_player_short_description', $ID)) {
                                $medium_top_player_short_description = $cfs->get('medium_top_player_short_description', $ID);
                                echo $medium_top_player_short_description;
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="intro__videos__small__item">
                <a target="_blank" class="intro__videos__img"
                   href="<?php
                   if ($cfs->get('medium_bottom_player_link', $ID)) {
                       $medium_bottom_player_link = $cfs->get('medium_bottom_player_link', $ID);
                       echo $medium_bottom_player_link;
                   } ?>">
                    <img src="<?php
                    if ($cfs->get('medium_bottom_player_image', $ID)) {
                        $medium_bottom_player_image = $cfs->get('medium_bottom_player_image', $ID);
                        echo $medium_bottom_player_image;
                    } ?>">
                </a>
                <div class="video__content">
                    <div class="video__txt">
                        <h3 class="video__title">
                            <?php
                            if ($cfs->get('medium_bottom_player_title', $ID)) {
                                $medium_bottom_player_title = $cfs->get('medium_bottom_player_title', $ID);
                                echo $medium_bottom_player_title;
                            } ?>
                        </h3>
                        <p class="video__txt__min">
                            <?php
                            if ($cfs->get('medium_bottom_player_short_description', $ID)) {
                                $medium_bottom_player_short_description = $cfs->get('medium_bottom_player_short_description', $ID);
                                echo $medium_bottom_player_short_description;
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<main class="main">
    <section class="container trend">
        <h3 class="section__title trend__title">trending categories</h3>
        <div class="trend__categories">
            <?php
            if ($cfs->get('all_categories')) {
                $loop = $cfs->get('all_categories');

                foreach ($loop as $pool => $path) {
                    ?>
                    <div class="trend__categories__box">
                        <a href="#" class="trend__categories__item">
                            <img class="trend__categories__item__poster" src="<?php echo $path['category_image']; ?>">
                            <h3 class="trend__categories__item__title"><?php echo $path['category_name']; ?></h3>
                        </a>
                    </div>


                    <?php
                }
            }
            ?>


        </div>
    </section>
    <div class="container wrapper">
        <section class="viral">
            <h3 class="section__title viral__title">viral feed</h3>
            <div class="viral__slider">

                <?php

                $args = array(
                    'numberposts' => 9,
                    'category' => 0,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );


                $posts = get_posts($args);

                foreach ($posts as $key => $post) {

                    ?>
                    <div class="viral__slider__item">
                        <a target="_blank" class="viral__slider__video__item" data-fancybox="group"
                           href="<?php
                           if ($cfs->get('link', $post->ID)) {
                               $link = $cfs->get('link', $post->ID);
                               echo $link;
                           }
                           ?>">

                            <?php echo the_post_thumbnail(); ?>


                        </a>
                        <article class="g--article viral__slider__article">
                            <a href="#" class="g--article__title viral__slider__title">
                                <?php echo the_title(); ?>
                            </a>
                            <!--                        <h4 class="g--article__name viral__slider__name">george steven mar 17</h4>-->
                            <p class="g--article__txt viral__slider__txt">
                                <?php
                                $content_post = get_post();
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                $trimmed_content = wp_trim_words($content, 20, '...');
                                echo $trimmed_content;
                                ?>
                            </p>
                        </article>
                    </div>

                    <?php

                }
                wp_reset_postdata();
                ?>


            </div>


            <section class="pop">
                <div class="pop__video">
                    <a target="_blank" class="intro__videos__img"
                       href="<?php
                       if ($cfs->get('second_pop_video_link', $ID)) {
                           $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                           echo $second_pop_video_link;
                       } ?>">


                        <img src="<?php
                        if ($cfs->get('second_pop_video_image', $ID)) {
                            $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                            echo $second_pop_video_image;
                        } ?>">
                    </a>
                </div>
            </section>

        </section>
        <aside class="aside">
            <div class="aside__tab">

                <ul class="aside__tab__menu">
                    <li class="aside__tab__handle aside__tab__handle--active" id="lastest">lastest</li>
                    <li class="aside__tab__handle" id="popular">popular</li>
                </ul>

                <div class="tab-content">
                    <div id="aside__lastest" class="aside__tab__col">
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div id="aside__popular" class="aside__tab__col hidden">
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                        <div class="aside__tab__item">
                            <a class="aside__tab__video"
                               href="<?php
                               if ($cfs->get('second_pop_video_link', $ID)) {
                                   $second_pop_video_link = $cfs->get('second_pop_video_link', $ID);
                                   echo $second_pop_video_link;
                               } ?>">


                                <img src="<?php
                                if ($cfs->get('second_pop_video_image', $ID)) {
                                    $second_pop_video_image = $cfs->get('second_pop_video_image', $ID);
                                    echo $second_pop_video_image;
                                } ?>">
                            </a>
                            <article class="g--article aside__tab__article">
                                <a href="#" class="g--article__title aside__tab__title">How Does an Editor Think And
                                    Feel?</a>
                                <h4 class="g--article__cat aside__tab__cat">fashion</h4>
                                <div class="article__views">
                                <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                                    <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <a href="#" class="aside__tab__all">view all</a>

            </div>
        </aside>
    </div>
    <section class="container trendPics">
        <div class="trendPics__slider">

            <?php
            $args = array(
                'post_type' => 'articles',
                'posts_per_page' => 4,
                'order' => 'DESC',
                'post_status' => 'publish',
                'suppress_filters' => 0
            );

            $posts = get_posts($args);
            foreach ($posts as $key => $post) {

                ?>

                <div class="trendPics__slider__item">
                    <div class="trendPics__slider__item__bg">
                        <?php echo get_the_post_thumbnail(); ?>

                    </div>
                    <article class="trendPics__slider__article">
                        <a href="#" class="trendPics__slider__title"><?php echo the_title(); ?></a>
                        <!--                    <h4 class="trendPics__slider__name">george steven mar 17</h4>-->
                        <p class="trendPics__slider__txt">

                            <?php
                            $content_post = get_post();
                            $content = $content_post->post_content;
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            $trimmed_content = wp_trim_words($content, 30, '...');
                            echo $trimmed_content;
                            ?>
                        </p>
                        <div class="article__views">
                            <span class="article__views__item">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                14 views
                            </span>
                            <span class="article__views__item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                0 comments
                            </span>
                        </div>
                    </article>
                </div>

                <?php

            };
            wp_reset_query();


            ?>

        </div>
    </section>
    <div class="container wrapper">
        <section class="viral">
            <h3 class="section__title viral__title">viral feed</h3>
            <div class="viral__slider">


                <?php

                $args = array(
                    'numberposts' => 9,
                    'category' => 0,
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );


                $posts = get_posts($args);

                foreach ($posts as $key => $post) {

                    ?>
                    <div class="viral__slider__item">
                        <a target="_blank" class="viral__slider__video__item" data-fancybox="group"
                           href="<?php
                           if ($cfs->get('link', $post->ID)) {
                               $link = $cfs->get('link', $post->ID);
                               echo $link;
                           }
                           ?>">

                            <?php echo the_post_thumbnail(); ?>


                        </a>
                        <article class="g--article viral__slider__article">
                            <a href="#" class="g--article__title viral__slider__title">
                                <?php echo the_title(); ?>
                            </a>
                            <!--                        <h4 class="g--article__name viral__slider__name">george steven mar 17</h4>-->
                            <p class="g--article__txt viral__slider__txt">
                                <?php
                                $content_post = get_post();
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                $trimmed_content = wp_trim_words($content, 20, '...');
                                echo $trimmed_content;
                                ?>
                            </p>
                        </article>
                    </div>

                    <?php

                }
                wp_reset_postdata();
                ?>
            </div>
            <section class="pop">
                <div class="pop__video">
                    <a target="_blank" class="intro__videos__img"
                       href="<?php
                       if ($cfs->get('third_pop_video_link', $ID)) {
                           $third_pop_video_link = $cfs->get('third_pop_video_link', $ID);
                           echo $third_pop_video_link;
                       } ?>">


                        <img src="<?php
                        if ($cfs->get('third_pop_video_image', $ID)) {
                            $third_pop_video_image = $cfs->get('third_pop_video_image', $ID);
                            echo $third_pop_video_image;
                        } ?>">
                    </a>
                </div>
            </section>

        </section>
        <aside class="aside">
        </aside>
    </div>
    <?php $banner_back_image = get_the_post_thumbnail_url(); ?>
    <div class="banner" style="background:url(<?php echo $banner_back_image; ?>) center;>

            <h4 class=" banner__title
    ">
    Banner advertising a featured
    Videos
    </h4>
    </div>
    <div class="container wrapper">
        <section class="viral">
            <h3 class="section__title viral__title">viral feed</h3>
            <div class="viral__slider">


                <?php

                $args = array(
                    'numberposts' => 9,
                    'category' => 0,
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );


                $posts = get_posts($args);

                foreach ($posts as $key => $post) {

                    ?>
                    <div class="viral__slider__item">
                        <a target="_blank" class="viral__slider__video__item" data-fancybox="group"
                           href="<?php
                           if ($cfs->get('link', $post->ID)) {
                               $link = $cfs->get('link', $post->ID);
                               echo $link;
                           }
                           ?>">

                            <?php echo the_post_thumbnail(); ?>


                        </a>
                        <article class="g--article viral__slider__article">
                            <a href="#" class="g--article__title viral__slider__title">
                                <?php echo the_title(); ?>
                            </a>
                            <!--                        <h4 class="g--article__name viral__slider__name">george steven mar 17</h4>-->
                            <p class="g--article__txt viral__slider__txt">
                                <?php
                                $content_post = get_post();
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                $trimmed_content = wp_trim_words($content, 20, '...');
                                echo $trimmed_content;
                                ?>
                            </p>
                        </article>
                    </div>

                    <?php

                }
                wp_reset_postdata();
                ?>
            </div>
            <section class="pop">
                <div class="pop__video">
                    <a target="_blank" class="intro__videos__img"
                       href="<?php
                       if ($cfs->get('fourth_pop_video_link', $ID)) {
                           $fourth_pop_video_link = $cfs->get('fourth_pop_video_link', $ID);
                           echo $fourth_pop_video_link;
                       } ?>">


                        <img src="<?php
                        if ($cfs->get('fourth_pop_video_image', $ID)) {
                            $fourth_pop_video_image = $cfs->get('fourth_pop_video_image', $ID);
                            echo $fourth_pop_video_image;
                        } ?>">
                    </a>
                </div>
            </section>

        </section>
        <aside class="aside">
        </aside>
    </div>
    <div class="container wrapper">
        <section class="viral">
            <h3 class="section__title viral__title">viral feed</h3>
            <div class="viral__slider">


                <?php

                $args = array(
                    'numberposts' => 9,
                    'category' => 0,
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );


                $posts = get_posts($args);

                foreach ($posts as $key => $post) {

                    ?>
                    <div class="viral__slider__item">
                        <a target="_blank" class="viral__slider__video__item" data-fancybox="group"
                           href="<?php
                           if ($cfs->get('link', $post->ID)) {
                               $link = $cfs->get('link', $post->ID);
                               echo $link;
                           }
                           ?>">

                            <?php echo the_post_thumbnail(); ?>


                        </a>
                        <article class="g--article viral__slider__article">
                            <a href="#" class="g--article__title viral__slider__title">
                                <?php echo the_title(); ?>
                            </a>
                            <!--                        <h4 class="g--article__name viral__slider__name">george steven mar 17</h4>-->
                            <p class="g--article__txt viral__slider__txt">
                                <?php
                                $content_post = get_post();
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                $trimmed_content = wp_trim_words($content, 20, '...');
                                echo $trimmed_content;
                                ?>
                            </p>
                        </article>
                    </div>

                    <?php

                }
                wp_reset_postdata();
                ?>
            </div>
            <section class="pop">
                <div class="pop__video">
                    <a target="_blank" class="intro__videos__img"
                       href="<?php
                       if ($cfs->get('fifth_pop_video_link', $ID)) {
                           $fifth_pop_video_link = $cfs->get('fifth_pop_video_link', $ID);
                           echo $fifth_pop_video_link;
                       } ?>">


                        <img src="<?php
                        if ($cfs->get('fifth_pop_video_image', $ID)) {
                            $fifth_pop_video_image = $cfs->get('fifth_pop_video_image', $ID);
                            echo $fifth_pop_video_image;
                        } ?>">
                    </a>
                </div>
            </section>

        </section>
        <aside class="aside">
        </aside>
    </div>
    <div class="trend__categories user__categories">
        <div class="trend__categories__box">
            <a href="#" class="trend__categories__item user__categories__item">
                <img class="trend__categories__item__poster" src="<?php bloginfo('template_directory'); ?>/img/3.jpg">
                <h3 class="trend__categories__item__title">animation</h3>
            </a>
        </div>
        <div class="trend__categories__box">
            <a href="#" class="trend__categories__item user__categories__item">
                <img class="trend__categories__item__poster" src="<?php bloginfo('template_directory'); ?>/img/4.jpg">
                <h3 class="trend__categories__item__title">animation</h3>
            </a>
        </div>
        <div class="trend__categories__box">
            <a href="#" class="trend__categories__item user__categories__item">
                <img class="trend__categories__item__poster" src="<?php bloginfo('template_directory'); ?>/img/5.jpg">
                <h3 class="trend__categories__item__title">animation</h3>
            </a>
        </div>
        <div class="trend__categories__box">
            <a href="#" class="trend__categories__item user__categories__item">
                <img class="trend__categories__item__poster" src="<?php bloginfo('template_directory'); ?>/img/6.jpg">
                <h3 class="trend__categories__item__title">animation</h3>
            </a>
        </div>
        <div class="trend__categories__box">
            <a href="#" class="trend__categories__item user__categories__item">
                <img class="trend__categories__item__poster" src="<?php bloginfo('template_directory'); ?>/img/7.jpg">
                <h3 class="trend__categories__item__title">animation</h3>
            </a>
        </div>

    </div>
    <div class="container wrapper">
        <section class="viral">
            <h3 class="section__title viral__title">viral feed</h3>
            <div class="viral__slider">


                <?php

                $args = array(
                    'numberposts' => 9,
                    'category' => 0,
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );


                $posts = get_posts($args);

                foreach ($posts as $key => $post) {

                    ?>

                    <div class="viral__slider__item">
                        <a target="_blank" class="viral__slider__video__item" data-fancybox="group"
                           href="<?php
                           if ($cfs->get('link', $post->ID)) {
                               $link = $cfs->get('link', $post->ID);
                               echo $link;
                           }
                           ?>">


                            <?php echo the_post_thumbnail(); ?>


                        </a>
                        <article class="g--article viral__slider__article">
                            <a href="#" class="g--article__title viral__slider__title">
                                <?php echo the_title(); ?>
                            </a>
                            <!--                        <h4 class="g--article__name viral__slider__name">george steven mar 17</h4>-->
                            <p class="g--article__txt viral__slider__txt">

                                <?php
                                $content_post = get_post();
                                $content = $content_post->post_content;
                                echo $content;
                                ?>
                            </p>
                        </article>
                    </div>

                    <?php

                }
                wp_reset_postdata();
                ?>


            </div>
            <section class="pop">
                <div class="pop__video">
                    <a target="_blank" class="intro__videos__img"
                       href="https://www.youtube.com/embed/mxD7QEt85ms">
                        <img src="<?php bloginfo('template_directory'); ?>/img/22.jpg">
                    </a>
                </div>
            </section>

        </section>
        <aside class="aside">
        </aside>
    </div>


</main>
<div class="intro--footer__banner intro__banner">
    <div class="intro--footer__banner__video intro__banner__video">

        <video width="100%" height="auto" autoplay>
            <source src="<?php
            if ($cfs->get('footer_avtoplay_video', $post->ID)) {
                $footer_avtoplay_video = $cfs->get('footer_avtoplay_video', $post->ID);
                echo $footer_avtoplay_video;
            } ?>">
        </video>



    </div>
</div>

<?php get_footer(); ?>
