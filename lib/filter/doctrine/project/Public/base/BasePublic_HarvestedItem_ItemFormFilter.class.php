<?php

/**
 * Public_HarvestedItem_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_HarvestedItem_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'last_harvested' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'oai_id'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'item_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item'), 'column' => 'item_id')),
      'last_harvested' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'oai_id'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_harvested_item_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_HarvestedItem_Item';
  }

  public function getFields()
  {
    return array(
      'item_id'        => 'ForeignKey',
      'last_harvested' => 'Date',
      'oai_id'         => 'Text',
      'id'             => 'Number',
    );
  }
}
