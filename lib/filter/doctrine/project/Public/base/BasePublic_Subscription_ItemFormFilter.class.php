<?php

/**
 * Public_Subscription_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Subscription_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'collection_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'eperson_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Eperson_Item'), 'column' => 'eperson_id')),
      'collection_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Public_Collection_Item'), 'column' => 'collection_id')),
    ));

    $this->widgetSchema->setNameFormat('public_subscription_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Subscription_Item';
  }

  public function getFields()
  {
    return array(
      'subscription_id' => 'Number',
      'eperson_id'      => 'ForeignKey',
      'collection_id'   => 'ForeignKey',
    );
  }
}
