<?php

/**
 * Community
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    dspace
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Community extends BaseCommunity
{

    public function getPath()
    {
        $parents = array();
        $parent = $this;
        print_R($this->getParentCommunities()->toArray());
        die();
        while($parent = $parent->getParentCommunities()->getFirst()){
            print_r($parent->toArray());
        }
        
        return $parents;
    }
    
    public function getSlug()
    {
        return Cotinga::slugify($this->name);
    }
}
