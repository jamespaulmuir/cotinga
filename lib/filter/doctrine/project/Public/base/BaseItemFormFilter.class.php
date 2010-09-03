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
      'bundles_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Bundle')),
      'collections_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Collection')),
      'communities_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Community')),
    ));

    $this->setValidators(array(
      'submitter_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Eperson'), 'column' => 'eperson_id')),
      'in_archive'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'withdrawn'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'owning_collection' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'last_modified'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'bundles_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Bundle', 'required' => false)),
      'collections_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Collection', 'required' => false)),
      'communities_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Community', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addBundlesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Item2bundle Item2bundle')
      ->andWhereIn('Item2bundle.bundle_id', $values)
    ;
  }

  public function addCollectionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Collection2item Collection2item')
      ->andWhereIn('Collection2item.collection_id', $values)
    ;
  }

  public function addCommunitiesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Communities2item Communities2item')
      ->andWhereIn('Communities2item.community_id', $values)
    ;
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
      'bundles_list'      => 'ManyKey',
      'collections_list'  => 'ManyKey',
      'communities_list'  => 'ManyKey',
    );
  }
}
