<?php

/**
 * HarvestedCollection form base class.
 *
 * @method HarvestedCollection getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHarvestedCollectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'collection_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'add_empty' => true)),
      'harvest_type'       => new sfWidgetFormInputText(),
      'oai_source'         => new sfWidgetFormTextarea(),
      'oai_set_id'         => new sfWidgetFormTextarea(),
      'harvest_message'    => new sfWidgetFormTextarea(),
      'metadata_config_id' => new sfWidgetFormTextarea(),
      'harvest_status'     => new sfWidgetFormInputText(),
      'harvest_start_time' => new sfWidgetFormDateTime(),
      'last_harvested'     => new sfWidgetFormDateTime(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'collection_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'required' => false)),
      'harvest_type'       => new sfValidatorInteger(array('required' => false)),
      'oai_source'         => new sfValidatorString(array('required' => false)),
      'oai_set_id'         => new sfValidatorString(array('required' => false)),
      'harvest_message'    => new sfValidatorString(array('required' => false)),
      'metadata_config_id' => new sfValidatorString(array('required' => false)),
      'harvest_status'     => new sfValidatorInteger(array('required' => false)),
      'harvest_start_time' => new sfValidatorDateTime(array('required' => false)),
      'last_harvested'     => new sfValidatorDateTime(array('required' => false)),
      'id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('harvested_collection[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HarvestedCollection';
  }

}
