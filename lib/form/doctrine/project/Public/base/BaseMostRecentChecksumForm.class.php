<?php

/**
 * MostRecentChecksum form base class.
 *
 * @method MostRecentChecksum getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMostRecentChecksumForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_id'            => new sfWidgetFormInputHidden(),
      'to_be_processed'         => new sfWidgetFormInputCheckbox(),
      'expected_checksum'       => new sfWidgetFormTextarea(),
      'current_checksum'        => new sfWidgetFormTextarea(),
      'last_process_start_date' => new sfWidgetFormDateTime(),
      'last_process_end_date'   => new sfWidgetFormDateTime(),
      'checksum_algorithm'      => new sfWidgetFormTextarea(),
      'matched_prev_checksum'   => new sfWidgetFormInputCheckbox(),
      'result'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChecksumResults'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'bitstream_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'bitstream_id', 'required' => false)),
      'to_be_processed'         => new sfValidatorBoolean(),
      'expected_checksum'       => new sfValidatorString(),
      'current_checksum'        => new sfValidatorString(),
      'last_process_start_date' => new sfValidatorDateTime(),
      'last_process_end_date'   => new sfValidatorDateTime(),
      'checksum_algorithm'      => new sfValidatorString(),
      'matched_prev_checksum'   => new sfValidatorBoolean(),
      'result'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChecksumResults'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('most_recent_checksum[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MostRecentChecksum';
  }

}
