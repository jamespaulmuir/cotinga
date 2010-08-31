<?php

/**
 * Public_BiItem_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_BiItem_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'sort_3'  => new sfWidgetFormFilterInput(),
      'sort_2'  => new sfWidgetFormFilterInput(),
      'sort_1'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'item_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item'), 'column' => 'item_id')),
      'sort_3'  => new sfValidatorPass(array('required' => false)),
      'sort_2'  => new sfValidatorPass(array('required' => false)),
      'sort_1'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_bi_item_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_BiItem_Item';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'item_id' => 'ForeignKey',
      'sort_3'  => 'Text',
      'sort_2'  => 'Text',
      'sort_1'  => 'Text',
    );
  }
}
