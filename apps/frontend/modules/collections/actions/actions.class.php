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
            ->leftJoin('i.Collection2items col2item')
            ->leftJoin('i.Metadatavalues m')
            ->leftJoin('m.Metadatafieldregistry r')
            ->where('col2item.collection_id = ?',$this->collection->collection_id));
    $this->pager->setPage($this->getRequestParameter('page',1));
    $this->pager->init();

    $this->forward404Unless($this->collection);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CollectionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CollectionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($collection = Doctrine::getTable('Collection')->find(array($request->getParameter('collection_id'))), sprintf('Object collection does not exist (%s).', $request->getParameter('collection_id')));
    $this->form = new CollectionForm($collection);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($collection = Doctrine::getTable('Collection')->find(array($request->getParameter('collection_id'))), sprintf('Object collection does not exist (%s).', $request->getParameter('collection_id')));
    $this->form = new CollectionForm($collection);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($collection = Doctrine::getTable('Collection')->find(array($request->getParameter('collection_id'))), sprintf('Object collection does not exist (%s).', $request->getParameter('collection_id')));
    $collection->delete();

    $this->redirect('collections/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $collection = $form->save();

      $this->redirect('collections/edit?collection_id='.$collection->getCollectionId());
    }
  }
}
