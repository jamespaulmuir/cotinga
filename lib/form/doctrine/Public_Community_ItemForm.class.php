<?php

/**
 * Public_Community_Item form.
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class Public_Community_ItemForm extends BasePublic_Community_ItemForm
{
  public function configure()
  {
      unset($this['logo_bitstream_id']);
  }
}
