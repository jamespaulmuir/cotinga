<?php

/**
 * Bi2Dmap form base class.
 *
 * @method Bi2Dmap getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBi2DmapForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'map_id'      => new sfWidgetFormInputHidden(),
      'item_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'distinct_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bi2Dis'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'map_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'map_id', 'required' => false)),
      'item_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'required' => false)),
      'distinct_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bi2Dis'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bi2_dmap[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bi2Dmap';
  }

}
