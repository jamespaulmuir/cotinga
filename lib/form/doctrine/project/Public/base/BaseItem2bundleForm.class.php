<?php

/**
 * Item2bundle form base class.
 *
 * @method Item2bundle getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItem2bundleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'item_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'bundle_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bundle'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'item_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'required' => false)),
      'bundle_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bundle'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item2bundle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item2bundle';
  }

}
