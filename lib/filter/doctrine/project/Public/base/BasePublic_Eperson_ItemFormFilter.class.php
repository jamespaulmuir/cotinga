<?php

/**
 * Public_Eperson_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Eperson_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'               => new sfWidgetFormFilterInput(),
      'password'            => new sfWidgetFormFilterInput(),
      'firstname'           => new sfWidgetFormFilterInput(),
      'lastname'            => new sfWidgetFormFilterInput(),
      'can_log_in'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'require_certificate' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'self_registered'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_active'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sub_frequency'       => new sfWidgetFormFilterInput(),
      'phone'               => new sfWidgetFormFilterInput(),
      'netid'               => new sfWidgetFormFilterInput(),
      'language'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'email'               => new sfValidatorPass(array('required' => false)),
      'password'            => new sfValidatorPass(array('required' => false)),
      'firstname'           => new sfValidatorPass(array('required' => false)),
      'lastname'            => new sfValidatorPass(array('required' => false)),
      'can_log_in'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'require_certificate' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'self_registered'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_active'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'sub_frequency'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'phone'               => new sfValidatorPass(array('required' => false)),
      'netid'               => new sfValidatorPass(array('required' => false)),
      'language'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_eperson_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Eperson_Item';
  }

  public function getFields()
  {
    return array(
      'eperson_id'          => 'Number',
      'email'               => 'Text',
      'password'            => 'Text',
      'firstname'           => 'Text',
      'lastname'            => 'Text',
      'can_log_in'          => 'Boolean',
      'require_certificate' => 'Boolean',
      'self_registered'     => 'Boolean',
      'last_active'         => 'Date',
      'sub_frequency'       => 'Number',
      'phone'               => 'Text',
      'netid'               => 'Text',
      'language'            => 'Text',
    );
  }
}
