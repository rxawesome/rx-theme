<?php /* Template Name: Parent Redirect Page */ ?>

<?php

global $post;

$redirectPage = get_field('child_redirect', $post->ID);

wp_redirect($redirectPage);

?>