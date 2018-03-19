<?php

/*
 * This file is part of Dotpayds project.
 * (c) Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 *
 * @license   https://opensource.org/licenses/MIT  The MIT License
 */

namespace  KrzysiekPiasecki\Dotpay\Validation\Response\Constraint;

use KrzysiekPiasecki\Dotpay\Validation\Response\OperationNumberValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * Constraint against 'operationNumber' parameter.
 *
 * @see ResponseBag::$operationNumber Parameter 'operationNumber'
 * @Annotation
 * @Target({"PROPERTY"})
 */
class OperationNumberConstraint extends Regex
{
    /** @var string Constraint message */
    public $message = 'The value {{ operationNumber }} is not a valid \'operationNumber\' parameter';

    public $pattern = '^M[0-9]{4,5}-[0-9]{4,5}^';

    /**
     * OperationNumberConstraint constructor.
     */
    public function __construct()
    {
        parent::__construct($this->pattern);
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return OperationNumberValidator::class;
    }
}
