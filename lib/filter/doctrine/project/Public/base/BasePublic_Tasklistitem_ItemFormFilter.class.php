<?php

/**
 * Public_Tasklistitem_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Tasklistitem_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'workflow_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Workflowitem_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'eperson_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Eperson_Item'), 'column' => 'eperson_id')),
      'workflow_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Workflowitem_Item'), 'column' => 'workflow_id')),
    ));

    $this->widgetSchema->setNameFormat('public_tasklistitem_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Tasklistitem_Item';
  }

  public function getFields()
  {
    return array(
      'tasklist_id' => 'Number',
      'eperson_id'  => 'ForeignKey',
      'workflow_id' => 'ForeignKey',
    );
  }
}
