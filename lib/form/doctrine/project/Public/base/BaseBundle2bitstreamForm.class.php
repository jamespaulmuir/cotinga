<?php

/**
 * Bundle2bitstream form base class.
 *
 * @method Bundle2bitstream getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBundle2bitstreamForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'bundle_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bundle'), 'add_empty' => true)),
      'bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'bundle_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bundle'), 'required' => false)),
      'bitstream_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bundle2bitstream[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bundle2bitstream';
  }

}
