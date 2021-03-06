<?php

/**
 * FileExtension form base class.
 *
 * @method FileExtension getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFileExtensionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'file_extension_id'   => new sfWidgetFormInputHidden(),
      'bitstream_format_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstreamformatregistry'), 'add_empty' => true)),
      'extension'           => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'file_extension_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'file_extension_id', 'required' => false)),
      'bitstream_format_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstreamformatregistry'), 'required' => false)),
      'extension'           => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('file_extension[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FileExtension';
  }

}
