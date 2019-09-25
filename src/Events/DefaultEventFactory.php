<?php

namespace PhilKra\Events;

final class DefaultEventFactory implements EventFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createError($throwable, $contexts, $transaction = null)
    {
        return new Error($throwable, $contexts, $transaction);
    }

    /**
     * {@inheritdoc}
     */
    public function createTransaction($name, $contexts, $start = null)
    {
        return new Transaction($name, $contexts, $start);
    }
}
