<?php

/**
 * Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'submitter_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
      'in_archive'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'withdrawn'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'owning_collection' => new sfWidgetFormFilterInput(),
      'last_modified'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'submitter_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Eperson'), 'column' => 'eperson_id')),
      'in_archive'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'withdrawn'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'owning_collection' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'last_modified'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'item_id'           => 'Number',
      'submitter_id'      => 'ForeignKey',
      'in_archive'        => 'Boolean',
      'withdrawn'         => 'Boolean',
      'owning_collection' => 'Number',
      'last_modified'     => 'Date',
    );
  }
}
