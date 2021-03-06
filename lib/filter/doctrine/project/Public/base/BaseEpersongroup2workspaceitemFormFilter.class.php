<?php

/**
 * Epersongroup2workspaceitem filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEpersongroup2workspaceitemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_group_id'  => new sfWidgetFormFilterInput(),
      'workspace_item_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eperson_group_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'workspace_item_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('epersongroup2workspaceitem_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Epersongroup2workspaceitem';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'eperson_group_id'  => 'Number',
      'workspace_item_id' => 'Number',
    );
  }
}
