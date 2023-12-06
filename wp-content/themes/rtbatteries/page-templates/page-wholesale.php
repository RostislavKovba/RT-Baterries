<?php
/**
 * Template name: Wholesale
 */
get_header();
?>

<div class="wholesale-page">
    <section>
        <div class="container">
            <p class="title title_3"><?= the_title(); ?></p>
        </div>
        <div class="container wholesale-wrapper">
            <div class="wholesale_form">
                <!--<form class="regular">
                    <fieldset>
                        <p class="row row-full">
                            <label>Your Name *</label>
                            <input type="text" name="" placeholder="Enter Name Here">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Business Name *</label>
                            <input type="text" name="" placeholder="Enter Bussines Name Here">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Email Address *</label>
                            <input type="text" name="" placeholder="yourmail@mail.com">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Phone</label>
                            <input type="tel" name="" placeholder="___-___-____">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full">
                            <label>Business Address *</label>
                            <input type="text" name="" placeholder="City, Street Name">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-full row-select">
                            <label>Type of Business</label>
                            <select>
                                <option value="1" data-display="Open List">Open List</option>
                                <option value="1">Open List 3333</option>
                                <option value="1">Open List 5555555</option>
                            </select>
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-select">
                            <label>Country / Region *</label>
                            <select>
                                <option value="1" data-display="Open List"> Choose Country / Region </option>
                                <option value="1">Open List 3333</option>
                                <option value="1">Open List 5555555</option>
                            </select>
                        </p>
                        <p class="row row-select">
                            <label>State *</label>
                            <select>
                                <option value="1" data-display="Open List">  Choose State</option>
                                <option value="1">Open List 3333</option>
                                <option value="1">Open List 5555555</option>
                            </select>
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row">
                            <label>City *</label>
                            <input type="text" name="" placeholder="Enter Your City">
                        </p>
                        <p class="row">
                            <label>Zipcode *</label>
                            <input type="text" name="" placeholder="_____">
                        </p>
                    </fieldset>
                    <p class="row row-full">
                        <label>Commentary</label>
                        <textarea placeholder="Write your message..."></textarea>
                    </p>
                    <button type="submit" class="btn-primary lg dark">Send</button>
                </form>-->
                <?= do_shortcode('[contact-form-7 id="c885921" title="Wholesale"]'); ?>
            </div>
            <div class="wholesale_info">
                <p class="title title_2"><?= pll__('Business Opportunity'); ?></p>
                <div class="editor">
                    <?php the_content(); ?>
                </div>
                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="#" title>
            </div>
        </div>
    </section>
    <script>
       jQuery(document).ready(function($) {
            $('.wholesale_form').find('br').remove();
            $('.wholesale_form').find('.wpcf7-form-control-wrap > *, .wpcf7-submit').unwrap();
            $('.wholesale_form').find('textarea').css('height', '180px');
        });
    </script>

</div>

<?php
get_footer();