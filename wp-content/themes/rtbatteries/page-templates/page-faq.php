<?php
/**
 * Template name: FAQ
 * Template post type: page
 */
get_header();
?>

<div class="faq-page">
    <section class="scroll-y">
        <div class="container">
            <p class="title title_3 center"><?php the_title(); ?></p>
        </div>
        <div class="faq">
            <div class="container editor">
                <?php 
                    if(have_rows('faq_repeater')) {
                        while(have_rows('faq_repeater')) {
                            the_row();
                            echo '<div class="faq_item">';
                                echo '<div class="faq_title">';
                                    echo '<p>'.get_sub_field('title').'</p>';
                                    echo '<svg class="open" xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none"><path d="M17.9097 2V17M17.9097 17V32M17.9097 17H2.90967M17.9097 17H32.9097" stroke="#333333" stroke-width="4" stroke-linecap="round"/></svg>';
                                    echo '<svg class="close" xmlns="http://www.w3.org/2000/svg" width="35" height="4" viewBox="0 0 35 4" fill="none"><path d="M2.90967 2H32.9097" stroke="#333333" stroke-opacity="0.3" stroke-width="4" stroke-linecap="round"/></svg>';
                                echo '</div>';
                            
                                echo '<div class="faq_content_cover">';
                                    echo '<div class="faq_content">'.get_sub_field('content').'</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();