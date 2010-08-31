<?php

/**
 * Public_Bitstreamformatregistry_Item form base class.
 *
 * @method Public_Bitstreamformatregistry_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Bitstreamformatregistry_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_format_id' => new sfWidgetFormInputHidden(),
      'mimetype'            => new sfWidgetFormTextarea(),
      'short_description'   => new sfWidgetFormTextarea(),
      'description'         => new sfWidgetFormTextarea(),
      'support_level'       => new sfWidgetFormInputText(),
      'internal'            => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'bitstream_format_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'bitstream_format_id', 'required' => false)),
      'mimetype'            => new sfValidatorString(array('required' => false)),
      'short_description'   => new sfValidatorString(array('required' => false)),
      'description'         => new sfValidatorString(array('required' => false)),
      'support_level'       => new sfValidatorInteger(array('required' => false)),
      'internal'            => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_bitstreamformatregistry_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bitstreamformatregistry_Item';
  }

}
