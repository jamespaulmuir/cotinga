<?php

/**
 * Public_Collection2item_Item form base class.
 *
 * @method Public_Collection2item_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Collection2item_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'collection_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
      'item_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item_ForItem'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'collection_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'required' => false)),
      'item_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item_ForItem'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_collection2item_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Collection2item_Item';
  }

}
