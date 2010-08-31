<?php

/**
 * Public_Item2bundle_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Item2bundle_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'bundle_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bundle_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'item_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item'), 'column' => 'item_id')),
      'bundle_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Bundle_Item'), 'column' => 'bundle_id')),
    ));

    $this->widgetSchema->setNameFormat('public_item2bundle_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Item2bundle_Item';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'item_id'   => 'ForeignKey',
      'bundle_id' => 'ForeignKey',
    );
  }
}
