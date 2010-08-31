<?php

/**
 * MostRecentChecksum filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMostRecentChecksumFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'to_be_processed'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'expected_checksum'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'current_checksum'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_process_start_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'last_process_end_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'checksum_algorithm'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matched_prev_checksum'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'result'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChecksumResults'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'to_be_processed'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'expected_checksum'       => new sfValidatorPass(array('required' => false)),
      'current_checksum'        => new sfValidatorPass(array('required' => false)),
      'last_process_start_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'last_process_end_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'checksum_algorithm'      => new sfValidatorPass(array('required' => false)),
      'matched_prev_checksum'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'result'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ChecksumResults'), 'column' => 'result_code')),
    ));

    $this->widgetSchema->setNameFormat('most_recent_checksum_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MostRecentChecksum';
  }

  public function getFields()
  {
    return array(
      'bitstream_id'            => 'Number',
      'to_be_processed'         => 'Boolean',
      'expected_checksum'       => 'Text',
      'current_checksum'        => 'Text',
      'last_process_start_date' => 'Date',
      'last_process_end_date'   => 'Date',
      'checksum_algorithm'      => 'Text',
      'matched_prev_checksum'   => 'Boolean',
      'result'                  => 'ForeignKey',
    );
  }
}
