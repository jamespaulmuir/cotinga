<?php

/**
 * Public_CommunityItemCount_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_CommunityItemCount_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'count'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'count'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('public_community_item_count_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_CommunityItemCount_Item';
  }

  public function getFields()
  {
    return array(
      'community_id' => 'Number',
      'count'        => 'Number',
    );
  }
}
