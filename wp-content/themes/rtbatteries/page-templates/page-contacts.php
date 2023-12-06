<?php
/**
 * Template name: Contact us
 */
get_header();
if(!empty(get_field('strings'))) {
    $strings = get_field('strings');
}
?>

<div class="contacts-page">
    <section>
        <div class="container">
            <p class="title title_3 center"><?php the_title(); ?></p>
            <p class="subtitle center"><?= $strings['string_1']; ?></p>
        </div>
        <div class="container contacts-wrapper">
            <div class="contacts_info">
                <p class="contacts_title"><?= $strings['string_2']; ?></p>
                <p class="subtitle"><?= $strings['string_3']; ?></p>
                <ul class="contacts">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M18.6602 9.48102C17.5909 8.09917 15.7083 7.63153 14.0953 8.30266C13.8696 8.39655 13.6338 8.53009 13.3096 8.71373L13.2759 8.7328L13.2574 8.74328L13.2394 8.75453C12.5218 9.20223 12.0508 9.88465 11.7392 10.5718C11.4262 11.2618 11.2441 12.0208 11.1387 12.7187C10.9438 14.0087 10.987 15.267 11.0706 15.789C11.0722 15.8122 11.0744 15.8388 11.0772 15.8689C11.0861 15.9617 11.1019 16.0872 11.1299 16.2468C11.1858 16.5661 11.2906 17.022 11.4865 17.6258C11.878 18.8325 12.6351 20.6342 14.1003 23.1233C15.5662 25.6137 16.8505 27.2795 17.7833 28.3339C18.2497 28.8611 18.6279 29.235 18.8967 29.4825C19.0311 29.6062 19.138 29.6982 19.2149 29.7619C19.2533 29.7938 19.2842 29.8185 19.3072 29.8366L19.3319 29.8558C20.0048 30.3975 21.1297 31.1184 22.3912 31.5697C23.6345 32.0144 25.2144 32.2675 26.6181 31.5495L26.637 31.5398L26.6555 31.5294L26.7038 31.502C27.0188 31.3237 27.2526 31.1914 27.4462 31.0482C28.856 30.0057 29.391 28.1493 28.6998 26.5367C28.6054 26.3162 28.47 26.0863 28.2916 25.7835L28.2629 25.7348L27.9555 25.2124L27.9309 25.1707C27.6207 24.6436 27.3728 24.2224 27.1333 23.904C26.8179 23.4846 26.398 23.2402 26.0764 23.0859C25.6321 22.8726 25.1376 22.7874 24.6977 22.7473C24.2508 22.7066 23.777 22.7066 23.3514 22.7086L23.2413 22.7091C22.8421 22.7112 22.4856 22.713 22.1579 22.693C21.7951 22.6708 21.5499 22.6251 21.394 22.5651C21.3104 22.5329 21.2277 22.4949 21.1461 22.4511C21.0601 22.4049 21.0109 22.3712 20.9799 22.345C20.7209 22.1262 20.043 21.4955 19.4128 20.4249C18.6754 19.1722 18.5752 18.2916 18.5674 18.2114C18.5548 17.9768 18.5777 17.7426 18.6338 17.5143C18.677 17.3383 18.7784 17.099 18.9491 16.7773C19.0675 16.554 19.1964 16.3321 19.3371 16.0899C19.4 15.9815 19.4654 15.869 19.5332 15.7505C19.7405 15.3882 19.9623 14.9839 20.1306 14.5765C20.296 14.176 20.4415 13.6992 20.434 13.1996C20.4306 12.9774 20.4104 12.6607 20.2859 12.3323C20.1267 11.9122 19.8507 11.4435 19.501 10.8497L19.4566 10.7743L19.1488 10.2522L19.1156 10.1957C18.9402 9.89756 18.8061 9.66947 18.6602 9.48102Z" fill="#00E04F"/>
                        </svg>
                        <a href="tel:<?= get_field('phone', 'contact'); ?>" target="_blank"><?= get_field('phone', 'contact'); ?></a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M27.8148 9.9688C27.1429 9.62649 26.4036 9.47623 25.5184 9.4039C24.6506 9.333 23.5723 9.333 22.2035 9.33301L17.3107 9.33301C15.9281 9.33301 14.6475 9.333 13.5782 9.4029C12.5321 9.47128 11.5526 9.61161 10.8516 9.9688C9.75395 10.5281 8.86156 11.4205 8.3023 12.5181C7.95998 13.1899 7.80972 13.9292 7.73739 14.8145C7.66649 15.6823 7.6665 16.7605 7.6665 18.1293V20.5367C7.6665 21.9055 7.66649 22.9838 7.73739 23.8515C7.80972 24.7368 7.95998 25.4761 8.3023 26.148C8.86156 27.2456 9.75395 28.138 10.8516 28.6972C11.5526 29.0544 12.5321 29.1947 13.5782 29.2631C14.6475 29.333 15.9282 29.333 17.3108 29.333H22.2035C23.5723 29.333 24.6506 29.333 25.5184 29.2621C26.4036 29.1898 27.1429 29.0395 27.8148 28.6972C28.9124 28.138 29.8048 27.2456 30.364 26.148C30.7064 25.4761 30.8566 24.7368 30.9289 23.8515C30.9998 22.9838 30.9998 21.9055 30.9998 20.5367V18.1293C30.9998 16.7605 30.9998 15.6822 30.9289 14.8145C30.8566 13.9292 30.7064 13.1899 30.364 12.5181C29.8048 11.4205 28.9124 10.5281 27.8148 9.9688ZM12.3898 13.8708C12.6451 13.4878 13.1625 13.3843 13.5454 13.6396L17.0219 15.9573C17.7092 16.4155 18.17 16.7213 18.5513 16.9197C18.9145 17.1086 19.1364 17.1617 19.3332 17.1617C19.5299 17.1617 19.7518 17.1086 20.115 16.9197C20.4963 16.7213 20.9571 16.4155 21.6444 15.9573L25.1209 13.6396C25.5039 13.3843 26.0213 13.4878 26.2765 13.8708C26.5318 14.2537 26.4284 14.7711 26.0454 15.0264L22.532 17.3687C21.8913 17.7959 21.3553 18.1532 20.8842 18.3982C20.386 18.6574 19.8934 18.8284 19.3332 18.8284C18.773 18.8284 18.2803 18.6574 17.7821 18.3982C17.311 18.1532 16.7751 17.7959 16.1344 17.3687L12.6209 15.0264C12.238 14.7711 12.1345 14.2537 12.3898 13.8708Z" fill="#00E04F"/>
                        </svg>
                        <a href="email:<?= get_field('email', 'contact'); ?>" target="_blank"><?= get_field('email', 'contact'); ?></a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M17.6667 16.5453C17.6667 15.181 18.7377 14.1234 20 14.1234C21.2623 14.1234 22.3333 15.181 22.3333 16.5453C22.3333 17.9096 21.2623 18.9673 20 18.9673C18.7377 18.9673 17.6667 17.9096 17.6667 16.5453Z" fill="#00E04F"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7641 31.3084C18.2412 31.7417 18.6395 32.0886 18.9195 32.328L19.2857 32.7007C19.6778 33.0998 20.3222 33.0998 20.7143 32.7007L21.0805 32.328C21.3605 32.0886 21.7588 31.7417 22.2359 31.3084C23.1887 30.4429 24.4625 29.2266 25.7395 27.8276C27.013 26.4325 28.3102 24.8335 29.2943 23.2025C30.2662 21.5919 31 19.8414 31 18.168C31 12.0187 26.0936 7 20 7C13.9064 7 9 12.0187 9 18.168C9 19.8414 9.73383 21.5919 10.7057 23.2025C11.6898 24.8335 12.987 26.4325 14.2605 27.8276C15.5375 29.2266 16.8113 30.4429 17.7641 31.3084ZM15.6667 16.5453C15.6667 14.1328 17.5804 12.1288 20 12.1288C22.4196 12.1288 24.3333 14.1328 24.3333 16.5453C24.3333 18.9578 22.4196 20.9618 20 20.9618C17.5804 20.9618 15.6667 18.9578 15.6667 16.5453Z" fill="#00E04F"/>
                        </svg>
                        <a href="<?= get_field('location_link', 'contact'); ?>" target="_blank"><?= get_field('location_name', 'contact'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="contacts_form">
                <?= do_shortcode('[contact-form-7 id="0b2d81e" title="Contacts"]'); ?>
                <!--<form class="regular">
                    <fieldset>
                        <p class="row">
                            <label>First Name</label>
                            <input type="text" name="" placeholder="Enter Name Here">
                        </p>
                        <p class="row">
                            <label>First Name</label>
                            <input type="text" name="" placeholder="Enter Name Here">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row">
                            <label>Email</label>
                            <input type="email" name="" placeholder="yourmail@mail.com">
                        </p>
                        <p class="row">
                            <label>Phone</label>
                            <input type="tel" name="" placeholder="___-___-____">
                        </p>
                    </fieldset>
                    <fieldset>
                        <p class="row row-radio">
                            <input type="radio" name="newsletter" id="r-message">
                            <label>Send a message</label>
                        </p>
                        <p class="row row-radio">
                            <input type="radio" name="newsletter" id="r-newsletter">
                            <label>Subscribe to our newsletter</label>
                        </p>
                    </fieldset>
                    <p class="row row-full">
                        <label>Message</label>
                        <textarea placeholder="Write your message..."></textarea>
                    </p>
                    <button type="submit" class="btn-primary lg bright-inversed">Send message</button>
                </form>-->
            </div>
        </div>
    </section>
    <script>
       jQuery(document).ready(function($) {
            $('.contacts_form').find('br').remove();
            $('.contacts_form').find('.wpcf7-form-control-wrap > *, .wpcf7-submit').unwrap();
            $('.contacts_form').find('textarea').css('height', '180px');
        });

    </script>

    <div class="moving-shape">
        <svg class="a_1 " xmlns="http://www.w3.org/2000/svg" width="369" height="322" viewBox="0 0 369 322" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M183.792 23.5786C200.049 27.2313 216.716 26.8373 233.319 25.4329C259.987 23.1771 288.872 -0.885009 311.906 12.7415C332.329 24.8232 318.17 59.8709 328.023 81.4575C337.504 102.23 372.656 113.778 368.249 136.183C363.029 162.719 317.426 163.378 307 188.331C298.222 209.342 328.952 234.792 318.581 255.063C309.095 273.603 281.889 277.374 261.076 278.093C240.718 278.796 223.061 253.142 203.562 259.034C180.708 265.94 176.145 300.376 154.437 310.314C133.062 320.099 103.568 327.368 84.5855 313.5C64.8806 299.105 77.8354 263.859 63.6587 243.996C49.9733 224.822 17.8031 224.328 6.27646 203.783C-4.79248 184.055 2.2918 159.154 3.37978 136.558C4.49656 113.364 -0.63023 87.0728 12.8079 68.1357C26.6639 48.6097 55.1348 46.9789 75.6758 34.6777C92.8509 24.3922 104.907 3.09932 124.822 1.05491C145.933 -1.11238 163.086 18.9261 183.792 23.5786Z" fill="#FFC553"/>
        </svg>

        <svg  class="a_2 " xmlns="http://www.w3.org/2000/svg" width="315" height="331" viewBox="0 0 315 331" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M172.224 3.59618C220.696 -9.96399 277.556 20.9868 304.566 63.4581C329.247 102.268 300.755 150.24 294.459 195.8C289.592 231.018 296.36 269.712 272.43 296.006C247.742 323.132 208.866 331.763 172.224 330.106C137.25 328.524 108.239 308.94 80.6916 287.333C47.6021 261.377 -3.29527 237.634 1.00144 195.8C5.32398 153.714 69.6005 152.908 97.7425 121.318C129.852 85.2738 125.737 16.6013 172.224 3.59618Z" fill="#77A366"/>
        </svg>

        <svg class="a_3 " xmlns="http://www.w3.org/2000/svg" width="314" height="331" viewBox="0 0 314 331" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M171.693 3.55322C220.165 -10.007 277.025 20.9438 304.035 63.4152C328.716 102.225 300.224 150.197 293.928 195.757C289.061 230.975 295.829 269.669 271.899 295.963C247.211 323.089 208.335 331.72 171.693 330.063C136.718 328.481 107.707 308.897 80.1604 287.29C47.0708 261.334 -3.82652 237.591 0.47019 195.757C4.79273 153.671 69.0693 152.865 97.2113 121.275C129.321 85.2308 125.206 16.5583 171.693 3.55322Z" fill="#DAF8CF"/>
        </svg>

        <svg class="a_4 " xmlns="http://www.w3.org/2000/svg" width="370" height="322" viewBox="0 0 370 322" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M184.478 23.4565C200.735 27.1093 217.401 26.7153 234.004 25.3108C260.672 23.055 289.558 -1.00708 312.592 12.6194C333.015 24.7011 318.856 59.7488 328.708 81.3354C338.19 102.108 373.342 113.656 368.934 136.061C363.715 162.597 318.112 163.256 307.686 188.209C298.908 209.22 329.638 234.67 319.266 254.941C309.781 273.481 282.574 277.252 261.761 277.971C241.404 278.673 223.747 253.02 204.248 258.912C181.394 265.817 176.83 300.254 155.122 310.192C133.748 319.977 104.253 327.246 85.2711 313.378C65.5662 298.983 78.521 263.737 64.3442 243.874C50.6588 224.7 18.4887 224.206 6.96201 203.661C-4.10694 183.933 2.97735 159.032 4.06533 136.436C5.18211 113.242 0.0553173 86.9508 13.4934 68.0136C27.3494 48.4876 55.8204 46.8569 76.3614 34.5556C93.5364 24.2702 105.593 2.97725 125.507 0.932842C146.619 -1.23445 163.771 18.8041 184.478 23.4565Z" fill="#FFDE9C"/>
        </svg>

        <svg class="a_5 " xmlns="http://www.w3.org/2000/svg" width="315" height="331" viewBox="0 0 315 331" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M171.763 3.95263C220.235 -9.60754 277.095 21.3432 304.105 63.8146C328.787 102.624 300.294 150.596 293.998 196.156C289.131 231.374 295.899 270.069 271.969 296.362C247.281 323.489 208.405 332.12 171.763 330.462C136.789 328.88 107.778 309.297 80.2307 287.689C47.1411 261.734 -3.75621 237.991 0.540502 196.156C4.86304 154.07 69.1396 153.265 97.2816 121.675C129.391 85.6303 125.276 16.9578 171.763 3.95263Z" fill="#A9CE9B"/>
        </svg>
    </div>
</div>

<?php
get_footer();