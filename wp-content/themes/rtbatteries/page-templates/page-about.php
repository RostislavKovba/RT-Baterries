<?php
/**
 * Template name: About us
 */
get_header();
if(!empty(get_field('strings'))) {
    $strings = get_field('strings');
}
?>

<div class="about-us-page">
    <section class="scroll-y">
        <p class="title title_3 center"><?php the_title(); ?></p>
        <div class="container">
            <div class="about-wrapper items-general-wrapper">
                <div class="item-general" data-target="about-popup-first">
                    <p class="title title-regular"><?= $strings['string_1']; ?></p>
                    <?php
                        if (has_post_thumbnail()) {
                            echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" title="'.get_the_title().'">';
                        }
                    ?>
                    <div class="heading">
                        <div class="btn-round btn-round-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M20.3337 11.0003H11.0003M11.0003 11.0003H1.66699M11.0003 11.0003V20.3337M11.0003 11.0003V1.66699" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="item-general" data-target="about-popup-last">
                    <?php 
                        if(!empty(get_field('about_us_one_img'))) {
                            $about_us_one_img = get_field('about_us_one_img');
                            echo '<img src="'.$about_us_one_img['url'].'" alt="'.$about_us_one_img['alt'].'" title="'.$about_us_one_img['title'].'">';
                        }
                    ?>
                    <p class="title title-team"><?= $strings['string_2']; ?></p>
                    <div class="heading">
                        <p><?= pll__('Meet our team'); ?></p>
                        <div class="btn-round btn-round-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M20.3337 11.0003H11.0003M11.0003 11.0003H1.66699M11.0003 11.0003V20.3337M11.0003 11.0003V1.66699" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay about-popup about-popup-first">
                <div class="wrapper">
                    <div class="heading">
                        <h1 class="title title_3 center"><?= $strings['string_3']; ?></h1>
                        <div class="btn-round btn-round-popup closePopup">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51" fill="none">
                                <circle cx="25" cy="25.9863" r="25" fill="white"/>
                                <path d="M33.2526 17.7368L25.0031 25.9863M25.0031 25.9863L16.7535 34.2359M25.0031 25.9863L33.2526 34.2359M25.0031 25.9863L16.7535 17.7368" stroke="#333333" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="content editor">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="overlay about-popup about-popup-last">
                <div class="wrapper">
                    <div class="heading">
                        <?php 
                            if(!empty(get_field('about_us_two_img'))) {
                                $about_us_two_img = get_field('about_us_two_img');
                                echo '<img class="team_logo" src="'.$about_us_two_img['url'].'" alt="'.$about_us_two_img['alt'].'" title="'.$about_us_two_img['title'].'">';
                            }
                        ?>
                        <h1 class="title title_3 center"><?= $strings['string_4'] ?></h1>
                        <div class="btn-round btn-round-popup closePopup">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51" fill="none">
                                <circle cx="25" cy="25.9863" r="25" fill="white"/>
                                <path d="M33.2526 17.7368L25.0031 25.9863M25.0031 25.9863L16.7535 34.2359M25.0031 25.9863L33.2526 34.2359M25.0031 25.9863L16.7535 17.7368" stroke="#333333" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="content editor">
                        <?php 
                            the_field('add_editor');
                            if(have_rows('team_repeater')) {
                                echo '<ul class="team_list">';
                                    while(have_rows('team_repeater')) {
                                        the_row();
                                        echo '<li>';
                                            if(!empty(get_sub_field('img'))) {
                                                $img = get_Sub_field('img');
                                                echo '<img src="'.$img['url'].'" alt="'.$img['alt'].'" title="'.$img['title'].'">';
                                            }
                                            echo '<p>'.get_sub_field('title').'</p>';
                                            echo '<span>'.get_sub_field('sub_title').'</span>';
                                        echo '</li>';
                                    }
                                echo '</ul>';
                            }
                           
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();