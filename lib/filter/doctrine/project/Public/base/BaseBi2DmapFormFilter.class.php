<?php

/**
 * Bi2Dmap filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBi2DmapFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'distinct_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bi2Dis'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'item_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'item_id')),
      'distinct_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bi2Dis'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('bi2_dmap_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bi2Dmap';
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
