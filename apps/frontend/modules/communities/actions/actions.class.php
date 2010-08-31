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
    $this->communitys = Doctrine::getTable('Community')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->community = Doctrine::getTable('Community')->find(array($request->getParameter('community_id')));
    $this->forward404Unless($this->community);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CommunityForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CommunityForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($community = Doctrine::getTable('Community')->find(array($request->getParameter('community_id'))), sprintf('Object community does not exist (%s).', $request->getParameter('community_id')));
    $this->form = new CommunityForm($community);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($community = Doctrine::getTable('Community')->find(array($request->getParameter('community_id'))), sprintf('Object community does not exist (%s).', $request->getParameter('community_id')));
    $this->form = new CommunityForm($community);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($community = Doctrine::getTable('Community')->find(array($request->getParameter('community_id'))), sprintf('Object community does not exist (%s).', $request->getParameter('community_id')));
    $community->delete();

    $this->redirect('communities/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $community = $form->save();

      $this->redirect('communities/edit?community_id='.$community->getCommunityId());
    }
  }
}
