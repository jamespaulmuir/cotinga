<?php

/**
 * Public_Bi4Dmap_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Bi4Dmap_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'distinct_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bi4Dis_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'item_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item'), 'column' => 'item_id')),
      'distinct_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Bi4Dis_Item'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('public_bi4_dmap_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bi4Dmap_Item';
  }

  public function getFields()
  {
    return array(
      'map_id'      => 'Number',
      'item_id'     => 'ForeignKey',
      'distinct_id' => 'ForeignKey',
    );
  }
}
