<?php
/*
Template Name: Landing
*/

get_header();
?>

<div class="site-page-content">
   <?php
   while ( have_posts() ) : the_post() ;
       the_content();

       beecolor_link_page();
    endwhile;
    ?>
</div>

<?php
get_footer();
