<?php

/**
 * Fileextension filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFileextensionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_format_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstreamformatregistry'), 'add_empty' => true)),
      'extension'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'bitstream_format_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bitstreamformatregistry'), 'column' => 'bitstream_format_id')),
      'extension'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fileextension_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fileextension';
  }

  public function getFields()
  {
    return array(
      'file_extension_id'   => 'Number',
      'bitstream_format_id' => 'ForeignKey',
      'extension'           => 'Text',
    );
  }
}
