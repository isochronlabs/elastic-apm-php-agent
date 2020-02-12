<?php

namespace PhilKra\Exception;

/**
 * Application Tear Up has missing App Name in Config
 */
class MissingAppNameException extends \Exception
{
    public function __construct($message = null, $code = null, $previous = null)
    {
        parent::__construct(sprintf('No app name registered in agent config.', $message), $code, $previous);
    }
}
