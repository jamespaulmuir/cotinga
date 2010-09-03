<?php

/**
 * Bundle filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBundleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(),
      'primary_bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PrimaryBitstream'), 'add_empty' => true)),
      'items_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
      'bitstreams_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Bitstream')),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'primary_bitstream_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PrimaryBitstream'), 'column' => 'bitstream_id')),
      'items_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
      'bitstreams_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Bitstream', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bundle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
      ->leftJoin($query->getRootAlias().'.Item2bundle Item2bundle')
      ->andWhereIn('Item2bundle.item_id', $values)
    ;
  }

  public function addBitstreamsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.Bundle2bitstream Bundle2bitstream')
      ->andWhereIn('Bundle2bitstream.bitstream_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Bundle';
  }

  public function getFields()
  {
    return array(
      'bundle_id'            => 'Number',
      'name'                 => 'Text',
      'primary_bitstream_id' => 'ForeignKey',
      'items_list'           => 'ManyKey',
      'bitstreams_list'      => 'ManyKey',
    );
  }
}
