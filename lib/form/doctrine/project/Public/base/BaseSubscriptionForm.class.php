<?php

/**
 * Subscription form base class.
 *
 * @method Subscription getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubscriptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'subscription_id' => new sfWidgetFormInputHidden(),
      'eperson_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
      'collection_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'subscription_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'subscription_id', 'required' => false)),
      'eperson_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'required' => false)),
      'collection_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collection'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('subscription[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Subscription';
  }

}
