<?php

namespace PhilKra\Exception\Transaction;

/**
 * Trying to fetch an unregistered Transaction
 */
class UnknownTransactionException extends \Exception
{
    public function __construct($message = null, $code = null, $previous = null)
    {
        parent::__construct(sprintf('The transaction "%s" is not registered.', $message), $code, $previous);
    }
}
