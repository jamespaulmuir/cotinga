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
    $this->public_community_items = Doctrine::getTable('Public_Community_Item')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->public_community_item = Doctrine::getTable('Public_Community_Item')->find(array($request->getParameter('community_id')));
    $this->forward404Unless($this->public_community_item);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new Public_Community_ItemForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new Public_Community_ItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($public_community_item = Doctrine::getTable('Public_Community_Item')->find(array($request->getParameter('community_id'))), sprintf('Object public_community_item does not exist (%s).', $request->getParameter('community_id')));
    $this->form = new Public_Community_ItemForm($public_community_item);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($public_community_item = Doctrine::getTable('Public_Community_Item')->find(array($request->getParameter('community_id'))), sprintf('Object public_community_item does not exist (%s).', $request->getParameter('community_id')));
    $this->form = new Public_Community_ItemForm($public_community_item);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($public_community_item = Doctrine::getTable('Public_Community_Item')->find(array($request->getParameter('community_id'))), sprintf('Object public_community_item does not exist (%s).', $request->getParameter('community_id')));
    $public_community_item->delete();

    $this->redirect('communities/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $public_community_item = $form->save();

      $this->redirect('communities/edit?community_id='.$public_community_item->getCommunityId());
    }
  }
}
