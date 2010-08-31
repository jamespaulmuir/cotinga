<?php

/**
 * Public_Group2groupcache_Item form base class.
 *
 * @method Public_Group2groupcache_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Group2groupcache_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'parent_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item_ForParent'), 'add_empty' => true)),
      'child_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item_ForChild'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'parent_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item_ForParent'), 'required' => false)),
      'child_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Epersongroup_Item_ForChild'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_group2groupcache_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Group2groupcache_Item';
  }

}
