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
      ->orderBy('upper(a.name)')
      ->leftJoin('a.Community2communitys_ForChildComm c')
      ->where('c.id IS NULL')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $community_id = $request->getParameter('community_id');

    $this->community = Doctrine::getTable('Community')
            ->createQuery('c')       
            ->where('c.community_id = ?', $community_id)
            ->leftJoin('c.Community2communitys_ForParentComm subs')
            ->leftJoin('subs.Community_ForChildComm subc')
            ->leftJoin('c.Bitstream logo')
            ->fetchOne();

    $this->collections = Doctrine::getTable('Collection')
            ->createQuery('col')
            ->leftJoin('col.Community2collections com2col')
            ->where('com2col.community_id = ?', $community_id )
            ->execute();

    $this->subcommunities = $this->community->getCommunity2communitys_ForParentComm();
    
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
