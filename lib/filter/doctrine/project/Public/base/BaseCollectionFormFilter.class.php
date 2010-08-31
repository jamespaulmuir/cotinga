<?php

/**
 * Collection filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCollectionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                   => new sfWidgetFormFilterInput(),
      'short_description'      => new sfWidgetFormFilterInput(),
      'introductory_text'      => new sfWidgetFormFilterInput(),
      'logo_bitstream_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'add_empty' => true)),
      'template_item_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'provenance_description' => new sfWidgetFormFilterInput(),
      'license'                => new sfWidgetFormFilterInput(),
      'copyright_text'         => new sfWidgetFormFilterInput(),
      'side_bar_text'          => new sfWidgetFormFilterInput(),
      'workflow_step_1'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForWorkflowStep1'), 'add_empty' => true)),
      'workflow_step_2'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForWorkflowStep2'), 'add_empty' => true)),
      'workflow_step_3'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForWorkflowStep3'), 'add_empty' => true)),
      'submitter'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForSubmitter'), 'add_empty' => true)),
      'admin'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup_ForAdmin'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                   => new sfValidatorPass(array('required' => false)),
      'short_description'      => new sfValidatorPass(array('required' => false)),
      'introductory_text'      => new sfValidatorPass(array('required' => false)),
      'logo_bitstream_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bitstream'), 'column' => 'bitstream_id')),
      'template_item_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'item_id')),
      'provenance_description' => new sfValidatorPass(array('required' => false)),
      'license'                => new sfValidatorPass(array('required' => false)),
      'copyright_text'         => new sfValidatorPass(array('required' => false)),
      'side_bar_text'          => new sfValidatorPass(array('required' => false)),
      'workflow_step_1'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForWorkflowStep1'), 'column' => 'eperson_group_id')),
      'workflow_step_2'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForWorkflowStep2'), 'column' => 'eperson_group_id')),
      'workflow_step_3'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForWorkflowStep3'), 'column' => 'eperson_group_id')),
      'submitter'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForSubmitter'), 'column' => 'eperson_group_id')),
      'admin'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup_ForAdmin'), 'column' => 'eperson_group_id')),
    ));

    $this->widgetSchema->setNameFormat('collection_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Collection';
  }

  public function getFields()
  {
    return array(
      'collection_id'          => 'Number',
      'name'                   => 'Text',
      'short_description'      => 'Text',
      'introductory_text'      => 'Text',
      'logo_bitstream_id'      => 'ForeignKey',
      'template_item_id'       => 'ForeignKey',
      'provenance_description' => 'Text',
      'license'                => 'Text',
      'copyright_text'         => 'Text',
      'side_bar_text'          => 'Text',
      'workflow_step_1'        => 'ForeignKey',
      'workflow_step_2'        => 'ForeignKey',
      'workflow_step_3'        => 'ForeignKey',
      'submitter'              => 'ForeignKey',
      'admin'                  => 'ForeignKey',
    );
  }
}
