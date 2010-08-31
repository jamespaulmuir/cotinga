<?php

/**
 * Metadataschemaregistry filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMetadataschemaregistryFormFilter extends BaseFormFilterDoctrine
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

    $this->widgetSchema->setNameFormat('metadataschemaregistry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Metadataschemaregistry';
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
