<?php
$languages      = pll_the_languages( ['raw'=>true] );
$current_lang   = pll_current_language( 'slug' );
?>

<div class="dropdown ">
    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
        <path d="M5.78725 10.6673C5.49244 11.5014 5.33203 12.399 5.33203 13.334C5.33203 17.7523 8.91375 21.334 13.332 21.334C17.7503 21.334 21.332 17.7523 21.332 13.334C21.332 12.399 21.1716 11.5014 20.8768 10.6673M5.78725 10.6673C6.88548 7.56014 9.84878 5.33398 13.332 5.33398C16.8153 5.33398 19.7786 7.56014 20.8768 10.6673M5.78725 10.6673H20.8768M5.78725 16.0007H20.8768M13.9987 5.36137C13.9987 5.36137 16.6654 8.66732 16.6654 13.334C16.6654 18.0007 13.9987 21.334 13.9987 21.334M12.6654 5.36137C12.6654 5.36137 9.9987 8.66732 9.9987 13.334C9.9987 18.0007 12.6654 21.3066 12.6654 21.3066" stroke="white" stroke-width="1.33333"/>
    </svg>
    <select class="desktop">
        <?php
//        foreach( $languages as $lang ) {
//	        printf(
//		        '<option value="1" data-display="%2$s">%2$s</option>',
//		        $lang['url'],
//		        $lang['name'],
//	        );
//            debug($lang);
//        }
        ?>
        <option value="1" data-display="English">English</option>
        <option value="1">Ukrainian</option>
        <option value="1">German</option>
    </select>
</div>

