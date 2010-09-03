<?php

/**
 * Community2community form base class.
 *
 * @method Community2community getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommunity2communityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'parent_comm_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ParentCommunity'), 'add_empty' => true)),
      'child_comm_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChildCommunity'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'parent_comm_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ParentCommunity'), 'required' => false)),
      'child_comm_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChildCommunity'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('community2community[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Community2community';
  }

}
