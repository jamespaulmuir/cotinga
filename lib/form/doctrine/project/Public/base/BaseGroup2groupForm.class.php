<?php

/**
 * Group2group form base class.
 *
 * @method Group2group getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGroup2groupForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForParent'), 'add_empty' => true)),
      'child_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForChild'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'parent_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForParent'), 'required' => false)),
      'child_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForChild'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('group2group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Group2group';
  }

}
