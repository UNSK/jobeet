<?php

/**
 * JobeetAffiliate form base class.
 *
 * @method JobeetAffiliate getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseJobeetAffiliateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'url'                       => new sfWidgetFormInputText(),
      'email'                     => new sfWidgetFormInputText(),
      'token'                     => new sfWidgetFormInputText(),
      'is_active'                 => new sfWidgetFormInputCheckbox(),
      'created_at'                => new sfWidgetFormDateTime(),
      'jobeet_category_affiliate' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'url'                       => new sfValidatorString(array('max_length' => 255)),
      'email'                     => new sfValidatorString(array('max_length' => 255)),
      'token'                     => new sfValidatorString(array('max_length' => 255)),
      'is_active'                 => new sfValidatorBoolean(),
      'created_at'                => new sfValidatorDateTime(array('required' => false)),
      'jobeet_category_affiliate' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'JobeetAffiliate', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('jobeet_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'JobeetAffiliate';
  }


}
