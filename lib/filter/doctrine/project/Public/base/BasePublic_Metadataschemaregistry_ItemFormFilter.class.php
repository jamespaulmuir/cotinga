<?php

/**
 * Public_Metadataschemaregistry_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Metadataschemaregistry_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'namespace'          => new sfWidgetFormFilterInput(),
      'short_id'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'namespace'          => new sfValidatorPass(array('required' => false)),
      'short_id'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_metadataschemaregistry_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Metadataschemaregistry_Item';
  }

  public function getFields()
  {
    return array(
      'metadata_schema_id' => 'Number',
      'namespace'          => 'Text',
      'short_id'           => 'Text',
    );
  }
}
