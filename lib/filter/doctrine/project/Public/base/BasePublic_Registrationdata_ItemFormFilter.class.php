<?php

/**
 * Public_Registrationdata_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Registrationdata_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'               => new sfWidgetFormFilterInput(),
      'token'               => new sfWidgetFormFilterInput(),
      'expires'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'email'               => new sfValidatorPass(array('required' => false)),
      'token'               => new sfValidatorPass(array('required' => false)),
      'expires'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('public_registrationdata_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Registrationdata_Item';
  }

  public function getFields()
  {
    return array(
      'registrationdata_id' => 'Number',
      'email'               => 'Text',
      'token'               => 'Text',
      'expires'             => 'Date',
    );
  }
}
