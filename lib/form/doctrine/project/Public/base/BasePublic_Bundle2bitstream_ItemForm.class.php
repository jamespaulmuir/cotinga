<?php

/**
 * Public_Bundle2bitstream_Item form base class.
 *
 * @method Public_Bundle2bitstream_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Bundle2bitstream_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'bundle_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bundle_Item'), 'add_empty' => true)),
      'bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bitstream_Item'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'bundle_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bundle_Item'), 'required' => false)),
      'bitstream_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bitstream_Item'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_bundle2bitstream_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bundle2bitstream_Item';
  }

}
