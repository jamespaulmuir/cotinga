<?php

/**
 * Community2community filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommunity2communityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_comm_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ParentCommunity'), 'add_empty' => true)),
      'child_comm_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChildCommunity'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'parent_comm_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ParentCommunity'), 'column' => 'community_id')),
      'child_comm_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ChildCommunity'), 'column' => 'community_id')),
    ));

    $this->widgetSchema->setNameFormat('community2community_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Community2community';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'parent_comm_id' => 'ForeignKey',
      'child_comm_id'  => 'ForeignKey',
    );
  }
}
