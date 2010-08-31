<?php

/**
 * Public_Bundle_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Bundle_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(),
      'primary_bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bitstream_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'primary_bitstream_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Bitstream_Item'), 'column' => 'bitstream_id')),
    ));

    $this->widgetSchema->setNameFormat('public_bundle_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bundle_Item';
  }

  public function getFields()
  {
    return array(
      'bundle_id'            => 'Number',
      'name'                 => 'Text',
      'primary_bitstream_id' => 'ForeignKey',
    );
  }
}
