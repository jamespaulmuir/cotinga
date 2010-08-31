<?php

/**
 * Public_Workspaceitem_Item form base class.
 *
 * @method Public_Workspaceitem_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Workspaceitem_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'workspace_item_id' => new sfWidgetFormInputHidden(),
      'item_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'collection_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
      'multiple_titles'   => new sfWidgetFormInputCheckbox(),
      'published_before'  => new sfWidgetFormInputCheckbox(),
      'multiple_files'    => new sfWidgetFormInputCheckbox(),
      'stage_reached'     => new sfWidgetFormInputText(),
      'page_reached'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'workspace_item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'workspace_item_id', 'required' => false)),
      'item_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'required' => false)),
      'collection_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'required' => false)),
      'multiple_titles'   => new sfValidatorBoolean(array('required' => false)),
      'published_before'  => new sfValidatorBoolean(array('required' => false)),
      'multiple_files'    => new sfValidatorBoolean(array('required' => false)),
      'stage_reached'     => new sfValidatorInteger(array('required' => false)),
      'page_reached'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_workspaceitem_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Workspaceitem_Item';
  }

}
