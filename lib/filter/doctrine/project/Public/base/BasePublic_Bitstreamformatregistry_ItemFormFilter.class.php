<?php

/**
 * Public_Bitstreamformatregistry_Item filter form base class.
 *
 * @package    dspace
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePublic_Bitstreamformatregistry_ItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mimetype'            => new sfWidgetFormFilterInput(),
      'short_description'   => new sfWidgetFormFilterInput(),
      'description'         => new sfWidgetFormFilterInput(),
      'support_level'       => new sfWidgetFormFilterInput(),
      'internal'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'mimetype'            => new sfValidatorPass(array('required' => false)),
      'short_description'   => new sfValidatorPass(array('required' => false)),
      'description'         => new sfValidatorPass(array('required' => false)),
      'support_level'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'internal'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('public_bitstreamformatregistry_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Public_Bitstreamformatregistry_Item';
  }

  public function getFields()
  {
    return array(
      'bitstream_format_id' => 'Number',
      'mimetype'            => 'Text',
      'short_description'   => 'Text',
      'description'         => 'Text',
      'support_level'       => 'Number',
      'internal'            => 'Boolean',
    );
  }
}
