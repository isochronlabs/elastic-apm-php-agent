<?php

namespace PhilKra\Tracing;

use PhilKra\Events\Transaction;
use Psr\Http\Message\RequestInterface;
use PhilKra\TraceParent;

class TracingGuzzleMiddleware
{
    /**
     * @var Transaction
     */
    private $transaction;

    /**
     * TracingGuzzleMiddleware constructor.
     *
     * @param Transaction|null $transaction
     */
    public function __construct($transaction = null)
    {
        $this->transaction = $transaction;
    }

    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke($handler)
    {
        return function ($request, $options) use ($handler) {
            if ($this->transaction !== null && $this->transaction->getTraceId() !== null && $this->transaction->getId() !== null) {
                $header = new TraceParent($this->transaction->getTraceId(), $this->transaction->getId(), '01');
                $request = $request->withHeader(TraceParent::HEADER_NAME, $header->__toString());
            }
            return $handler($request, $options);
        };
    }
}