<?php

/**
 * Bitstream filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBitstreamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_format_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstreamformatregistry'), 'add_empty' => true)),
      'name'                    => new sfWidgetFormFilterInput(),
      'checksum'                => new sfWidgetFormFilterInput(),
      'checksum_algorithm'      => new sfWidgetFormFilterInput(),
      'description'             => new sfWidgetFormFilterInput(),
      'user_format_description' => new sfWidgetFormFilterInput(),
      'source'                  => new sfWidgetFormFilterInput(),
      'internal_id'             => new sfWidgetFormFilterInput(),
      'deleted'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'store_number'            => new sfWidgetFormFilterInput(),
      'sequence_id'             => new sfWidgetFormFilterInput(),
      'size_bytes'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'bitstream_format_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bitstreamformatregistry'), 'column' => 'bitstream_format_id')),
      'name'                    => new sfValidatorPass(array('required' => false)),
      'checksum'                => new sfValidatorPass(array('required' => false)),
      'checksum_algorithm'      => new sfValidatorPass(array('required' => false)),
      'description'             => new sfValidatorPass(array('required' => false)),
      'user_format_description' => new sfValidatorPass(array('required' => false)),
      'source'                  => new sfValidatorPass(array('required' => false)),
      'internal_id'             => new sfValidatorPass(array('required' => false)),
      'deleted'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'store_number'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sequence_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'size_bytes'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('bitstream_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bitstream';
  }

  public function getFields()
  {
    return array(
      'bitstream_id'            => 'Number',
      'bitstream_format_id'     => 'ForeignKey',
      'name'                    => 'Text',
      'checksum'                => 'Text',
      'checksum_algorithm'      => 'Text',
      'description'             => 'Text',
      'user_format_description' => 'Text',
      'source'                  => 'Text',
      'internal_id'             => 'Text',
      'deleted'                 => 'Boolean',
      'store_number'            => 'Number',
      'sequence_id'             => 'Number',
      'size_bytes'              => 'Number',
    );
  }
}
