<?php

/**
 * Public_Metadatavalue_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Metadatavalue_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'metadata_field_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Metadatafieldregistry_Item'), 'add_empty' => true)),
      'text_value'        => new sfWidgetFormFilterInput(),
      'text_lang'         => new sfWidgetFormFilterInput(),
      'place'             => new sfWidgetFormFilterInput(),
      'authority'         => new sfWidgetFormFilterInput(),
      'confidence'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'item_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item'), 'column' => 'item_id')),
      'metadata_field_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Metadatafieldregistry_Item'), 'column' => 'metadata_field_id')),
      'text_value'        => new sfValidatorPass(array('required' => false)),
      'text_lang'         => new sfValidatorPass(array('required' => false)),
      'place'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'authority'         => new sfValidatorPass(array('required' => false)),
      'confidence'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('public_metadatavalue_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Metadatavalue_Item';
  }

  public function getFields()
  {
    return array(
      'metadata_value_id' => 'Number',
      'item_id'           => 'ForeignKey',
      'metadata_field_id' => 'ForeignKey',
      'text_value'        => 'Text',
      'text_lang'         => 'Text',
      'place'             => 'Number',
      'authority'         => 'Text',
      'confidence'        => 'Number',
    );
  }
}
