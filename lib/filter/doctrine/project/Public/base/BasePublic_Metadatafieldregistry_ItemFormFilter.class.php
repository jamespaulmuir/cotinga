<?php

/**
 * Public_Metadatafieldregistry_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Metadatafieldregistry_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'metadata_schema_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Metadataschemaregistry_Item'), 'add_empty' => true)),
      'element'            => new sfWidgetFormFilterInput(),
      'qualifier'          => new sfWidgetFormFilterInput(),
      'scope_note'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'metadata_schema_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Metadataschemaregistry_Item'), 'column' => 'metadata_schema_id')),
      'element'            => new sfValidatorPass(array('required' => false)),
      'qualifier'          => new sfValidatorPass(array('required' => false)),
      'scope_note'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_metadatafieldregistry_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Metadatafieldregistry_Item';
  }

  public function getFields()
  {
    return array(
      'metadata_field_id'  => 'Number',
      'metadata_schema_id' => 'ForeignKey',
      'element'            => 'Text',
      'qualifier'          => 'Text',
      'scope_note'         => 'Text',
    );
  }
}
