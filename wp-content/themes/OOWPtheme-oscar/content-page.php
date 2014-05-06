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

	<article id="post-<?php echo $p->ID; ?>" <?php post_class(); ?>>

        <?php if(is_subpage()):
//            d($p->parent);
            $parent = new ThePost(get_post($p->post_parent), false);
//         $parent = $p->parent;
         ?>
            <p><a href="<?php echo $parent->permalink?>">voltar para <?php echo $parent->title?></a></p>
        <?php endif;?>

		<header class="entry-header">
            <?php edit_post_link( 'Editar', '<span class="edit-link">', '</span>' ); ?>

			<h1 class="page-title"><?php echo $p->title ?></h1>

		</header><!-- .entry-header -->

	    <?php echo $p->excerpt;?>
	    <?php echo $p->content;?>

        <?php
        /**
         * children pages
         * show title and excerpt
         */
        $children = $p->children;
        if($children):
            $i = 0;
            foreach($children as $c):

//                $c = new ThePost($cPage, false);

//                dd($cPage);
        ?>
                <div href="<?php echo $c->permalink?>" class="children-page <?php echo ($i%2==0)?'odd':'even'?>">
                    <h4 class="title" data-toggle="collapse" data-target="#collapsible-<?php echo $c->ID?>">
                    <?php echo $c->title?>
                    </h4>

                    <div id="collapsible-<?php echo $c->ID?>" class="children-excerpt collapse -in">
                    <?php //echo $c->excerpt?>
                    <?php echo $c->content?>
                    </div>
                </div>
        <?php
            $i++;
            endforeach;
        endif;
        ?>

		<footer class="entry-meta">

		</footer><!-- .entry-meta -->

	</article><!-- #post -->
