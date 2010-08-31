<?php

/**
 * Epersongroup2eperson form base class.
 *
 * @method Epersongroup2eperson getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEpersongroup2epersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'eperson_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
      'eperson_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'eperson_group_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'required' => false)),
      'eperson_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('epersongroup2eperson[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Epersongroup2eperson';
  }

}
