<?php

/**
 * Public_HarvestedCollection_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_HarvestedCollection_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'collection_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
      'harvest_type'       => new sfWidgetFormFilterInput(),
      'oai_source'         => new sfWidgetFormFilterInput(),
      'oai_set_id'         => new sfWidgetFormFilterInput(),
      'harvest_message'    => new sfWidgetFormFilterInput(),
      'metadata_config_id' => new sfWidgetFormFilterInput(),
      'harvest_status'     => new sfWidgetFormFilterInput(),
      'harvest_start_time' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'last_harvested'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'collection_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Collection_Item'), 'column' => 'collection_id')),
      'harvest_type'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'oai_source'         => new sfValidatorPass(array('required' => false)),
      'oai_set_id'         => new sfValidatorPass(array('required' => false)),
      'harvest_message'    => new sfValidatorPass(array('required' => false)),
      'metadata_config_id' => new sfValidatorPass(array('required' => false)),
      'harvest_status'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'harvest_start_time' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'last_harvested'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('public_harvested_collection_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_HarvestedCollection_Item';
  }

  public function getFields()
  {
    return array(
      'collection_id'      => 'ForeignKey',
      'harvest_type'       => 'Number',
      'oai_source'         => 'Text',
      'oai_set_id'         => 'Text',
      'harvest_message'    => 'Text',
      'metadata_config_id' => 'Text',
      'harvest_status'     => 'Number',
      'harvest_start_time' => 'Date',
      'last_harvested'     => 'Date',
      'id'                 => 'Number',
    );
  }
}
