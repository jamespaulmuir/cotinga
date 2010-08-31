<?php

/**
 * Bundle2bitstream filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBundle2bitstreamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bundle_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bundle'), 'add_empty' => true)),
      'bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'bundle_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bundle'), 'column' => 'bundle_id')),
      'bitstream_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bitstream'), 'column' => 'bitstream_id')),
    ));

    $this->widgetSchema->setNameFormat('bundle2bitstream_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bundle2bitstream';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'bundle_id'    => 'ForeignKey',
      'bitstream_id' => 'ForeignKey',
    );
  }
}
