<?php

/**
 * Public_Community2community_Item form base class.
 *
 * @method Public_Community2community_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Community2community_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'parent_comm_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item_ForParentComm'), 'add_empty' => true)),
      'child_comm_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item_ForChildComm'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'parent_comm_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item_ForParentComm'), 'required' => false)),
      'child_comm_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item_ForChildComm'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_community2community_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Community2community_Item';
  }

}
