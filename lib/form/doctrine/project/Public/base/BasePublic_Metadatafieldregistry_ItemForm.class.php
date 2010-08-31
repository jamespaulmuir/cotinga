<?php

/**
 * Public_Metadatafieldregistry_Item form base class.
 *
 * @method Public_Metadatafieldregistry_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Metadatafieldregistry_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'metadata_field_id'  => new sfWidgetFormInputHidden(),
      'metadata_schema_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Metadataschemaregistry_Item'), 'add_empty' => false)),
      'element'            => new sfWidgetFormTextarea(),
      'qualifier'          => new sfWidgetFormTextarea(),
      'scope_note'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'metadata_field_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'metadata_field_id', 'required' => false)),
      'metadata_schema_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Metadataschemaregistry_Item'))),
      'element'            => new sfValidatorString(array('required' => false)),
      'qualifier'          => new sfValidatorString(array('required' => false)),
      'scope_note'         => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_metadatafieldregistry_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Metadatafieldregistry_Item';
  }

}
