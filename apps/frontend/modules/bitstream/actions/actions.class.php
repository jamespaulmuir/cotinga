<?php

/**
 * bitstream actions.
 *
 * @package    dspace
 * @subpackage bitstream
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bitstreamActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->setLayout('previewlayout');
    $this->forward404Unless($this->bitstream = Doctrine::getTable('Bitstream')->find($request->getParameter('bitstream_id')));

    $this->bitstreams = $this->bitstream->getBundles()->getFirst()->getBitstreams();
    
    $this->item = Doctrine::getTable('Item')->getWithMetadata($this->bitstream->getBundles()->getFirst()->getItems()->getFirst()->item_id);
    
  }
}
