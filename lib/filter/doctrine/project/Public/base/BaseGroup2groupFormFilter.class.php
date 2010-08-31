<?php

/**
 * Group2group filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGroup2groupFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForParent'), 'add_empty' => true)),
      'child_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForChild'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'parent_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForParent'), 'column' => 'eperson_group_id')),
      'child_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForChild'), 'column' => 'eperson_group_id')),
    ));

    $this->widgetSchema->setNameFormat('group2group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Group2group';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'parent_id' => 'ForeignKey',
      'child_id'  => 'ForeignKey',
    );
  }
}
