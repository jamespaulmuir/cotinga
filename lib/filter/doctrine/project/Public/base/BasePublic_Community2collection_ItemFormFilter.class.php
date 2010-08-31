<?php

/**
 * Public_Community2collection_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Community2collection_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'community_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item'), 'add_empty' => true)),
      'collection_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item_ForCollection'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'community_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Community_Item'), 'column' => 'community_id')),
      'collection_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Collection_Item_ForCollection'), 'column' => 'collection_id')),
    ));

    $this->widgetSchema->setNameFormat('public_community2collection_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Community2collection_Item';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'community_id'  => 'ForeignKey',
      'collection_id' => 'ForeignKey',
    );
  }
}
