<?php

/**
 * Item2bundle filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseItem2bundleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'bundle_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bundle'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'item_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'item_id')),
      'bundle_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bundle'), 'column' => 'bundle_id')),
    ));

    $this->widgetSchema->setNameFormat('item2bundle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item2bundle';
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
