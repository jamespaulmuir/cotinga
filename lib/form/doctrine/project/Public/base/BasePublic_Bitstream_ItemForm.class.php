<?php

/**
 * Public_Bitstream_Item form base class.
 *
 * @method Public_Bitstream_Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePublic_Bitstream_ItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_id'            => new sfWidgetFormInputHidden(),
      'bitstream_format_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bitstreamformatregistry_Item'), 'add_empty' => true)),
      'name'                    => new sfWidgetFormTextarea(),
      'checksum'                => new sfWidgetFormTextarea(),
      'checksum_algorithm'      => new sfWidgetFormTextarea(),
      'description'             => new sfWidgetFormTextarea(),
      'user_format_description' => new sfWidgetFormTextarea(),
      'source'                  => new sfWidgetFormTextarea(),
      'internal_id'             => new sfWidgetFormTextarea(),
      'deleted'                 => new sfWidgetFormInputCheckbox(),
      'store_number'            => new sfWidgetFormInputText(),
      'sequence_id'             => new sfWidgetFormInputText(),
      'size_bytes'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'bitstream_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'bitstream_id', 'required' => false)),
      'bitstream_format_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Public_Bitstreamformatregistry_Item'), 'required' => false)),
      'name'                    => new sfValidatorString(array('required' => false)),
      'checksum'                => new sfValidatorString(array('required' => false)),
      'checksum_algorithm'      => new sfValidatorString(array('required' => false)),
      'description'             => new sfValidatorString(array('required' => false)),
      'user_format_description' => new sfValidatorString(array('required' => false)),
      'source'                  => new sfValidatorString(array('required' => false)),
      'internal_id'             => new sfValidatorString(array('required' => false)),
      'deleted'                 => new sfValidatorBoolean(array('required' => false)),
      'store_number'            => new sfValidatorInteger(array('required' => false)),
      'sequence_id'             => new sfValidatorInteger(array('required' => false)),
      'size_bytes'              => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_bitstream_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bitstream_Item';
  }

}
