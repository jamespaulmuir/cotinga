<?php

/**
 * items actions.
 *
 * @package    dspace
 * @subpackage items
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemsActions extends sfActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $this->items = Doctrine::getTable('Item')
                        ->createQuery('a')
                        ->limit(20)
                        ->execute();
    }

    public function executeShow(sfWebRequest $request)
    {
        $id = $request->getParameter('item_id');
        $this->item = Doctrine::getTable('Item')->getWithMetadata($id);


        /*
        $this->bitstreams = Doctrine::getTable('Bitstream')
                        ->createQuery('bits')
                        ->leftJoin('bits.Bundle2bitstreams b2b')
                        ->leftJoin('b2b.Bundle bi')
                        ->leftJoin('bi.Item2bundles i2b')
                        ->leftJoin('i2b.Item i')
                        ->where('i.item_id = ?', $id)
                        ->execute();
        */

        $this->bundles = Doctrine::getTable('Bundle')
                ->createQuery('b')
                ->leftJoin('b.Bitstreams bi')
                ->leftJoin('bi.Format bf')
                ->leftJoin('b.Items i')
                ->where('i.item_id = ? AND bf.internal = false', $id)
                ->execute();
        
        $this->forward404Unless($this->item);
    }

}
