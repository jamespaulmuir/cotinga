<?php

/**
 * Public_Eperson_Item form base class.
 *
 * @method Public_Eperson_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Eperson_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_id'          => new sfWidgetFormInputHidden(),
      'email'               => new sfWidgetFormTextarea(),
      'password'            => new sfWidgetFormTextarea(),
      'firstname'           => new sfWidgetFormTextarea(),
      'lastname'            => new sfWidgetFormTextarea(),
      'can_log_in'          => new sfWidgetFormInputCheckbox(),
      'require_certificate' => new sfWidgetFormInputCheckbox(),
      'self_registered'     => new sfWidgetFormInputCheckbox(),
      'last_active'         => new sfWidgetFormDateTime(),
      'sub_frequency'       => new sfWidgetFormInputText(),
      'phone'               => new sfWidgetFormTextarea(),
      'netid'               => new sfWidgetFormTextarea(),
      'language'            => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'eperson_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'eperson_id', 'required' => false)),
      'email'               => new sfValidatorString(array('required' => false)),
      'password'            => new sfValidatorString(array('required' => false)),
      'firstname'           => new sfValidatorString(array('required' => false)),
      'lastname'            => new sfValidatorString(array('required' => false)),
      'can_log_in'          => new sfValidatorBoolean(array('required' => false)),
      'require_certificate' => new sfValidatorBoolean(array('required' => false)),
      'self_registered'     => new sfValidatorBoolean(array('required' => false)),
      'last_active'         => new sfValidatorDateTime(array('required' => false)),
      'sub_frequency'       => new sfValidatorInteger(array('required' => false)),
      'phone'               => new sfValidatorString(array('required' => false)),
      'netid'               => new sfValidatorString(array('required' => false)),
      'language'            => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_eperson_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Eperson_Item';
  }

}
