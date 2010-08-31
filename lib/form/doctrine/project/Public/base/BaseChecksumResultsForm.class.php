<?php

/**
 * ChecksumResults form base class.
 *
 * @method ChecksumResults getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChecksumResultsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'result_code'        => new sfWidgetFormInputHidden(),
      'result_description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'result_code'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'result_code', 'required' => false)),
      'result_description' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('checksum_results[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChecksumResults';
  }

}
