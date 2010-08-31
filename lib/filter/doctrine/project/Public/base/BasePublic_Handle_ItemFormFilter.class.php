<?php

/**
 * Public_Handle_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Handle_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'handle'           => new sfWidgetFormFilterInput(),
      'resource_type_id' => new sfWidgetFormFilterInput(),
      'resource_id'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'handle'           => new sfValidatorPass(array('required' => false)),
      'resource_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'resource_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('public_handle_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Handle_Item';
  }

  public function getFields()
  {
    return array(
      'handle_id'        => 'Number',
      'handle'           => 'Text',
      'resource_type_id' => 'Number',
      'resource_id'      => 'Number',
    );
  }
}
