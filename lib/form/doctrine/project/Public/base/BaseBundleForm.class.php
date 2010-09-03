<?php

/**
 * Bundle form base class.
 *
 * @method Bundle getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBundleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bundle_id'            => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormTextarea(),
      'primary_bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PrimaryBitstream'), 'add_empty' => true)),
      'items_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
      'bitstreams_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Bitstream')),
    ));

    $this->setValidators(array(
      'bundle_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'bundle_id', 'required' => false)),
      'name'                 => new sfValidatorString(array('required' => false)),
      'primary_bitstream_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PrimaryBitstream'), 'required' => false)),
      'items_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
      'bitstreams_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Bitstream', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bundle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bundle';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['items_list']))
    {
      $this->setDefault('items_list', $this->object->Items->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['bitstreams_list']))
    {
      $this->setDefault('bitstreams_list', $this->object->Bitstreams->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveItemsList($con);
    $this->saveBitstreamsList($con);

    parent::doSave($con);
  }

  public function saveItemsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['items_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Items->getPrimaryKeys();
    $values = $this->getValue('items_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Items', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Items', array_values($link));
    }
  }

  public function saveBitstreamsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['bitstreams_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Bitstreams->getPrimaryKeys();
    $values = $this->getValue('bitstreams_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Bitstreams', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Bitstreams', array_values($link));
    }
  }

}
