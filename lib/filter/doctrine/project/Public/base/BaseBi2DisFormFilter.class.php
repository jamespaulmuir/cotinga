<?php

/**
 * Bi2Dis filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBi2DisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'distinct_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bi2Dmaps'), 'add_empty' => true)),
      'authority'   => new sfWidgetFormFilterInput(),
      'value'       => new sfWidgetFormFilterInput(),
      'sort_value'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'distinct_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bi2Dmaps'), 'column' => 'map_id')),
      'authority'   => new sfValidatorPass(array('required' => false)),
      'value'       => new sfValidatorPass(array('required' => false)),
      'sort_value'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bi2_dis_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bi2Dis';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'distinct_id' => 'ForeignKey',
      'authority'   => 'Text',
      'value'       => 'Text',
      'sort_value'  => 'Text',
    );
  }
}
