<?php

/**
 * Public_Bi4Dis_Item form base class.
 *
 * @method Public_Bi4Dis_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Bi4Dis_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'distinct_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bi4Dmap_Items'), 'add_empty' => true)),
      'authority'   => new sfWidgetFormTextarea(),
      'value'       => new sfWidgetFormTextarea(),
      'sort_value'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'distinct_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bi4Dmap_Items'), 'required' => false)),
      'authority'   => new sfValidatorString(array('required' => false)),
      'value'       => new sfValidatorString(array('required' => false)),
      'sort_value'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_bi4_dis_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bi4Dis_Item';
  }

}
