<?php

/**
 * Collection2item form base class.
 *
 * @method Collection2item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCollection2itemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'collection_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'add_empty' => true)),
      'item_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item_ForItem'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'collection_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'required' => false)),
      'item_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item_ForItem'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('collection2item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Collection2item';
  }

}
