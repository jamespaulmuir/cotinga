<?php

/**
 * Public_Collection2item_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Collection2item_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'collection_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
      'item_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item_ForItem'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'collection_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Collection_Item'), 'column' => 'collection_id')),
      'item_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item_ForItem'), 'column' => 'item_id')),
    ));

    $this->widgetSchema->setNameFormat('public_collection2item_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Collection2item_Item';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'collection_id' => 'ForeignKey',
      'item_id'       => 'ForeignKey',
    );
  }
}
