<?php

namespace Phalcon\Validation\Validator;

use Phalcon\Messages\Message;
use Phalcon\Validation;
use Phalcon\Validation\AbstractValidator;

class Between extends AbstractValidator
{
    protected $template = "Field :field must be within the range of :min to :max";

    /**
     * Constructor
     *
     * @param array options = [
     *     'message' => '',
     *     'template' => '',
     *     'minimum' => 5,
     *     'maximum' => 50,
     *     'allowEmpty' => false
     * ]
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    /**
     * Executes the validation
     */
    public function validate(Validation $validation, $field)
    {

        $value = $validation->getValue($field);
        $minimum = $this->getOption("start_date");
        $maximum = $this->getOption("end_date");

        if typeof minimum == "array" {
            let minimum = minimum[field];
        }

        if typeof maximum == "array" {
            let maximum = maximum[field];
        }

        if value < minimum || value > maximum {
            let replacePairs = [
                ":min":   minimum,
                ":max":   maximum
            ];

            validation->appendMessage(
                this->messageFactory(validation, field, replacePairs)
            );

            return false;
        }

        return true;
    }
}