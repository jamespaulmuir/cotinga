<?php

/**
 * Public_ChecksumResults_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_ChecksumResults_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'result_description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'result_description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('public_checksum_results_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_ChecksumResults_Item';
  }

  public function getFields()
  {
    return array(
      'result_code'        => 'Text',
      'result_description' => 'Text',
    );
  }
}
