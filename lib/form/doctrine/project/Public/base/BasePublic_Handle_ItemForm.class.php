<?php

/**
 * Public_Handle_Item form base class.
 *
 * @method Public_Handle_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Handle_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'handle_id'        => new sfWidgetFormInputHidden(),
      'handle'           => new sfWidgetFormTextarea(),
      'resource_type_id' => new sfWidgetFormInputText(),
      'resource_id'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'handle_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'handle_id', 'required' => false)),
      'handle'           => new sfValidatorString(array('required' => false)),
      'resource_type_id' => new sfValidatorInteger(array('required' => false)),
      'resource_id'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_handle_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Handle_Item';
  }

}
