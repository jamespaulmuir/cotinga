<?php

/**
 * Bi2Dis form base class.
 *
 * @method Bi2Dis getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBi2DisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'distinct_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bi2Dmaps'), 'add_empty' => true)),
      'authority'   => new sfWidgetFormTextarea(),
      'value'       => new sfWidgetFormTextarea(),
      'sort_value'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'distinct_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bi2Dmaps'), 'required' => false)),
      'authority'   => new sfValidatorString(array('required' => false)),
      'value'       => new sfValidatorString(array('required' => false)),
      'sort_value'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bi2_dis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bi2Dis';
  }

}
