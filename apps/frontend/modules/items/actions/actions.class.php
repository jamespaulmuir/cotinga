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
        $this->show_full_record = $request->getParameter('full');
        $id = $request->getParameter('item_id');
        $this->item = Doctrine::getTable('Item')->getWithMetadata($id);

        $this->bundles = Doctrine::getTable('Bundle')
                ->createQuery('b')
                ->leftJoin('b.Bitstreams bi')
                ->leftJoin('bi.Format bf')
                ->leftJoin('b.Items i')
                ->where('i.item_id = ? AND bf.internal = false', $id)
                ->execute();
        
        $response = $this->getResponse();
        $response->setTitle($this->item->metadata['dc.title'][0]);

        $this->forward404Unless($this->item);
    }


    public function executeSolr()
    {
        $id = $request->getParameter('item_id');
        $this->item = Doctrine::getTable('Item')->find($id);

        $this->forward404Unless($this->item);

    }

}
