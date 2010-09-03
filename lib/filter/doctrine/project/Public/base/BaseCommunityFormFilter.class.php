<?php

/**
 * Community filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommunityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(),
      'short_description'       => new sfWidgetFormFilterInput(),
      'introductory_text'       => new sfWidgetFormFilterInput(),
      'logo_bitstream_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LogoBitstream'), 'add_empty' => true)),
      'copyright_text'          => new sfWidgetFormFilterInput(),
      'side_bar_text'           => new sfWidgetFormFilterInput(),
      'admin'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
      'collections_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Collection')),
      'parent_communities_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Community')),
      'child_communities_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Community')),
      'items_list'              => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'short_description'       => new sfValidatorPass(array('required' => false)),
      'introductory_text'       => new sfValidatorPass(array('required' => false)),
      'logo_bitstream_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LogoBitstream'), 'column' => 'bitstream_id')),
      'copyright_text'          => new sfValidatorPass(array('required' => false)),
      'side_bar_text'           => new sfValidatorPass(array('required' => false)),
      'admin'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup'), 'column' => 'eperson_group_id')),
      'collections_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Collection', 'required' => false)),
      'parent_communities_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Community', 'required' => false)),
      'child_communities_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Community', 'required' => false)),
      'items_list'              => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('community_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
      ->leftJoin($query->getRootAlias().'.Community2collection Community2collection')
      ->andWhereIn('Community2collection.collection_id', $values)
    ;
  }

  public function addParentCommunitiesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.Community2community Community2community')
      ->andWhereIn('Community2community.parent_comm_id', $values)
    ;
  }

  public function addChildCommunitiesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.Community2community Community2community')
      ->andWhereIn('Community2community.child_comm_id', $values)
    ;
  }

  public function addItemsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('Communities2item.item_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Community';
  }

  public function getFields()
  {
    return array(
      'community_id'            => 'Number',
      'name'                    => 'Text',
      'short_description'       => 'Text',
      'introductory_text'       => 'Text',
      'logo_bitstream_id'       => 'ForeignKey',
      'copyright_text'          => 'Text',
      'side_bar_text'           => 'Text',
      'admin'                   => 'ForeignKey',
      'collections_list'        => 'ManyKey',
      'parent_communities_list' => 'ManyKey',
      'child_communities_list'  => 'ManyKey',
      'items_list'              => 'ManyKey',
    );
  }
}
