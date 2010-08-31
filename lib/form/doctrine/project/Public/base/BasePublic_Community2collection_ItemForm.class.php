<?php

/**
 * Public_Community2collection_Item form base class.
 *
 * @method Public_Community2collection_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Community2collection_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'community_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item'), 'add_empty' => true)),
      'collection_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item_ForCollection'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'community_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Community_Item'), 'required' => false)),
      'collection_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Collection_Item_ForCollection'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_community2collection_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Community2collection_Item';
  }

}
