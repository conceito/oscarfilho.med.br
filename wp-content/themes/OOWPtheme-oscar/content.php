<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $p;

?>

<article id="post-<?php echo $p->ID; ?>" <?php post_class('post-media'); ?>>

    <?php if (is_sticky() && is_home() && !is_paged()) : ?>
    <?php endif; ?>

    <div class="media">

        <?php if ($p->thumb): ?>
            <a class="pull-left flip-small flip-link" href="<?php echo $p->permalink ?>">
             <span class="fliping">
                <img class="media-object" src="<?php echo $p->thumb ?>" alt="<?php echo $p->title ?>">
             </span>
            </a>
        <?php else: ?>
            <div class="pull-left">
            <div class="flip-holder"></div>

            </div>
        <?php endif; ?>

        <div class="media-body">
            <h2 class="entry-title media-heading">
                <a href="<?php echo $p->permalink ?>" title="" rel="bookmark"><?php echo $p->title ?></a>
            </h2>
            <p class="published-at">Publicado em <?php echo $p->date?></p>
        </div>
    </div>

</article><!-- #post -->
