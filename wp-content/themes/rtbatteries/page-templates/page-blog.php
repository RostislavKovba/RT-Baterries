<?php
/**
 * Template name: Blog
 */
get_header();
?>

    <section class="scroll-y">
        <p class="title title_3 center"><?php the_title(); ?></p>
        <div class="container">
            

        <?php
            echo '<div class="blog-wrapper items-general-wrapper">';

            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                }

//                echo '<ul class="pagination">';
//                for ($i = 1; $i <= $total_pages; $i++) {
//                    echo '<li>';
//                    echo '<a href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a>';
//                    echo '</li>';
//                }
//
//                echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="10" viewBox="0 0 22 10" fill="none">';
//                echo '<path d="M17.3145 1L21 5M21 5L17.3145 9M21 5L1 5" stroke="#333333" stroke-opacity="0.6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
//                echo '</svg>';
//
//                echo '</ul>';
            } else {
                get_template_part( 'template-parts/content', 'none' );
            }

            echo '</div>';
        ?>


            <!---<ul class="pagination">
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
            </ul>---->

        </div>
    </section>

<?php
get_footer();