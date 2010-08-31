<?php

/**
 * Public_Subscription_Item form base class.
 *
 * @method Public_Subscription_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Subscription_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subscription_id' => new sfWidgetFormInputHidden(),
      'eperson_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
      'collection_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'subscription_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'subscription_id', 'required' => false)),
      'eperson_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'required' => false)),
      'collection_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_subscription_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Subscription_Item';
  }

}
