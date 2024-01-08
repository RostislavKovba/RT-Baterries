<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rtbatteries
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&family=Rubik:wght@400;600&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="header-bg">
        <div class="container">

            <div class="burger">
                <svg  viewBox="0 0 30 30" fill="none">
                    <path d="M6 11H24" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M6 15H20" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M6 19H16" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="wrap">
                <div class="logo desktop">
                    <?php the_custom_logo(); ?>

                    <?php get_template_part('/template-parts/links', 'lang'); ?>

                    <div class="phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="33" viewBox="0 0 25 33" fill="none">
                            <path d="M11.0747 5.04307L10.6642 4.3466C10.3872 3.87608 10.2489 3.64092 10.1071 3.45767C9.06157 2.1066 7.19963 1.63062 5.58714 2.30154C5.36843 2.39254 5.12561 2.52899 4.63951 2.80426C2.00086 4.45038 2.19947 10.0685 2.36922 10.9009C2.36922 10.9009 2.40358 13.6533 6.23072 20.155C10.0579 26.6567 12.8809 28.7595 12.8809 28.7595C14.4869 30.057 18.3921 32.2975 21.1648 30.8792C21.6509 30.604 21.8937 30.4661 22.0834 30.3259C23.4821 29.2916 23.9923 27.4714 23.3222 25.9078C23.2313 25.6957 23.0931 25.4602 22.8161 24.9897L22.4062 24.2933C21.9602 23.5356 21.6648 23.0347 21.3934 22.6737C21.1619 22.3659 20.8271 22.1536 20.4728 21.9835C18.9418 21.2488 15.9188 21.9441 14.3275 21.3314C14.1628 21.268 14.0019 21.1939 13.8453 21.1098C13.6852 21.0238 13.532 20.9288 13.3941 20.8122C12.9647 20.4495 11.9505 19.4975 11.016 17.9099C9.80624 15.8547 9.70921 14.4038 9.70685 14.3655V14.363C9.68172 13.9124 9.72552 13.4659 9.83144 13.0346C10.2224 11.4425 12.2179 9.24246 12.1934 7.61997C12.1898 7.37983 12.167 7.13924 12.0824 6.91591C11.9115 6.46518 11.5964 5.92937 11.0747 5.04307Z" stroke="white" stroke-width="2.66667"/>
                        </svg>
	                    <?php rtb_contact_info('phone'); ?>
                    </div>

                </div>

            </div>

	        <?php
	        wp_nav_menu([
		        'theme_location'  => 'menu-primary',
		        'menu_id'         => 'menu-primary',
		        'container'       => false,
		        'menu_class'      => 'nav scroll-y',
	        ]);
	        ?>

            <div class="nav_mobile">
                <div class="container">
                    <div class="top_wrapper">
	                    <?php the_custom_logo(); ?>

                        <svg  viewBox="0 0 20 20" fill="none" class="close">
                            <path d="M14.5 5.5L5.5 14.5M5.5 5.5L14.5 14.5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div class="nav_account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                            <path d="M19 26.2C23.3492 26.2 26.875 22.5735 26.875 18.1C26.875 13.6265 23.3492 10 19 10C14.6508 10 11.125 13.6265 11.125 18.1C11.125 22.5735 14.6508 26.2 19 26.2ZM19 26.2C27.4456 26.3888 29.0981 29.4022 29.4214 33.6781M19 26.2C10.541 26.2 8.89672 29.3383 8.57711 33.677M29.4214 33.6781C34.008 30.4157 37 25.0573 37 19C37 9.05887 28.9411 1 19 1C9.05887 1 1 9.05887 1 19C1 25.0566 3.9913 30.4145 8.57711 33.677M29.4214 33.6781C26.4804 35.7699 22.8839 37 19 37C15.1155 37 11.5183 35.7695 8.57711 33.677" stroke="white" stroke-width="2"/>
                        </svg>

                        <div class="nav_links">
                            <p class="line_1">
                                <a href="#">Log in</a> | <a href="#">Sign in</a>
                            </p>
                            <p class="line_2">Log in for advanced features</p>
                        </div>
                    </div>
                </div>

	            <?php
	            wp_nav_menu([
		            'theme_location'  => 'menu-mobile',
		            'menu_id'         => 'menu-mobile',
		            'container'       => false,
		            'menu_class'      => 'container',
	            ]);
	            ?>

                <div class="nav_contacts container">
                    <p class="nav_title">Do you need help?</p>

                    <p>
                        <svg viewBox="0 0 30 30" fill="none">
                            <path d="M13.9463 8.46172L13.7154 8.06997C13.5596 7.80529 13.4818 7.67302 13.402 7.56994C12.8139 6.80996 11.7666 6.54222 10.8596 6.91962C10.7365 6.9708 10.6 7.04756 10.3265 7.2024C8.84228 8.12834 8.954 11.2885 9.04948 11.7568C9.04948 11.7568 9.06881 13.305 11.2216 16.9622C13.3743 20.6194 14.9623 21.8022 14.9623 21.8022C15.8657 22.5321 18.0623 23.7924 19.622 22.9946C19.8954 22.8398 20.032 22.7622 20.1387 22.6833C20.9255 22.1016 21.2125 21.0777 20.8355 20.1981C20.7844 20.0788 20.7066 19.9464 20.5508 19.6817L20.3203 19.29C20.0694 18.8638 19.9033 18.582 19.7506 18.3789C19.6203 18.2058 19.4321 18.0864 19.2328 17.9907C18.3716 17.5774 16.6711 17.9686 15.776 17.6239C15.6834 17.5882 15.5928 17.5466 15.5048 17.4993C15.4147 17.4509 15.3286 17.3974 15.251 17.3319C15.0094 17.1278 14.439 16.5923 13.9133 15.6993C13.2328 14.5433 13.1782 13.7272 13.1769 13.7056V13.7042C13.1628 13.4507 13.1874 13.1996 13.247 12.957C13.4669 12.0614 14.5894 10.8239 14.5756 9.91123C14.5735 9.77616 14.5607 9.64082 14.5131 9.5152C14.417 9.26166 14.2398 8.96027 13.9463 8.46172Z" stroke="#333333" stroke-width="2"/>
                        </svg>
	                    <?php rtb_contact_info('phone'); ?>
                    </p>

                    <p>
                        <svg viewBox="0 0 30 31" fill="none">
                            <path d="M9.375 11L12.5039 13.0859C13.7138 13.8925 14.3188 14.2958 15 14.2958C15.6812 14.2958 16.2862 13.8925 17.4961 13.0859L20.625 11M13.2 23.75H17.55C20.0702 23.75 21.3304 23.75 22.293 23.2595C23.1397 22.8281 23.8281 22.1397 24.2595 21.293C24.75 20.3304 24.75 19.0702 24.75 16.55V14.45C24.75 11.9298 24.75 10.6696 24.2595 9.70704C23.8281 8.86031 23.1397 8.1719 22.293 7.74047C21.3304 7.25 20.0702 7.25 17.55 7.25H13.2C10.6798 7.25 8.66965 7.25 7.70704 7.74047C6.86031 8.1719 6.1719 8.86031 5.74047 9.70704C5.25 10.6696 5.25 11.9298 5.25 14.45V16.55C5.25 19.0702 5.25 20.3304 5.74047 21.293C6.1719 22.1397 6.86031 22.8281 7.70704 23.2595C8.66965 23.75 10.6798 23.75 13.2 23.75Z" stroke="#333333" stroke-width="2" stroke-linecap="round"/>
                        </svg>
	                    <?php rtb_contact_info('email'); ?>
                    </p>
                </div>
            </div>

            <div class="account">
                <div class="account_links">
                    <a href="#" class="search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
                            <path d="M27.2992 27.3337C29.2432 25.4402 30.4492 22.8016 30.4492 19.8831C30.4492 14.1212 25.7482 9.4502 19.9492 9.4502C14.1502 9.4502 9.44922 14.1212 9.44922 19.8831C9.44922 25.6451 14.1502 30.3161 19.9492 30.3161C22.8109 30.3161 25.4053 29.1785 27.2992 27.3337ZM27.2992 27.3337L32.5492 32.5502" stroke="white" stroke-width="2.13725" stroke-linecap="round"/>
                        </svg>
                    </a>
                    <a href="#" class="wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
                            <path d="M19.1614 30.7347L19.9188 29.9808L19.1614 30.7347ZM10.3428 21.8745L9.58537 22.6283L10.3428 21.8745ZM22.8394 30.7347L23.5968 31.4885L22.8394 30.7347ZM19.7215 12.4515L20.4789 11.6977L20.4789 11.6977L19.7215 12.4515ZM31.658 21.8745L30.9006 21.1206L31.658 21.8745ZM22.2793 12.4515L23.0367 13.2054H23.0367L22.2793 12.4515ZM21.0004 13.7365L20.243 14.4903C20.4435 14.6918 20.7161 14.8051 21.0004 14.8051C21.2847 14.8051 21.5573 14.6918 21.7578 14.4903L21.0004 13.7365ZM19.9188 29.9808L11.1002 21.1206L9.58537 22.6283L18.404 31.4885L19.9188 29.9808ZM22.0819 29.9808C21.484 30.5816 20.5167 30.5816 19.9188 29.9808L18.404 31.4885C19.8374 32.9287 22.1634 32.9287 23.5968 31.4885L22.0819 29.9808ZM11.1002 13.2054C13.2723 11.023 16.7919 11.023 18.9641 13.2054L20.4789 11.6977C17.4713 8.67593 12.593 8.67593 9.58537 11.6977L11.1002 13.2054ZM9.58537 11.6977C6.58056 14.7167 6.58056 19.6093 9.58537 22.6283L11.1002 21.1206C8.92529 18.9355 8.92529 15.3906 11.1002 13.2054L9.58537 11.6977ZM30.9006 21.1206L22.0819 29.9808L23.5968 31.4885L32.4154 22.6283L30.9006 21.1206ZM30.9006 13.2054C33.0755 15.3906 33.0755 18.9355 30.9006 21.1206L32.4154 22.6283C35.4202 19.6093 35.4202 14.7167 32.4154 11.6977L30.9006 13.2054ZM23.0367 13.2054C25.2088 11.023 28.7285 11.023 30.9006 13.2054L32.4154 11.6977C29.4078 8.67593 24.5295 8.67593 21.5219 11.6977L23.0367 13.2054ZM21.7578 14.4903L23.0367 13.2054L21.5219 11.6977L20.243 12.9826L21.7578 14.4903ZM18.9641 13.2054L20.243 14.4903L21.7578 12.9826L20.4789 11.6977L18.9641 13.2054Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
                            <path d="M13.2021 13.4541H30.715C32.5685 13.4541 33.9402 15.2208 33.5234 17.0713L31.9714 23.9619C31.6697 25.3018 30.5052 26.251 29.1631 26.251H18.3771C17.035 26.251 15.8705 25.3018 15.5687 23.9619L13.2021 13.4541ZM13.2021 13.4541L12.8983 12.5202C12.506 11.3144 11.4046 10.501 10.164 10.501H8.39844M29.3984 16.801H26.2484" stroke="white" stroke-width="2.13725" stroke-linecap="round"/>
                            <path d="M20.0288 30.001C20.0288 30.8294 19.3779 31.501 18.5749 31.501C17.772 31.501 17.1211 30.8294 17.1211 30.001C17.1211 29.1725 17.772 28.501 18.5749 28.501C19.3779 28.501 20.0288 29.1725 20.0288 30.001Z" fill="white"/>
                            <path d="M29.7211 30.001C29.7211 30.8294 29.0702 31.501 28.2673 31.501C27.4643 31.501 26.8134 30.8294 26.8134 30.001C26.8134 29.1725 27.4643 28.501 28.2673 28.501C29.0702 28.501 29.7211 29.1725 29.7211 30.001Z" fill="white"/>
                        </svg>
                    </a>
                </div>

                <a href="<?php the_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" fill="none" class="cabinet">
                        <path d="M25.668 35.6C31.467 35.6 36.168 30.7647 36.168 24.8C36.168 18.8353 31.467 14 25.668 14C19.869 14 15.168 18.8353 15.168 24.8C15.168 30.7647 19.869 35.6 25.668 35.6ZM25.668 35.6C36.9288 35.8518 39.132 39.8696 39.5631 45.5708M25.668 35.6C14.3893 35.6 12.1969 39.7843 11.7708 45.5694M39.5631 45.5708C45.6787 41.221 49.668 34.0764 49.668 26C49.668 12.7452 38.9228 2 25.668 2C12.4131 2 1.66797 12.7452 1.66797 26C1.66797 34.0755 5.65637 41.2194 11.7708 45.5694M39.5631 45.5708C35.6419 48.3599 30.8465 50 25.668 50C20.4886 50 15.6924 48.3593 11.7708 45.5694" stroke="white" stroke-width="2.66667"/>
                    </svg>
                </a>

            </div>

            <div class="search-block">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <div class="menu">
        <div class="container zero-y">
            <p class="menu_title el-hover">All BATTERIES</p>

            <?php get_template_part('/template-parts/menu', 'categories'); ?>
        </div>
    </div>

    <div class="menu_mobile">
        <div class="container zero-y">
            <svg  viewBox="0 0 20 20" fill="none" class="close">
                <path d="M14.5 5.5L5.5 14.5M5.5 5.5L14.5 14.5" stroke="black" stroke-width="2" stroke-linecap="round"/>
            </svg>

            <p class="menu_title el-hover">All BATTERIES</p>

            <?php get_template_part('/template-parts/menu', 'categories', ['mobile' => true]); ?>
        </div>
    </div>
</header>

<div>
    <?php if (!is_front_page()) : ?>
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    <?php endif; ?>
</div>