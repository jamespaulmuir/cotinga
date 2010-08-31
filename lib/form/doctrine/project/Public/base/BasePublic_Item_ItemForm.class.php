<?php

/**
 * Public_Item_Item form base class.
 *
 * @method Public_Item_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Item_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'           => new sfWidgetFormInputHidden(),
      'submitter_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'in_archive'        => new sfWidgetFormInputCheckbox(),
      'withdrawn'         => new sfWidgetFormInputCheckbox(),
      'owning_collection' => new sfWidgetFormInputText(),
      'last_modified'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'item_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'item_id', 'required' => false)),
      'submitter_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'required' => false)),
      'in_archive'        => new sfValidatorBoolean(array('required' => false)),
      'withdrawn'         => new sfValidatorBoolean(array('required' => false)),
      'owning_collection' => new sfValidatorInteger(array('required' => false)),
      'last_modified'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_item_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Item_Item';
  }

}
