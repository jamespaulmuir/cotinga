<?php

/**
 * Public_Resourcepolicy_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Resourcepolicy_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'resource_type_id' => new sfWidgetFormFilterInput(),
      'resource_id'      => new sfWidgetFormFilterInput(),
      'action_id'        => new sfWidgetFormFilterInput(),
      'eperson_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'epersongroup_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item'), 'add_empty' => true)),
      'start_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'resource_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'resource_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'action_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'eperson_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Eperson_Item'), 'column' => 'eperson_id')),
      'epersongroup_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Epersongroup_Item'), 'column' => 'eperson_group_id')),
      'start_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'end_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('public_resourcepolicy_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Resourcepolicy_Item';
  }

  public function getFields()
  {
    return array(
      'policy_id'        => 'Number',
      'resource_type_id' => 'Number',
      'resource_id'      => 'Number',
      'action_id'        => 'Number',
      'eperson_id'       => 'ForeignKey',
      'epersongroup_id'  => 'ForeignKey',
      'start_date'       => 'Date',
      'end_date'         => 'Date',
    );
  }
}
