<?php

/**
 * Metadatafieldregistry form base class.
 *
 * @method Metadatafieldregistry getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMetadatafieldregistryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'metadata_field_id'  => new sfWidgetFormInputHidden(),
      'metadata_schema_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MetadataSchema'), 'add_empty' => false)),
      'element'            => new sfWidgetFormTextarea(),
      'qualifier'          => new sfWidgetFormTextarea(),
      'scope_note'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'metadata_field_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'metadata_field_id', 'required' => false)),
      'metadata_schema_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MetadataSchema'))),
      'element'            => new sfValidatorString(array('required' => false)),
      'qualifier'          => new sfValidatorString(array('required' => false)),
      'scope_note'         => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('metadatafieldregistry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Metadatafieldregistry';
  }

}
