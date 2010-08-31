<?php

/**
 * Public_ChecksumHistory_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_ChecksumHistory_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_id'        => new sfWidgetFormFilterInput(),
      'process_start_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'process_end_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'checksum_expected'   => new sfWidgetFormFilterInput(),
      'checksum_calculated' => new sfWidgetFormFilterInput(),
      'result'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_ChecksumResults_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'bitstream_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'process_start_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'process_end_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'checksum_expected'   => new sfValidatorPass(array('required' => false)),
      'checksum_calculated' => new sfValidatorPass(array('required' => false)),
      'result'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_ChecksumResults_Item'), 'column' => 'result_code')),
    ));

    $this->widgetSchema->setNameFormat('public_checksum_history_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_ChecksumHistory_Item';
  }

  public function getFields()
  {
    return array(
      'check_id'            => 'Number',
      'bitstream_id'        => 'Number',
      'process_start_date'  => 'Date',
      'process_end_date'    => 'Date',
      'checksum_expected'   => 'Text',
      'checksum_calculated' => 'Text',
      'result'              => 'ForeignKey',
    );
  }
}
