<?php
$is_mobile = isset($args['mobile']);

$term_args = [
    'taxonomy'  => 'product_cat',
    'parent'    => 0
];

$categories_lvl1 = get_terms($term_args);
?>

<div class="menu_content">
    <?php if ($is_mobile) : ?>
        <p class="menu_current">CMOS BATTERIES</p>
    <?php endif; ?>

    <ul class="first">

        <?php foreach ($categories_lvl1 as $cat_lvl1) : ?>

            <?php
            $cat_lvl1_link = get_term_link( $cat_lvl1 );
            $term_args['parent'] = $cat_lvl1->term_id;
            $categories_lvl2 = get_terms($term_args);
            ?>

            <li>
                <a href="<?php echo $cat_lvl1_link; ?>"><?php echo $cat_lvl1->name ?></a>
                <ul class="second">

                    <?php foreach ($categories_lvl2 as $cat_lvl2) : ?>

                        <?php
                        $cat_lvl2_link = get_term_link( $cat_lvl2 );
                        $term_args['parent'] = $cat_lvl2->term_id;
                        $categories_lvl3 = get_terms($term_args);
                        ?>

                        <li>
                            <a href="<?php echo $cat_lvl2_link; ?>"><?php echo $cat_lvl2->name ?></a>
                            <ul class="third">

                                <?php foreach ($categories_lvl3 as $cat_lvl3) : ?>

                                    <?php
                                    $cat_lvl3_link = get_term_link( $cat_lvl3 );
                                    $term_args['parent'] = $cat_lvl3->term_id;
                                    $categories_lvl4 = get_terms($term_args);
                                    ?>

                                    <li>
                                        <a href="<?php echo $cat_lvl3_link; ?>"><?php echo $cat_lvl3->name ?></a>
                                        <ul class="fourth">

                                            <?php foreach ($categories_lvl4 as $cat_lvl4) : ?>

                                                <?php $cat_lvl4_link = get_term_link( $cat_lvl4 ); ?>

                                                <li>
                                                    <a href="<?php echo $cat_lvl4_link; ?>"><?php echo $cat_lvl4->name ?></a>
                                                </li>

                                            <?php endforeach; ?>

                                        </ul>
                                    </li>

                                <?php endforeach; ?>

                            </ul>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </li>

        <?php endforeach; ?>
    </ul>

    <?php if (!$is_mobile) : ?>

        <div class="menu_image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/00_22SLIMPN2032M 1.png" alt="#">
            <div class="btn-secondary sm plus">
                <p>VIEW ALL CMOS</p>
                <svg viewBox="0 0 14 14" fill="none">
                    <path d="M12.0472 7.17914H6.73456M6.73456 7.17914H1.42188M6.73456 7.17914V12.4918M6.73456 7.17914V1.86646" stroke="#333333" stroke-width="1.93189" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

    <?php endif; ?>
</div>

