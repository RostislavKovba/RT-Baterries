<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rtbatteries
 */

?>

<a href="<?php the_permalink(); ?>" class="item-general">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
    <div class="heading">
        <p><?php the_title(); ?></p>
        <div class="btn-round btn-round-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M20.3337 11.0003H11.0003M11.0003 11.0003H1.66699M11.0003 11.0003V20.3337M11.0003 11.0003V1.66699" stroke="white" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
</a>
