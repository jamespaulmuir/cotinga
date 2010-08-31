<?php

/**
 * Public_Workflowitem_Item form base class.
 *
 * @method Public_Workflowitem_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Workflowitem_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'workflow_id'      => new sfWidgetFormInputHidden(),
      'item_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'collection_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
      'state'            => new sfWidgetFormInputText(),
      'owner'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'multiple_titles'  => new sfWidgetFormInputCheckbox(),
      'published_before' => new sfWidgetFormInputCheckbox(),
      'multiple_files'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'workflow_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'workflow_id', 'required' => false)),
      'item_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'required' => false)),
      'collection_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'required' => false)),
      'state'            => new sfValidatorInteger(array('required' => false)),
      'owner'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'required' => false)),
      'multiple_titles'  => new sfValidatorBoolean(array('required' => false)),
      'published_before' => new sfValidatorBoolean(array('required' => false)),
      'multiple_files'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_workflowitem_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Workflowitem_Item';
  }

}
