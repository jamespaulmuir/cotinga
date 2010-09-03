<?php

/**
 * Community form base class.
 *
 * @method Community getObject() Returns the current form's model object
 *
 * @package    dspace
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommunityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'community_id'            => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormTextarea(),
      'short_description'       => new sfWidgetFormTextarea(),
      'introductory_text'       => new sfWidgetFormTextarea(),
      'logo_bitstream_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LogoBitstream'), 'add_empty' => true)),
      'copyright_text'          => new sfWidgetFormTextarea(),
      'side_bar_text'           => new sfWidgetFormTextarea(),
      'admin'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
      'collections_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Collection')),
      'parent_communities_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Community')),
      'child_communities_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Community')),
      'items_list'              => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
    ));

    $this->setValidators(array(
      'community_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'community_id', 'required' => false)),
      'name'                    => new sfValidatorString(array('required' => false)),
      'short_description'       => new sfValidatorString(array('required' => false)),
      'introductory_text'       => new sfValidatorString(array('required' => false)),
      'logo_bitstream_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LogoBitstream'), 'required' => false)),
      'copyright_text'          => new sfValidatorString(array('required' => false)),
      'side_bar_text'           => new sfValidatorString(array('required' => false)),
      'admin'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'required' => false)),
      'collections_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Collection', 'required' => false)),
      'parent_communities_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Community', 'required' => false)),
      'child_communities_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Community', 'required' => false)),
      'items_list'              => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('community[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Community';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['collections_list']))
    {
      $this->setDefault('collections_list', $this->object->Collections->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['parent_communities_list']))
    {
      $this->setDefault('parent_communities_list', $this->object->ParentCommunities->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['child_communities_list']))
    {
      $this->setDefault('child_communities_list', $this->object->ChildCommunities->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['items_list']))
    {
      $this->setDefault('items_list', $this->object->Items->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveCollectionsList($con);
    $this->saveParentCommunitiesList($con);
    $this->saveChildCommunitiesList($con);
    $this->saveItemsList($con);

    parent::doSave($con);
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

  public function saveParentCommunitiesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['parent_communities_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ParentCommunities->getPrimaryKeys();
    $values = $this->getValue('parent_communities_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ParentCommunities', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ParentCommunities', array_values($link));
    }
  }

  public function saveChildCommunitiesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['child_communities_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ChildCommunities->getPrimaryKeys();
    $values = $this->getValue('child_communities_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ChildCommunities', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ChildCommunities', array_values($link));
    }
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

}
