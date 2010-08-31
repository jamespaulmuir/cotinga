<?php

/**
 * Public_Epersongroup_Item form base class.
 *
 * @method Public_Epersongroup_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Epersongroup_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eperson_group_id' => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'eperson_group_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'eperson_group_id', 'required' => false)),
      'name'             => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_epersongroup_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Epersongroup_Item';
  }

}
