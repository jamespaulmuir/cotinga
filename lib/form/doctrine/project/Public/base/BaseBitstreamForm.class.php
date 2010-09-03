<?php

/**
 * Bitstream form base class.
 *
 * @method Bitstream getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBitstreamForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bitstream_id'            => new sfWidgetFormInputHidden(),
      'bitstream_format_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Format'), 'add_empty' => true)),
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
      'bundles_list'            => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Bundle')),
    ));

    $this->setValidators(array(
      'bitstream_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'bitstream_id', 'required' => false)),
      'bitstream_format_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Format'), 'required' => false)),
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
      'bundles_list'            => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Bundle', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bitstream[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bitstream';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['bundles_list']))
    {
      $this->setDefault('bundles_list', $this->object->Bundles->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveBundlesList($con);

    parent::doSave($con);
  }

  public function saveBundlesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['bundles_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Bundles->getPrimaryKeys();
    $values = $this->getValue('bundles_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Bundles', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Bundles', array_values($link));
    }
  }

}
