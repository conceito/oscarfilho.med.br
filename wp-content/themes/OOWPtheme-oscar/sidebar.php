<?php
/**
 * page sidebar only
 */
?>

<?php 
if ( is_active_sidebar( 'sidebar-2' ) ) :
?>
    <br/>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
<?php 
endif; 
?>