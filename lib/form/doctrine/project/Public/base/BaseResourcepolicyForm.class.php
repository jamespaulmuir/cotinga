<?php

/**
 * Resourcepolicy form base class.
 *
 * @method Resourcepolicy getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseResourcepolicyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'policy_id'        => new sfWidgetFormInputHidden(),
      'resource_type_id' => new sfWidgetFormInputText(),
      'resource_id'      => new sfWidgetFormInputText(),
      'action_id'        => new sfWidgetFormInputText(),
      'eperson_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
      'epersongroup_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
      'start_date'       => new sfWidgetFormDate(),
      'end_date'         => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'policy_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'policy_id', 'required' => false)),
      'resource_type_id' => new sfValidatorInteger(array('required' => false)),
      'resource_id'      => new sfValidatorInteger(array('required' => false)),
      'action_id'        => new sfValidatorInteger(array('required' => false)),
      'eperson_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'required' => false)),
      'epersongroup_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'required' => false)),
      'start_date'       => new sfValidatorDate(array('required' => false)),
      'end_date'         => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('resourcepolicy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resourcepolicy';
  }

}
