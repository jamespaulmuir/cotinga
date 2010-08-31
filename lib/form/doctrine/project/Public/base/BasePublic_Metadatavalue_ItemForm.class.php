<?php

/**
 * Public_Metadatavalue_Item form base class.
 *
 * @method Public_Metadatavalue_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Metadatavalue_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'metadata_value_id' => new sfWidgetFormInputHidden(),
      'item_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'metadata_field_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Metadatafieldregistry_Item'), 'add_empty' => true)),
      'text_value'        => new sfWidgetFormTextarea(),
      'text_lang'         => new sfWidgetFormTextarea(),
      'place'             => new sfWidgetFormInputText(),
      'authority'         => new sfWidgetFormTextarea(),
      'confidence'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'metadata_value_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'metadata_value_id', 'required' => false)),
      'item_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'required' => false)),
      'metadata_field_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Metadatafieldregistry_Item'), 'required' => false)),
      'text_value'        => new sfValidatorString(array('required' => false)),
      'text_lang'         => new sfValidatorString(array('required' => false)),
      'place'             => new sfValidatorInteger(array('required' => false)),
      'authority'         => new sfValidatorString(array('required' => false)),
      'confidence'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_metadatavalue_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Metadatavalue_Item';
  }

}
