<?php

/**
 * Public_Epersongroup2eperson_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Epersongroup2eperson_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item'), 'add_empty' => true)),
      'eperson_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'eperson_group_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Epersongroup_Item'), 'column' => 'eperson_group_id')),
      'eperson_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Eperson_Item'), 'column' => 'eperson_id')),
    ));

    $this->widgetSchema->setNameFormat('public_epersongroup2eperson_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Epersongroup2eperson_Item';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'eperson_group_id' => 'ForeignKey',
      'eperson_id'       => 'ForeignKey',
    );
  }
}
