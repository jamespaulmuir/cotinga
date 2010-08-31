<?php

/**
 * BiItem form base class.
 *
 * @method BiItem getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBiItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'sort_3'  => new sfWidgetFormTextarea(),
      'sort_2'  => new sfWidgetFormTextarea(),
      'sort_1'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'required' => false)),
      'sort_3'  => new sfValidatorString(array('required' => false)),
      'sort_2'  => new sfValidatorString(array('required' => false)),
      'sort_1'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bi_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BiItem';
  }

}
