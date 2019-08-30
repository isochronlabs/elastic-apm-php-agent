<?php

namespace PhilKra\Events;

interface EventFactoryInterface
{
    /**
     * Creates a new error.
     *
     * @param \Throwable $throwable
     * @param array      $contexts
     *
     * @return Error
     */
    public function createError($throwable, $contexts);

    /**
     * Creates a new transaction
     *
     * @param string $name
     * @param array  $contexts
     */
    public function createTransaction($name, $contexts, $start = null);
}
