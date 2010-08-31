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
      'community_id'      => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormTextarea(),
      'short_description' => new sfWidgetFormTextarea(),
      'introductory_text' => new sfWidgetFormTextarea(),
      'logo_bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'add_empty' => true)),
      'copyright_text'    => new sfWidgetFormTextarea(),
      'side_bar_text'     => new sfWidgetFormTextarea(),
      'admin'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'community_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'community_id', 'required' => false)),
      'name'              => new sfValidatorString(array('required' => false)),
      'short_description' => new sfValidatorString(array('required' => false)),
      'introductory_text' => new sfValidatorString(array('required' => false)),
      'logo_bitstream_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'required' => false)),
      'copyright_text'    => new sfValidatorString(array('required' => false)),
      'side_bar_text'     => new sfValidatorString(array('required' => false)),
      'admin'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'required' => false)),
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

}
