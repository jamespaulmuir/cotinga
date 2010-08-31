<?php

/**
 * Public_CommunityItemCount_Item form base class.
 *
 * @method Public_CommunityItemCount_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_CommunityItemCount_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'community_id' => new sfWidgetFormInputHidden(),
      'count'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'community_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'community_id', 'required' => false)),
      'count'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_community_item_count_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_CommunityItemCount_Item';
  }

}
