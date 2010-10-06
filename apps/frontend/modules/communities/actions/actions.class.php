<?php

/**
 * communities actions.
 *
 * @package    dspace
 * @subpackage communities
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class communitiesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout('homelayout');
    $this->communitys = Doctrine::getTable('Community')
      ->createQuery('a')
      ->orderBy('upper(a.name)')
      ->leftJoin('a.ParentCommunities c')
      ->where('c.community_id IS NULL')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $community_id = $request->getParameter('community_id');

    $this->community = Doctrine::getTable('Community')
            ->createQuery('c')       
            ->where('c.community_id = ?', $community_id)
            ->leftJoin('c.ChildCommunities subc')
            ->leftJoin('c.LogoBitstream logo')
            ->fetchOne();

    $this->collections = Doctrine::getTable('Collection')
            ->createQuery('col')
            ->leftJoin('col.Communities c')
            ->where('c.community_id = ?', $community_id )
            ->execute();

    $this->subcommunities = $this->community->getChildCommunities();

    $response = $this->getResponse();
    $response->setTitle($this->community->getName());
    
    $this->forward404Unless($this->community && $this->community->getSlug() == $request->getParameter('slug'));
  }

  
}
