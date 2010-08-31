<?php

/**
 * Workspaceitem form base class.
 *
 * @method Workspaceitem getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWorkspaceitemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'workspace_item_id' => new sfWidgetFormInputHidden(),
      'item_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'collection_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'add_empty' => true)),
      'multiple_titles'   => new sfWidgetFormInputCheckbox(),
      'published_before'  => new sfWidgetFormInputCheckbox(),
      'multiple_files'    => new sfWidgetFormInputCheckbox(),
      'stage_reached'     => new sfWidgetFormInputText(),
      'page_reached'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'workspace_item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'workspace_item_id', 'required' => false)),
      'item_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'required' => false)),
      'collection_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'required' => false)),
      'multiple_titles'   => new sfValidatorBoolean(array('required' => false)),
      'published_before'  => new sfValidatorBoolean(array('required' => false)),
      'multiple_files'    => new sfValidatorBoolean(array('required' => false)),
      'stage_reached'     => new sfValidatorInteger(array('required' => false)),
      'page_reached'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('workspaceitem[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Workspaceitem';
  }

}
