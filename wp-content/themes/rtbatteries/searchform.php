<?php

?>

<form role="search" method="get" class="searchform extra" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" placeholder="<?php pll_e('Search'); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
    <button type="submit" class="btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M20.8002 20.8257C22.2813 19.3831 23.2002 17.3727 23.2002 15.1491C23.2002 10.759 19.6185 7.2002 15.2002 7.2002C10.7819 7.2002 7.2002 10.759 7.2002 15.1491C7.2002 19.5391 10.7819 23.098 15.2002 23.098C17.3806 23.098 19.3572 22.2313 20.8002 20.8257ZM20.8002 20.8257L24.8002 24.8002" stroke="#333333" stroke-width="1.60294" stroke-linecap="round"/>
        </svg>
    </button>
</form>