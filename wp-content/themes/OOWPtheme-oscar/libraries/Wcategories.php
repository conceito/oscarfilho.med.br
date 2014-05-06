<?php 
/**
 * Wrapper para looping de categorias
 * 
 * <code>
 * // instancia coleção
 * </code>
 * 
 * @link http://codex.wordpress.org/Function_Reference/get_categories
 * @see Wcategory
 * @package OOWPtheme
 * @subpackage libraries
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright   Copyright (c) 2013 Bruno Barros
 * 
 */
class Wcategories {

	protected $args = array(
		/**
		 * (string) Type of category to retrieve
		 * post - default
		 * Note: type=link has been deprecated from WordPress 3.0 onwards. Use taxonomy=link_category instead.
		 */
		'type'         => 'post',
		/**
		 * (integer) Display all categories that are descendants (i.e. children & grandchildren) 
		 * of the category identified by its ID. There is no default for this parameter. 
		 * If the parameter is used, the hide_empty parameter is set to false.
		 */
		'child_of'     => 0,
		/**
		 * (integer) Display only categories that are direct descendants (i.e. children only) 
		 * of the category identified by its ID. This does NOT work like the 'child_of' parameter. 
		 * There is no default for this parameter.
		 */
		'parent'       => '',
		/**
		 * (string) Sort categories alphabetically or by unique category ID. 
		 * The default is sort by Category ID. Valid values:
		 * - id
		 * - name - default
		 * - slug
		 * - count
		 * - term_group
		 */
		'orderby'      => 'name',
		/**
		 * (string) Sort order for categories (either ascending or descending). 
		 * The default is ascending. Valid values:
		 * - asc - default
		 * - desc
		 */
		'order'        => 'ASC',
		/**
		 * (boolean) Toggles the display of categories with no posts. 
		 * The default is 1 for true or you can add '0' for false (show empty categories). Valid values:
		 * - 1 - default
		 * - 0
		 */
		'hide_empty'   => 1,
		/**
		 * (boolean) When true, the results will include sub-categories that are empty, 
		 * as long as those sub-categories have sub-categories that are not empty. 
		 * The default is true. Valid values:
		 * - 1 (true) - default
		 * - 0 (false)
		 */
		'hierarchical' => 1,
		/**
		 * (string) Excludes one or more categories from the list generated by wp_list_categories. 
		 * This parameter takes a comma-separated list of categories by unique ID, in ascending order. 
		 */
		'exclude'      => '',
		/**
		 * (string) Only include certain categories in the list generated by wp_list_categories. 
		 * This parameter takes a comma-separated list of categories by unique ID, in ascending order. 
		 * - list - default.
		 * - none
		 */
		'include'      => '',
		/**
		 * (string) The number of categories to return
		 */
		'number'       => '',
		/**
		 * (string or array) Taxonomy to return. 
		 * Valid values:
		 * - category - default
		 * - taxonomy - or any registered taxonomy
		 */
		'taxonomy'     => 'category',
		/**
		 * (boolean) Calculates link or post counts by including items from child categories. 
		 * Valid values:
		 * - 1 (true)
		 * - 0 (false) - default
		 */
		'pad_counts'   => false 
	); 

	/**
	 * Ao retornar todas as categorias, faz cache.
	 * @var array
	 */
	protected $items = array();

	/**
	 * Opção que verifica se existem items já retornados na memória
	 * @var boolean
	 */
	protected $useCachedItems = true;


	public function __construct($options = array())
	{
		$this->args = array_merge($this->args, $options);
	}

	/**
	 * Retorna array de objetos:
	 * $category->term_id
     * $category->name
     * $category->slug
     * $category->term_group
     * $category->term_taxonomy_id
     * $category->taxonomy
     * $category->description
     * $category->parent
     * $category->count
     * $category->cat_ID
     * $category->category_count
     * $category->category_description
     * $category->cat_name
     * $category->category_nicename
     * $category->category_parent
	 * @return [type] [description]
	 */
	private function fetch()
	{
		// verifica se tem cache
		if($this->useCachedItems && ! empty($this->items))
		{
			return $this->items;
		}

		// faz consulta
		$categories = get_categories( $this->args );
		if (count($categories) == 0 || !$categories)
        {
            return false;
        }

        $this->items = array();
        foreach ($categories as $c)
        {
            $this->items[] = new Wcategory($c, $this->args);
        }

		return $this->items;
	}

	/**
	 * Retorna todas as categorias
	 * @return array Array de objetos
	 */
	public function getAll()
	{		
		return $this->fetch();
	}
}