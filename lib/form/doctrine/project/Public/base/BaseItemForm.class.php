<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'item_id'           => new sfWidgetFormInputHidden(),
      'submitter_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'add_empty' => true)),
      'in_archive'        => new sfWidgetFormInputCheckbox(),
      'withdrawn'         => new sfWidgetFormInputCheckbox(),
      'owning_collection' => new sfWidgetFormInputText(),
      'last_modified'     => new sfWidgetFormDateTime(),
      'bundles_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Bundle')),
      'collections_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Collection')),
      'communities_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Community')),
    ));

    $this->setValidators(array(
      'item_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'item_id', 'required' => false)),
      'submitter_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Eperson'), 'required' => false)),
      'in_archive'        => new sfValidatorBoolean(array('required' => false)),
      'withdrawn'         => new sfValidatorBoolean(array('required' => false)),
      'owning_collection' => new sfValidatorInteger(array('required' => false)),
      'last_modified'     => new sfValidatorDateTime(array('required' => false)),
      'bundles_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Bundle', 'required' => false)),
      'collections_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Collection', 'required' => false)),
      'communities_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Community', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['bundles_list']))
    {
      $this->setDefault('bundles_list', $this->object->Bundles->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['collections_list']))
    {
      $this->setDefault('collections_list', $this->object->Collections->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['communities_list']))
    {
      $this->setDefault('communities_list', $this->object->Communities->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveBundlesList($con);
    $this->saveCollectionsList($con);
    $this->saveCommunitiesList($con);

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

  public function saveCollectionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['collections_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Collections->getPrimaryKeys();
    $values = $this->getValue('collections_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Collections', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Collections', array_values($link));
    }
  }

  public function saveCommunitiesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['communities_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Communities->getPrimaryKeys();
    $values = $this->getValue('communities_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Communities', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Communities', array_values($link));
    }
  }

}
