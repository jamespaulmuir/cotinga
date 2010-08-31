<?php

/**
 * Bundle form base class.
 *
 * @method Bundle getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBundleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bundle_id'            => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormTextarea(),
      'primary_bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'bundle_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'bundle_id', 'required' => false)),
      'name'                 => new sfValidatorString(array('required' => false)),
      'primary_bitstream_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bundle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bundle';
  }

}
