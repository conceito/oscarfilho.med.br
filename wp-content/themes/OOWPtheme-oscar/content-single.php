<?php
/**
 *
 *content of single post
 */
global $p;

?>

<article id="post-<?php echo $p->ID; ?>" <?php post_class(); ?>>
    <?php if (is_sticky() && is_home() && !is_paged()) : ?>

    <?php endif; ?>

    <header class="entry-header">

        <?php if ($p->thumb): ?>
            <div class="middle-line-box">

                <div class="flip-link flip-small">
             <span class="fliping">
                <img class="media-object" src="<?php echo $p->thumb ?>" alt="<?php echo $p->title ?>">
             </span>
                </div>
            </div>
        <?php endif; ?>

        <?php edit_post_link('Editar', '<span class="edit-link">', '</span>'); ?>

        <h1 class="post-title"><?php echo $p->title ?></h1>

    </header>
    <!-- .entry-header -->

    <?php echo $p->content; ?>

    <footer class="entry-meta">


    </footer>
    <!-- .entry-meta -->

</article><!-- #post -->
