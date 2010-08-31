<?php

/**
 * Public_Tasklistitem_Item form base class.
 *
 * @method Public_Tasklistitem_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Tasklistitem_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tasklist_id' => new sfWidgetFormInputHidden(),
      'eperson_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'workflow_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Workflowitem_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tasklist_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'tasklist_id', 'required' => false)),
      'eperson_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'required' => false)),
      'workflow_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Workflowitem_Item'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_tasklistitem_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Tasklistitem_Item';
  }

}
