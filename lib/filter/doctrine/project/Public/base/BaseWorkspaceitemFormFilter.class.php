<?php

/**
 * Workspaceitem filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWorkspaceitemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'collection_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'add_empty' => true)),
      'multiple_titles'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'published_before'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'multiple_files'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'stage_reached'     => new sfWidgetFormFilterInput(),
      'page_reached'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'item_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'item_id')),
      'collection_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Collection'), 'column' => 'collection_id')),
      'multiple_titles'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'published_before'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'multiple_files'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'stage_reached'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'page_reached'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('workspaceitem_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Workspaceitem';
  }

  public function getFields()
  {
    return array(
      'workspace_item_id' => 'Number',
      'item_id'           => 'ForeignKey',
      'collection_id'     => 'ForeignKey',
      'multiple_titles'   => 'Boolean',
      'published_before'  => 'Boolean',
      'multiple_files'    => 'Boolean',
      'stage_reached'     => 'Number',
      'page_reached'      => 'Number',
    );
  }
}
