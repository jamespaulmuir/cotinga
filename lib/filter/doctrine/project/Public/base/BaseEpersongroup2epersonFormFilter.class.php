<?php

/**
 * Epersongroup2eperson filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEpersongroup2epersonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
      'eperson_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'eperson_group_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup'), 'column' => 'eperson_group_id')),
      'eperson_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Eperson'), 'column' => 'eperson_id')),
    ));

    $this->widgetSchema->setNameFormat('epersongroup2eperson_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Epersongroup2eperson';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'eperson_group_id' => 'ForeignKey',
      'eperson_id'       => 'ForeignKey',
    );
  }
}
