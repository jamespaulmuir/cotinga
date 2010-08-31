<?php

/**
 * Public_Bundle2bitstream_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Bundle2bitstream_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bundle_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bundle_Item'), 'add_empty' => true)),
      'bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bitstream_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'bundle_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Bundle_Item'), 'column' => 'bundle_id')),
      'bitstream_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Bitstream_Item'), 'column' => 'bitstream_id')),
    ));

    $this->widgetSchema->setNameFormat('public_bundle2bitstream_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bundle2bitstream_Item';
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
