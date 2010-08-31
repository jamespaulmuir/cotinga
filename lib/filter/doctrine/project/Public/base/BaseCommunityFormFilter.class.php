<?php

/**
 * Community filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommunityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(),
      'short_description' => new sfWidgetFormFilterInput(),
      'introductory_text' => new sfWidgetFormFilterInput(),
      'logo_bitstream_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bitstream'), 'add_empty' => true)),
      'copyright_text'    => new sfWidgetFormFilterInput(),
      'side_bar_text'     => new sfWidgetFormFilterInput(),
      'admin'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Epersongroup'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'short_description' => new sfValidatorPass(array('required' => false)),
      'introductory_text' => new sfValidatorPass(array('required' => false)),
      'logo_bitstream_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bitstream'), 'column' => 'bitstream_id')),
      'copyright_text'    => new sfValidatorPass(array('required' => false)),
      'side_bar_text'     => new sfValidatorPass(array('required' => false)),
      'admin'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Epersongroup'), 'column' => 'eperson_group_id')),
    ));

    $this->widgetSchema->setNameFormat('community_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Community';
  }

  public function getFields()
  {
    return array(
      'community_id'      => 'Number',
      'name'              => 'Text',
      'short_description' => 'Text',
      'introductory_text' => 'Text',
      'logo_bitstream_id' => 'ForeignKey',
      'copyright_text'    => 'Text',
      'side_bar_text'     => 'Text',
      'admin'             => 'ForeignKey',
    );
  }
}
