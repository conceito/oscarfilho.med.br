<?php
/**
 * Wrapper para a classe de Template Lite
 * 
 * <code>
 * $tpl = new Wtmpl();
 * $tpl->assign("name","Fred Irving");
 * $tpl->assign(array('var1', 'var2'));
 * echo $tpl->fetch("tmp.html");
 * </code>
 * 
 * @package OOWPtheme
 * @subpackage libraries
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright   Copyright (c) 2013 Bruno Barros
 * 
 */
include libraries_folder('template_lite/src/class.template.php');
class Wtmpl extends Template_Lite
{
    protected $tmpl = null;
    
    public function __construct()
    {        
        $this->checkCaheFolder();
        
        $this->compile_dir = WP_CONTENT_DIR . "/cache/";
        $this->template_dir = TEMPLATEPATH . "/templates";
        $this->force_compile = false;
        $this->compile_check = true;
        $this->cache = false;
        $this->cache_lifetime = 3600;
        $this->config_overwrite = false;
        
        return $this;
        
    }
    
    /**
     * Garante que a pasta de cache existe.
     * @throws Exception
     */
    public function checkCaheFolder()
    {
        if(! is_dir(WP_CONTENT_DIR . "/cache/"))
        {
            mkdir(WP_CONTENT_DIR . "/cache/", 0777);
        }
        if(! is_dir(WP_CONTENT_DIR . "/cache/"))
        {
            throw new Exception('Pasta de cache não pôde se criada em wp-content/cache.');
        }
    }
}