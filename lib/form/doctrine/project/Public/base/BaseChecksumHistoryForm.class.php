<?php

/**
 * ChecksumHistory form base class.
 *
 * @method ChecksumHistory getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChecksumHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'check_id'            => new sfWidgetFormInputHidden(),
      'bitstream_id'        => new sfWidgetFormInputText(),
      'process_start_date'  => new sfWidgetFormDateTime(),
      'process_end_date'    => new sfWidgetFormDateTime(),
      'checksum_expected'   => new sfWidgetFormTextarea(),
      'checksum_calculated' => new sfWidgetFormTextarea(),
      'result'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChecksumResults'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'check_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'check_id', 'required' => false)),
      'bitstream_id'        => new sfValidatorInteger(array('required' => false)),
      'process_start_date'  => new sfValidatorDateTime(array('required' => false)),
      'process_end_date'    => new sfValidatorDateTime(array('required' => false)),
      'checksum_expected'   => new sfValidatorString(array('required' => false)),
      'checksum_calculated' => new sfValidatorString(array('required' => false)),
      'result'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChecksumResults'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('checksum_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChecksumHistory';
  }

}
