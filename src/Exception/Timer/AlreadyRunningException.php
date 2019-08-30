<?php
namespace PhilKra\Exception\Timer;

/**
 * Trying to stop a Timer that is already running
 */
class AlreadyRunningException extends \Exception {

    public function __construct($message = '', $code = 0, $previous = NULL) {
        parent::__construct('Can\'t start a timer which is already running.', $code, $previous);
    }

}
