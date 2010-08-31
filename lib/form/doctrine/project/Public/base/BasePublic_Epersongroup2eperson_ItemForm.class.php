<?php

/**
 * Public_Epersongroup2eperson_Item form base class.
 *
 * @method Public_Epersongroup2eperson_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Epersongroup2eperson_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'eperson_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item'), 'add_empty' => true)),
      'eperson_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'eperson_group_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item'), 'required' => false)),
      'eperson_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Eperson_Item'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_epersongroup2eperson_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Epersongroup2eperson_Item';
  }

}
