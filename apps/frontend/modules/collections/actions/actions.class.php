<?php

/**
 * collections actions.
 *
 * @package    dspace
 * @subpackage collections
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class collectionsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->collections = Doctrine::getTable('Collection')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {

    // sorting
    if ($request->getParameter('sort') && $request->getParameter('sort'))
    {
      $this->sort = array($request->getParameter('sort'), $request->getParameter('sort_type'));
    }
    else {
        $this->sort = array('asc', 'id');
    }

    $this->collection = Doctrine::getTable('Collection')->find(array($request->getParameter('collection_id')));

    

    $this->pager = new sfDoctrinePager('Item', 20);
    $this->pager->setQuery(
            Doctrine::getTable('Item')->createQuery('i')
            ->leftJoin('i.Collections col')
            ->leftJoin('i.Metadatavalues m')
            ->leftJoin('m.Metadatafieldregistry r')
            ->where('col.collection_id = ?',$this->collection->collection_id));
    $this->pager->setPage($this->getRequestParameter('page',1));
    $this->pager->init();

    $response = $this->getResponse();
    $response->setTitle($this->collection->getName());

    $this->forward404Unless($this->collection);
  }

  
}
