<?php

/**
 * Public_Workflowitem_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Workflowitem_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Item_Item'), 'add_empty' => true)),
      'collection_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
      'state'            => new sfWidgetFormFilterInput(),
      'owner'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'multiple_titles'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'published_before' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'multiple_files'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'item_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Item_Item'), 'column' => 'item_id')),
      'collection_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Collection_Item'), 'column' => 'collection_id')),
      'state'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'owner'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Eperson_Item'), 'column' => 'eperson_id')),
      'multiple_titles'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'published_before' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'multiple_files'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('public_workflowitem_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Workflowitem_Item';
  }

  public function getFields()
  {
    return array(
      'workflow_id'      => 'Number',
      'item_id'          => 'ForeignKey',
      'collection_id'    => 'ForeignKey',
      'state'            => 'Number',
      'owner'            => 'ForeignKey',
      'multiple_titles'  => 'Boolean',
      'published_before' => 'Boolean',
      'multiple_files'   => 'Boolean',
    );
  }
}
