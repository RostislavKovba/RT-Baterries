<?php
/**
<<<<<<< HEAD
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rtbatteries
 */

get_header();
?>

<section class="scroll-y">
    <p class="title title_3 center"><?php the_title(); ?></p>
    <div class="container">
        <div class="blog-wrapper items-general-wrapper">

            <?php
            if ( have_posts() ) :
                while ( have_posts() ) {
                    the_post();

                    get_template_part( 'template-parts/content', get_post_type() );
                }

                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

        </div>

        <ul class="pagination">
            <li>
                <a href="/">1</a>
            </li>
            <li>
                <a href="/">2</a>
            </li>
            <li>
                <a href="/">3</a>
            </li>
            <li>
                <a href="/">4</a>
            </li>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="10" viewBox="0 0 22 10" fill="none">
                <path d="M17.3145 1L21 5M21 5L17.3145 9M21 5L1 5" stroke="#333333" stroke-opacity="0.6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </ul>
    </div>
</section>


<?php
get_footer();
=======
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
>>>>>>> a9fbbbdef1d773625a98e8b76b8e2cb7704d7b80
