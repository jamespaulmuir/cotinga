<?php

/**
 * items actions.
 *
 * @package    dspace
 * @subpackage items
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class itemsActions extends autoitemsActions
{
    public function executeIndex(sfWebRequest $request)
  {
    $this->item_list = Doctrine::getTable('Item')
      ->createQuery('a')
            ->limit(10)
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {

    $this->item = $this->getRoute()->getObject();

  }

  public function executeBitstreams(sfWebRequest $request)
  {
      $id = $request->getParameter('item_id');
      $this->bitstreams = Doctrine::getTable('Bitstream')
              ->createQuery('bits')
              ->leftJoin('bits.Bundle2bitstreams b2b')
              ->leftJoin('b2b.Bundle bi')
              ->leftJoin('bi.Item2bundles i2b')
              ->leftJoin('i2b.Item i')
              ->where('i.item_id = ?', $id)
              ->execute();
  }

  public function executeBundles(sfWebRequest $request)
  {
      $id = $request->getParameter('item_id');
      $this->bundles = Doctrine::getTable('Item')
              ->createQuery('i')
              ->leftJoin('i.Item2bundles ib')
              ->leftJoin('ib.Bundle b')
              ->where('i.item_id = ?', $id)
              ->execute();
  }
}
