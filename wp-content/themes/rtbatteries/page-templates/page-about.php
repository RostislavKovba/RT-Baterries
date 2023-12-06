<?php
/**
 * Template name: About us
 * Template post type: page
 */
get_header();
?>

<div class="about-us-page">
    <section class="scroll-y">
        <p class="title title_3 center"><?php the_title(); ?></p>
        <div class="container">
            <div class="about-wrapper items-general-wrapper">
                <div class="item-general" data-target="about-popup-first">
                    <p class="title title-regular"><?= pll__('WHY you must choose us.'); ?></p>
                    <img src="<?= get_template_directory_uri(); ?>/images/menu_image 1.webp" alt="#" title="#">
                    <div class="heading">
                        <div class="btn-round btn-round-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M20.3337 11.0003H11.0003M11.0003 11.0003H1.66699M11.0003 11.0003V20.3337M11.0003 11.0003V1.66699" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="item-general" data-target="about-popup-last">
                    <img src="<?= get_template_directory_uri(); ?>/images/RTB.png" alt="#" title="#">
                    <p class="title title-team"><?= pll__('Team'); ?></p>
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
                        <h1 class="title title_3 center"><?= pll__('WHY you must choose us.'); ?></h1>
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
                        <img class="team_logo" src="<?= get_template_directory_uri(); ?>/images/RTB33.png" alt="#" title="#">
                        <h1 class="title title_3 center"><?= pll__('Our teAM'); ?></h1>
                        <div class="btn-round btn-round-popup closePopup">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51" fill="none">
                                <circle cx="25" cy="25.9863" r="25" fill="white"/>
                                <path d="M33.2526 17.7368L25.0031 25.9863M25.0031 25.9863L16.7535 34.2359M25.0031 25.9863L33.2526 34.2359M25.0031 25.9863L16.7535 17.7368" stroke="#333333" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="content editor">
                        <?php the_field('add_editor'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();