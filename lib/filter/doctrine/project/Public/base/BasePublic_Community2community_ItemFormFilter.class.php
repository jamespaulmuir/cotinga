<?php

/**
 * Public_Community2community_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Community2community_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_comm_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item_ForParentComm'), 'add_empty' => true)),
      'child_comm_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item_ForChildComm'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'parent_comm_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Community_Item_ForParentComm'), 'column' => 'community_id')),
      'child_comm_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Community_Item_ForChildComm'), 'column' => 'community_id')),
    ));

    $this->widgetSchema->setNameFormat('public_community2community_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Community2community_Item';
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
