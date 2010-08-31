<?php

/**
 * Workflowitem form base class.
 *
 * @method Workflowitem getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWorkflowitemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'workflow_id'      => new sfWidgetFormInputHidden(),
      'item_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'collection_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'add_empty' => true)),
      'state'            => new sfWidgetFormInputText(),
      'owner'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
      'multiple_titles'  => new sfWidgetFormInputCheckbox(),
      'published_before' => new sfWidgetFormInputCheckbox(),
      'multiple_files'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'workflow_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'workflow_id', 'required' => false)),
      'item_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'required' => false)),
      'collection_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'required' => false)),
      'state'            => new sfValidatorInteger(array('required' => false)),
      'owner'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'required' => false)),
      'multiple_titles'  => new sfValidatorBoolean(array('required' => false)),
      'published_before' => new sfValidatorBoolean(array('required' => false)),
      'multiple_files'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('workflowitem[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Workflowitem';
  }

}
