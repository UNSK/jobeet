<?php

/**
 * JobeetAffiliate filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseJobeetAffiliateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'jobeet_category_affiliate' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'url'                       => new sfValidatorPass(array('required' => false)),
      'email'                     => new sfValidatorPass(array('required' => false)),
      'token'                     => new sfValidatorPass(array('required' => false)),
      'is_active'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'jobeet_category_affiliate' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('jobeet_affiliate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobeetAffiliate';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'url'                       => 'Text',
      'email'                     => 'Text',
      'token'                     => 'Text',
      'is_active'                 => 'Boolean',
      'created_at'                => 'Date',
      'jobeet_category_affiliate' => 'Text',
    );
  }
}
