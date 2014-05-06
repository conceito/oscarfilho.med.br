<?php
/**
 *
 * @package OOWPtheme
 * @subpackage models
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright   Copyright (c) 2013 Bruno Barros
 *
 */
class ThePost extends Wpost {

    /**
     * Taxonomy para categoria
     * category (default), false
     * @var string
     */
    protected $categoryTax = 'category';

    /**
     * Taxonomy para tags
     * post_tag (default), false
     * @var string
     */
    protected $tagTax = 'post_tag';

    public function __construct($post = null, $mainQuery = true)
    {
        parent::__construct($post, $mainQuery);
    }

    /**
     * Retorna o breadcrumb do post ou página
     * @param bool $removeLast
     * @internal param bool|string $overWriteHome Nome da página inicial
     * @return array                 Array com 'title' e 'url' das páginas
     */
    public function breadcrumb($removeLast = true) {

        $b = array();

        if (!is_front_page())
        {
            $b[] = array(
                'title' => 'Blog',
                'url' => site_url('blog')
            );

            if ( is_category() || is_single() )
            {
                if($this->category)
                {
                    foreach($this->category as $c)
                    {
                        $b[] = array(
                            'title' => $c->name,
                            'url' => $c->permalink
                        );
                    }
                }

                if ( is_single() )
                {
                    $b[] = array(
                        'title' => $this->title,
                        'url' => false
                    );
                }

            }
            elseif( is_date() )
            {
                $b[] = array(
                    'title' => get_the_time('F \d\e Y'),
                    'url' => false
                );
            }
            elseif ( is_page() && $this->post_parent )
            {
                for ($i = count($this->ancestors)-1; $i >= 0; $i--)
                {
                    $b[] = array(
                        'id' => $this->ancestors[$i],
                        'title' => get_the_title($this->ancestors[$i]),
                        'url' => get_permalink($this->ancestors[$i])
                    );
                }

                $b[] = array(
                    'title' => $this->title,
                    'url' => false
                );

            }
            elseif (is_page())
            {
                $b[] = array(
                    'title' => $this->title,
                    'url' => false
                );
            }
            elseif (is_404())
            {
                $b[] = array(
                    'title' => "404",
                    'url' => false
                );
            }
        }
        else
        {
            $b[] = array(
                'title' => 'Blog',
                'url' => false
            );
        }

        if($removeLast)
        {
            array_pop($b);
        }

        return $b;
    }
}